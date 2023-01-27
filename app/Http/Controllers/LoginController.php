<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginStoreRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function store(LoginStoreRequest $request)
    {  
        $validated = $request->validated();

        if(Auth::attempt($validated)){
            return redirect()->route('user');
        }
    }
}
