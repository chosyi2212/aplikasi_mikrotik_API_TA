<?php

namespace App\Http\Controllers;

use App\Models\RouterosAPI;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $total= Transaksi::all()->sum('harga');
        $totalseluruh=$total;
            $ip = session()->get('ip');
            $user = session()->get('user');
            $pass = session()->get('pass');
            $API = new RouterosAPI();
            $API->debug('false');
            // dd($data);
            if($API->connect($ip,$user,$pass)) {
                $identitas = $API->comm('/system/identity/print');
                $routermodel = $API->comm('/system/routerboard/print');
                $serialnumber = $API->comm('/system/routerboard/print');
                $versirouter = $API->comm('/system/resource/print');
                $freememori = $API->comm('/system/resource/print');
                $totalmemori = $API->comm('/system/resource/print');
                $interface = $API->comm('/interface/ethernet/print');
                // PPPoE
                $pppoeactive = $API->comm('/ppp/active/print');
                $pppoesecret = $API->comm('/ppp/secret/print');
                $total= Transaksi::all()->sum('harga');

            }else{
                return redirect()->route('failed');
            }
            $data = [
                'totalharga' =>$total,
                'identitas' => $identitas[0]['name'],
                'routermodel' => $routermodel[0]['model'],
                'serialnumber' => $serialnumber[0]['serial-number'],
                'versirouter' => $versirouter[0]['version'],
                'freememori' => $freememori[0]['free-memory'],
                'totalmemori' => $totalmemori[0]['total-memory'],
                'interface' => $interface,
                // PPPoe
                'pppoeactive' => count($pppoeactive),
                'pppoesecret' => count($pppoesecret),

            ];
            // dd($data);
        return view('dashboard',$data);
    }
}
