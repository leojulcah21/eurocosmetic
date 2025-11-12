<?php

namespace App\Helpers;

class RoleHelper
{
    /**
     * Retorna true si el usuario tiene el rol indicado
     */
    public static function hasRole($user, string|array $roles): bool
    {
        if (!$user || !$user->role) {
            return false;
        }

        return in_array($user->role->name, (array) $roles);
    }

    /**
     * Retorna el nombre legible del rol
     */
    public static function getRoleLabel(string $role): string
    {
        return match ($role) {
            'Administrator' => 'Administrador',
            'Employee' => 'Empleado',
            'Customer' => 'Cliente',
            default => 'Desconocido',
        };
    }
}
