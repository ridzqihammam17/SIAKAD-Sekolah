<?php

namespace App\Http\Controllers;

use App\Kelas;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas_list = Kelas::orderBy('id', 'asc')->paginate(10);
        $jumlah_kelas = Kelas::count();

        return view('kelas.index', compact('kelas_list', 'jumlah_kelas'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kelas' => 'required'
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas
        ]);

        return redirect('kelas');
    }
}
