@extends('layouts.master')
@section('title', 'Ajout / Modification produit')
@section('content')
    

    @if (isset($product))
    <h1>Modifier le produit</h1>
    <form action="{{ route('products.update', $product) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
    @else
    <h1>Ajouter un produit</h1>
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