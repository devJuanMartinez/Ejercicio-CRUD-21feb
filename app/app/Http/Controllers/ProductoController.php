<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importa Auth

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Solo usuarios autenticados pueden acceder
    }

    public function index()
    {
        $productos = Producto::where('user_id', Auth::id())->get(); // Solo productos del usuario autenticado
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        Producto::create([
            'user_id' => Auth::id(),
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('productos.index');
    }

    public function edit(Producto $producto)
    {
        if ($producto->user_id != Auth::id() && Auth::user()->rol !== 'admin') { // Cambié 'role' por 'rol'
            return redirect()->route('productos.index');
        }

        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        // Verificamos si el usuario tiene permiso para actualizar el producto
        $this->authorize('update', $producto);

        $producto->update($request->only('nombre', 'descripcion'));

        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto)
    {
        // Verificamos si el usuario tiene permiso para eliminar el producto
        $this->authorize('delete', $producto);

        $producto->delete();

        return redirect()->route('productos.index');
    }

}
