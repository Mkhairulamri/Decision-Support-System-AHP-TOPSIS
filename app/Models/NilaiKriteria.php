<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiKriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'kriteria',
        'deskripsi',
        'nilai_kriteria',
        'bobot'
    ];
}
