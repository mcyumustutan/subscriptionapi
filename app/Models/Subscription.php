<?php

namespace App\Models;

use App\Enums\SubscriptionStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
