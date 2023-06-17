<?php

namespace App\Repositories;

use App\Interfaces\LanguageInterface;
use App\Models\Language;
use Illuminate\Database\Eloquent\Collection;

class LanguageRepository implements LanguageInterface
{
    public function getIdByLanguageCode(string $code): int
    {
        return Language::where('code', $code)->select('id')->pluck('id')->first();
    }
}
