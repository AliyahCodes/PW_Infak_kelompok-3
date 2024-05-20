<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bulan;
use App\Helpers\myHelpers;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $students = Pembayaran::with('user')->where('user_id', $userId)->get();
        return view('Transaksi.transaksi', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id){
        $pem = Pembayaran::find($id);
        return view('Transaksi.store', compact('pem'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
       
        $request->validate([
            'nama_bank' => 'required',
            'pemilik_bank' => 'required',
            'nominal' => 'required',
            'bukti_pembayaran' => 'required',
            'tanggal_pembayaran' => 'required',
        ]);

            $newName = '';
            if ($request->file('bukti_pembayaran')) {
                $extension = $request->file('bukti_pembayaran')->getClientOriginalExtension();
                $newName = $request->pemilik_bank. '-'.now()->timestamp.'.'.$extension;
                $request->file('bukti_pembayaran')->storeAs('bukti_pembayaran', $newName);
            }

            Pembayaran::find($id)->update([
                'nama_bank' => $request->nama_bank,
                'pemilik_bank' => $request->pemilik_bank,
                'nominal' => $request->nominal,
                'bukti_pembayaran' => $newName,
                'tanggal_pembayaran' => $request->tanggal_pembayaran,
                'status' => 'Menunggu Verfikasi',
                'user_id' => Auth::user()->id,
            ]);
    
        return redirect('transaksi')->with('success', 'Pembayaran sedang di verifikasi, harap tunggu informasi selanjutnya');
    }
    
    /**
     * Display the specified resource.
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
