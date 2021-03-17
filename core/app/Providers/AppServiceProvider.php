<?php

namespace App\Providers;

use App\FrontEndSetting;
use App\GeneralSetting;
use App\Language;
use App\SocialSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $data['gs'] = GeneralSetting::first();
        View::share($data);

        Schema::defaultStringLength(191); //NEW: Increase StringLength
        View::share([
            'frontEndSetting' => FrontEndSetting::first(),
            'lang' => Language::all(),
            'socials' => SocialSetting::all(),
        ]);
    }
}
