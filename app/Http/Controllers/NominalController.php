<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NominalController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('User.User', compact('data'));
    }

    public function nominal_form(Request $request)
    {
            $request->validate([
            'nominal_perjanjian' => 'required',        
        ]);

        // Temukan atau buat instance model User terlebih dahulu
        $user = User::find(Auth::id());

        // Perbarui atribut-atribut model dan simpan perubahan
        $user->update([
            'nominal_perjanjian' => $request->nominal_perjanjian,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Berhasil menambahkan nominal perjanjian');
    }


}
