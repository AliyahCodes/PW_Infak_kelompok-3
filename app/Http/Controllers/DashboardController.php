<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        $pembayaran = Pembayaran::count();
        $nominal = Pembayaran::sum('nominal');
        $user = User::where('role', '==', 2)->count();
        return view('Dashboard.Admin', compact('user', 'nominal','pembayaran'));
    }

    public function siswa()
    {
        
        return view('Dashboard.Siswa');
    }
}
