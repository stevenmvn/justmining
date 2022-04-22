@extends('layouts.master')
@section('title', $product->name)
@section('content')
    <h1>{{$product->name}}</h1>
    

    <p>{{$product->description}}</p>
    <p>{{$product->price}}</p>
    <img src="{{ asset('storage/'.$product->picture) }}">

    <form action="{{ route('products.destroy', $product) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Supprimer">
    </form>
    <a href="{{ route('products.edit', ['product' => $product]) }}">Modifier</a>
    <a href="{{ route('products.index') }}" >Voir tous les produits</a>
@endsection