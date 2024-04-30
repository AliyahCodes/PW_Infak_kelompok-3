<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $pembayarans = Pembayaran::where('user_id', $userId)->get();
        $data = myHelpers::getAllMonths();
        return view('Transaksi.transaksi', compact('pembayarans', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $semuaBulan = myHelpers::getAllMonths();
      return view('Transaksi.store', compact('semuaBulan'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_bank' => 'required',
            'pemilik_bank' => 'required',
            'nominal' => 'required',
            'bukti_pembayaran' => 'required',
            'tanggal_pembayaran' => 'required',
        ]);

        $bulan = $request->bulan;
        $namaBulan = myHelpers::getMonthName($bulan);
    
        $jumlahInfakBulanan = Auth::user()->nominal_perjanjian;
        $nominal = $request->input('nominal');
        $jumlahBulan = floor($nominal / $jumlahInfakBulanan);
    
        // Ambil bulan dan tahun dari tanggal pembayaran
        $tanggalPembayaran = $request->input('tanggal_pembayaran');
        $bulanPembayaran = date('m', strtotime($tanggalPembayaran));
        $tahunPembayaran = date('Y', strtotime($tanggalPembayaran));
    
        for ($i = 0; $i < $jumlahBulan; $i++) {
            $tanggalPembayaran = date('Y-m-d', strtotime($request->input('tanggal_pembayaran') . " +$i month"));
            
            // Lakukan proses penyimpanan pembayaran sesuai dengan jumlah bulan
            $newName = '';
            if ($request->file('bukti_pembayaran')) {
                $extension = $request->file('bukti_pembayaran')->getClientOriginalExtension();
                $newName = $request->pemilik_bank. '-'.now()->timestamp.'.'.$extension;
                $request->file('bukti_pembayaran')->storeAs('bukti_pembayaran', $newName);
            }

    
            // Simpan pembayaran dengan nama unik file yang diunggah
            Pembayaran::create([
                'nama_bank' => $request->nama_bank,
                'pemilik_bank' => $request->pemilik_bank,
                'nominal' => $jumlahInfakBulanan,
                'bukti_pembayaran' => $newName,
                'tanggal_pembayaran' => $tanggalPembayaran,
                'bulan' => $namaBulan,
                'status' => 0,
                'user_id' => Auth::user()->id,
            ]);
        }
    
        // Sisa nominal jika ada
        $sisaNominal = $nominal % $jumlahInfakBulanan;
        
        if ($sisaNominal > 0) {
            $newName = '';
            if ($request->file('bukti_pembayaran')) {
                $extension = $request->file('bukti_pembayaran')->getClientOriginalExtension();
                $newName = $request->laporan. '-'.now()->timestamp.'.'.$extension;
                $request->file('bukti_pembayaran')->storeAs('bukti_pembayaran', $newName);
            }
            $request['bukti_pembayaran'] = $newName;
    
            // Hitung tanggal pembayaran untuk sisa nominal
            $tanggalPembayaranSisa = date('Y-m-d', strtotime($request->input('tanggal_pembayaran') . " +$jumlahBulan month"));
    
            // Simpan pembayaran dengan sisa nominal
            Pembayaran::create([
                'nama_bank' => $request->nama_bank,
                'pemilik_bank' => $request->pemilik_bank,
                'nominal' => $sisaNominal,
                'bukti_pembayaran' => $newName,
                'tanggal_pembayaran' => $tanggalPembayaranSisa,
                'bulan' => $namaBulan,
                'status' => 0,
                'user_id' => Auth::user()->id,
            ]);
        }
    
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
