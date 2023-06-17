<?php

namespace App\Models;

use App\Enums\SubscriptionStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Subscription extends Model
{
    use HasFactory;

    protected $hidden = [
        'id',
        'device_id',
    ];

    protected $fillable = [
        'device_id',
        'receipt',
        'expire_date',
        'status',
    ];

    protected $casts = [
        'status' => SubscriptionStatus::class
    ];

    /**
     * @param Builder $query
     * @return void
     */
    public function scopeExpireds(Builder $query): void
    {
        $query->where('expire_date', '<', now());
    }

    public function scopeNonCanceled(Builder $query): void
    {
        $query->where('status', '!=', 'canceled');
    }
}
