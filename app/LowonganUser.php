<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Lowongan;

class LowonganUser extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function lowongans()
    {
        return $this->belongsToMany(Lowongan::class);
    }
}
