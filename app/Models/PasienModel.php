<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienModel extends Model
{
    use HasFactory;
    protected $table        = "pasien";
    protected $primaryKey   = "id_pasien";
    protected $fillable     = ['id_pasien','username','password','nama','alamat','no_hp'];
}