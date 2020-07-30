<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\Http\Requests\GuruRequest;
use Storage;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $guru_list = Guru::where('nama_guru', 'LIKE', '%' . $request->cari . '%')->paginate(5);
            $jumlah_guru = Guru::where('nama_guru', 'LIKE', '%' . $request->cari . '%')->count();
        } else {
            $guru_list = Guru::orderBy('nama_guru', 'asc')->paginate(5);
            $jumlah_guru = Guru::count();
        }
        return view('guru.index', compact('guru_list', 'jumlah_guru'));
    }
    public function create()
    {
        return view('guru.create');
    }
    public function show(Guru $guru)
    {
        return view('guru.show', compact('guru'));
    }
    public function store(guruRequest $request)
    {
        $input = $request->all();

        //Upload Foto
        if ($request->hasFile('foto')) {
            $input['foto'] = $this->uploadFoto($request);
        }

        //Insert Guru
        $guru = Guru::create($input);

        // //Insert Hobi
        // $guru->hobi()->attach($request->input('hobi_guru'));

        return redirect('guru');
    }
    public function edit(Guru $guru)
    {
        return view('guru.edit', compact('guru'));
    }
    public function update(Guru $guru, guruRequest $request)
    {
        $input = $request->all();

        //Update Foto
        if ($request->hasFile('foto')) {
            $input['foto'] = $this->updateFoto($guru, $request);
        }

        //Update Guru
        $guru->update($input);

        // //Update Hobi
        // $guru->hobi()->sync($request->input('hobi_guru'));

        return redirect('guru');
    }
    public function destroy(Guru $guru)
    {
        //Hapus Foto
        $this->hapusFoto($guru);

        //Hapus Guru
        $guru->delete();
        return redirect('guru');
    }
    private function uploadFoto(guruRequest $request)
    {
        $foto = $request->file('foto');
        $ext = $foto->getClientOriginalExtension();
        if ($request->file('foto')->isValid()) {
            $foto_name = date('YmdHis') . ".$ext";
            $request->file('foto')->move('fotoupload', $foto_name);
            return $foto_name;
        }
        return false;
    }
    private function updateFoto(Guru $guru, guruRequest $request)
    {
        if ($request->hasFile('foto')) {

            //Hapus foto lama jika ada yg baru
            $exist = Storage::disk('foto')->exists($guru->foto);
            if (isset($guru->foto) && $exist) {
                $delete = Storage::disk('foto')->delete($guru->foto);
            }

            //Upload foto baru
            $foto = $request->file('foto');
            $ext = $foto->getClientOriginalExtension();
            if ($request->file('foto')->isValid()) {
                $foto_name = date('YmdHis') . ".$ext";
                $upload_path = 'fotoupload';
                $request->file('foto')->move($upload_path, $foto_name);
                return $foto_name;
            }
        }
    }
    private function hapusFoto(Guru $guru)
    {
        $exist = Storage::disk('foto')->exists($guru->foto);
        if ($exist) {
            Storage::disk('foto')->delete($guru->foto);
        }
    }
}
