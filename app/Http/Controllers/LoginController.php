<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('adminDashboard.login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }


    public function authenticate(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'userName' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('userName' => $input['userName'], 'password' => $input['password']))) {
            if (auth()->user()->role == 'staff') {
                return redirect()->route('admin');
            } else if (auth()->user()->role == 'masyarakat') {
                return redirect()->route('masyarakat');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }


    public function logout()
    {
        Auth::logout();
        Request()->session()->invalidate();
        Request()->session()->regenerate();

        return redirect('/login');
    }
}
