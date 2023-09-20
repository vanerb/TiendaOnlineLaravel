<?php

namespace App\Http\Controllers;

use App\Models\Cesta;
use App\Models\Product;
use Illuminate\Http\Request;

class CestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->user();

        // Obtén los productos de la cesta del usuario con el ID 1
        $productsInCesta = Cesta::where('user_id', $user_id->id)->get();

        // Ahora, puedes usar los IDs de producto en $productsInCesta para obtener los datos de los productos desde la tabla "products"
        $products = Product::whereIn('id', $productsInCesta->pluck('producto_id'))->get();

        return view('cesta.index', ['product' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id_producto)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $cestum)
    {
        // Encuentra el primer modelo que coincida con la condición
        $cesta = Cesta::where('producto_id', $cestum)->first();

        $product = Product::where('id', $cestum)->first();

        if ($cesta) {
            if ($product) {
                $stock = $product->stock;
    
                if ($stock > 0) {
                    // Reduce el stock en 1
                    $product->stock = $stock + 1;
                    $product->save();
                }
            }

            // Borra el modelo específico
            $cesta->delete();
            return redirect()->route('cesta.index')->with('success', 'Producto eliminado');
        } else {
            // Maneja el caso donde no se encuentra el modelo
            return redirect()->route('cesta.index')->with('error', 'El producto no se encontró en la cesta');
        }
    }
}
