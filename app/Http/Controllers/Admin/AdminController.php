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
        $validated = $request->validated();

        $permissions = [];

        foreach($validated as $key => $value)
        {
            if($value){
                array_push($permissions, $key);
            }
        }

        $user->syncPermissions($permissions);

        return redirect()->route('admin.dashboard');
    }

    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect()->route('admin.dashboard');
    }
}
