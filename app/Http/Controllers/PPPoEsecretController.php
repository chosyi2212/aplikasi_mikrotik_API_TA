<?php

namespace App\Http\Controllers;

use App\Models\RouterosAPI;
use Illuminate\Http\Request;

class PPPoEsecretController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug('false');
            // dd($data);
        if($API->connect($ip,$user,$pass)) {
            $pppoeprofile = $API->comm('/ppp/profile/print');
            $pppoesecret = $API->comm('/ppp/secret/print');
        }else{
            return redirect()->route('failed');
        }

        $data = [

            // PPPoe
            'totalsecret' => count($pppoesecret),
            'pppoesecret' => $pppoesecret,
            'pppoeprofile' => $pppoeprofile,

        ];

        // dd($data);

        return view('PPPoEsecret.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug('false');
            // dd($data);
        if($API->connect($ip,$user,$pass)) {
            $pppoeprofile = $API->comm('/ppp/profile/print');
            $pppoesecret = $API->comm('/ppp/secret/print');
        }else{
            return redirect()->route('failed');
        }

        $data = [

            // PPPoe
            'totalsecret' => count($pppoesecret),
            'pppoesecret' => $pppoesecret,
            'pppoeprofile' => $pppoeprofile,

        ];

        // dd($data);

        return view('PPPoEsecret.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug('false');
            // dd($data);
        if($API->connect($ip,$user,$pass)) {
            $API->comm('/ppp/secret/add', [
				'name' => $request['user'],
				'password' => $request['password'],
				'service' => 'pppoe',
				'profile' => $request['profile'] == '' ? 'default' : $request['profile'],
				'local-address' => $request['localaddress'] == '' ? '0.0.0.0' : $request['localaddress'],
				'remote-address' => $request['remoteaddress'] == '' ? '0.0.0.0' : $request['remoteaddress'],
				'comment' => $request['comment'] == '' ? '' : $request['comment'],
			]);
            return redirect()->route('PPPoEsecret.index')->with('success', 'Data berhasil di Tambahkan.');
        }else{
            return redirect()->route('failed');
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
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug('false');
            // dd($data);
        if($API->connect($ip,$user,$pass)) {
            $getuser = $API-> comm('/ppp/secret/print',[
                '?.id'=>'*'. $id,
            ]);

            $secret = $API->comm('/ppp/secret/print');
			$profile = $API->comm('/ppp/profile/print');

			$data = [
				'user' => $getuser[0],
				'secret' => $secret,
				'profile' => $profile,
			];

            // dd($getuser);
            return view('PPPoEsecret.edit',$data);
        }else{
            return redirect('failed');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug('false');
            // dd($data);
        if($API->connect($ip,$user,$pass)) {
            $API->comm("/ppp/secret/set", [
                ".id" => $request['id'],
                'name' => $request['user'] == '' ? $request['user'] : $request['user'],
                'password' => $request['password'] == '' ? $request['password'] : $request['password'],
                'profile' => $request['profile'] == '' ? $request['profile'] : $request['profile'],
                'disabled' => $request['disabled'] == '' ? $request['disabled'] : $request['disabled'],
                'local-address' => $request['localaddress'] == '' ? $request['localaddress'] : $request['localaddress'],
                'remote-address' => $request['remoteaddress'] == '' ? $request['remoteaddress'] : $request['remoteaddress'],
                'comment' => $request['comment'] == '' ? $request['comment'] : $request['comment'],
            ]);

            return redirect()->route('PPPoEsecret.index')->with('success', 'Data berhasil di Tambahkan.');
        }else{
            return redirect()->route('failed');
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
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug('false');
            // dd($data);
        if($API->connect($ip,$user,$pass)) {
            $API->comm('/ppp/secret/remove', [
				'.id' => '*' . $id,
			]);
        return redirect()->route('PPPoEsecret.index')->with('success', 'Data berhasil di Tambahkan.');
        }else{


            return redirect()->route('failed');
        }
    }
}
