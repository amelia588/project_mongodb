@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Productos</h1>
    <form action="{{ route('productos.search') }}" method="POST">
        @csrf
        <input type="text" name="query" placeholder="Buscar productos...">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
    <a href="{{ route('productos.create') }}" class="btn btn-success">Agregar Producto</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->cantidad }}</td>
                <td>
                    <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
