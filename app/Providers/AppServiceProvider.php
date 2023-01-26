<?php

namespace App\Providers;


use App\Models\City;


use App\Models\SubCategory;
use Illuminate\Support\ServiceProvider;
use App\Models\Item;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $subcategories = SubCategory::all();
        $cities = City::has('items')->get();
        view()->share('subcategories',$subcategories);
        view()->share('cities',$cities);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
