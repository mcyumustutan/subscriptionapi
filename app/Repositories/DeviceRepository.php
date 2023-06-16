<?php

namespace App\Repositories;

use App\Interfaces\DeviceInterface;
use App\Models\Device;
use Illuminate\Support\Str;

class DeviceRepository implements DeviceInterface
{
    public function register(array $form)
    {
        $registered_device = Device::firstOrCreate([
            'uid' => $form['uid'],
            'appId' => $form['appId'],
        ], [
            'uid' => $form['uid'],
            'appId' => $form['appId'],
            'language' => $form['language'],
            'os' => $form['os'],
        ]);


        $registered_device->tokens()->delete();

        $token = $registered_device->createToken(Str::of($form['uid'])->append('_')->append($form['appId'])->append('-token'))->plainTextToken;

        return $token;
    }
}
