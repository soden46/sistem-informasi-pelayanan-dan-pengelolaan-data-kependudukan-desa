<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Svg\Tag\Rect;

class RegisterController extends Controller
{
    public function index()
    {
        return view('adminDashboard.register', [
            'title' => 'Register',
            'active' => 'Register'
        ]);
    }

    public function store(Request $request)
    {

        $data = Validator::make($request->all(), [
            'nik' => ['required', 'string', 'max:18'],
            'name' => ['required', 'string', 'max:255'],
            'userName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'syarat' => ['required'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($data->fails()) {
            return $data->errors();
        } else {
            $Password = Hash::make($request->password);
            User::create([
                'nik' => $request->nik,
                'name' => $request->name,
                'userName' => $request->userName,
                'email' => $request->email,
                'password' => $Password,
            ]);
            return redirect('/login')->with('success', "Akun Sukses Dibuat.");
        }
    }
}
