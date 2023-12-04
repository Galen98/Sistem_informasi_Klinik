<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tambahObat extends Model
{
    use HasFactory;
    protected $table        = "tambah_obat";
    protected $fillable     = ['id_obat','id_daftar_periksa'];

    public function obat()
    {
        return $this->belongsTo(ObatModel::class, 'id_obat');
    }
}
