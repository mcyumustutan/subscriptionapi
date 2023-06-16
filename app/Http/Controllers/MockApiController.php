<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class MockApiController extends Controller
{
    public function check($receipt)
    {
        $last_char = substr($receipt, -1);
        $default_status = false;

        if (is_numeric($last_char) && $last_char % 2 == 1) {
            $default_status = true;
        }

        return response()->json([
            'status' => $default_status,
            'expire-date' => Carbon::now()->add(1, 'day')->format('Y-m-d H:i:s')
        ], 200);
    }
}
