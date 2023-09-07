<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\ippool;
use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\RouterosAPI;
use App\Models\Tanggaltempo;
use App\Models\Transaksi;
use App\Models\Userpelanggan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $IDbil = Billing::count();
        if($IDbil == 0){
            $nobill= 1;
            $no =$nobill;
        }else{
            $ambil =Billing::all()->last();
            $nobill = (int)substr($ambil->id,-0) + 1;
            $no =$nobill;
        }
        // dd($no);
        $ip = session()->get('ip');
        $user = session()->get('user');
        $pass = session()->get('pass');
        $API = new RouterosAPI();
        $API->debug('false');
        // dd($data);
        if($API->connect($ip,$user,$pass)) {
            $pppoeprofile = $API->comm('/ppp/profile/print');
        }else{
            return redirect()->route('failed');
        }

        $data = [
            // PPPoe
            'pppoeprofile' => $pppoeprofile,
        ];

        $tanggaltempo = Tanggaltempo::all();
        $ip = ippool::all();
        $pelanggan = Pelanggan::all();
        $title = 'Menghapus pelanggan!';
        $text = "Apakah anda yakin ingin menghapus?";
        confirmDelete($title, $text);
        return view('pelanggan.index', compact('pelanggan','ip','tanggaltempo','no'),$data,[
            'userpelanggan' => Userpelanggan::get(),
            'paket' => Paket::get(),
            'tanggaltempo' => Tanggaltempo::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //idpelanggan = AZHR-20237000001
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
        // dd($nomer);
        $paket = Paket::all();
        $userPelanggan = Userpelanggan::all();
        return view('pelanggan.create', compact('paket','nomerPel','userPelanggan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());sss
        $isdata = $request->validate([
            'pelanggan_id' => 'required',
            'userpelanggans_id' => 'required',
            'full_name' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'no_telfon' => 'required',
        ]);
        Pelanggan::create($isdata);
        return redirect()->route('pelanggan.index')->with('toast_success', 'Data berhasil di Tambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $now = Carbon::now();
        $thnBln = $now->year.$now->month;
        $cekPelanggan = Transaksi::count();
        if($cekPelanggan == 0){
            $urutan = 2019011;
            $notransksi = 'INV-'.$thnBln.$urutan;
        }else{
            $ambil = Transaksi::all()->last();
            $urutan = (int)substr($ambil->pelanggan_id,-7) + 1;
            $notransksi = 'INV-'.$thnBln.$urutan;
        }

        $pelanggan = Pelanggan::findorfail($id);
        return view('pelanggan.show', compact('pelanggan','notransksi'),[
            'pelanggas' => Pelanggan::get(),
            'pakets' => Paket::get(),
            'logpaket' => Paket::get(),
        ]);

    }
    public function layanan(Request $request, $id)
    {

        // dd($request->all());
        $request->validate([
            'pelanggan_id' => 'required',
            'pakets_id' => 'required',
            'harga' => 'required',
        ]);
        $data1 =[
            'pelanggan_id' => $request->pelanggan_id,
            'pakets_id' => $request->pakets_id,
            'harga' => $request->harga,
        ];
        $data2 =[
            'pakets_id' => $request->pakets_id,
        ];
        dd([$data1],[$data2]);
        Billing::create($data1);
        $routercon = Pelanggan::findorfail($id);
        $routercon->update($data2);
        return redirect()->route('billing.index')->with('toast_success', 'Data berhasil di Tambahkan.');
    }

    public function upgradepkt(Request $request, $id)
    {

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelanggan = Pelanggan::findorfail($id);
        // dd($pelanggan);
        return view('pelanggan.edit',compact('pelanggan'),[
            'pakets' => Paket::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $isdata = $request->validate([
            'name_pelanggan' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'no_telfon' => 'required',
        ]);
        // dd($isdata);
        $pelanggan = Pelanggan::findorfail($id);
        $pelanggan->update($isdata);
        return redirect()->route('pelanggan.index')->with('toast_success', 'Data berhasil di ubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findorfail($id);
        $pelanggan->delete();
        return redirect()->route('pelanggan.index');
    }
    // public function status($id)
    // {
    //     $bill = Pelanggan::findorfail($id);
    //     return view('pelanggan.index', compact('bill'));
    //     // $setatus_sekarang = $pelanggan->status;
    //     // dd($setatus_sekarang);
    //     // if ($setatus_sekarang == 0) {
    //     //     $ip = session()->get('ip');
    //     //     $user = session()->get('user');
    //     //     $pass = session()->get('pass');
    //     //     $API = new RouterosAPI();
    //     //     $API->debug('false');
    //     //     // dd($data);
    //     //     if($API->connect($ip,$user,$pass)) {
    //     //         $pppoeprofile = $API->comm('/ppp/profile/print');
    //     //         $pppoesecret = $API->comm('/ppp/secret/print');
    //     //     }else{
    //     //         return redirect()->route('failed');
    //     //     }

    //     //     $data = [

    //     //         // PPPoe
    //     //         'totalsecret' => count($pppoesecret),
    //     //         'pppoesecret' => $pppoesecret,
    //     //         'pppoeprofile' => $pppoeprofile,

    //     //     ];

    //     //     // dd($data);
    //     //     $pelanggan->update(['status'=>1]);
    //     //     return redirect()->route('pelanggan.index')->with('toast_success', 'Data berhasil di ubah.');
    //     // }
    // }
    public function getpaket($id)
    {
        $ambildata = Paket::findorfail($id);
        return response()->json($ambildata);
    }
    public function getbulan($id)
    {
        $ambildata = Tanggaltempo::findorfail($id);
        return response()->json($ambildata);
    }
    public function kirimrouter(Request $request,$id)
    {
        // dd($request->all());
        $bill = Pelanggan::findorfail($id);
        $setatus_sekarang = $bill->status;
        if ($setatus_sekarang == 0) {
            $bill->update(['status'=>1]);
        }
        // dd($setatus_sekarang);
        $request->validate([
            'billing_id'=>'required',
            'pelanggan_id' => 'required',
            'pakets_id' => 'required',
            'harga' => 'required',
        ]);
        $isdata=[
            'id' => $request->billing_id,
            'pelanggan_id' => $request->pelanggan_id,
            'pakets_id' => $request->pakets_id,
            'harga' => $request->harga,
        ];
        $isdata1=[
            'billing_id' => $request->billing_id,
        ];
        // dd([$isdata],[$isdata1]);
        // $update= $bill->billing_id;
        Billing::create($isdata);
        $bill->update($isdata1);

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
				'comment' => $request['jatuh_tempo'] == '' ? '' : $request['jatuh_tempo'],
			]);
        }else{
            return redirect()->route('failed');
        }
        return redirect()->route('billing.index')->with('success', 'Data berhasil di Tambahkan.');
    }
}
