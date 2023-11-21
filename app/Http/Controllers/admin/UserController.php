<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilDesa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminDashboard.otherAcount', [
            'title' => 'Other Acount',
            'profil' => ProfilDesa::firstWhere('id', 1),
            'user' => User::all()
        ]);
    }

    public function myAcount()
    {
        return view('adminDashboard.myAcount', [
            'title' => 'My Acount',
            'profil' => ProfilDesa::firstWhere('id', 1),
            'user' => Auth::user()
        ]);
    }

    public function updateMyAcount(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'max:255',
            'userName' => ['unique:users', 'max:255'],
            'status' => 'max:255',
            'password' => 'max:15'
        ]);


        if ($request->password) {
            $rules['password'] = ['max:15', Password::min(8)->letters()->mixedCase()->numbers()];
        }

        if ($request->password) {

            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        User::where('id', $id)->update($validatedData);

        return redirect()->back()->with('successUpdatedAcount', 'Acount has ben updated');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'userName' => ['required', 'unique:users', 'max:255'],
            'status' => 'required|max:255',
            'password' => [Password::min(8)->letters()->mixedCase()->numbers()]
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return back()->with('successCreatedOtherAcount', 'Acount has ben created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'max:255',
            'userName' => ['unique:users', 'max:255'],
            'status' => 'max:255',
            'password' => 'max:15'
        ]);


        if ($request->password) {
            $rules['password'] = ['max:15', Password::min(8)->letters()->mixedCase()->numbers()];
        }

        if ($request->password) {

            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        User::where('id', $id)->update($validatedData);

        return redirect()->back()->with('successUpdatedAcount', 'Acount has ben updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()->back()->with('successDeletedOtherAcount', 'Acount has ben deleted');
    }
}
