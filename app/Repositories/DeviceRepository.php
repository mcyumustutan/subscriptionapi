<?php

namespace App\Repositories;

use App\Interfaces\DeviceInterface;
use App\Interfaces\LanguageInterface;
use App\Models\Device;
use App\Models\Language;
use Illuminate\Support\Str;

class DeviceRepository implements DeviceInterface
{

    public function __construct(private readonly LanguageInterface $languageInterface)
    {
    }

    /**
     * @param array $form
     * @return mixed
     */
    public function register(array $form): string
    {
        $registered_device = Device::firstOrCreate([
            'uid' => $form['uid'],
            'appId' => $form['appId'],
        ], [
            'uid' => $form['uid'],
            'appId' => $form['appId'],
            'language_id' => $this->languageInterface->getIdByLanguageCode($form['language']),
            'os' => $form['os'],
        ]);


        $registered_device->tokens()->delete();

        return $registered_device->createToken(
            Str::of($form['uid'])
                ->append('_')
                ->append($form['appId'])
                ->append('-token'))
            ->plainTextToken;

    }
}
