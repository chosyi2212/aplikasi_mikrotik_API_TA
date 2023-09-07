<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Dashboard_pelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::guard('pengguna')->user();
        $idPel = $user->pelanggans->pelanggan_id;
        $mastenggang = $user->pelanggans->transaksi;
        // dd($mastenggang);

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

        return view('dashboardpelanggan',compact('user','total','mastenggang'),[
            'paket' => Paket::all(),
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
