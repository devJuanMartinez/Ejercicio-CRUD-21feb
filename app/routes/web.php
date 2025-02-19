<?php

// Rutas de autenticación
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PostController;

Route::get('test', function() {
    if (Auth::check()) {
        return 'Usuario autenticado, ID: ' . Auth::id();
    } else {
        return 'No autenticado';
    }
})->middleware('auth');


Route::get('/', function () {
    // Si el usuario no está autenticado, redirigir al login
    return Auth::check() ? view('dashboard') : redirect()->route('login');
})->name('home');

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


// Ruta del Dashboard (requiere autenticación)
Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Rutas del Dashboard
Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->resource('productos', ProductoController::class);

// Rutas Producto
Route::resource('productos', ProductoController::class)->middleware('auth');

// Route::get('/productos/list', [ProductoController::class, 'list'])->name('productos.list');

// Route::prefix('productos')->group(function() {
//     Route::get('list', [ProductoController::class, 'list'])->name('productos.list');
// });


Route::get('/productos/list', [ProductoController::class, 'list'])->name('productos.list');





Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Ruta para ver los posts
Route::middleware('auth')->get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::middleware('auth')->group(function () {
    Route::get('/productos/admin', [ProductoController::class, 'adminIndex'])->name('productos.admin');
});

Route::get('/admin/productos', [ProductoController::class, 'adminIndex'])
    ->name('productos.admin')
    ->middleware('auth'); // Solo accesible si está autenticado
;





