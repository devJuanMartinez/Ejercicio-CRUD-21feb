<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function index()
    {
        $productos = Producto::where('user_id', Auth::id())->get(); 
        return view('productos.index', compact('productos'));
    }

    public function adminIndex()
    {
        $productos = Producto::with('user')->get();

        return view('productos.admin', compact('productos'));

    }

    public function list()
    {
        $productos = Producto::all();
    
        return view('productos.list', compact('productos'));
    }
    




    public function show(Producto $producto)
    {
        return view('productos.admin', compact('producto'));
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
        if ($producto->user_id != Auth::id() && Auth::user()->rol !== 'admin') { 
            return redirect()->route('productos.index');
        }

        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        $producto->update($request->all());

        if (Auth::user()->rol === 'admin') {
            return redirect()->route('productos.admin')->with('success', 'Producto actualizado correctamente.');
        }

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }


    public function destroy(Producto $producto)
    {
        $producto->delete();

        if (Auth::user()->rol === 'admin') {
            return redirect()->route('productos.admin')->with('success', 'Producto eliminado correctamente.');
        }

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }





}
