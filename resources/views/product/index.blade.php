@extends('layouts.master')
@section('title', 'Explorer nos NFT')
@section('content')

    <div class="page-head">
        <h1 class="page-head__title">Explorer nos NFT</h1>
        <a class="btn btn__img btn--primary" href="{{ route('products.create') }}" ><img src="{{ asset('images/add.svg') }}" alt="Icone ajouter">Ajouter mon NFT</a>
    </div>

    <div class="cards">
        @forelse($products as $product)
            <div class="card">
                <a href="{{ route('products.show', $product) }}">
                    <div class="card__head">
                        <img class="card__img" src="{{ asset('storage/'.$product->picture) }}" alt="Image produit">
                        <span class="card__price"><img src="{{ asset('images/eth.svg') }}"> {{$product->price}}</span>
                    </div>
                    <div class="card__body">
                        <div class="card__info">
                            <strong>{{$product->name}}</strong>
                            <span class="{{$product->sallable != 1 ? 'sale--on' : 'sale--off'}}">{{$product->sallable != 1 ? 'Disponible' : 'Indisponible'}}</span>
                        </div>
                        <div class="card__ending card__ending--primary">
                            <span>Fin dans</span>
                            <strong>10h 58m</strong>
                        </div>
                    </div>    
                </a>
            </div>
        @empty
            <p class="no-product">Aucun produit n'est actuellement disponible</p>
        @endforelse
    </div>
    {!! $products->links('includes.pagination') !!}
@endsection