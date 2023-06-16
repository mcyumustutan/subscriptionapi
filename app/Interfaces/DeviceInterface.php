<?php

namespace App\Interfaces;

use App\Models\Device;

interface DeviceInterface
{
    public function register(array $form);
}
