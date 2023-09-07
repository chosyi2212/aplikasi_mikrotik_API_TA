<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\Tanggaltempo;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BillingController extends Controller
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
            $nomerPel = 'INV-'.$thnBln.$urutan;
        }else{
            $ambil = Transaksi::all()->last();
            $urutan = (int)substr($ambil->pelanggan_id,-7) + 1;
            $nomerPel = 'INV-'.$thnBln.$urutan;
        }
        $billing = Billing::all();
        // dd($billing);
        return view('billing.index',compact('billing','nomerPel'),[
            'tanggal' => Tanggaltempo::get(),
            'paket' => Paket::get(),
        ]);
    }
    public function getpelanggan($id)
    {
        $pelanggan = Pelanggan::findorfail($id) ;
        return response()->json($pelanggan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        // dd($request->all());
        $isdata = $request->validate([
            'bulan' => 'required',
            'tahun' => 'required',
        ]);
        Tanggaltempo::create($isdata);
        return redirect()->route('masterbulan.index')->with('success', 'Data berhasil di Tambah.');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isdata = $request->validate([
            'namapaket' => 'required',
            'kecepatan' => 'required',
            'harga' => 'required',
        ]);
        // dd($isdata);
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
        // dd($request->all());
        $bill = Billing::findorfail($id);
        $request->validate([
            'infoice_id' => 'required',
            'pelanggan_id' => 'required',
            'pakets_id' => 'required',
            'harga' => 'required',
            'tanggaltempo_id' => 'required',
        ]);
        $data1 =[
            'infoice_id' => $request->infoice_id,
            'pelanggan_id' => $request->pelanggan_id,
            'pakets_id' => $request->pakets_id,
            'harga' => $request->harga,
            'tanggaltempo_id' => $request->tanggaltempo_id,
        ];
        $data2 =[
            'tempo_id' => $request->tanggaltempo_id,
        ];
        // dd([$data1],[$data2]);
        $bill->update($data2);
        Transaksi::create($data1);
        return redirect()->route('billing.index')->with('success', 'Data berhasil di Edit.');
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
