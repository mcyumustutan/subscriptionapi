<?php

namespace App\Console\Commands;

use App\Actions\ValidationAction;
use App\Interfaces\SubscriptionInterface;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;

class ExpiredSubscriptions extends Command
{

    public function __construct(
        private readonly SubscriptionInterface $subscriptionInterface,
        private readonly ValidationAction      $validationAction,
    )
    {
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:expired-subscriptions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Find expired non canceled subscriptions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->subscriptionInterface->getExpiredsNonCanceled()
            ->chunk(200, function (Collection $subscriptions) {
                foreach ($subscriptions as $subscription) {

                    $validationResult = $this->validationAction->execute($subscription->receipt);
                    if (!$validationResult['status']) {
                        return self::FAILURE;
                    }

                    $this->subscriptionInterface->subscription(
                        $validationResult['expire-date'],
                        $subscription->device_id,
                        $subscription->receipt
                    );
                }
            });
        return self::SUCCESS;
    }
}
