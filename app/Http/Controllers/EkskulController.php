<?php

namespace App\Http\Controllers;

use App\Ekskul;

use Illuminate\Http\Request;

class EkskulController extends Controller
{
    public function index()
    {
        $ekskul_list = Ekskul::orderBy('id', 'asc')->paginate(10);
        $jumlah_ekskul = Ekskul::count();

        return view('ekskul.index', compact('ekskul_list', 'jumlah_ekskul'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_ekskul' => 'required'
        ]);

        Ekskul::create([
            'nama_ekskul' => $request->nama_ekskul
        ]);

        return redirect('ekskul');
    }
}
