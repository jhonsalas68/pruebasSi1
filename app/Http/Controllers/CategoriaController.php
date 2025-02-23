<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::orderBy('id', 'asc')->get();
        return view('categorias.index', compact('categorias'));
    }

    public function store()
    {
        return view('categorias.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:25',
            'descripcion' => 'required|max:100'
        ]);
        $categoria = Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion
        ]);
        return redirect(route('categorias.index'));
    }
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        if (!$categoria) {
            return redirect()->back()->with('error', 'Categoría no encontrada.');
        }
        return view('categorias.update', compact('categoria'));
    }
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->update($request->all());
        return redirect(route('categorias.index'));
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect(route('categorias.index'))->with('success', 'Categoría estruida.');
    }
}
