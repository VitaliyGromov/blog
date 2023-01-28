<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::getAllUsers();

        return view('admin.dashboard.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store()
    {
        return 'User store request';
    }

    public function edit()
    {
        return view('admin.users.edit');
    }

    public function update()
    {
        return 'User update request';
    }

    public function destroy()
    {
        return 'User destroy request';
    }
}
