<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserPermissionsRequest;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::getAllUsers();

        return view('admin.dashboard.index', compact('users'));
    }

    public function edit(User $user)
    {
        $permissions = Permission::query()->get();

        return view('admin.users.edit', compact('user', 'permissions'));
    }

    public function update(User $user, UpdateUserPermissionsRequest $request)
    {
        $validated = $request->all();

        dd($validated);

        $user->givePermissionTo($validated);

        return redirect()->route('admin.dashboard');
    }

    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect()->route('admin.dashboard');
    }
}
