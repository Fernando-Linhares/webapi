<?php

namespace App\Providers;

use App\Contracts\IOAuthRepository;
use App\Contracts\ITransactionRepository;
use App\Contracts\IWalletRepository;
use App\Repositories\OAuthRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\WalletRepository;
use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
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
        $this->app->bind(IWalletRepository::class, WalletRepository::class);

        $this->app->bind(ITransactionRepository::class, TransactionRepository::class);

        $this->app->bind(IOAuthRepository::class, OAuthRepository::class);

        Passport::tokensExpireIn(now()->addDays(1));

        Passport::refreshTokensExpireIn(now()->addDays(1));

        Passport::personalAccessTokensExpireIn(now()->addDays(1));
    }
}
