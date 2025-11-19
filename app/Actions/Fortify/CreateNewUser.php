<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Str;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // Ensure $input is defined when this method is invoked without parameters
        if (empty($input) || !is_array($input)) {
            $input = request()->all();
        }

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $context = request()->input('context', 'company');

        if ($context === 'customer') {
            $roleId = Role::where('name', 'Customer')->value('id')?? 3;
        } else {
            $roleId = Role::where('name', 'Administrator')->value('id')?? 1;
        }

        if (!$roleId) {
            throw new \Exception("El rol del contexto '{$context}' no existe.");
        }

        do {
            $username = 'user_' . Str::random(6);
        } while (User::where('username', $username)->exists());

        return User::create([
            'name' => $input['name'],
            'username' => $username,
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' => $roleId,
            'status' => User::STATUS_ACTIVE,
        ]);
    }
}
