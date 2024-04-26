<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Auth.login');
    }


    public function auth(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'email wajib diisi',
            'password.required' => 'password wajib diisi',
        ]);

        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($login)){

            if(auth()->user()->role == 'admin') {
                return redirect()->route('dashboard'); // Mengarahkan admin ke dashboard
            } else {
                return redirect()->route('siswa')->with('login_success', true); // Mengarahkan non-admin ke siswa
            }
        }
        return back()->with('error', 'name atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('error', 'berhasil logout');
    }

    
}
