<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gangguan extends Model
{
    protected $table = 'gangguan';

    public $timestamps = false;

    protected $fillable = ['jenis_gangguan', 'tingkat_prioritas', 'deskripsi_gangguan'];
}
