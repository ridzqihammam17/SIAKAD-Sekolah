<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Guru;
use App\Kelas;
use App\Ekskul;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlah_siswa = Siswa::count();
        $jumlah_guru = Guru::count();
        $jumlah_kelas = Kelas::count();
        $jumlah_ekskul = Ekskul::count();
        return view('admin.index', compact('jumlah_siswa', 'jumlah_guru', 'jumlah_kelas', 'jumlah_ekskul'));
    }
}
