@extends('layouts.master')
@section('title', $product->name)
@section('content')

    <div class="page-head">
        <h1 class="page-head__title">{{$product->name}}</h1>
        <a class="btn btn__img btn--primary" href="{{ route('products.index') }}" ><img src="{{ asset('images/back.svg') }}" alt="Icone retour">Revenir aux NFT</a>
    </div>

    <div class="box box--center">
        <div class="box__content">
            <div class="box__content__left">
                <img src="{{ asset('storage/'.$product->picture) }}">
            </div>
            <div class="box__content__right product">
                <div class="product__info">
                    <p class="__title">Description</p>
                    <p class="__info">{{$product->description}}</p>

                    <p class="__title">Disponibilité</p>
                    <p class="__info {{$product->sallable != 1 ? 'sale--on' : 'sale--off'}}">{{$product->sallable != 1 ? 'Disponible' : 'Indisponible'}}</p>

                    <p class="__title">Mise à prix</p>
                    <p class="product__price"><img src="{{ asset('images/eth.svg') }}" alt="Icone ethereum">{{$product->price}}</p>
                </div>
                
                <div class="product__action">
                    <p class="__title">Que voulez-vous faire ?</p>
                    <a class="btn btn__img btn--primary" href="{{ route('products.edit', ['product' => $product]) }}"><img src="{{ asset('images/modify.svg') }}">Modifier</a>
                    <form action="{{ route('products.destroy', $product) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn__img btn--error --full" type="submit"><img class="icon-delete" src="{{ asset('images/add.svg') }}" alt="Icone supprimer">Supprimer</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
@endsection