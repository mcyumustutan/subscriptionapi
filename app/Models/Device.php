<?php

namespace App\Models;

use App\Enums\Os;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Device extends Model
{
    use HasFactory;
    use HasApiTokens;

    protected $fillable = [
        'uid',
        'appId',
        'language_id',
        'os',
    ];

    protected $casts = [
        'os' => Os::class
    ];
}
