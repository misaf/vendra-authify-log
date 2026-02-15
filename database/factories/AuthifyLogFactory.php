<?php

declare(strict_types=1);

namespace Misaf\VendraAuthifyLog\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Misaf\LaravelAuthifyLog\Enums\AuthifyLogActionEnum;
use Misaf\VendraAuthifyLog\Models\AuthifyLog;
use Misaf\VendraTenant\Models\Tenant;
use Misaf\VendraUser\Models\User;

/**
 * @extends Factory<AuthifyLog>
 */
final class AuthifyLogFactory extends Factory
{
    /**
     * @var class-string<AuthifyLog>
     */
    protected $model = AuthifyLog::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tenant_id'  => Tenant::factory(),
            'user_id'    => User::factory(),
            'action'     => $this->faker->randomElement(AuthifyLogActionEnum::cases()),
            'ip_address' => $this->faker->ipv4(),
            'ip_country' => $this->faker->countryCode(),
            'user_agent' => $this->faker->userAgent(),
        ];
    }

    /**
     * @param Tenant $tenant
     * @return static
     */
    public function forTenant(Tenant $tenant): static
    {
        return $this->state(fn(): array => [
            'tenant_id' => $tenant->id,
        ]);
    }

    /**
     * @param User $user
     * @return static
     */
    public function forUser(User $user): static
    {
        return $this->state(fn(): array => [
            'user_id' => $user->id,
        ]);
    }
}
