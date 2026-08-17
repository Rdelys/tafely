@extends('layouts.app')

@section('content')
    @include('partials.banner')
    @include('partials.produits', ['produits' => $produits])
    @include('partials.contact')
@endsection