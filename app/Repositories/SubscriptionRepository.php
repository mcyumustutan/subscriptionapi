<?php

namespace App\Repositories;

use App\Enums\SubscriptionStatus;
use App\Interfaces\SubscriptionInterface;
use App\Models\Device;
use App\Models\Subscription;
use Illuminate\Support\Str;

class SubscriptionRepository implements SubscriptionInterface
{
    public function subscription(array $form)
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
}
