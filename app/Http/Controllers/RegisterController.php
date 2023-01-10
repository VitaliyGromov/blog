<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first-name' => ['required', 'string', 'max:50'],
            'last-name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:7', 'max:50'],
            'data-confirm' => ['accepted']
        ]);

        $user = new User();

        $user->first_name = $validated['first-name'];
        $user->last_name = $validated['last-name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']); //пароль нужно хэшировать при помощи функции bcrypt()
        $user->save();

        dd($user);

        return redirect()->route('user');
    }
}
