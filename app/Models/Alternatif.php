<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nisn',
        'rapor', //1
        'tpa', //2
        'prites', //3
        'jurusan',
        'minat', //4
        'psikologi', //5
        'wawancara', //6
        'rekomendasi' //7
    ];
}
