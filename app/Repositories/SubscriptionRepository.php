<?php

namespace App\Repositories;

use App\Enums\SubscriptionStatus;
use App\Interfaces\SubscriptionInterface;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Collection;

class SubscriptionRepository implements SubscriptionInterface
{
    /**
     * @param array $form
     * @return mixed
     */
    public function subscription(array $form): Subscription
    {
        $subs = Subscription::updateOrCreate([
            'device_id' => $form['device_id'],
            'receipt' => $form['receipt'],
        ], [
            'device_id' => $form['device_id'],
            'receipt' => $form['receipt'],
            'expire_date' => $form['expire-date'],
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
}
