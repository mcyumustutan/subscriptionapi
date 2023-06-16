<?php

namespace App\Interfaces;

use App\Models\Subscription;

interface SubscriptionInterface
{
    public function subscription(array $form);
    public function check(int $id);
}
