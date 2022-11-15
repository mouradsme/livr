<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class UsersController extends Controller
{
    public function index() {
        if (\Auth::user()->role == '1')
            return redirect()->intended('/deliveries');

        $Users = User::all();
        return view('users.index', [
            "Users" => $Users
        ]);

    }
    public function addAction(Request $request) {

        $request->validate( [
            'lastname' => 'required|min:2',
            'firstnames' => 'required|min:2',
            'phone'   => 'required',
            'username'   => 'required|min:3',
            'password'   => 'required|min:3'

        ]);

        $User = new User();
        $User->name = $request->firstnames . ', ' . $request->lastname;
        $User->phone = $request->phone;
        $User->username = $request->username;
        $User->email = $request->username;
        $User->password = bcrypt($request->password);
        $User->raw = $request->password;
        $User->role = $request->userrole;

        if ($User->save())
            return redirect()->intended('/users');

        return redirect()->back()->with('fail', 'Opération Echouée!');

    }
    public function addUserPage() {
        if (\Auth::user()->role == '1')
            return redirect()->intended('/deliveries');

        return view('users.add');
    }
}
