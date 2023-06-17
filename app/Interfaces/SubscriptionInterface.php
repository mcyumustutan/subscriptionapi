<?php

namespace App\Interfaces;



use App\Models\Subscription;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface SubscriptionInterface
{
    public function subscription(string $expireDate,int $deviceId, string $receipt): Subscription;
    public function getByDeviceId(int $id): Collection;

    public function getExpiredsNonCanceled(): Builder;
}
