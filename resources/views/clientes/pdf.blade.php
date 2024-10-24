<!DOCTYPE html>
<html>
<head>
    <title>Lista de Clientes</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Lista de Clientes</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>DUI</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Fecha Registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->dui }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->correo }}</td>
                    <td>{{ $cliente->fecha_registro }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
