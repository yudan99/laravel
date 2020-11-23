<?php

//namespace App;
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Encore\Admin\Traits\DefaultDatetimeFormat;

class User extends Authenticatable //implements MustVerifyEmail
{
    use Notifiable;
    use DefaultDatetimeFormat;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','introduction','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * @var mixed
     */

    public function fileShare()
    {
        return $this->hasMany(FileShare::class);
    }

    public function fiel()
    {
        return $this->belongsToMany(Fiel::class, 'fiels2users', 'user_id','fiel_id');
    }

    public function addFiel($fiel_ids){
        if(!is_array($fiel_ids)){
            $fiel_ids = compact('fiel_ids');
        }
        $this->fiel()->sync($fiel_ids, false);
    }

    public function unFiel($fiel_ids){
        if(!is_array($fiel_ids)){
            $fiel_ids = compact('fiel_ids');
        }
        $this->fiel()->detach($fiel_ids);
    }

    public function isFiel($fiel_id){
        return $this->fiel()->contains($fiel_id);
    }

}
