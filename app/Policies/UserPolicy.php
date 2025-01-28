<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function edit(User $user)
    {
        return $user->roles()->where('name', 'ADM')->exists();
    }

    public function destroy(User $user)
    {
        return $user->roles()->where('name', 'ADM')->exists();
    }
}
