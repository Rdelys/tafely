<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
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

        return view('home', compact('produits'));
    }
}