<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table        = "pembayaran";
    protected $fillable     = ['id_daftar_periksa','harga_periksa', 'harga_obat'];
    public function daftarPeriksa()
    {
        return $this->belongsTo(daftarPeriksa::class, 'id_daftar_periksa');
    }
}
