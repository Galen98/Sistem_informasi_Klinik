<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table        = "dokter";
    protected $fillable     = ['nama','poli'];

    public function jadwalDokter()
    {
        return $this->hasMany(jadwalDokters::class, 'id_dokter');
    }
}
