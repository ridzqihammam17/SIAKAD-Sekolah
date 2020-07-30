<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Pelajaran;

class FormGuruServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('guru.form', function($view) {
            $view->with('list_pelajaran', Pelajaran::pluck('nama_pelajaran', 'id'));
        });
    }
}
