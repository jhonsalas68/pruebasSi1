@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Nuevo Promotor</h1>
@stop

@section('content')
<p>aqui solo se crean Promotores.</p>


<form class="max-w-md mx-auto" action="{{ route('promotores.create') }}" , method="POST">
    @csrf
    <div class="relative z-0 w-full mb-5 group mt-5">
        <input type="text" name="nombre" id="nombre"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " required />
        <label for="floating_email"
            class="peer-focus:font-medium absolute text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="direccion" id="direccion"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " required />
        <label for="floating_password"
            class="peer-focus:font-medium absolute text-sm text-black  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Dirección</label>
    </div>
    <div class="relative z-0 w-full mb-5 group mt-5">
        <input type="text" name="telefono" id="telefono"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " required />
        <label for="floating_email"
            class="peer-focus:font-medium absolute text-sm text-black duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Telefono</label>
    </div>
    <div class="relative z-0 w-full mb-5 group mt-5">
        <label for="sexo" class="text-sm text-black">Sexo</label>
        <select name="sexo" id="sexo"
            class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 appearance-none bg-white">
            <option value="" disabled selected>Selecciona una opción</option>
            <option value="Masculino" >Masculino</option>
            <option value="Femenino" >Femenino</option>
            <option value="Otros" >39 tipos de gays</option>
        </select>
    </div>
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
</form>

@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{--
<link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop