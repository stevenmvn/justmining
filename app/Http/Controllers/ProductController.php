<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Récupère tous les produits dans l'ordre d'ajout 
        $products = Product::latest()->get();

        //Envoie les produits dans la vue 
        return view("product.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("product.edit");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Valider les données envoyées
        $this->validate($request, [
            'name' => 'bail|required|string|max:191',
            'description' => 'bail|required',
            'price' => 'bail|required|numeric',
            'picture' => 'bail|required|image|max:2048',
        ]);

        //Sauvegarde l'image
        $path = $request->picture->store('products');

        //Stocke les données 
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'picture' =>$path,
        ]);

        //Affiche la liste des produits
        return redirect(route("products.index"))->with('status', 'Le produit a bien été ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
