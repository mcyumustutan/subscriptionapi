<?php

namespace App\Actions;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class ValidationAction
{
    public function execute($receipt)
    {
        $response =  Http::post('http://subscriptionsystem.dvl.to/api/mock/check/' . $receipt);
        return $response->json();
    }
}
