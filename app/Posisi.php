<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lowongan;

class Posisi extends Model
{
    protected $fillable = [
        'posisi', 'departemen'
    ];

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }
}
