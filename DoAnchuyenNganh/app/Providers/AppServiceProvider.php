<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Http\Repositories\IndexRepository;

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
        Schema::defaultStringLength(191);

        $index = new IndexRepository();

        $accommodation_types = $index->getAccommodationType();
        $cities = $index->getCity();

        view()->share('accommodation', $accommodation_types);
        view()->share('cities', $cities);
    }
}
