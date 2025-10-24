<?php

namespace App\Helpers;

class RoleHelper
{
    /**
     * Retorna true si el usuario tiene el rol indicado
     */
    public static function hasRole($user, string $role): bool
    {
        return $user && $user->role === $role;
    }

    /**
     * Retorna el nombre legible del rol
     */
    public static function getRoleLabel(string $role): string
    {
        return match ($role) {
            'admin' => 'Administrador',
            'employee' => 'Empleado',
            'client' => 'Cliente',
            default => 'Desconocido',
        };
    }
}
