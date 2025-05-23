<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // One-to-One
    public function createUserWithProfile()
    {
        $user = User::create([
            'name' => 'Atif',
            'email' => 'atif@example.com',
            'password' => bcrypt('password')
        ]);

        $user->profile()->create([
            'bio' => 'Full-stack Laravel Developer',
            'avatar' => 'avatar.png',
        ]);

        return response()->json($user->load('profile'));
    }

    // One-to-Many
    public function addPostsToUser($id)
    {
        $user = User::findOrFail($id);

        $user->posts()->createMany([
            ['title' => 'First Post', 'body' => 'This is the first post.'],
            ['title' => 'Second Post', 'body' => 'This is the second post.']
        ]);

        return response()->json($user->load('posts'));
    }

    // Many-to-Many
    public function assignRolesToUser($id)
    {
        $user = User::findOrFail($id);

        // Create roles if they don't exist
        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $editor = Role::firstOrCreate(['name' => 'Editor']);

        $user->roles()->sync([$admin->id, $editor->id]);

        return response()->json($user->load('roles'));
    }

    // Get complete user with all relations
    public function getUserWithAllRelations($id)
    {
        return User::with(['profile', 'posts', 'roles'])->findOrFail($id);
    }
}
