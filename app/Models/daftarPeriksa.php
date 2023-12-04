<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daftarPeriksa extends Model
{
    use HasFactory;
    protected $table        = "daftar_periksa";
    protected $fillable     = ['id_user','tanggal','shift','id_dokter','status','no_urut','poli','keterangan'];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }

    public function tambahObat()
    {
        return $this->hasMany(tambahObat::class, 'id_daftar_periksa');
    }


    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_daftar_periksa');
    }
}
