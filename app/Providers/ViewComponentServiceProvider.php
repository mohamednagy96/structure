<?php

namespace App\Providers;

use App\View\Components\Breadcrumb;
use App\View\Components\CategoriesTree;
use App\View\Components\LocaleInput;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class ViewComponentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Blade::component('admin.components.box', 'box');
        Blade::component('breadcrumb', Breadcrumb::class);

        //form locale inputs
        Blade::component('locale-input', LocaleInput::class);
    }
}
