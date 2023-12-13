<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    public function lingkungan()
    {
        return $this->belongsTo(Lingkungan::class, "lingkungan_id")->withDefault();
    }
}
