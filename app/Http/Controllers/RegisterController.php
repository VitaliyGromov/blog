<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }
    public function store(UserStoreRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'first_name' => $validated['first-name'],
            'last_name' => $validated['last-name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        $user->assignRole('user');

        Auth::login($user);

        return redirect()->route('blog');
    }
}
 