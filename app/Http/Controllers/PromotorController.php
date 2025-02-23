<?php

namespace App\Http\Controllers;

use App\Models\Promotor;
use Illuminate\Http\Request;

class PromotorController extends Controller
{
    public function index()
    {
        $promotores = Promotor::orderBy('id', 'asc')->paginate(5);
        return view('promotores.index', compact('promotores'));
    }

    public function store()
    {
        return view('promotores.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:40',
            'direccion' => 'required|max:50',
            'telefono' => 'required|max:8'
        ]);
        $sexo = $request->input('sexo');
        $sex = '';
        if($sexo == 'Masculino'){
            $sex= 'M';
        }
        if($sexo == 'Femenino'){
            $sex = 'F';
        }
        if($sexo == 'Otros'){
            $sex = 'X';
        }
        $promotor = Promotor::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'sexo' => $sex,
        ]);
        return redirect(route('promotores.index'));
    }
    public function edit($id)
    {
        $promotor = Promotor::find($id);
        if (!$promotor) {
            return redirect()->back()->with('error', 'promotor no encontrada.');
        }
        return view('promotores.update', compact('promotor'));
    }
    public function update(Request $request, $id)
    {
        $promotor = Promotor::find($id);
        $sexo = $request->input('sexo');
        $sex = '';
        if($sexo == 'Masculino'){
            $sex= 'M';
        }
        if($sexo == 'Femenino'){
            $sex = 'F';
        }
        if($sexo == 'Otros'){
            $sex = 'X';
        }
        $promotor->update([
            'nombre'=>$request->nombre,
            'direccion'=>$request->direccion,
            'telefono'=>$request->telefono,
            'sexo'=>$sex
        ]);
        return redirect(route('promotores.index'));
    }

    public function destroy($id)
    {
        $promotor = Promotor::find($id);
        $promotor->delete();
        return redirect(route('promotores.index'))->with('success', 'Promotor ' . $promotor->nombre . ' ha sido funado.');
    }
}
