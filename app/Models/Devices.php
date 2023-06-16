<?php

namespace App\Models;

use App\Enums\Os;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    use HasFactory;

    protected $casts = [
        'os' => Os::class
    ];
}
