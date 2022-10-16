<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;
use App\Models\Keuangan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $bulan = date('m');
        $keuangan = Keuangan::all();
        $tahun = date('Y');
        // $h = date('Y-m-d');
        $nasabah = User::all()->where('role','0')->count();
        $harianMasuk = Keuangan::whereDate('created_at', date('Y-m-d'))->sum('debet');
        $harianKeluar = Keuangan::whereDate('created_at', date('Y-m-d'))->sum('kredit');
        $debetBulan = $keuangan->where('bulan', $bulan);
        $debetTahun = $keuangan->where('tahun', $tahun);
        return view('admin.dashboard', compact('debetBulan','debetTahun','nasabah','harianMasuk','harianKeluar','keuangan'));
    }

    public function profile($id)
    {
        $user = User::find($id);
        return view('admin.profile',compact('user'));
    }

    public function report()
    {
        $bulan = date('m');
        $keuangan = Keuangan::all();
        $tahun = date('Y');
        $nasabah = User::all()->where('role','0')->count();
        $harianMasuk = Keuangan::whereDate('created_at', date('Y-m-d'))->sum('debet');
        $harianKeluar = Keuangan::whereDate('created_at', date('Y-m-d'))->sum('kredit');
        $debetBulan = $keuangan->where('bulan', $bulan)->where('tahun', $tahun);
        $debetTahun = $keuangan->where('tahun', $tahun);
        return view('admin.surplus', compact('debetBulan','debetTahun','nasabah','harianMasuk','harianKeluar','keuangan'));
    }

    public function register()
    {
        return view('admin.auth.register');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit',compact('user'));
    }

    public function editStore(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'nik' => ['required','numeric'],
            'alamat' => ['required','string'],
            'jk' => ['required','string'],
            'hp' => ['required'],
            'image' => ['image','file','max:2048'],
        ]);

        $image = $request->file('image');

        $user = User::find($id);
        if (isset($image)) {
            unlink('storage/'. $user->avatar);
            $image = $request->file('image')->store('post-img');
        }else{
            $image = $user->avatar;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->nik = $request->nik;
        $user->alamat = $request->alamat;
        $user->jk = $request->jk;
        $user->hp = $request->hp;
        $user->avatar = $image;
        $user->save();
        
        return redirect()->route('admin.profile', $user->id);
    }

    public function registerStore(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nik' => ['required','numeric','unique:users'],
            'alamat' => ['required','string'],
            'jk' => ['required','string'],
            'hp' => ['required'],
            'image' => ['image','file','max:2048'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->nik = $request->nik;
        $users->alamat = $request->alamat;
        $users->jk = $request->jk;
        $users->hp = $request->hp;
        $users->role = 0;
        $users->avatar = $request->file('image')->store('post-img');
        $users->password = Hash::make($request->password);
        $users->save();
        return redirect()->route('nasabah')->with('successMsg','Tambah Nasabah berhasil');
    }
}
