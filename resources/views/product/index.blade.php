@extends('layouts.master')
@section('title', 'Nos produits')
@section('content')
    <h1>Nos produits</h1>
    <a href="{{ route('products.create') }}" >Ajouter un produit</a>

    <hr>

    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif

    @forelse($products as $product)
        <a href="{{ route('products.show', $product) }}">
            <p>{{$product->name}}</p>
            <p>{{$product->description}}</p>
            <p>{{$product->price}}</p>
            <img src="{{ asset('storage/'.$product->picture) }}">
        </a>
        
        <hr>
    @empty
        <p>Aucun produit n'est actuellement disponible</p>
    @endforelse
@endsection