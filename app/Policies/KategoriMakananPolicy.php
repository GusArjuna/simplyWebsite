<?php

namespace App\Policies;

use App\Models\User;
use App\Models\kategoriMakanan;
use Illuminate\Auth\Access\Response;

class KategoriMakananPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, kategoriMakanan $kategoriMakanan): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, kategoriMakanan $kategoriMakanan): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, kategoriMakanan $kategoriMakanan): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, kategoriMakanan $kategoriMakanan): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, kategoriMakanan $kategoriMakanan): bool
    {
        //
    }
}
