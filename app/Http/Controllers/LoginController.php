<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Hash;
use Session;

class LoginController extends Controller
{
    public function index() {
        return view('login.index');
    }
    public function logout() {

        Session::flush();

        Auth::logout();

        return redirect('login');
    }
    public function login(Request $request) {
        $credentials = $request->validate( [
            'username' => 'required|min:5',
            'password' => 'required|min:5',

        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

            return redirect()->back()->with('fail', 'Authentification Echouée!');


    }
}
