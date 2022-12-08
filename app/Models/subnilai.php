<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subnilai extends Model
{
    use HasFactory;

    protected $fillable = [
        'kriteria',
        'nama_sub_nilai'
    ];
}
