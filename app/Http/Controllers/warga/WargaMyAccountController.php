<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class WargaMyAccountController extends Controller
{
    public function myAcount()
    {
        return view('wargaDashboard.WargaMyAcount', [
            'title' => 'My Acount',
            'user' => Auth::user()
        ]);
    }

    public function updateMyAcount(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'max:255',
            'userName' => 'max:255',
            'role' => 'max:255',
        ]);

        $currentPasswordStatus = Hash::check($request->password_lama, auth()->user()->password);
        if ($currentPasswordStatus) {

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password_baru),
            ]);

            return redirect('Warga/myAcount')->with('successUpdatedAcount', 'Password Berhasil Diperbaharui');
        } else {

            return redirect('Warga/myAcount')->with('failUpdatedAcount', 'Password Tidak Valid');
        }

        User::where('id', $id)->update($validatedData);

        return redirect('Warga/myAcount')->with('successUpdatedAcount', 'Acount has ben updated');
    }
}
