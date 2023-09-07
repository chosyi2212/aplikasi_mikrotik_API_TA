<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Userpelanggan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsrpelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Userpelanggan::all();
        return view('userpelanggan.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $now = Carbon::now();
        $thnBln = $now->year.$now->month;
        $cekPelanggan = Pelanggan::count();
        if($cekPelanggan == 0){
            $urutan = 201901;
            $nomerPel = 'AZHR-'.$thnBln.$urutan;
        }else{
            $ambil = Pelanggan::all()->last();
            $urutan = (int)substr($ambil->pelanggan_id,-6) + 1;
            $nomerPel = 'AZHR-'.$thnBln.$urutan;
        }

        $usercek = Userpelanggan::count();
        if($usercek == 0){
            $urutanuse = 1;
            $nomeruser = $urutanuse;
        }else{
            $ambil = Userpelanggan::all()->last();
            $urutanuse = (int)substr($ambil->id,-0) + 1;
            $nomeruser = $urutanuse;
        }
        // dd([$nomerPel],[$nomeruser]);
        return view('userpelanggan.create',compact('nomerPel','nomeruser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'pelanggan_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'no_telfon' => 'required',
        ]);
        $data1 =[
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        $data2 =[
            'pelanggan_id' => $request->pelanggan_id,
            'userpelanggans_id' => $request->id,
            'passpppoe' => $request->password,
            'alamat' => $request->alamat,
            'no_telfon' => $request->no_telfon,

        ];
        // dd([$data1],[$data2]);
        Userpelanggan::create($data1);
        Pelanggan::create($data2);
        return redirect()->route('userpelanggan.index')->with('toast_success', 'Data berhasil di Tambahkan.');
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
        $user = Userpelanggan::findorfail($id);
        return view('userpelanggan.edit',compact('user'));
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $data1 =[
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        $data2 =[
            'password' => $request->password,
        ];
        // dd([$data1],[$data2]);
        $pelanggan = Userpelanggan::findorfail($id);
        $pelanggan->update($data1);
        $pelanggan->pelanggans->update($data2);
        return redirect()->route('userpelanggan.index')->with('toast_success', 'Data berhasil di Tambahkan.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Userpelanggan::findorfail($id);
        $user->delete();
        return redirect()->route('userpelanggan.index')->with('success', 'Data berhasil di Hapus.');
    }
}
