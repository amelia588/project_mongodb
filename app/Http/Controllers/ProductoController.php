<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class ProductoController extends Controller
{
    // Muestra una lista de todos los productos
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    // Muestra el formulario para crear un nuevo producto
    public function create()
    {
        return view('productos.create');
    }

    // Almacena un nuevo producto en la base de datos
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'precio' => 'required|numeric'
        ]);

        $producto = new Producto($validatedData);
        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto creado con éxito');
    }

    // Muestra un producto específico por ID
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    // Muestra el formulario para editar un producto existente
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    // Actualiza un producto específico por ID en la base de datos
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'precio' => 'required|numeric'
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($validatedData);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado con éxito');
    }

    // Elimina un producto de la base de datos
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado con éxito');
    }

    // Busca productos basados en un término de búsqueda
    public function search(Request $request)
    {
        $validatedData = $request->validate([
            'query' => 'required|string'
        ]);

        $productos = Producto::where('nombre', 'like', '%' . $validatedData['query'] . '%')->get();
        return view('productos.index', compact('productos'));
    }
}
