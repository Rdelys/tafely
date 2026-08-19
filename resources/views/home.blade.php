@extends('layouts.app')
@section('title', 'Tafely.GR - Sites web, e-commerce et solutions IA sur mesure')
@section('description', 'Créez votre site vitrine, boutique en ligne ou plateforme sur mesure avec Tafely.GR. Essai gratuit 7 jours, 6 mois d\'hébergement offerts.')

@section('content')
    @include('partials.banner')
    @include('partials.offre')
    @include('partials.produits', ['produits' => $produits])
    @include('partials.services')
    @include('partials.portfolio', ['projets' => $projets])
    @include('partials.contact')
@endsection