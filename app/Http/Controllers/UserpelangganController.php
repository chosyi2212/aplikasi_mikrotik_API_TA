<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Userpelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserpelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::guard('pengguna')->user();
        return view('useraktif.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function password()
    {
        $user = Auth::guard('pengguna')->user();
        return view('useraktif.password',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function passwordubah(Request $request,$id)
    {
        $request->validate([
            'password' => 'required',
        ]);
        $data1 =[
            'password' => Hash::make($request->password),
        ];
        $data2 =[
            'password' => $request->password,
        ];
        // dd([$data1],[$data2]);
        $pelanggan = Userpelanggan::findorfail($id);
        $pelanggan->update($data1);
        $pelanggan->pelanggans->update($data2);
        return redirect()->route('useraktif.password')->with('success', 'Data berhasil di Edit.');

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
        $isdata1 = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $isdata2 = $request->validate([
            'alamat' => 'required',
            'no_telfon' => 'required',
        ]);
        // dd([$isdata1],[$isdata2]);
        $pelanggan = Userpelanggan::findorfail($id);
        $pelanggan->update($isdata1);
        $pelanggan->pelanggans->update($isdata2);
        return redirect()->route('useraktif.index')->with('success', 'Data berhasil di Edit.');

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
