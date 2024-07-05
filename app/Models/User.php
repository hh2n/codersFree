<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relacion uno a uno 
    public function profile() {
        return $this->hasOne('App\Models\Profile');
    }

    //Relacion uno a muchos 
    public function courses_dictated() {
        return $this->hasMany('App\Models\Course');
    }

    public function reviews() {
        return $this->hasMany('App\Models\Course');
    }
    
    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }
    
    public function reaction() {
        return $this->hasMany('App\Models\Reaction');
    }

    // Relacion muchos a muchos 
    public function courses_enrolled() {
        return $this->belongsToMany('App\Models\Course');
    }

    public function lessons() {
        return $this->belongsToMany('App\Models\Lesson');
    }
}
