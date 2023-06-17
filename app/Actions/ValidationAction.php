<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;

class ValidationAction
{
    public function execute($receipt)
    {
        $response =  Http::post(config('app.subscription_url') . $receipt);
        return $response->json();
    }
}
