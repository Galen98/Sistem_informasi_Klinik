<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwalDokters extends Model
{
    use HasFactory;
    protected $table        = "jadwal_dokter";
    protected $fillable     = ['id_dokter','jam1', 'jam2'];
}
