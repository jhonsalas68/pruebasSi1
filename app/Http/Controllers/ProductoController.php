<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Promotor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::orderBy('id', 'asc')->get();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $promotores = Promotor::all();
        return view('productos.create', compact('categorias', 'promotores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:30',
            'descripcion' => 'required|max:50',
            'precio' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'promotor_id' => 'required|exists:promotors,id',
            'stock' => 'required|numeric|min:0',
            'imagen' => 'nullable|required|image|mimes:jpeg,png,jpg,gif|max:3072'
            
        ]);
        $path='';
        if ($request->hasFile('imagen')) {
          $path=$request->file('imagen')->store('productos','public');
         
        }
        $producto = Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
           'imagen' => Storage::url($path),
            'categoria_id' => $request->categoria_id,
            'promotor_id' => $request->promotor_id,
        ]);
        return redirect(route('productos.index'));
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
        $producto = Producto::find($id);
        $promotores = Promotor::all();
        $categorias = Categoria::all();
        return view('productos.update', compact('producto', 'promotores', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $path='';
        if ($request->hasFile('imagen')) {
          $path=$request->file('imagen')->store('productos','public');
         
        }
        $producto = Producto::find($id);
           $producto->update([
            'nombre'=>$request->nombre,
            'descripcion' =>$request->descripcion,
            'precio'=>$request->precio,
            'stock'=>$request->precio,
            'imagen' => Storage::url($path),
            'categoria_id'=>$request->categoria_id,
            'promotor_id'=>$request->promotor_id,            
        ]);
        return redirect(route('productos.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::find($id);
        $imagePath = str_replace('storage/', 'public/', $producto->imagen); // Ajustar ruta
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }
        $producto->delete();
        return redirect(route('productos.index'))->with('success', 'Producto Destroyer.');
    }
}
