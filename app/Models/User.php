<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    use Loggable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'is_permission',
        'isactive',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function ulpk()
    {
        return $this->hasMany(Post::class);
    }
    public function reagen()
    {
        return $this->hasMany(Transreagensia::class);
    }
    public function mikro()
    {
        return $this->hasMany(Transmikrobiologi::class);
    }
    public function lapor()
    {
        return $this->hasMany(Post::class);
    }
    public function logs()
    {
        return $this->hasMany(Log::class);
    }
    public function notif()
    {
        return $this->hasMany(Notification::class);
    }
     public function adaja()
    {
        return $this->hasMany(Adaja::class);
    }
        public function operas()
    {
        return $this->hasMany(Transoperasional::class);
    }
        public function sappai()
    {
        return $this->hasMany(sample::class);
    }
        public function Manualorg()
    {
        return $this->hasMany(Manualorg::class);
    }
    public function Manualorgdetail()
    {
        return $this->hasMany(Manualorgdetail::class);
    }
}
