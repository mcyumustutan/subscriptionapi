<?php

namespace App\Repositories;

use App\Enums\SubscriptionStatus;
use App\Interfaces\SubscriptionInterface;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class SubscriptionRepository implements SubscriptionInterface
{
    /**
     * @param array $form
     * @return mixed
     */
    public function subscription(string $expireDate,int $deviceId, string $receipt): Subscription
    {
        $subs = Subscription::updateOrCreate([
            'device_id' => $deviceId,
            'receipt' => $receipt,
        ], [
            'device_id' => $deviceId,
            'receipt' => $receipt,
            'expire_date' => $expireDate,
            'status' => SubscriptionStatus::STARTED
        ]);

        if ($subs->wasChanged()) {
            $subs->status = SubscriptionStatus::RENEWED;
            $subs->save();
        }

        return $subs;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getByDeviceId(int $id): Collection
    {
        return Subscription::where("device_id", $id)->get();
    }

    public function getExpiredsNonCanceled(): Builder
    {
        return Subscription::noncanceled()->expireds();
    }
}
