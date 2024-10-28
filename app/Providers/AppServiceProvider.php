<?php

namespace App\Providers;

use App\Models\abschnitte;
use App\Models\Accessories;
use App\Models\GeneralInformation;
use App\Models\ServicesSections;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


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
        View::composer('layouts.master_home_page', function ($view) {
            $information = GeneralInformation::first();
            $handys_sections = abschnitte::all();
            $accessories = accessories::all();
            $accessories_brand = accessories::pluck('brand')->unique();
            $services_sections = ServicesSections::all();

            $view->with([
                'information' => $information,
                'handys_sections' => $handys_sections,
                'accessories' => $accessories,
                'accessories_brand' => $accessories_brand,
                'services_sections' => $services_sections,
            ]);
        });
    }
}
