<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    
    <h1> EDITAR MASCOTA: {{ $mascota ->nombre }}</h1>

    <form action=" {{ route('mascotas.update', $mascota) }}" method="POST">
        <!-- Uso obligatorio para la actualizacion -->
        @csrf
        @method('PUT')

        <input type="text" name="nombre" value="{{ $mascota -> nombre}}" placeholder="Nombre" class="form-control">
        <br>
        <input type="text" name="raza" value="{{ $mascota -> raza}}" placeholder="Raza" class="form-control">
        <br>
        <input type="text" name="color" value="{{ $mascota -> color}}" placeholder="Color" class="form-control">
        <br>
        <input type="number" name="edad" value="{{ $mascota -> edad}}" placeholder="Edad" class="form-control">
        <br>
        <input type="text" name="estado" value="{{ $mascota -> estado}}" placeholder="Estado" class="form-control">
        <br>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>

    <div class="d-flex justify-content-end">
        <a href="{{ route('mascotas.index') }}" class="btn btn-danger">
            Volver
        </a>
    </div>
    @endsection
    
</body>
</html>