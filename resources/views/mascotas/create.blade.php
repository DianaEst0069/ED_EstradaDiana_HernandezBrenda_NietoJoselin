<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Mascota</title>
</head>
<body>
  @extends('layouts.app')

  @section('content')
   
    <h1>REGISTRO DE MASCOTAS</h1>

    <!-- TODO: poner action -->

    <form action="{{ route('mascotas.store') }}" method="POST">
        
        <!-- Protección de Laravel para usar un formulario. OBLIGATORIO -->
        @csrf

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> <i class="fa-solid fa-book" style="color: rgb(70, 27, 12);"></i> </span>
            <input type="text" name='nombre' placeholder='Nombre' class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> <i class="fa-solid fa-paw" style="color: rgb(70, 27, 12);"></i> </span>
            <input type="text" name='raza' placeholder='Raza' class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> <i class="fa-solid fa-pen" style="color: rgb(70, 27, 12);"></i> </span>
            <input type="text" name='color' placeholder='Color' class="form-control">
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> <i class="fa-solid fa-calendar-days" style="color: rgb(70, 27, 12);"></i> </span>
            <input type="number" name='edad' placeholder='Edad' class="form-control">
        </div>

         <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> <i class="fa-solid fa-calendar-days" style="color: rgb(70, 27, 12);"></i> </span>
            <input type="text" name='estado' placeholder='Estado (Activo/Inactivo)' class="form-control">
        
        </div>

        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>

    </form>
    @endsection
</body>
</html>

