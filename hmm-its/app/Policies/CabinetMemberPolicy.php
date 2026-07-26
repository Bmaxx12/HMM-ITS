<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\CabinetMember;
use Illuminate\Auth\Access\HandlesAuthorization;

class CabinetMemberPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:CabinetMember');
    }

    public function view(AuthUser $authUser, CabinetMember $cabinetMember): bool
    {
        return $authUser->can('View:CabinetMember');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:CabinetMember');
    }

    public function update(AuthUser $authUser, CabinetMember $cabinetMember): bool
    {
        return $authUser->can('Update:CabinetMember');
    }

    public function delete(AuthUser $authUser, CabinetMember $cabinetMember): bool
    {
        return $authUser->can('Delete:CabinetMember');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:CabinetMember');
    }

    public function restore(AuthUser $authUser, CabinetMember $cabinetMember): bool
    {
        return $authUser->can('Restore:CabinetMember');
    }

    public function forceDelete(AuthUser $authUser, CabinetMember $cabinetMember): bool
    {
        return $authUser->can('ForceDelete:CabinetMember');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:CabinetMember');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:CabinetMember');
    }

    public function replicate(AuthUser $authUser, CabinetMember $cabinetMember): bool
    {
        return $authUser->can('Replicate:CabinetMember');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:CabinetMember');
    }

}