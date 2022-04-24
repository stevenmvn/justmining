<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $products = Product::paginate(9);

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
            'price' => 'bail|required|numeric|min:0.01',
            'picture' => 'bail|required|image|max:2048',
        ]);

        //Sauvegarde l'image
        $path = $request->picture->store('products');

        
        //Stocke les données 
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'sallable' => $request->sallable ? 1 : 0,
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
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
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
        //Valider les données envoyées
        $rules = [
            'name' => 'bail|required|string|max:191',
            'description' => 'bail|required',
            'price' => 'bail|required|numeric|min:0.01',
        ];

        //L'utilisateur envoie une nouvelle image
        if ($request->has('picture')) {
            $rules['picture'] = 'bail|required|image|max:2048';

            Storage::delete($product->picture);
            $path = $request->picture->store("products");
        }

        //Stocke les données actualisées 
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'sallable' => $request->sallable ? 1 : 0,
            'picture' =>isset($path) ? $path : $product->picture,
        ]);

        return redirect(route("products.show", $product))->with('status', 'Les informations du produit ont bien été mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //Supprime l'image
        Storage::delete($product->picture);

        //Supprime les informations stockées du produit
        $product->delete();

        //Redirige vers la liste des produits
        return redirect(route("products.index"))->with('status', 'Le produit a bien été supprimé');
    }
}
