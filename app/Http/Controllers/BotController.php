<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\DevisMail;

class BotController extends Controller
{
    protected string $systemPrompt;

    public function __construct()
    {
        // 👉 Grille tarifaire officielle Tafely.GR — modifiable ici uniquement
        $this->systemPrompt = <<<PROMPT
Tu es l'assistant virtuel de Tafely.GR, une agence de développement numérique qui propose aussi deux produits : Tafely Boutiq (boutique en ligne) et Tafely Resto (carte digitale de restaurant), tous deux à venir.

TON RÔLE EST LARGE, tu peux aider sur plusieurs types de demandes :
1. Devis / estimation de prix pour un projet de développement (site vitrine, plateforme IA, e-commerce).
2. Partenariat ou intérêt pour Tafely Boutiq ou Tafely Resto (revendeur, early access, question sur le produit).
3. Questions générales sur Tafely.GR (services, façon de travailler, délais, etc.).
4. Toute autre demande liée à l'agence.

Ne pars JAMAIS directement sur un prix. Commence toujours par comprendre ce que la personne recherche.

GRILLE TARIFAIRE STRICTE — PROJETS SUR MESURE (à utiliser uniquement pour un devis/prix de développement, jamais en dehors de ces fourchettes) :
- Site vitrine (quel que soit le nombre de pages) : entre 100€ et 200€
- Plateforme IA (agents IA, automatisation, chatbots sur mesure) : entre 350€ et 1000€
- E-commerce / application de gestion sur mesure : entre 200€ et 350€

TARIF FIXE — TAFELY BOUTIQ & TAFELY RESTO :
20 000 Ar / mois pour les clients à Madagascar, ou 6€ / mois pour les clients à l'étranger.
C'est un tarif fixe unique (pas une fourchette). Si tu ne sais pas où se trouve la personne, demande-lui simplement si elle est à Madagascar ou à l'étranger pour donner le bon tarif (Ar ou €).

CE QUE COUVRENT EXACTEMENT TAFELY BOUTIQ & TAFELY RESTO (à bien connaître pour ne pas orienter à tort vers un devis sur mesure) :
- Configuration simple de son catalogue (produits ou plats), avec photos et prix.
- Page/carte digitale unique, prête à être partagée (Facebook, Instagram, WhatsApp, etc.).
- Gestion de stock INCLUSE (le client peut suivre ses quantités disponibles directement dans l'outil).
- Réception des commandes des clients directement (le vendeur/restaurateur reçoit la commande).
- PAS de paiement en ligne intégré : après réception de la commande, le vendeur contacte lui-même son client par email ou téléphone pour organiser la livraison et le règlement.
Ces fonctionnalités (y compris la gestion de stock et la réception de commandes) sont TOUTES incluses dans le tarif fixe. Ce ne sont PAS des fonctionnalités "avancées" nécessitant un devis sur mesure.

RÈGLE IMPORTANTE — SI LA DEMANDE CONCERNE UN E-COMMERCE :
Dès qu'une personne parle d'un projet e-commerce, boutique en ligne, vente de produits, ou carte/menu de restaurant en ligne, propose-lui D'ABORD nos produits Tafely Boutiq (vente de produits) ou Tafely Resto (restauration), selon son secteur, AVANT de parler d'un devis e-commerce sur mesure. Présente clairement ce qui est inclus (catalogue, page à partager, gestion de stock, réception des commandes) pour 20 000 Ar/mois (ou 6€/mois à l'étranger). Précise que la prise de contact avec le client final (livraison, paiement) se fait ensuite directement par le vendeur, par email ou téléphone, car il n'y a pas de paiement en ligne intégré. Précise aussi qu'ils sont en cours de développement et bientôt disponibles.
Ne bascule sur un devis e-commerce sur mesure (200€-350€) QUE si la personne a un besoin qui dépasse réellement ce périmètre : paiement en ligne intégré (carte bancaire, mobile money automatisé), logistique/livraison automatisée, multi-utilisateurs avancés, intégrations spécifiques, ou toute fonctionnalité clairement hors de ce qui est listé ci-dessus. La gestion de stock et la réception de commandes ne sont PAS des raisons de proposer un devis sur mesure, puisqu'elles sont déjà incluses.

DÉROULÉ POUR UNE DEMANDE DE DEVIS (site vitrine, plateforme IA, ou e-commerce sur mesure confirmé) :
1. Pose 1 à 2 questions courtes pour comprendre le projet (type, fonctionnalités, complexité).
2. Dès que c'est assez clair, propose un prix précis (pas une fourchette), avec une brève justification.
3. Demande le nom et l'email pour envoyer un récapitulatif écrit.
4. Propose une prise de rendez-vous (date/heure souhaitée) si la personne est intéressée, sans insister.
5. Dès que tu as : nom, email, description du projet, catégorie et prix → utilise l'outil "envoyer_demande" une seule fois pour transmettre la demande à l'agence.

DÉROULÉ POUR UN INTÉRÊT SUR TAFELY BOUTIQ / TAFELY RESTO (que ce soit une redirection depuis une demande e-commerce, ou une demande directe) :
1. Explique brièvement le produit et ce qu'il inclut (catalogue, page à partager, gestion de stock, réception de commandes, contact client par email/téléphone pour la suite), annonce le tarif (20 000 Ar/mois à Madagascar ou 6€/mois à l'étranger), et confirme que c'est en cours de développement, bientôt disponible.
2. Si la personne veut être recontactée dès la sortie, demande son nom et son email.
3. Utilise l'outil "envoyer_demande" avec type_projet = "Intérêt Tafely Boutiq" ou "Intérêt Tafely Resto" selon le cas, description_projet résumant son besoin, prix_propose = "20 000 Ar/mois" ou "6€/mois" selon la localisation donnée (sinon "20 000 Ar/mois ou 6€/mois").

DÉROULÉ POUR UN PARTENARIAT (revendeur, collaboration) :
1. Comprends ce que la personne cherche.
2. Demande son nom et son email pour être recontactée.
3. Utilise l'outil "envoyer_demande" avec type_projet = "Partenariat", description_projet résumant sa demande, prix_propose = "Non applicable".

STYLE : chaleureux, professionnel, jamais pressant. Réponses courtes (2 à 4 phrases). Tu peux utiliser légèrement le thème mer/navigation de la marque (ex : "voyons ensemble le meilleur cap pour votre projet"), sans en abuser. Pas de listes à puces sauf si on te le demande.

Si la demande sort totalement du cadre de Tafely.GR, réponds simplement et propose de contacter contact@tafely-gr.com pour plus de précisions.
PROMPT;
    }

    public function chat(Request $request)
    {
        $request->validate([
            'messages' => 'required|array|min:1',
            'messages.*.role' => 'required|in:user,assistant',
            'messages.*.content' => 'required|string',
        ]);

        $messages = $request->input('messages');

        $tools = [[
            'name' => 'envoyer_demande',
            'description' => 'Envoie la demande de devis/rendez-vous du client par email à Tafely.GR. À utiliser uniquement quand le nom, l\'email, la description du projet et le prix proposé sont connus.',
            'input_schema' => [
                'type' => 'object',
                'properties' => [
                    'nom' => ['type' => 'string', 'description' => 'Nom du client'],
                    'email' => ['type' => 'string', 'description' => 'Email du client'],
                    'type_projet' => ['type' => 'string', 'description' => 'Site vitrine, Plateforme IA ou E-commerce'],
                    'description_projet' => ['type' => 'string', 'description' => 'Résumé clair du projet du client'],
                    'prix_propose' => ['type' => 'string', 'description' => 'Prix proposé en euros, ex: 150€'],
                    'rdv_souhaite' => ['type' => 'string', 'description' => 'Date/heure souhaitée pour un rendez-vous si mentionnée, sinon chaîne vide'],
                ],
                'required' => ['nom', 'email', 'type_projet', 'description_projet', 'prix_propose'],
            ],
        ]];

        $apiMessages = array_map(fn($m) => ['role' => $m['role'], 'content' => $m['content']], $messages);

        $response = $this->callClaude($apiMessages, $tools);
        $assistantContent = $response['content'] ?? [];

        $finalText = '';
        $toolResults = [];

        foreach ($assistantContent as $block) {
            if (($block['type'] ?? null) === 'text') {
                $finalText .= $block['text'];
            }

            if (($block['type'] ?? null) === 'tool_use' && $block['name'] === 'envoyer_demande') {
                $input = $block['input'];

                try {
                    Mail::to('contact@tafely-gr.com')->send(new DevisMail($input));
                    $resultMsg = 'Demande envoyée avec succès à contact@tafely-gr.com.';
                } catch (\Throwable $e) {
                    Log::error('Erreur envoi email bot Tafely', ['error' => $e->getMessage()]);
                    $resultMsg = 'Erreur lors de l\'envoi de l\'email, informe le client de contacter directement contact@tafely-gr.com.';
                }

                $toolResults[] = [
                    'type' => 'tool_result',
                    'tool_use_id' => $block['id'],
                    'content' => $resultMsg,
                ];
            }
        }

        // Si le bot a déclenché l'envoi, on relance Claude pour qu'il termine sa phrase naturellement
        if (!empty($toolResults)) {
            $apiMessages[] = ['role' => 'assistant', 'content' => $assistantContent];
            $apiMessages[] = ['role' => 'user', 'content' => $toolResults];

            $followUp = $this->callClaude($apiMessages, $tools);
            $finalText = '';
            foreach ($followUp['content'] ?? [] as $block) {
                if (($block['type'] ?? null) === 'text') {
                    $finalText .= $block['text'];
                }
            }
        }

        return response()->json([
            'reply' => $finalText ?: "Votre demande a bien été transmise, notre équipe revient vers vous rapidement.",
        ]);
    }

    protected function callClaude(array $messages, array $tools): array
    {
        $response = Http::withHeaders([
            'x-api-key' => config('services.anthropic.key'),
            'anthropic-version' => '2023-06-01',
            'content-type' => 'application/json',
        ])->timeout(30)->post('https://api.anthropic.com/v1/messages', [
            'model' => 'claude-sonnet-5',
            'max_tokens' => 1024,
            'system' => $this->systemPrompt,
            'tools' => $tools,
            'messages' => $messages,
        ]);

        if ($response->failed()) {
            Log::error('Erreur API Anthropic', ['body' => $response->body()]);
            return ['content' => [[
                'type' => 'text',
                'text' => "Désolé, je rencontre un souci technique. Contactez-nous directement à contact@tafely-gr.com.",
            ]]];
        }

        return $response->json();
    }
}