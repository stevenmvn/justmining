@extends('layouts.master')
@section('title', 'Ajout / Modification produit')
@section('content')
    <h1>Ajouter un produit</h1>
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}">
        @error("name")
        <div>{{ $message }}</div>
        @enderror
        <input type="text" name="price" value="{{ old('price') }}">
        @error("price")
        <div>{{ $message }}</div>
        @enderror
        <textarea name="description" rows="5">{{ old('description') }}</textarea>
        @error("description")
        <div>{{ $message }}</div>
        @enderror
        <input type="file" name="picture">
        @error("picture")
        <div>{{ $message }}</div>
        @enderror

        <input type="submit" value="Ajouter">
    </form>
@endsection