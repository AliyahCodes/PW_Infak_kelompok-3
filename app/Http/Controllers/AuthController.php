<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Auth.login');
    }

    public function user()
    {
        return view('User.create');
    }

    public function userEdit($id)
    {
        $user = User::find($id);
        return view('User.edit', compact('user'));
    }

    public function create(Request $request)
    { 
        $request->validate([
            'nama_lengkap' => 'required',
            'email'=> 'required|unique:users,email,NULL,id',
            'password' => 'required|string',
            'role' => 'required',
        ]);
    
        User::create([            
            'nama_lengkap' => $request->nama_lengkap,
            'email'=> $request->email,
            'password' =>  bcrypt($request->password),
            'role' => $request->role,
        ]);
    
        return redirect('data-user')->with('success', 'Berhasil Menambahkan data baru');
    }
    
    

    public function userUpdate(Request $request, $id)
{
    $request->validate([    
        'nama_lengkap' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$id,
        'password' => 'nullable|string', // password dapat kosong atau tidak diisi
        'role' => 'required|string',
    ]);
    
    // Temukan data pengguna yang ingin diperbarui
    $user = User::findOrFail($id);

    // Perbarui atribut-atributnya satu per satu
    $user->nama_lengkap = $request->nama_lengkap;
    $user->email = $request->email;
    if ($request->has('password')) {
        $user->password = Hash::make($request->password);
    }
    $user->role = $request->role;
    
    // Simpan perubahan
    $user->save();
    
    // Redirect setelah berhasil dengan pesan sukses
    return redirect('data-user')->with('successAdd','Berhasil mengupdate data!');
}


    

    public function auth(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'email wajib diisi',
            'password.required' => 'password wajib diisi',
        ]);

        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($login)){

            if(auth()->user()->role == 'admin') {
                return redirect()->route('dashboard'); // Mengarahkan admin ke dashboard
            } else {
                return redirect()->route('siswa')->with('login_success', true); // Mengarahkan non-admin ke siswa
            }
        }
        return back()->with('error', 'name atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('error', 'berhasil logout');
    }

    public function delete($id)
    {
    // Temukan user yang ingin dihapus
        $user = User::findOrFail($id);

        // Hapus user dari database
        $user->delete();

        // Redirect setelah berhasil dengan pesan sukses
        return redirect('data-user')->with('successDelete', 'Data user berhasil dihapus!');
    }

    
}
