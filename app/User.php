<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UserDetail;
use App\LowonganUser;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function authorizeRoles($roles)
    {
        if(is_array($roles)){
            return $this->hasAnyRole($roles) || abort(401, 'This action is unauthorize.');
        }
        return $this->hasRole($roles) || abort(401, 'This action is unauthorize.');
    }

    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name',$roles)->first();
    }

    public function hasRole($role)
    {
        return null !== $this->roles()->where('name',$role)->first();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'tanggal_lahir'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user_details()
    {
        return $this->hasOne('App\UserDetail', 'user_id');
    }

    public function lowongan()
    {
        return $this->belongsToMany(Lowongan::class);
    }
}
