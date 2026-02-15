<?php

declare(strict_types=1);

namespace Misaf\VendraAuthifyLog\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Misaf\VendraAuthifyLog\Enums\AuthifyLogPolicyEnum;
use Misaf\VendraAuthifyLog\Models\AuthifyLog;
use Misaf\VendraUser\Models\User;

final class AuthifyLogPolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return $user->can(AuthifyLogPolicyEnum::CREATE);
    }

    public function delete(User $user, AuthifyLog $authifyLog): bool
    {
        return $user->can(AuthifyLogPolicyEnum::DELETE);
    }

    public function deleteAny(User $user): bool
    {
        return $user->can(AuthifyLogPolicyEnum::DELETE_ANY);
    }

    public function forceDelete(User $user, AuthifyLog $authifyLog): bool
    {
        return $user->can(AuthifyLogPolicyEnum::FORCE_DELETE);
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can(AuthifyLogPolicyEnum::FORCE_DELETE_ANY);
    }

    public function replicate(User $user, AuthifyLog $authifyLog): bool
    {
        return $user->can(AuthifyLogPolicyEnum::REPLICATE);
    }

    public function restore(User $user, AuthifyLog $authifyLog): bool
    {
        return $user->can(AuthifyLogPolicyEnum::RESTORE);
    }

    public function restoreAny(User $user): bool
    {
        return $user->can(AuthifyLogPolicyEnum::RESTORE_ANY);
    }

    public function update(User $user, AuthifyLog $authifyLog): bool
    {
        return $user->can(AuthifyLogPolicyEnum::UPDATE);
    }

    public function view(User $user, AuthifyLog $authifyLog): bool
    {
        return $user->can(AuthifyLogPolicyEnum::VIEW);
    }

    public function viewAny(User $user): bool
    {
        return $user->can(AuthifyLogPolicyEnum::VIEW_ANY);
    }
}
