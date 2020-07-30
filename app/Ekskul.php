<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    protected $table = 'ekskul';
    protected $fillable = ['nama_ekskul'];

    public function getNamaEkskulAttribute($nama_ekskul) {
        return ucwords($nama_ekskul);
    }

    public function setNamaEkskulAttribute($nama_ekskul) {
        $this->attributes['nama_ekskul'] = strtolower($nama_ekskul);
    }

    public function siswa() {
        return $this->hasMany('App\Siswa', 'id_ekskul');
    }
}
