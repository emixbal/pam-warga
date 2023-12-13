<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    use HasFactory;

    public function kode_rekening()
    {
        return $this->belongsTo(KodeRekening::class, "kode_rekening_id")->withDefault();
    }
}
