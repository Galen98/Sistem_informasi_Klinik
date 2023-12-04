<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerawatModel extends Model
{
    use HasFactory;
    protected $table        = "perawat";
    protected $primaryKey   = "id_perawat";
    protected $fillable     = ['id_perawat','nama_perawat','nip_perawat','username','password','no_hp'];
}