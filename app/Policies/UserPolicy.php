<?php
namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the author.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function view(User $user, User $selected_user)
    {
        return $user->role == 'role1' || $selected_user->id == $user->id;
    }

    /**
     * Determine whether the user can create authors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function all(User $user)
    {
        return $user->role == 'role1';
    }
}