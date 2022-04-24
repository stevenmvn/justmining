@extends('layouts.master')
@section('title', 'Ajout / Modification produit')
@section('content')
    
    
    <div class="page-head">
        <h1 class="page-head__title">{{ isset($product) ? 'Modifier mon NFT' : 'Ajouter mon NFT' }}</h1>
        <a class="btn btn__img btn--primary" href="{{ route('products.index') }}" ><img src="{{ asset('images/back.svg') }}" alt="Icone retour">Revenir aux NFT</a>
    </div>

    <div class="box box--center">
        @if (isset($product))
        <form action="{{ route('products.update', $product) }}" method="post" enctype="multipart/form-data" class="form box__content">
            @method('PUT')
        @else
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="form box__content">
        @endif
            @csrf
            <div class="box__content__left js-product-img">
                @error("picture")
                <span class="text-invalid">{{ $message }}</span>
                @enderror

                @if (isset($product->picture))
                <img class="js-preview-img" src="{{ asset('storage/'.$product->picture) }}" alt="Image du produit">
                @endif
                <label class="btn btn__img btn--primary label-file-input"for="picture"><img src="{{ asset('images/modify.svg') }}">Importer une image</label>
                <input class="hide-file-input" type="file" name="picture" id="picture" accept="image/png, image/gif, image/jpeg, image/svg" >
            </div>
            <div class="box__content__right">
                <label for="name">Nom</label>
                @error("name")
                <span class="text-invalid">{{ $message }}</span>
                @enderror
                <input class="@error('name') is-invalid @enderror" type="text" name="name" required value="{{ isset($product->name) ? $product->name : old('name') }}" id="name" placeholder="Moonbird #8635">
                

                <label for="price">Prix <span>(minimum 0.01 <img src="{{ asset('images/eth.svg') }}">)</i></span></label>
                @error("price")
                <span class="text-invalid">{{ $message }}</span>
                @enderror
                <input class="@error('price') is-invalid @enderror" type="number" required step="0.01" name="price" value="{{ isset($product->price) ? $product->price : old('price') }}" id="price" placeholder="0.01">
                
                <label for="description">Décrivez votre NFT</label>
                @error("description")
                <span class="text-invalid">{{ $message }}</span>
                @enderror
                <textarea class="@error('description') is-invalid @enderror" required name="description" rows="5" id="description" placeholder="A collection of 10,000 utility-enabled PFPs">{{ isset($product->description) ? $product->description : old('description') }}</textarea>

                <div class="box-checkbox">
                    <input type="checkbox" name="sallable" id="sallable" {{isset($product) && $product->sallable == 1 ? 'checked' : ''}}>
                    <label for="sallable">Ce produit n'est pas à vendre</label>
                </div>

                <button class="btn btn__img btn--primary" type="submit"><img src="{{ asset('images/'.(isset($product) ? 'modify.svg' : 'add.svg')) }}">{{ isset($product) ? 'Modifier mon NFT' : 'Ajouter mon NFT' }}</button>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="{{ asset('js/image-preview.js') }}" defer></script>
@endsection