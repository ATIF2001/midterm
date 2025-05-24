<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Display a listing of all admins
    public function index()
    {
        $admins = Admin::all(); // Get all admins
        return view('admins.index', compact('admins')); // Show the view
    }

    // Show the form to create a new admin
    public function create()
    {
        return view('admins.create'); // View contains a form to add a new admin
    }

    // Store a newly created admin in storage
    public function store(Request $request)
    {
        // Validate input
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6',
        ]);

        // Hash password
        $data['password'] = Hash::make($data['password']);

        // Create the admin
        Admin::create($data);

        // Redirect to admin list
        return redirect()->route('admins.index')->with('success', 'Admin created successfully.');
    }

    // Display a specific admin
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admins.show', compact('admin'));
    }

    // Show the form for editing the specified admin
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admins.edit', compact('admin'));
    }

    // Update the specified admin
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        // Validate input
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:admins,email,' . $id,
            'password' => 'nullable|string|min:6',
        ]);

        // If password is not empty, hash it
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']); // Don't overwrite password with null
        }

        // Update admin
        $admin->update($data);

        return redirect()->route('admins.index')->with('success', 'Admin updated successfully.');
    }

    // Remove the specified admin
    public function destroy($id)
    {
        Admin::destroy($id); // Delete the admin
        return redirect()->route('admins.index')->with('success', 'Admin deleted successfully.');
    }
}
