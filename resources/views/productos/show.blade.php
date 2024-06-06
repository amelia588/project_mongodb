@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Producto</h1>
    <div>
        <strong>Nombre:</strong> {{ $producto->nombre }}
    </div>
    <div>
        <strong>Descripción:</strong> {{ $producto->descripcion }}
    </div>
    <div>
        <strong>Precio:</strong> {{ $producto->precio }}
    </div>
    <div>
        <strong>Cantidad:</strong> {{ $producto->cantidad }}
    </div>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
