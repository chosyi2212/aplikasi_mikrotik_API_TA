<?php

namespace App\Http\Controllers;

use App\Models\Ippool;
use App\Models\RouterosAPI;
use Illuminate\Http\Request;

class IppoolController extends Controller
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
            $ippool = $API->comm('/ip/pool/print');
        }else{
            return redirect()->route('failed');
        }

        $data = [

            // PPPoe
            'totalpool' => count($ippool),
            'ippool' => $ippool,


        ];

        // dd($data);

        return view('poolip.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poolip.create');
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
            'ranges' => 'required',
        ]);
        Ippool::create($isdata);
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug('false');
            // dd($data);
        if($API->connect($ip,$user,$pass)) {
            $API->comm('/ip/pool/add', [
				'name' => $request['name'],
				'ranges' => $request['ranges'],
				'comment' => $request['comment'] == '' ? '' : $request['comment'],
			]);
        }else{


            return redirect()->route('failed');
        }
        return redirect()->route('poolip.index')->with('success', 'Data berhasil di Tambahkan.');
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
            $getpool = $API-> comm('/ip/pool/print',[
                '?.id'=>'*'. $id,
            ]);
            $ippool = $API->comm('/ip/pool/print');
            $data = [
				'ipool' => $getpool[0],
				'ipool2' => $ippool,
			];

            // dd($getpool);
            return view('poolip.edit',$data);
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
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug('false');
            // dd($data);
        if($API->connect($ip,$user,$pass)) {
            $API->comm('/ip/pool/set', [
                ".id" => $request['id'],
				'name' => $request['name'] == '' ? $request['name'] : $request['name'],
				'ranges' => $request['ranges'] == '' ? $request['ranges'] : $request['ranges'],
				'comment' => $request['comment'] == '' ? $request['comment'] : $request['comment'],
			]);
        }else{


            return redirect()->route('failed');
        }
        return redirect()->route('poolip.index')->with('success', 'Data berhasil di Tambahkan.');
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
            $API->comm('/ip/pool/remove', [
				'.id' => '*' . $id,
			]);
        return redirect()->route('poolip.index')->with('success', 'Data berhasil di Tambahkan.');
        }else{


            return redirect()->route('failed');
        }
    }
}
