@extends('layouts.master')
@section('title', 'Ajout / Modification produit')
@section('content')
    

    @if (isset($product))
    <div class="page-head">
        <h1 class="page-head__title">Modifier mon NFT</h1>
        <a class="btn btn__img btn--primary" href="{{ route('products.index') }}" ><img src="{{ asset('images/back.svg') }}" alt="Icone retour">Revenir aux NFT</a>
    </div>

    <form action="{{ route('products.update', $product) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
    @else
    <div class="page-head">
        <h1 class="page-head__title">Ajouter mon NFT</h1>
        <a class="btn btn__img btn--primary" href="{{ route('products.index') }}" ><img src="{{ asset('images/back.svg') }}" alt="Icone retour">Revenir aux NFT</a>
    </div>

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
    @endif

        @csrf
        <input type="text" name="name" value="{{ isset($product->name) ? $product->name : old('name') }}">
        @error("name")
        <div>{{ $message }}</div>
        @enderror
        <input type="text" name="price" value="{{ isset($product->price) ? $product->price : old('price') }}">
        @error("price")
        <div>{{ $message }}</div>
        @enderror
        <textarea name="description" rows="5">{{ isset($product->description) ? $product->description : old('description') }}</textarea>
        @error("description")
        <div>{{ $message }}</div>
        @enderror

        @if (isset($product->picture))
        <img src="{{ asset('storage/'.$product->picture) }}" alt="Image du produit">
        @endif
        <input type="file" name="picture">
        @error("picture")
        <div>{{ $message }}</div>
        @enderror

        <input type="submit" value="Ajouter">
    </form>
@endsection