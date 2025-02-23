<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Laravelista\Comments\Commenter;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class User extends Authenticatable implements HasMedia
{
    use Notifiable, HasRoles, HasApiTokens, HasMediaTrait, Commenter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
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

    public function identities() {
        return $this->hasMany('App\SocialIdentity');
    }

    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }

    // Compete Relations
    public function questions()
    {
        return $this->hasMany('App\Models\Compete\RoundDetail', 'creator_id');
    }

    public function responses()
    {
        return $this->hasMany('App\Models\Compete\RoundDetail', 'responder_id');
    }
    
}
