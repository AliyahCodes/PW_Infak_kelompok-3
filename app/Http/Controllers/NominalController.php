<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NominalController extends Controller
{
    public function index()
    {
        $data = User::where('role', 1)->get();
        return view('User.User', compact('data'));
    }

    public function nominal_form(Request $request)
    {
         $request->validate([
            'nominal_perjanjian' => 'required',        
        ]);

         $bulanNames = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $pembayaran = Pembayaran::get();
        $user = User::find(Auth::id());

        $user->update([
            'nominal_perjanjian' => $request->nominal_perjanjian,
        ]);

        foreach ($bulanNames as $bulanName) {
            Pembayaran::create([
                'user_id' => $user->id,
                'bulan' => $bulanName,
                'status' => 'Belum dibayar',
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil menambahkan nominal perjanjian');
    }


}
