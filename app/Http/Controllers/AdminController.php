<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function detail_pembayaran($user_id){
        // $pem = Pembayaran::find($user_id);
        $detailUser = User::findOrFail($user_id);
        $pem = Pembayaran::where('user_id', $user_id)->first();
        return view('Admin.verifuser', compact('pem', 'detailUser'));
    }

    public function admin_pembayaran(){
  
        $students = Pembayaran::with('user')->paginate(5);
        return view('Admin.index', compact('students'));
    }

    
    public function validasi($user_id){
     
          Pembayaran::where('user_id', '=', $user_id)->update([
              'status' => 1,
          ]);
          return redirect()->route('admin.pembayaran')->with('done', 'Berhasil Validasi');
      }

    public function tolak($user_id){
        Pembayaran::where('user_id', '=', $user_id)->update([
            'status' => 2,
            // 'done_time' => \Carbon\Carbon::now(),
        ]);
        return redirect()->route('admin.pembayaran')->with('done', 'Permintaan Di tolak');
    }
      
     

  
   

}
