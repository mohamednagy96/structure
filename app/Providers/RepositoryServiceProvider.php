<?php

namespace App\Providers;

use App\Repositories\CartRepository;
use App\Repositories\Interfaces\CartRepositoryInterface;
use App\Repositories\Interfaces\LanguageRepositoryInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Interfaces\WishListRepositoryInterface;
use App\Repositories\LanguageRepository;
use App\Repositories\OrderRepository;
use App\Repositories\WishListRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LanguageRepositoryInterface::class, LanguageRepository::class);
        // $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        // $this->app->bind(CartRepositoryInterface::class, CartRepository::class);
        // $this->app->bind(WishListRepositoryInterface::class, WishListRepository::class);

    }

}
