<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LowonganUser;
use App\Posisi;

class Lowongan extends Model
{
    protected $fillable = [
        'deskripsi', 'deadline', 'pengalaman_minimal', 'pendidikan_minimal', 'nilai_minimal', 'posisi_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function posisi()
    {
        return $this->hasOne(Posisi::class);
    }
}
