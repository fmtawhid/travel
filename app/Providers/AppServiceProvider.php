<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;
use App\Models\Setting;
use App\Models\PaymentMethod;
use App\Policies\PaymentMethodPolicy;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Register policies
        Gate::policy(PaymentMethod::class, PaymentMethodPolicy::class);
        
        if (Schema::hasTable('settings')) {
            // সব settings row fetch with supportTeam relation
            $settings = Setting::with('supportTeam')->first();
            View::share('settings', $settings);
            
            // Get featured package if exists
            if ($settings && $settings->feature_package_id) {
                $featuredPackageFromSettings = \App\Models\Tour::find($settings->feature_package_id);
                View::share('featuredPackageFromSettings', $featuredPackageFromSettings);
            }
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
        
        if (Schema::hasTable('tours')) {
            // Get unique locations from tours
            $locations = \App\Models\Tour::distinct()->pluck('location')->filter()->sort()->values();
            View::share('locations', $locations);
            
            // Get most popular tours by booking count (for footer)
            $popularTours = \App\Models\Tour::withCount('tourBookings')
                ->orderByDesc('tour_bookings_count')
                ->take(7)
                ->get();
            View::share('popularTours', $popularTours);
        }
    }
}
