<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsertagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::guard('pengguna')->user();
        $transaksi = $user->pelanggans->transaksi;
        $idPel = $user->pelanggans->pelanggan_id;
        // dd($idPel);
        $totalTransaksi = DB::select(DB::raw('
        SELECT pelanggan_id, SUM(harga) AS total
        FROM transaksi
        WHERE pelanggan_id = :id
        AND status = 0
        OR status = 1
        GROUP BY pelanggan_id
        '), ['id' => $idPel]);

        if($totalTransaksi != NULL){
            $total = $totalTransaksi[0]->total;
        }else{
            $total = "Lunas";
        }
        return view('tagihanpelanggan.index',compact('transaksi','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::guard('pengguna')->user();
        $transaksi = $user->pelanggans->transaksi;
        // $ambildata= Transaksi::all();
        // $data =[
        //     'id1'=> $transaksi[0]->id,
        //     'id2'=> $transaksi[1]->id,
        // ];
        // dd($ambildata);
        $idPel = $user->pelanggans->pelanggan_id;
        // dd($idPel);
        $totalTransaksi = DB::select(DB::raw('
        SELECT pelanggan_id, SUM(harga) AS total
        FROM transaksi
        WHERE pelanggan_id = :id
        AND status = 0
        OR status = 1
        GROUP BY pelanggan_id
        '), ['id' => $idPel]);

        if($totalTransaksi != NULL){
            $total = $totalTransaksi[0]->total;
        }else{
            $total = "Lunas";
        }
        return view('tagihanpelanggan.create',compact('transaksi','user','total'));
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $transactionIds = $request->input('transaction_ids');
    //     $transkasiget= Transaksi::whereIn('id',$transactionIds)->get();
    //     dd($transkasiget);
    //     // $isdata = $request->validate([
    //     //     'photo' => 'required',
    //     //     'name' => 'required',
    //     // ]);
    //     $user = Auth::guard('pengguna')->user();
    //     // dd($user);
    //     $transaksi = $user->pelanggans->transaksi;
    //     $aray=[];
    //     // dd($aray->transaksi);
    //     //
    //     // $data1 =[
    //     //     'id1'=> $transaksi[0]->id,
    //     // ];
    //     // $data2 =[
    //     //     'id2'=> $transaksi[1]->id,
    //     // ];

    //     foreach ($transaksi as $transaksiget) {
    //         $amibil1= $transaksiget->id;
    //         $amibil2= $transaksiget->id;

    //     }
    //     dd($transaksiget);
    //     $cekstatus = Transaksi::whereIn('id',[$transaksi]);
    //     dd($cekstatus);
    //     $newfile = '';

    //     if($request->hasFile('photo')){
    //         $extension = $request->file('photo')->getClientOriginalExtension();
    //         $newfile = $request->name.'-'.now()->timestamp.'.'.$extension;
    //         $request->file('photo')->storeAs('bukti-transaksi',$newfile);
    //     }


    //     // dd($isdata);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::guard('pengguna')->user();
        // $id = Auth::guard('pengguna')->user()->id;
        // $usr = User::all();

        $transaksi = $user->pelanggans->transaksi;

        $tr = Transaksi::findOrFail($id);

        // dd($tr);
        // dd($transaksi);
        return view('tagihanpelanggan.edit',compact('transaksi', 'tr'));
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
        // dd($request->all());
        $ubahdata = Transaksi::findOrFail($id);

        $setatus_sekarang = $ubahdata->status;
        $ambilnama = $ubahdata->pelanggan->userpelanggan->name;
        // dd($setatus_sekarang);
        if ($setatus_sekarang == 0) {
            $newfile1 = '';
            if($request->hasFile('gambar')){
                $extension = $request->file('gambar')->getClientOriginalExtension();
                $newfile1 = $ambilnama.'-'.now()->timestamp.'.'.$extension;
                // dd($newfile);
                $request->file('gambar')->storeAs('bukti-transaksi',$newfile1);
            }
            // dd($newfile1);
            $request['photo'] = $newfile1;
            $ubahdata->update(['status'=>1]);
            $ubahdata->update($request->all());
            return redirect()->route('tagihanpelanggan.index')->with('success', 'Data berhasil di Edit.');
        }


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
