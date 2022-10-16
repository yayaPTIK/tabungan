<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keuangan;
use App\Models\User;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userss = Keuangan::all();
        $user = User::latest()->search()->where('role','0')->paginate(1000);
        return view('admin.nasabah', compact('user','userss'));
    }

    public function debet($id)
    {
        $userss = Keuangan::all();
        $transaksi = User::find($id);
        return view('admin.debet',compact('transaksi','userss'));
    }

    public function debetStore(Request $request)
    {

        $this->validate($request,[
            'debet'=> 'required',
        ]);
        $transaksi = new Keuangan();
        $transaksi->user_id = $request->user_id;
        $transaksi->transaksiID = $request->transaksiID;
        $transaksi->debet = $request->debet;
        $transaksi->bulan = $request->bulans;
        $transaksi->tahun = $request->tahun;
        $transaksi->keterangan = $request->keterangan;
        $transaksi->kredit = 0;
        $transaksi->admin = $request->admin;
        $transaksi->save();
        return redirect()->route('keuangan.printRow', $transaksi->id)->with('successMsg','Input Debet Berhasil');
    }
    public function kredit($id)
    {
        $userss = Keuangan::all();
        $debkred = Keuangan::where('user_id',$id);
        $max = $debkred->sum('debet') - $debkred->sum('kredit');
        $transaksi = User::find($id);
        return view('admin.kredit',compact('transaksi','userss','max'));
    }

    public function kreditStore(Request $request)
    {
        $this->validate($request,[
            'kredit'=> 'required',
        ]);
        $transaksi = new Keuangan();
        $transaksi->user_id = $request->user_id;
        $transaksi->transaksiID = $request->transaksiID;
        $transaksi->bulan = $request->bulans;
        $transaksi->tahun = $request->tahun;
        $transaksi->debet = 0;
        $transaksi->keterangan = $request->keterangan;
        $transaksi->kredit = $request->kredit;
        $transaksi->admin = $request->admin;
        $transaksi->save();
        return redirect()->route('keuangan.printRow', $transaksi->id)->with('successMsg','Input kredit Berhasil');
    }

    public function printRow($id)
    {
        $printRow = Keuangan::find($id);
        $saldoKeuangan = Keuangan::where('user_id',$printRow->user_id);
        return view('admin.print.printRow', compact('printRow','saldoKeuangan'));
    }

    public function printAll($id)
    {
        $printAll = User::find($id);
        $print = Keuangan::all()->where('user_id', $id);
        return view('admin.print.printAdmin', compact('print','printAll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usersss = User::find($id);
        $b = date('m');
        $t = date('Y');
        $transaksi = Keuangan::all()->where('user_id',$id)->where('bulan',$b)->where('tahun',$t);
        return view('admin.keuangan',compact('transaksi','usersss'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
