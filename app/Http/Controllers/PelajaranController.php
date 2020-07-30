<?php

namespace App\Http\Controllers;

use App\Pelajaran;

use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    public function index()
    {
        $pelajaran_list = Pelajaran::orderBy('id', 'asc')->paginate(10);
        $jumlah_pelajaran = Pelajaran::count();

        return view('pelajaran.index', compact('pelajaran_list', 'jumlah_pelajaran'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_pelajaran' => 'required'
        ]);

        Pelajaran::create([
            'nama_pelajaran' => $request->nama_pelajaran
        ]);

        return redirect('pelajaran');
    }
}
