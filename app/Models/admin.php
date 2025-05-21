<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Admin extends Model
{
    use HasFactory;

    // Optional if the table is named 'admins'
    protected $table = 'admins';

    // Allow mass assignment on these fields
    protected $fillable = ['name', 'email', 'password'];

    // Hide password from API/JSON output
    protected $hidden = ['password'];

    // Enable timestamps (created_at, updated_at)
    public $timestamps = true;

    /*
    |--------------------------------------------------------------------------
    | Basic Common Queries
    |--------------------------------------------------------------------------
    */

    // 1. Get all admin records
    public static function getAll()
    {
        return self::all();
    }

    // 2. Get a single admin by ID
    public static function getById($id)
    {
        return self::find($id);
    }

    // 3. Create a new admin
    public static function createAdmin($data)
    {
        // Encrypt password before saving
        $data['password'] = Hash::make($data['password']);
        return self::create($data);
    }

    // 4. Update an existing admin
    public static function updateAdmin($id, $data)
    {
        $admin = self::find($id);
        if (!$admin) return null;

        // Encrypt password if it's being updated
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $admin->update($data);
        return $admin;
    }

    // 5. Delete an admin by ID
    public static function deleteAdmin($id)
    {
        return self::destroy($id);
    }
}
