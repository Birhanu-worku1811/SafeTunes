<?php

namespace App\Policies;

use App\Models\Music;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MusicPolicy
{
    /**
     * Perform pre-authorization checks.
     */

    public function before(User $user): bool|null
    {
//        dd(Auth::guard('admin')->check());
        if (Auth::guard('admin')->check()) {
            return true;
        }

        return null;
    }


    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return True;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Music $music): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return  Auth::user()->artist_id !== null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Music $music): bool
    {
        return Auth::user()->artist_id == $music->artist_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Music $music): bool
    {
        return Auth::user()->artist_id == $music->artist_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Music $music): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Music $music): bool
    {
        return false;
    }
}
