<?php

namespace App\Enums;

enum SubscriptionStatus: string
{
    case STARTED = "started";
    case RENEWED = "renewed";
    case CANCELED = "canceled";
    case PENDING = "pending";
}
