<?php

namespace App\Http\Controllers;

use App\Models\Cesta;
use Illuminate\Http\Request;

class CestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'user_id'=> 'required',
            'producto_id'=>'required'
        ]);

        $cesta = new Cesta();

        $cesta->user_id = auth()->user()->id;
        $cesta->producto_id = $id_producto;
        $cesta->save();

        return redirect()->route('product.index')->with('success' , 'Producto creado correctamente');
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
    public function destroy(string $id)
    {
        $cesta = Cesta::find($id);
        $cesta->delete();
        return redirect()->route('product.index')->with('success', 'Producto eliminado');
    }
}
