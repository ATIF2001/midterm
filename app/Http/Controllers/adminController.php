<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // 1. Get all admins
    public function index()
    {
        $admins = Admin::getAll();
        return response()->json($admins);
    }

    // 2. Get a single admin by ID
    public function show($id)
    {
        $admin = Admin::getById($id);
        if (!$admin) {
            return response()->json(['message' => 'Admin not found'], 404);
        }
        return response()->json($admin);
    }

    // 3. Create a new admin
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:admins',
            'password' => 'required|string|min:6',
        ]);

        $admin = Admin::createAdmin($validated);
        return response()->json($admin, 201);
    }

    // 4. Update an existing admin
    public function update(Request $request, $id)
    {
        $admin = Admin::getById($id);
        if (!$admin) {
            return response()->json(['message' => 'Admin not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:admins,email,' . $id,
            'password' => 'sometimes|string|min:6',
        ]);

        $updatedAdmin = Admin::updateAdmin($id, $validated);
        return response()->json($updatedAdmin);
    }

    // 5. Delete an admin
    public function destroy($id)
    {
        $deleted = Admin::deleteAdmin($id);
        if (!$deleted) {
            return response()->json(['message' => 'Admin not found or already deleted'], 404);
        }

        return response()->json(['message' => 'Admin deleted successfully']);
    }
}
