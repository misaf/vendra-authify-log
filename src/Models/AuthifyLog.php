<?php

declare(strict_types=1);

namespace Misaf\VendraAuthifyLog\Models;

use Illuminate\Support\Carbon;
use Misaf\LaravelAuthifyLog\Enums\AuthifyLogActionEnum;
use Misaf\LaravelAuthifyLog\Models\AuthifyLog as LaravelAuthifyLog;
use Misaf\VendraTenant\Traits\BelongsToTenant;

/**
 * @property int $id
 * @property int $tenant_id
 * @property int $user_id
 * @property AuthifyLogActionEnum $action
 * @property string $ip_address
 * @property string $ip_country
 * @property string $user_agent
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
final class AuthifyLog extends LaravelAuthifyLog
{
    use BelongsToTenant;

    protected $casts = [
        'id'         => 'integer',
        'tenant_id'  => 'integer',
        'user_id'    => 'integer',
        'action'     => AuthifyLogActionEnum::class,
        'ip_address' => 'string',
        'ip_country' => 'string',
        'user_agent' => 'string',
    ];

    protected $fillable = [
        'tenant_id',
        'user_id',
        'action',
        'ip_address',
        'ip_country',
        'user_agent',
    ];

    protected $hidden = [
        'tenant_id',
    ];

    protected static function newFactory(): AuthifyLog
    {
        return AuthifyLog::new();
    }
}
