<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = [
        'nip',
        'nama_guru',
        'tanggal_lahir',
        'jenis_kelamin',
        'id_pelajaran',
        'alamat',
        'foto'
    ];

    protected $dates = [
        'tanggal_lahir',
    ];

    public function getNamaGuruAttribute($nama_guru) {
        return ucwords($nama_guru);
    }

    public function setNamaGuruAttribute($nama_guru) {
        $this->attributes['nama_guru'] = strtolower($nama_guru);
    }

    public function pelajaran() {
        return $this->belongsTo('App\Pelajaran', 'id_pelajaran');
    }

}
