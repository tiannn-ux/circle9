<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'gangguan';

    const UPDATE_AT = null;

    protected $fillable = ['jenis_gangguan', 'tingkat_prioritas', 'deskripsi_gangguan'];
}
