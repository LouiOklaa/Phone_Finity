<?php

namespace App\Providers;

use App\Models\abschnitte;
use App\Models\Accessories;
use App\Models\accessories_sections;
use App\Models\EmailLog;
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
            $handys_sectionsNew = abschnitte::has('newMobiles')->get();
            $handys_sectionsUsed = abschnitte::has('usedMobiles')->get();
            $accessories = accessories::all();
            $accessories_brand = accessories::pluck('brand')->unique();
            $services_sections = ServicesSections::all();

            $view->with([
                'information' => $information,
                'handys_sectionsNew' => $handys_sectionsNew,
                'handys_sectionsUsed' => $handys_sectionsUsed,
                'accessories' => $accessories,
                'accessories_brand' => $accessories_brand,
                'services_sections' => $services_sections,
            ]);
        });

        View::composer('Reports.mobiles_reports', function ($view) {
            $categories = abschnitte::all();

            $view->with([
                'categories' => $categories,
            ]);
        });

        View::composer('Reports.accessories_reports', function ($view) {
            $categories = accessories_sections::all();
            $brands = abschnitte::all();

            $view->with([
                'categories' => $categories,
                'brands' => $brands,
            ]);
        });

        View::composer('layouts.master', function ($view) {
            $notifications = EmailLog::where('is_notified', false)->get();
            $view->with([
                'notifications' => $notifications,
            ]);
        });
    }
}
