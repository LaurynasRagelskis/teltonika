<?php
namespace App\Policies;

use App\Log;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class LogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the author.
     *
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->role == 'role1';
    }

    /**
     * Determine whether the user can create authors.
     *
     * @return mixed
     */
    public function all(User $user)
    {
        return $user->role == 'role1';
    }

    /**
     * Determine whether the user can create authors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function clear(User $user)
    {
        return $user->role == 'role1';
    }
}