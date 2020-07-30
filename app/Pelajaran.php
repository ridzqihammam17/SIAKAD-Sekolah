<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    protected $table = 'pelajaran';
    protected $fillable = ['nama_pelajaran'];

    public function getNamaPelajaranAttribute($nama_pelajaran) {
        return ucwords($nama_pelajaran);
    }

    public function setNamaPelajaranAttribute($nama_pelajaran) {
        $this->attributes['nama_pelajaran'] = strtolower($nama_pelajaran);
    }

    public function guru() {
        return $this->hasMany('App\Guru', 'id_pelajaran');
    }
    public function siswa() {
        return $this->belongsToMany('App\Siswa')->withPivot('nilai')->withTimestamps();
    }
}
