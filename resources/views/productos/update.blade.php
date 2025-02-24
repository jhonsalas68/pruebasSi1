@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Actualizar Productos</h1>
@stop

@section('content')
<p>aqui solo se editan Productos.</p>


<form class="max-w-md mx-auto" action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
   
    @method('PUT') <!-- Esto le indica a Laravel que es una petición PUT -->
    @csrf
    <div class="mb-5">
        <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $producto->nombre ?? '') }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
    </div>
    
    <div class="mb-5">
        <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900">Descripción</label>
        <input type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', $producto->descripcion ?? '') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
    </div>

    <div class="mb-5">
        <label for="precio" class="block mb-2 text-sm font-medium text-gray-900">Precio</label>
        <input type="text" name="precio" id="precio" value="{{ old('precio', $producto->precio ?? '') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="mb-5">
        <label for="strock" class="block mb-2 text-sm font-medium text-gray-900">stock</label>
        <input type="text" name="stock" id="strock" value="{{ old('stock', $producto->stock ?? '') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Cargar Imagen</label>
        
        <!-- Input para subir nueva imagen -->
        <input
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
            id="file_input" type="file" name="imagen" accept="image/*" onchange="previewImage(event)">
    
        <!-- Contenedor de previsualización -->
        <div class="mt-3">
            <!-- Muestra la imagen existente si ya hay una en la base de datos -->
            <img id="image_preview" 
                 src="{{ $producto->imagen ? asset($producto->imagen) : '' }}" 
                 class="w-32 h-32 object-cover rounded-lg {{ $producto->imagen ? '' : 'hidden' }}">
        </div>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <select name="promotor_id" class="form-select">
            <option value="">Seleccione un promotor</option>
            @foreach ($promotores as $promotor)
                <option value="{{ $promotor->id }}" 
                    {{ old('promotor_id', $producto->promotor_id ?? '') == $promotor->id ? 'selected' : '' }}>
                    {{ $promotor->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    
    <div class="relative z-0 w-full mb-5 group">
        <select name="categoria_id" class="form-select">
            <option value="">Seleccione una categoría</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" 
                    {{ old('categoria_id', $producto->categoria_id ?? '') == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
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
    function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById('image_preview');
        
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@stop