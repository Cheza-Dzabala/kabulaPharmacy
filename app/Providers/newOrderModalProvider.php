<?php

namespace App\Providers;

use App\suppliers;
use Illuminate\Support\ServiceProvider;

class newOrderModalProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->getSuppliers();
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

    private function getSuppliers()
    {
        view()->composer('partials.modals.orders.new', function ($view) {
            $suppliers = suppliers::get();
            return $view->with('suppliers', $suppliers);
        });
    }
}
