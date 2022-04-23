@extends('layouts.master')
@section('title', 'Nos produits')
@section('content')

    <div class="page-head">
        <h1 class="page-head__title">Nos produits</h1>
        <a class="btn btn__img btn--primary" href="{{ route('products.create') }}" ><img src="{{ asset('images/add.svg') }}" alt="Icone ajouter">Ajouter un produit</a>
    </div>

    <div class="cards">
        @forelse($products as $product)
            <div class="card">
                <a href="{{ route('products.show', $product) }}">
                    <div class="card__head">
                        <img src="{{ asset('storage/'.$product->picture) }}" alt="Image produit">
                        <span class="card__price"><img src="{{ asset('images/eth.svg') }}"> {{$product->price}}</span>
                    </div>
                    <div class="card__body">
                        <div class="card__info">
                            <strong>{{$product->name}}</strong>
                            <span class="sale--not">not for sale</span>
                        </div>
                        <div class="card__ending card__ending--primary">
                            <span>Ending in</span>
                            <strong>10h 58m</strong>
                        </div>
                    </div>    
                </a>
            </div>
        @empty
            <p>Aucun produit n'est actuellement disponible</p>
        @endforelse
    </div>
    {!! $products->links('includes.pagination') !!}
@endsection