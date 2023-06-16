<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeviceRequest;
use App\Interfaces\DeviceInterface;

class DeviceController extends Controller
{

    public function __construct(private DeviceInterface $deviceInterface)
    {
    }

    public function register(StoreDeviceRequest $request)
    {
        $registered_device_token = $this->deviceInterface->register($request->validated());

        return response()->json([
            'registered' => 'OK',
            'token' => $registered_device_token,
        ]);
    }
}
