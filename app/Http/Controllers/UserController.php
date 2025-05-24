<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a user and a one-to-one profile.
     */
    public function createUserWithProfile()
    {
        $user = User::create([
            'name'     => 'Test User',
            'email'    => 'atif@test.com',
            'password' => bcrypt('password'),
        ]);

        // Create a profile associated with the user
        $user->profile()->create([
            'bio'    => 'Full-stack Laravel Developer',
            'avatar' => 'avatar.png',
        ]);

        // Load profile relation
        return response()->json($user->load('profile'));
    }

    /**
     * Add one-to-many posts to a user.
     */
    public function addPostsToUser($id)
    {
        $user = User::findOrFail($id);

        // Create multiple posts for the user
        $user->posts()->createMany([
            ['title' => 'First Post',  'body' => 'This is the first post.'],
            ['title' => 'Second Post', 'body' => 'This is the second post.'],
        ]);

        return response()->json($user->load('posts'));
    }

    /**
     * Assign many-to-many roles to a user.
     */
    public function assignRolesToUser($id)
    {
        $user = User::findOrFail($id);

        // Ensure roles exist or create them
        $adminRole  = Role::firstOrCreate(['name' => 'Admin']);
        $editorRole = Role::firstOrCreate(['name' => 'Editor']);

        // Sync roles with user (existing roles will be replaced)
        $user->roles()->sync([$adminRole->id, $editorRole->id]);

        return response()->json($user->load('roles'));
    }

    /**
     * Get user with all relationships.
     */
    public function getUserWithAllRelations($id)
    {
        $user = User::with(['profile', 'posts', 'roles'])->findOrFail($id);

        return response()->json($user);
    }
}
