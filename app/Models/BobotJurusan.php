<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BobotJurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'kode_kriteria',
        'nama_bobot',
        'bobot_ipa',
        'bobot_ips'
    ];
}
