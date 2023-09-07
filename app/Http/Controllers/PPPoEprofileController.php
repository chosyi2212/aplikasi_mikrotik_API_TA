<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\RouterosAPI;
use Illuminate\Http\Request;

class PPPoEprofileController extends Controller
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
            $pppprofile = $API->comm('/ppp/profile/print');
        }else{
            return redirect()->route('failed');
        }

        $data = [

            // PPPoe
            'totalprofile' => count($pppprofile),
            'pppprofile' => $pppprofile,


        ];

        // dd($data);

        return view('pppoe_profile.index',$data);
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
            $ippool = $API->comm('/ip/pool/print');
        }else{
            return redirect()->route('failed');
        }

        $data = [

            // PPPoe
            'ippool' => $ippool,


        ];
        // dd($data);
        return view('pppoe_profile.create',$data,[
            'paket' => Paket::all(),
        ]);
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
            $API->comm('/ppp/profile/add', [
				'name' => $request['name'],
				'local-address' => $request['localaddress']== '' ? '' : $request['localaddress'],
				'remote-address' => $request['remoteaddress']== '' ? '' : $request['remoteaddress'],
				'rate-limit' => $request['ratelimit']== '' ? '' : $request['ratelimit'],
				'comment' => $request['comment'] == '' ? '' : $request['comment'],
			]);
        }else{


            return redirect()->route('failed');
        }
        return redirect()->route('pppoe_profile.index')->with('success', 'Data berhasil di Tambahkan.');
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
            $getpool = $API-> comm('/ppp/profile/print',[
                '?.id'=>'*'. $id,
            ]);
            $ippool = $API->comm('/ip/pool/print');
            $data = [
				'profil' => $getpool[0],
				'pool' => $ippool,
			];

            // dd($getpool);
            return view('pppoe_profile.edit',$data,[
                'paket'=>Paket::all(),
            ]);
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
