<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('Dashboard.Admin');
    }

    public function siswa()
    {
        return view('Dashboard.Siswa');
    }
}
