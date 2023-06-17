<?php

namespace App\Providers;

use App\Interfaces\DeviceInterface;
use App\Interfaces\LanguageInterface;
use App\Interfaces\SubscriptionInterface;
use App\Repositories\DeviceRepository;
use App\Repositories\LanguageRepository;
use App\Repositories\SubscriptionRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        DeviceInterface::class => DeviceRepository::class,
        SubscriptionInterface::class => SubscriptionRepository::class,
        LanguageInterface::class => LanguageRepository::class
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
