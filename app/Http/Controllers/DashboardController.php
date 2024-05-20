<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        // $pembayaran = Pembayaran::count();
        $pembayaran = User::whereHas('pembayarans', function ($query) {
            $query->where('status', '!=', 'Belum dibayar');
        })->count();
        $nominal = Pembayaran::sum('nominal');
        $user = User::where('role', '=', 2)->count();
        return view('Dashboard.Admin', compact('user', 'nominal','pembayaran'));
    }

    public function siswa()
    {
        $user = Auth::user();
        $pem = Pembayaran::where('user_id', Auth::user()->id)->where('status', '=', 'Belum dibayar')
        ->orWhere('status', '=', 'Verifikasi ditolak')->count();
         return view('Dashboard.Siswa', compact('user', 'pem'));
    }
}
