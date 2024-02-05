<?php

namespace App\Policies;

use App\Models\Admin;
use Illuminate\Auth\Access\Response;

class AdminPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $admin): bool
    {
        //
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $admin, Admin $adminOne): bool
    {
        dd($admin, $adminOne);
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $admin): bool
    {

        if ($admin->isSuperAdmin())
            return true;

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $admin, Admin $adminOne): bool
    {
        //
        return $admin->is_super_admin;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $admin, Admin $adminOne): bool
    {
        //
        return $admin->is_super_admin;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $admin, Admin $adminOne): bool
    {
        //
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $admin, Admin $adminOne): bool
    {
        //
        return true;
    }
}
