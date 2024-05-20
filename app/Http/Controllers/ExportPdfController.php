<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pembayaran;

class ExportPdfController extends Controller
{
    public function export($id)
    {
        $user = User::find($id); 
        $pem = Pembayaran::with('user')->find($id);
        return view('pdf.cetakdetailpembayaran', compact('pem', 'user'));
    }
}
