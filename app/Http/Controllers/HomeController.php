<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        // 👉 Projets déjà réalisés par Tafely.GR
        $projets = [
            [
                'nom' => 'Courtage Solaire',
                'categorie' => 'Site vitrine',
                'description' => 'Site vitrine pour une entreprise spécialisée dans les solutions photovoltaïques, pensé pour présenter clairement ses offres et générer des demandes de devis.',
                'image' => 'projets/courtage-solaire.png',
                'lien' => 'https://courtage-solaire.com/',
            ],
            [
                'nom' => 'IA DIAL',
                'categorie' => 'Plateforme IA',
                'description' => 'Plateforme proposant des agents IA sur mesure pour automatiser les échanges et les tâches des entreprises.',
                'image' => 'projets/ia-dial.png',
                'lien' => 'https://iadial.com//',
            ],
            [
                'nom' => 'FDK - Fast Data Keys',
                'categorie' => 'Site Vitrine',
                'description' => 'Site vitrine pour une entreprise spécialisée dans le service informatique, pensé pour présenter clairement ses offres et générer des demandes de devis.',
                'image' => 'projets/fdk.png',
                'lien' => 'https://fdk-fastdatakeys.com/',
            ],

            // 👉 Pour ajouter un futur projet, copier ce bloc :
            // [
            //     'nom' => 'Nom du projet',
            //     'categorie' => 'Catégorie',
            //     'description' => 'Description courte...',
            //     'image' => 'projets/mon-projet.png',
            //     'lien' => 'https://mon-projet.com',
            // ],
        ];

        // 👉 Produits Tafely.GR
        $produits = [
            [
                'nom' => 'Tafely Boutiq',
                'slogan' => 'Votre boutique en ligne, prête en quelques minutes',
                'description' => 'Ajoutez vos produits, vos prix et vos photos. Tafely Boutiq génère automatiquement une page de vente unique et professionnelle, prête à être partagée sur Facebook, Instagram ou WhatsApp.',
                'icone' => 'fa-store',
                'fonctionnalites' => [
                    'Ajout illimité de produits',
                    'Page unique et personnalisée',
                    'Lien de partage instantané',
                    'Commandes reçues directement sur votre email',
                    'Design responsive sur tous les écrans',
                ],
                'lien' => null,
                'couleur' => 'blue',
            ],
            [
                'nom' => 'Tafely Resto',
                'slogan' => 'La carte digitale de votre restaurant, simple et rapide',
                'description' => 'Ajoutez vos plats, vos prix et vos photos. Tafely Resto génère automatiquement une carte en ligne élégante, à partager avec vos clients pour qu\'ils commandent en un clic.',
                'icone' => 'fa-utensils',
                'fonctionnalites' => [
                    'Ajout illimité de plats et menus',
                    'Carte digitale unique et élégante',
                    'Lien de partage instantané',
                    'Commandes reçues directement sur votre email',
                    'Design responsive sur tous les écrans',
                ],
                'lien' => null,
                'couleur' => 'red',
            ],
        ];

        return view('home', compact('projets', 'produits'));
    }
}