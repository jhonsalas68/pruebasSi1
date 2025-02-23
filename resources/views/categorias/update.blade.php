@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Nueva categoria</h1>
@stop

@section('content')
<p>aqui solo se editan cosas.</p>


<form class="max-w-md mx-auto" action="{{ route('categorias.update', $categoria->id) }}" method="POST">
   
    @method('PUT') <!-- Esto le indica a Laravel que es una petición PUT -->
    @csrf
    <div class="mb-5">
        <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $categoria->nombre ?? '') }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
    </div>
    
    <div class="mb-5">
        <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900">Descripción</label>
        <input type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', $categoria->descripcion ?? '') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
    </div>

    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Guardar
    </button>
</form>
@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{--
<link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
    console.log("Hi, I'm using the Laravel-AdminLTE package!"); 
</script>
@stop