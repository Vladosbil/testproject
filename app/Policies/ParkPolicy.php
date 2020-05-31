<?php

namespace App\Policies;

use App\Models\Park;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParkPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Park  $park
     * @return mixed
     */
    public function view(User $user, Park $park)
    {
        return $user->role === User::ROLE_MANAGER;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role === User::ROLE_MANAGER;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Park  $park
     * @return mixed
     */
    public function update(User $user, Park $park)
    {
        return $user->role === User::ROLE_MANAGER;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Park  $park
     * @return mixed
     */
    public function delete(User $user, Park $park)
    {
        return $user->role === User::ROLE_MANAGER;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Park  $park
     * @return mixed
     */
    public function restore(User $user, Park $park)
    {
        return $user->role === User::ROLE_MANAGER;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Park  $park
     * @return mixed
     */
    public function forceDelete(User $user, Park $park)
    {
        return $user->role === User::ROLE_MANAGER;
    }
}
