<?php

namespace App\Http\Controllers;

use App\Actions\ValidationAction;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Repositories\SubscriptionRepository;

class SubscriptionController extends Controller
{

    public function __construct(
        private ValidationAction $validationAction,
        private SubscriptionRepository $subscriptionRepository
    ) {
    }

    public function purchase(StoreSubscriptionRequest $request)
    {
        $authorized_device_id = auth()->user();
        $receipt_hash = $request->validated('receipt');

        $validation_result = $this->validationAction->execute($receipt_hash);

        if ($validation_result['status'] == false) {
            return response()->json($validation_result, 200);
        }

        $form = array_merge(
            $validation_result,
            ['device_id' => $authorized_device_id->id],
            ['receipt' => $receipt_hash],
            collect($authorized_device_id)->toArray()
        );

        return response()->json($this->subscriptionRepository->subscription($form), 201);
    }
}
