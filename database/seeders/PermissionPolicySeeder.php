<?php

declare(strict_types=1);

namespace Misaf\VendraAuthifyLog\Database\Seeders;

use Misaf\VendraAuthifyLog\AuthifyLogPlugin;
use Misaf\VendraAuthifyLog\Enums\AuthifyLogPolicyEnum;
use Misaf\VendraSupport\Concerns\RequiresCurrentTenant;
use Misaf\VendraSupport\Database\Seeders\PermissionPolicySeeder as BasePermissionPolicySeeder;

final class PermissionPolicySeeder extends BasePermissionPolicySeeder
{
    use RequiresCurrentTenant;

    protected const string MODULE_NAME = AuthifyLogPlugin::ID;

    public function run(): void
    {
        $tenant = $this->currentTenant();

        $this->seedPermissionPolicies($tenant->getKey());
    }

    /**
     * @return list<string>
     */
    protected function policies(): array
    {
        return array_column(AuthifyLogPolicyEnum::cases(), 'value');
    }
}
