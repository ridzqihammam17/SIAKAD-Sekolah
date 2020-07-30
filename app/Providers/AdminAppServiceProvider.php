<?php

namespace App\Providers;
use Request;

use Illuminate\Support\ServiceProvider;

class AdminAppServiceProvider extends ServiceProvider
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
        $halaman = '';
        if(Request::segment(1) == 'siswa'){
            $halaman = 'siswa';
        }
        if(Request::segment(1) == 'guru'){
            $halaman = 'guru';
        }
        if(Request::segment(1) == 'kelas'){
            $halaman = 'kelas';
        }
        if(Request::segment(1) == 'ekskul'){
            $halaman = 'ekskul';
        }
        if(Request::segment(1) == 'about'){
            $halaman = 'about';
        }
        
        view()->share('halaman', $halaman);
    }
}
