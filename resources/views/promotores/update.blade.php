@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Actualizar Promotor</h1>
@stop

@section('content')
<p>aqui solo se editan Promotores.</p>


<form class="max-w-md mx-auto" action="{{ route('promotores.update', $promotor->id) }}" method="POST">

    @method('PUT')
    <!-- Esto le indica a Laravel que es una petición PUT -->
    @csrf
    <div class="mb-5">
        <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $promotor->nombre ?? '') }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
    </div>

    <div class="mb-5">
        <label for="direccion" class="block mb-2 text-sm font-medium text-gray-900">Direccion</label>
        <input type="text" name="direccion" id="direccion" value="{{ old('direccion', $promotor->direccion ?? '') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div class="mb-5">
        <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900">Telefono</label>
        <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $promotor->telefono ?? '') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div class="relative z-0 w-full mb-5 group mt-5">
        <label for="sexo" class="text-sm text-black">Sexo</label>
        <select name="sexo" id="sexo"
            class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 appearance-none bg-white">
            <option value="" disabled>Selecciona una opción</option>
            <option value="Masculino" {{ $promotor->sexo == 'M' ? 'selected' : '' }}>Masculino</option>
            <option value="Femenino" {{ $promotor->sexo == 'F' ? 'selected' : '' }}>Femenino</option>
            <option value="Otros" {{ $promotor->sexo == 'X' ? 'selected' : '' }}>39 tipos de gays</option>
        </select>
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