<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (Schema::hasTable('settings')) {
            // সব settings row fetch
            $settings = Setting::first();
            View::share('settings', $settings);
        }
        
        if (Schema::hasTable('packages')) {
            $packages = \App\Models\Package::all();
            View::share('packageTypes', $packages);
            
            // Latest package for mega menu
            $latestPackage = \App\Models\Package::latest()->first();
            View::share('latestPackage', $latestPackage);
        }
        
        if (Schema::hasTable('sight_seeings')) {
            // 4 latest sightseeings for mega menu
            $latestSightSeeings = \App\Models\SightSeeing::latest()->take(4)->get();
            View::share('latestSightSeeings', $latestSightSeeings);
        }
    }
}
