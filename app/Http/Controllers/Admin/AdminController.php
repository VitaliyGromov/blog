<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function update(User $user)
    {
        return 'User update request';
    }

    public function destroy()
    {
        return 'User destroy request';
    }
}
