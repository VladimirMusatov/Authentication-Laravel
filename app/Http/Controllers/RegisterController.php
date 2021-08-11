<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function save(Request $request){

        if(Auth::check()){
           return redirect(route('user.private')); 
        }

        $validateField = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        if(User::where('email', $validateField['email'])->exists()){
        return redirect(route('user.registration'))->withErrors([
            'email' => 'Такой пользователь уже зарегестрирован'
            ]);
        }

        $user = User::create($validateField);
        if($user){
            Auth::login($user);
            return redirect(route('user.private'));
        }

        return redirect(route('user.login'))->withErrors([
            'formError' => 'Произошла ошибка при сохранении пользователя'
        ]);
    }
}
