<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\CabinetUnit;
use Illuminate\Auth\Access\HandlesAuthorization;

class CabinetUnitPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:CabinetUnit');
    }

    public function view(AuthUser $authUser, CabinetUnit $cabinetUnit): bool
    {
        return $authUser->can('View:CabinetUnit');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:CabinetUnit');
    }

    public function update(AuthUser $authUser, CabinetUnit $cabinetUnit): bool
    {
        return $authUser->can('Update:CabinetUnit');
    }

    public function delete(AuthUser $authUser, CabinetUnit $cabinetUnit): bool
    {
        return $authUser->can('Delete:CabinetUnit');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:CabinetUnit');
    }

    public function restore(AuthUser $authUser, CabinetUnit $cabinetUnit): bool
    {
        return $authUser->can('Restore:CabinetUnit');
    }

    public function forceDelete(AuthUser $authUser, CabinetUnit $cabinetUnit): bool
    {
        return $authUser->can('ForceDelete:CabinetUnit');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:CabinetUnit');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:CabinetUnit');
    }

    public function replicate(AuthUser $authUser, CabinetUnit $cabinetUnit): bool
    {
        return $authUser->can('Replicate:CabinetUnit');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:CabinetUnit');
    }

}