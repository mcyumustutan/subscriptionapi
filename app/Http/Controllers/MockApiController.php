<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class MockApiController extends Controller
{
    /**
     * @param $receipt
     * @return JsonResponse
     */
    public function check($receipt): JsonResponse
    {
        $lastChar = substr($receipt, -1);
        $defaultStatus = false;

        if (is_numeric($lastChar) && $lastChar % 2 == 1) {
            $defaultStatus = true;
        }

        return response()->json([
            'status' => $defaultStatus,
            'expire-date' => Carbon::now()->add(1, 'day')->toDateTimeString()
        ], Response::HTTP_OK);
    }
}
