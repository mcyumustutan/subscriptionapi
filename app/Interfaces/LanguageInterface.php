<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface LanguageInterface
{
    public function getIdByLanguageCode(string $code): int;
}
