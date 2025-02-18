<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Este constructor asegura que solo los usuarios autenticados accedan a la vista
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Método para mostrar la vista del dashboard
    public function index()
    {
        // Obtén el usuario autenticado
        $user = Auth::user(); 

        // Pasa el usuario a la vista
        return view('dashboard', compact('user'));
    }
}


