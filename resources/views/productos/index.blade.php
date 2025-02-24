@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@if(session('success'))
<div id="flash-message" class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
    {{ session('success') }}
</div>

<script>
    setTimeout(() => {
            document.getElementById('flash-message').style.display = 'none';
        }, 3000); // Desaparece en 3 segundos
</script>
@endif

<div class="flex justify-between items-center">
    <h1>Productos</h1>
    <form action="{{ route('productos.create') }}" , method="GET">
        <button type="submit"
            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">
            Nuevo
        </button>
    </form>
</div>
{{-- modal es una ventana flotante --}}
<div id="popup-modal" tabindex="-1"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Estas seguramente seguro que
                    quieres borrar eso?</h3>
                <button data-modal-hide="popup-modal" type="button"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center"
                    onclick="submitDelete()">
                    si, estoy seguro
                </button>
                <button data-modal-hide="popup-modal" type="button"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                    cerrar</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('content')
<p>aqui solo se ven Productos.</p>

@if ($productos!=[])
<table id="producto" class="table table-stripetcell-border">
    <thead>
        <tr>
            <th scope="col" class="px-6 py-3">
                ID
            </th>
            <th scope="col" class="px-6 py-3">
                Nombre
            </th>
            <th scope="col" class="px-6 py-3">
                Categoria
            </th>            
            <th scope="col" class="px-6 py-3">
                Descrpción
            </th>
            <th scope="col" class="px-6 py-3">
                Precio
            </th>
            <th scope="col" class="px-6 py-3">
                Stock
            </th>
            <th scope="col" class="px-6 py-3">
                Imagen
            </th>
            <th scope="col" class="px-6 py-3">
                Acciones
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
        <tr>
            <td>
                {{ $producto->id }}
            </td>
            <td class="px-6 py-4">
                {{ $producto->nombre }}
            </td>
            <td class="px-6 py-4">
                {{ $producto->categoria->nombre}}
            </td>
            <td class="px-6 py-4">
                {{ $producto->descripcion }}
            </td>
            <td class="px-6 py-4">
                {{ $producto->precio }}
            </td>
            <td class="px-6 py-4">
                {{ $producto->stock }}
            </td>
            <td class="px-6 py-4">
                <img src="{{ asset($producto->imagen) }}" alt="producto" width="50" style="max-height: 60px; object-fit:cover">
            </td>
            <td class="px-6 py-4">
                <a href="{{route('productos.edit',$producto->id)}}"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                <form id="delete-form" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                <a href="#" data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                    class="font-medium text-red-600 dark:text-red-500 hover:underline"
                    onclick="setDeleteRoute({{ $producto->id }})">
                    Eliminar
                </a>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@else
<div>no hay nadinga</div>
@endif


@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
@stop

@section('js')
<script>
    let deleteForm = document.getElementById('delete-form');

    function setDeleteRoute(id) {
        deleteForm.action = "{{ url('productos') }}/" + id;
    }

    function submitDelete() {
        deleteForm.submit();
    }
</script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
<script>
    $(document).ready(function() {
        $('#producto').DataTable({
            "language": {
                "search": "Buscar",
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "paginate": {
                    "previus": "Anterior",
                    "next": "Siguiente",
                    "first": 'Primero',
                    "last": "Último"
                }
            }
        })
    })
</script>
@stop