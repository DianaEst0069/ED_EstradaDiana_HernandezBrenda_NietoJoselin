<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Mascotas</title>
</head>
<body>

    @extends('layouts.app')

    @section('content')
    
    <h1>Mascotas Registradas</h1>
    <br>
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('mascotas.create') }}" class="btn btn-success mb-3 me-3">
            <i class="fa-solid fa-plus"></i>Nueva Mascota
        </a>

        <form action="{{ route('cerrar') }}" method="POST">
            @csrf 
            <button class="btn btn-danger me-3"><i class="fa-solid fa-arrow-right-to-bracket"></i>Cerrar sesión</button>
        </form>
        @if(auth()->user()->cargo)
            <a href="{{ route('admin-dashboard') }}" class="btn btn-secondary">
                Panel Dueña
            </a>
        @endif
        
    </div>
    
    <br>
    <br>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>RAZA</th>
                <th>COLOR</th>
                <th>EDAD</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <body>
            @foreach ($mascotas as $mascota)
            <tr>
                <!-- Nombre de la BD -->
                <td>{{ $mascota->id }} </td>
                <td>{{ $mascota->nombre }} </td>
                <td>{{ $mascota->raza }} </td>
                <td>{{ $mascota->color }} </td>
                <td>{{ $mascota->edad }} </td>
                <td>{{ $mascota->estado }} </td>
                <td>

                    @if(auth()->user()->cargo)
                        <a href="{{ route('mascotas.edit', $mascota) }}" class="btn btn-secondary">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                    @endif
                    <form action="{{ route('mascotas.destroy', $mascota) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger" onclick="return confirm('¿Eliminar el registro?')">
                            <i class="fa-solid fa-trash"></i>
                        </button>

                    </form>
        
                </td>
            </tr>
            @endforeach
        </body>
    </table>

    @endsection


</body>
</html>