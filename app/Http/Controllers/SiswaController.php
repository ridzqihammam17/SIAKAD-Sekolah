<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Telepon;
use App\Http\Requests\SiswaRequest;
use App\Pelajaran;
use Storage;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $siswa_list = Siswa::where('nama_siswa', 'LIKE', '%'.$request->cari.'%')->paginate(5);
            $jumlah_siswa = Siswa::where('nama_siswa', 'LIKE', '%'.$request->cari.'%')->count();
        }else{
            $siswa_list = Siswa::orderBy('nama_siswa', 'asc')->paginate(5);
            $jumlah_siswa = Siswa::count();
        }
        return view('siswa.index', compact('siswa_list', 'jumlah_siswa'));
    }
    public function create()
    {
        return view('siswa.create');
    }
    public function addnilai(Siswa $siswa, Request $request)
    {
        if ($siswa->pelajaran()->where('pelajaran_id', $request->pelajaran)->exists()) {
            return redirect('siswa/'.$siswa->id)->with('error', 'Data nilai mata pelajaran sudah ada');

        }
        $siswa->pelajaran()->attach($request->pelajaran, ['nilai' => $request->nilai]);

        return redirect('siswa/'.$siswa->id)->with('sukses', 'Data nilai berhasil ditambahkan');
    }
    public function deletenilai(Siswa $siswa, $idmapel)
    {
        $siswa->pelajaran()->detach($idmapel);
        return redirect()->back()->with('sukses', 'Data nilai berhasil dihapus');
    }
    public function show(Siswa $siswa)
    {

        $matapelajaran = Pelajaran::all();
        return view('siswa.show', compact('siswa', 'matapelajaran'));
    }
    public function store(SiswaRequest $request)
    {
        $input = $request->all();

        //Upload Foto
        if ($request->hasFile('foto')) {
            $input['foto'] = $this->uploadFoto($request);
        }

        //Insert Siswa
        $siswa = Siswa::create($input);

        //Insert Telepon
        if ($request->filled('nomor_telepon')) {
            $this->insertTelepon($siswa, $request);
        }

        // //Insert Hobi
        // $siswa->hobi()->attach($request->input('hobi_siswa'));

        return redirect('siswa');
    }
    public function edit(Siswa $siswa)
    {
        if (!empty($siswa->telepon->nomor_telepon)) {
            $siswa->nomor_telepon = $siswa->telepon->nomor_telepon;
        }
        return view('siswa.edit', compact('siswa'));
    }
    public function update(Siswa $siswa, SiswaRequest $request)
    {
        $input = $request->all();

        //Update Foto
        if ($request->hasFile('foto')) {
            $input['foto'] = $this->updateFoto($siswa, $request);
        }

        //Update Siswa
        $siswa->update($input);

        //Update Telepon
        $this->updateTelepon($siswa, $request);

        // //Update Hobi
        // $siswa->hobi()->sync($request->input('hobi_siswa'));

        return redirect('siswa');
    }
    public function destroy(Siswa $siswa)
    {
        //Hapus Foto
        $this->hapusFoto($siswa);

        //Hapus Siswa
        $siswa->delete();
        return redirect('siswa');
    }
    private function insertTelepon(Siswa $siswa, SiswaRequest $request)
    {
        $telepon = new Telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);
    }
    private function updateTelepon(Siswa $siswa, SiswaRequest $request)
    {
        if ($siswa->telepon) {
            //Jika telp diisi update
            if ($request->filled('nomor_telepon')) {
                $telepon = $siswa->telepon;

                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $siswa->telepon()->save($telepon);
            }
            //JIka ga diisi
            else {
                $siswa->telepon()->delete();
            }
        }
        //Buta entry baru jika sebelumnya tidak ada no telp
        else {
            if ($request->filled('nomor_telepon')) {
                $telepon = new Telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $siswa->telepon()->save($telepon);
            }
        }
    }
    private function uploadFoto(SiswaRequest $request)
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
    private function updateFoto(Siswa $siswa, SiswaRequest $request)
    {
        if ($request->hasFile('foto')) {

            //Hapus foto lama jika ada yg baru
            $exist = Storage::disk('foto')->exists($siswa->foto);
            if (isset($siswa->foto) && $exist) {
                $delete = Storage::disk('foto')->delete($siswa->foto);
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
    private function hapusFoto(Siswa $siswa)
    {
        $exist = Storage::disk('foto')->exists($siswa->foto);
        if ($exist) {
            Storage::disk('foto')->delete($siswa->foto);
        }
    }
}
