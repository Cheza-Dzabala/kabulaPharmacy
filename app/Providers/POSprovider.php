<?php

namespace App\Providers;

use App\stock;
use App\stockDetails;
use Illuminate\Support\ServiceProvider;

class POSprovider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->loadStock();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function loadStock()
    {
        view()->composer('partials.pos.items', function ($view) {
            $stocks = stock::get();


            foreach ($stocks as $stock) {
                $details = stockDetails::whereStockid($stock->id)->first();
            }
            //dd($stocks);

            return $view->with('stocks', $stocks);
        });
    }
}
