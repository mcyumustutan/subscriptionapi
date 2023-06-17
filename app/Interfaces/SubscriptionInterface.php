<?php

namespace App\Interfaces;



use App\Models\Subscription;
use Illuminate\Database\Eloquent\Collection;

interface SubscriptionInterface
{
    public function subscription(array $form): Subscription;
    public function getByDeviceId(int $id): Collection;
}
