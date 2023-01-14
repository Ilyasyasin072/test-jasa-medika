<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasien';
    protected $fillabel = ['nama', 'alamat', 'tlp', 'id_kelurahan', 'tanggal_lahir', 'jk'];

    //relational to kelurahan
    public function kelurahan() {
        return $this->belongsTo(Kelurahan::class, 'id_kelurahan');
    }
}
