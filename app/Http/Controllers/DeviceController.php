<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeviceRequest;
use App\Interfaces\DeviceInterface;
use Symfony\Component\HttpFoundation\Response;

class DeviceController extends Controller
{

    public function __construct(private readonly DeviceInterface $deviceInterface)
    {
        //
    }

    /**
     * @param StoreDeviceRequest $request
     * @return Response
     */
    public function register(StoreDeviceRequest $request): Response
    {
        $registeredDeviceToken = $this->deviceInterface->register($request->validated());

        return response()->json([
            'registered' => 'OK',
            'token' => $registeredDeviceToken,
        ], Response::HTTP_OK);
    }
}
