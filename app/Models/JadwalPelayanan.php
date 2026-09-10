<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPelayanan extends Model
{
    protected $fillable = [
        'tanggal', 'wl', 'singer', 'pemusik', 'ohp', 'doa', 'warta', 'kolektan', 'catatan'
    ];
}