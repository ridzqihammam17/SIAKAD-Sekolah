<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'tanggal_lahir',
        'jenis_kelamin',
        'id_kelas',
        'id_ekskul',
        'alamat',
        'foto'
    ];

    protected $dates = [
        'tanggal_lahir',
    ];

    public function getNamaSiswaAttribute($nama_siswa) {
        return ucwords($nama_siswa);
    }

    public function setNamaSiswaAttribute($nama_siswa) {
        $this->attributes['nama_siswa'] = strtolower($nama_siswa);
    }

    public function telepon() {
        return $this->hasOne('App\Telepon', 'id_siswa');
    }

    public function kelas() {
        return $this->belongsTo('App\Kelas', 'id_kelas');
    }

    public function ekskul() {
        return $this->belongsTo('App\Ekskul', 'id_ekskul');
    }
    public function pelajaran() {
        return $this->belongsToMany('App\Pelajaran')->withPivot('nilai')->withTimestamps();
    }

}
