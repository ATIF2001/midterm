<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Admin extends Model
{
    use HasFactory;

    // Optional if the table name is 'admins'
    protected $table = 'admins';

    // Fields allowed for mass assignment
    protected $fillable = ['name', 'email', 'password'];

    // Fields hidden from arrays and JSON responses
    protected $hidden = ['password'];

    // Automatically handle created_at and updated_at
    public $timestamps = true;

    /**
     * Mutator: Automatically hash the password when setting it.
     * This ensures passwords are always stored securely.
     */
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password'] = Hash::make($value);
        }
    }

    /**
     * Scope: Get all admins in descending order
     * Usage: Admin::allAdmins()->get();
     */
    public function scopeAllAdmins($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
