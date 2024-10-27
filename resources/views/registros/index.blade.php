@extends('sistema_Matricula')  

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Lista de Registros</h2>

        <!-- Formulario de búsqueda -->
        <form action="{{ route('registros.index') }}" method="GET" class="mb-3">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="dni">DNI:</label>
                    <input type="text" class="form-control" id="dni" name="dni" placeholder="Buscar por DNI">
                </div>
                <div class="form-group col-md-4">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Buscar por Nombre o Apellido">
                </div>
                <div class="form-group col-md-4 align-self-end">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered">
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
    </div>
</body>
</html>
@endsection
