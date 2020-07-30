<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Kelas;
use App\Ekskul;

class FormSiswaServiceProvider extends ServiceProvider
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
        view()->composer('siswa.form', function($view) {
            $view->with('list_kelas', Kelas::pluck('nama_kelas', 'id'));
            $view->with('list_ekskul', Ekskul::pluck('nama_ekskul', 'id'));
        });
    }
}
