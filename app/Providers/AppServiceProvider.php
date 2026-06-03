<?php

namespace App\Providers;

use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('frontend.*', function ($view) {
            $websiteSetting = Schema::hasTable('website_settings')
                ? WebsiteSetting::current()
                : new WebsiteSetting(WebsiteSetting::defaults());

            $view->with('websiteSetting', $websiteSetting);
        });
    }
}
