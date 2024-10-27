

@extends('sistema_Matricula')  

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Alumno</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Registrar Alumno</h2>

        <!-- Mostrar mensajes de éxito o error -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Formulario para ingresar el DNI -->
        <form action="{{ route('form.registrar.alumno') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="dni">DNI del Alumno:</label>
                <input type="text" class="form-control" id="dni" name="dni" required>
            </div>

            <button type="submit" class="btn btn-primary">Registrar Alumno</button>
        </form>

        <h3 class="mt-5">Registro de Alumnos</h3>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->id }}</td>
                        <td>{{ $registro->nombres }}</td>
                        <td>{{ $registro->apellidos }}</td>
                        <td>{{ $registro->dni }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3 class="mt-5">Alumnos Matriculados</h3>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                </tr>
            </thead>
            <tbody>
                @foreach($matriculados as $matriculado)
                    <tr>
                        <td>{{ $matriculado->id }}</td>
                        <td>{{ $matriculado->nombres }}</td>
                        <td>{{ $matriculado->apellidos }}</td>
                        <td>{{ $matriculado->dni }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
@endsection