<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{    
    
    public function admin_pembayaran(){
  
        $students = Pembayaran::with('user')->where('status', 'Menunggu Verfikasi')->paginate(15);
        return view('Admin.index', compact('students'));
    }

    public function riwayat_pembayaran()
    {
        $students = Pembayaran::with('user')->where('status', 'Lunas')->paginate(12);
        return view('Admin.riwayat', compact('students'));
    }

    public function tagihan_pembayaran()
    {
        $students = Pembayaran::with('user')->where('status', 'Belum dibayar')->orWhere('status', 'Verifikasi ditolak')->paginate(12);
        return view('Admin.tagihan', compact('students'));
    }

    public function detail_pembayaran($id)
    {
        $user = User::find($id); 
        $pem = Pembayaran::with('user')->find($id);
        return view('Admin.verifuser', compact('pem', 'user'));
    }


    
    public function validasi($id){
     
          Pembayaran::find($id)->update([
              'status' => 'Lunas',
          ]);
          return redirect()->route('admin.pembayaran')->with('done', 'Berhasil Validasi');
      }

    public function tolak($id){
        Pembayaran::find($id)->update([
            'status' => 'Verifikasi ditolak',
        ]);
        return redirect()->route('admin.pembayaran')->with('done', 'Permintaan Di tolak');
    }
      
     

  
   

}
