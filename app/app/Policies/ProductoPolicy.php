<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Producto;

class ProductoPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Producto $producto)
    {
        // Permitir que el admin actualice cualquier producto
        if ($user->rol === 'admin') {
            return true;
        }

        // Permitir que un usuario actualice solo sus propios productos
        return $user->id === $producto->user_id;
    }

public function delete(User $user, Producto $producto)
{
    // Permitir que el admin elimine cualquier producto
    if ($user->rol === 'admin') {
        return true;
    }

    // Permitir que un usuario elimine solo sus propios productos
    return $user->id === $producto->user_id;
}


}
