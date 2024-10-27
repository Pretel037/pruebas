@extends('sistema_Matricula')  

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matriculados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Lista de Matriculados</h2>

        <!-- Formulario de filtros -->
        <form action="{{ route('matriculados.index') }}" method="GET" class="mb-3">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="fecha_inicio">Fecha Inicio:</label>
                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
                </div>
                <div class="form-group col-md-3">
                    <label for="fecha_fin">Fecha Fin:</label>
                    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
                </div>
                <div class="form-group col-md-3">
                    <label for="dni">DNI:</label>
                    <input type="text" class="form-control" id="dni" name="dni" placeholder="Buscar por DNI">
                </div>
                <div class="form-group col-md-3 align-self-end">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
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
                    <th>Fecha de Registro</th>
                </tr>
            </thead>
            <tbody>
                @foreach($matriculados as $matriculado)
                    <tr>
                        <td>{{ $matriculado->id }}</td>
                        <td>{{ $matriculado->nombres }}</td>
                        <td>{{ $matriculado->apellidos }}</td>
                        <td>{{ $matriculado->dni }}</td>
                        <td>{{ $matriculado->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
@endsection