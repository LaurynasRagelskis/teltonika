<?php
namespace App\Policies;

use App\User;
use App\Todo;
use Illuminate\Auth\Access\HandlesAuthorization;

class TodoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the author.
     *
     * @param  \App\User  $user
     * @param  \App\Todo $todo
     * @return mixed
     */
    public function view(User $user, Todo $todo)
    {
        return $user->id == $todo->user_id || $user->role == 'role1';
    }

    /**
     * Determine whether the user can create authors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function add(User $user)
    {
        return $user->role == 'role2';
    }

    /**
     * Determine whether the user can update the author.
     *
     * @param  \App\User  $user
     * @param  \App\Todo $todo
     * @return mixed
     */
    public function edit(User $user, Todo $todo)
    {
        return $user->id == $todo->user_id;
    }

    /**
     * Determine whether the user can delete the author.
     *
     * @param  \App\User  $user
     * @param  \App\Todo $todo
     * @return mixed
     */
    public function delete(User $user, Todo $todo)
    {
        return $user->role == 'role1';
    }
}