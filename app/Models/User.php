<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password'];

    // One-to-One
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // One-to-Many
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Many-to-Many
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    
   

 


}
