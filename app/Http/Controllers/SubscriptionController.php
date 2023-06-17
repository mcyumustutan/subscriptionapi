<?php

namespace App\Http\Controllers;

use App\Actions\ValidationAction;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Interfaces\SubscriptionInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class SubscriptionController extends Controller
{

    public function __construct(
        private readonly ValidationAction      $validationAction,
        private readonly SubscriptionInterface $subscriptionInterface
    )
    {
    }

    /**
     * @param StoreSubscriptionRequest $request
     * @return JsonResponse
     */
    public function purchase(StoreSubscriptionRequest $request): JsonResponse
    {
        $authorizedDevice = auth()->user();
        $receiptHash = $request->validated('receipt');

        $validationResult = $this->validationAction->execute($receiptHash);

        if (!$validationResult['status']) {
            return response()->json($validationResult, 200);
        }

        $subscriptionResult = $this->subscriptionInterface->subscription(
            $validationResult['expire-date'],
            $authorizedDevice->id,
            $receiptHash);

        return response()->json($subscriptionResult, Response::HTTP_CREATED);
    }

    /**
     * @return JsonResponse
     */
    public function check(): JsonResponse
    {
        return response()->json($this->subscriptionInterface->getByDeviceId(auth()->user()->id), Response::HTTP_OK);
    }
}
