<?php

namespace App\Http\Controllers;

use App\Models\RouterConnect;
use App\Models\RouterosAPI;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class RouterconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routercon = RouterConnect::all();
        return view('routercon.index', compact('routercon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('routercon.create');
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
            'name' => 'required',
            'ip' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
        // dd($isdata);
        RouterConnect::create($isdata);

        return redirect()->route('routercon.index')->with('toast_success', 'Data berhasil di Tambahkan.');
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
        $routercon = RouterConnect::findorfail($id);
        return view('routercon.edit',compact('routercon'));
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
        $isdata = $request->validate([
            'name' => 'required',
            'ip' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
        $routercon = RouterConnect::findorfail($id);
        $routercon->update($isdata);

        return redirect()->route('routercon.index')->with('toast_success', 'Data berhasil di edit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $routercon = RouterConnect::findorfail($id);
        $routercon->delete();
        return redirect()->route('routercon.index')->with('toast_success', 'Data berhasil di hapus.');
    }

    public function status($id)
    {
        $data = RouterConnect::findorfail($id);
        $setatus_sekarang = $data->status;
        if ($setatus_sekarang==0) {
           $ip= $data->getOriginal('ip');
           $username= $data->getOriginal('username');
           $password= $data->getOriginal('password');
           $datacon=[
            'ip' => $ip,
            'user' => $username,
            'pass' => $password,
           ];
           // dd($data);
            $API = new RouterosAPI();
            $API->debug('false');
            // dd($data);
            if($API->connect($ip,$username,$password)) {
                $data->update(['status'=> 1]);
                session()->put($datacon);
                return redirect()->route('dashboard.index');
            }else{
                return redirect()->route('routercon.index')->with('toast_error', 'Gagal koneksi !!!');
            }
        } else {
            $data->update(['status'=>0]);
            session()->forget('ip');
            session()->forget('user');
            session()->forget('pass');
            return redirect()->route('routercon.index')->with('toast_success', 'Data berhasil di diubah.');
        }

    }
}
