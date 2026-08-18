@extends('layouts.app')

@section('content')
    @include('partials.banner')
    @include('partials.offre')
    @include('partials.produits', ['produits' => $produits])
    @include('partials.services')
    @include('partials.portfolio', ['projets' => $projets])
    @include('partials.contact')
@endsection