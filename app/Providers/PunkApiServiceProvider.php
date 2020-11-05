<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class PunkApiServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('PunkApiService', function () {
            //return new PunkApiService(new \GuzzleHttp\Client());
        });
    }

}