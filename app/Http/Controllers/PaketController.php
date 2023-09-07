<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Logpaket;
use App\Models\Paket;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $paket = Paket::all();
        return view('paket.index', compact('paket'));

    }
    public function create()
    {
        return view('paket.create');
    }
    public function store(Request $request)
    {
        $isdata = $request->validate([
            'namapaket' => 'required',
            'kecepatan' => 'required',
            'harga' => 'required',
        ]);
        // dd($isdata);
        Paket::create($isdata);

        return redirect()->route('paket.index')->with('success', 'Data berhasil di Tambahkan.');
    }

    public function edit( $id)
    {
        // dd($isdata);
        $paket = Paket::findorfail($id);
        return view('paket.edit',compact('paket'));
    }

    public function update(Request $request ,$id)
    {
        $isdata = $request->validate([
            'namapaket' => 'required',
            'kecepatan' => 'required',
            'harga' => 'required',
        ]);
        $paket = Paket::findorfail($id);
        $paket->update($isdata);

        return redirect()->route('paket.index')->with('success', 'Data berhasil di Edit.');
    }

    public function delete($id)
    {
        $paket = Paket::findorfail($id);
        $paket->delete();
        return redirect()->route('paket.index')->with('success', 'Data berhasil di Hapus.');
    }

    public function log()
    {
        $tampil = Logpaket::all();

        return view('paket.log', compact('tampil'));
    }
    public function logup($id)
    {
        $tampil = Logpaket::findorfail($id);
        $cekStat = $tampil->status;
        $IDpkt = $tampil->pakets_id;
        $PKThrg = $tampil->paket->harga;
        // dd($PKThrg);
        // $IDpel = $tampil->pelanggan_id;
        $amblPEL = $tampil->billing;
        $amblBILL = $tampil->pelanggan;
        // dd([$amblPEL],[$amblBILL]);
        $data1=[
            'pakets_id' => $IDpkt,
        ];
        $data2=[
            'pakets_id' => $IDpkt,
            'harga' => $PKThrg,
        ];
        // dd($data2);
        if ($cekStat == 0) {
            $tampil->update(['status'=>1]);
            $amblPEL->update($data2);
            $amblBILL->update($data1);
        }
        return redirect()->route('paket.log')->with('success', 'Data berhasil di update.');
    }
}
