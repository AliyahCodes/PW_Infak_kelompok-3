<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::where('role', 2)->get();
        return view('Siswa.siswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Siswa.Create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'nama_lengkap' => 'required',
            'rombel' => 'required',
            'rayon' => 'required',
            'email'=> 'required|unique:users',
            'no_phone_orang_tua' => 'required',

          
        ]);

             User::create([            
                'nis' => $request->nis,
                'nama_lengkap' => $request->nama_lengkap,
                'rombel' => $request->rombel,
                'rayon' => $request->rayon,
                'email'=> $request->email,
                'no_phone_orang_tua' => $request->no_phone_orang_tua,
                'password' =>  Hash::make($request->nis),
                'nominal_perjanjian' => 0,
                'role' => 'user',
             ]);

        // $item = Siswa::latest()->first();
        // return $pdf->stream('ppdb.pdf');
        return redirect('data-siswa')->with('succes', 'Berhasil Menambahkan data baru');
        // return redirect()->route('/');

       
    }
    
    public function update(Request $request, $id)
{
    $request->validate([
        'nis' => 'required',
        'nama_lengkap' => 'required',
        'rombel' => 'required',
        'rayon' => 'required',
        'email'=> 'required|unique:users,email,'.$id,
        'no_phone_orang_tua' => 'required',
    ]);

    // Temukan data siswa yang ingin diperbarui
    $siswa = User::findOrFail($id);

    // Perbarui atribut-atributnya satu per satu
    $siswa->nis = $request->nis;
    $siswa->nama_lengkap = $request->nama_lengkap;
    $siswa->rombel = $request->rombel;
    $siswa->rayon = $request->rayon;
    $siswa->email = $request->email;
    $siswa->no_phone_orang_tua = $request->no_phone_orang_tua;

    // Simpan perubahan
    $siswa->save();

    // Redirect setelah berhasil dengan pesan sukses
    return redirect('data-siswa')->with('successAdd', 'Berhasil mengupdate data siswa!');
}


    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa = User::find($id);
        return view('Siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Siswa $siswa)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan data siswa yang ingin dihapus
        $siswa = User::findOrFail($id);
        
        // Lakukan penghapusan data siswa
        $siswa->delete();
        
        // Redirect setelah berhasil dengan pesan sukses
        return redirect('data-siswa')->with('successDelete','Berhasil menghapus data siswa!');
    }

    
}
