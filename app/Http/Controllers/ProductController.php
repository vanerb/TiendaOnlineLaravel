<?php

namespace App\Http\Controllers;

use App\Models\Cesta;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function Psy\debug;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $product = Product::where('stock', '>', 0)->get();
        return view('product.index', ['product' => $product]);
    }

    public function showall()
    {
        $product = Product::all();
        return view('product.editmode', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

   

    public function addcesta(string $id_producto)
    {
        $cesta = new Cesta();

        //$cesta->user_id = auth()->user()->id;
        $cesta->user_id = auth()->user()->id;
        $cesta->producto_id = $id_producto;

        // Obtén el producto por su ID
        $product = Product::where('id', $id_producto)->first();

        if ($product) {
            $stock = $product->stock;

            if ($stock > 0) {
                // Reduce el stock en 1
                $product->stock = $stock - 1;
                $product->save();
                $cesta->save();
                return redirect()->route('products.index')->with('success', 'Producto añadido a la cesta correctamente');
            } else {
                return redirect()->route('products.index')->with('error', 'El producto está agotado.');
            }
        } else {
            return redirect()->route('products.index')->with('error', 'Producto no encontrado.');
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);

        $product = new Product();

        $product->name = $request->name;
        $product->description = $request->description;
        //dd($request->file('image'));
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public');
            $product->image = str_replace('public/', '', $imagePath);
        } else {
            $product->image = $request->image;
        }

        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();

        return redirect()->route('products.showall')->with('success', 'Producto creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('product.show', ['product' => $product]);
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
        $product = Product::find($id);

        $product->name = $request->name;
        $product->description = $request->description;

        // Verifica si se ha cargado una nueva imagen
        if ($request->hasFile('image')) {
            // Elimina la imagen anterior si no se utiliza en ningún otro producto
            $previousImage = $product->image;
            $product->image = $request->file('image')->store('public');
            $product->image = str_replace('public/', '', $product->image);

            // Verifica si la imagen anterior no se utiliza en ningún otro producto
            $isImageInUse = Product::where('image', $previousImage)->where('id', '!=', $product->id)->exists();
            if (!$isImageInUse) {
                Storage::delete('public/' . $previousImage);
            }
        }

        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();

        return redirect()->route('products.showall')->with('success', 'Producto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $previousImage = $product->image;
        $isImageInUse = Product::where('image', $previousImage)->where('id', '!=', $product->id)->exists();
        if (!$isImageInUse) {
            Storage::delete('public/' . $previousImage);
        }

        $product->delete();
        return redirect()->route('products.showall')->with('success', 'Producto eliminado');
    }
}
