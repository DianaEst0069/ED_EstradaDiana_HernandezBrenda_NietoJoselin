<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    
        <h1>REGISTRO DE USUARIOS</h1>

        <form action="{{ route('registro.store') }}" method="POST">
            @csrf
            
            <input type="text" name="name" placeholder="Nombre" class="form-control" required>
            <br>
            <input type="email" name="email" placeholder="Correo" class="form-control" required>
            <br>
            <input type="number" name="edad" placeholder="Edad" class="form-control" required>
            <br>
            <input type="text" name="domicilio" placeholder="Domicilio" class="form-control" required>
            <br>
            <input type="password" name="password" placeholder="Contraseña" class="form-control" required>
            <br>
            <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" class="form-control" required>
            <br>

            <div class="form-check">
                <input type="checkbox" name="cargo" value="1">
                <label>Es Dueña</label>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>


        </form>


    @endsection
</body>
</html>



