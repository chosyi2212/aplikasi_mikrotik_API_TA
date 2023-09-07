<?php

namespace App\Http\Controllers;

use App\Models\Logpaket;
use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserpaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now = Carbon::now();
        $thnBln = $now->year.$now->month;
        $cekPelanggan = Transaksi::count();
        if($cekPelanggan == 0){
            $urutan = 2019011;
            $notransksi = 'INV-'.$thnBln.$urutan;
        }else{
            $ambil = Transaksi::all()->last();
            $urutan = (int)substr($ambil->pelanggan_id,-7) + 1;
            $notransksi = 'INV-'.$thnBln.$urutan;
        }
        $user = Auth::guard('pengguna')->user();
        $amblidpaket = $user->pelanggans->status;
        // dd($amblidpaket);
        $transaksi= $user->pelanggans->transaksi;
        if($amblidpaket == 0){
           $ambilstat ='';
        }else{

            $data = [
                'id1' => $transaksi[0]->id,
            ];
            $tampilkan = Transaksi::findOrFail($data['id1']);
            $ambilstat = $tampilkan->status;
        }

        $cekidlog = Logpaket::count();
        if($cekidlog == 0){
            $id = 1;
            $idtam = $id;
        }else{
            $ambil = Logpaket::all()->last();
            $urut = (int)substr($ambil->id,-0) + 1;
            $idtam = $urut;
        }
        // dd($cekidlog);
        return view('layananpelanggan.index',compact('user','ambilstat','notransksi','idtam'),[
            'paket' => Paket::all(),
            // 'transaksi' => Transaksi::all(),
        ]);
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
    public function ubahpaket(Request $request,$id)
    {
        // dd($request->all());
        $user = Auth::guard('pengguna')->user();
        $amblidpaket = $user->pelanggans->pakets_id;
        // dd($penjumlahan);
        // $request->validate([
        //     'pakets_id' => 'required',
        //     'pelanggan_id' => 'required',
        // ]);

        if($amblidpaket != null){//cari kondisi sudah ada data paket atau belum
            // dd($amblidpaket);

            // dd($tambahhrg);
            $paketsebelum = $user->pelanggans->paket->namapaket;

            $data1 =[
                'id' => $request->id,
                'pelanggan_id' => $request->pelanggan_id,
                'pakets_id' => $request->pakets_id,
                'paket_sebelumnya' => $paketsebelum,
                'harga' => $request->harga + 25000,
                'keterangan'=> $request->keterangan,
            ];
            $data2=[
                'infoice_id' => $request->invoice_id,
                'pelanggan_id' => $request->pelanggan_id,
                'tanggaltempo_id' => $request->tempo_id,
                'pakets_id' => $request->pakets_id,
                'logpaket_id' => $request->id,
                'harga' => $request->harga + 25000,

            ];
            // dd($data1);
            Logpaket::create($data1);
            Transaksi::create($data2);
            return redirect()->route('layananpelanggan.index')->with('toast_success', 'Data berhasil di Tambahkan.');
        }else{
            $data1up =[
                'pakets_id' => $request->pakets_id,
            ];
            $data1tran=[
                'pakets_id' => $request->pakets_id,
                'infoice_id' => $request->invoice_id,
                'pelanggan_id' => $request->pelanggan_id,
                'pakets_id' => $request->pakets_id,
                'harga' => $request->harga,
            ];
            // dd([$data1up],[$data1tran]);
            $routercon = Pelanggan::findorfail($id);
            $routercon->update($data1up);
            Transaksi::create($data1tran);
            return redirect()->route('tagihanpelanggan.index')->with('toast_success', 'Data berhasil di Tambahkan.');
        }
    }

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
