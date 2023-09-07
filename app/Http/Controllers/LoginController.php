<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\User;
use App\Models\Userpelanggan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('pengguna.login');
    }
    public function postlogin(Request $request)
    {
        Session::flash('email',$request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required' => 'Email Wajib Di isi',
            'password.required' => 'password Wajib Di isi'
        ]);

        $infologin =[
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if (Auth::guard('pengguna')->attempt($infologin)){
            return redirect()->route('dashboardpelanggan');
        }elseif(Auth::guard('user')->attempt($infologin)){
            return redirect()->route('routercon.index');
        }else{
            return redirect('login')->withErrors('Username dan Password salah!!')->withInput();
        }
    }
    public function logout()
    {
        if(Auth::guard('pengguna')->check()){
            Auth::guard('pengguna')->logout();
        }elseif(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
        }
        return redirect('/');
    }
    public function register()
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
        return view('pengguna.register',compact('nomerPel','nomeruser'));
    }
    public function create(Request $request)
    {
        // dd($request->all());
        Session::flash('name',$request->name);
        Session::flash('email',$request->email);
        $request->validate([
            'id' => 'required',
            'pelanggan_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:user_pelanggans',
            'password' => 'required',
            'alamat' => 'required',
            'no_telfon' => 'required',
        ],[
            'name.required' => 'Nama Wajib Di isi',
            'email.required' => 'Email Wajib Di isi',
            'email.email' => 'Silahkan isi Email yang Valid',
            'email.unique' => 'Email sudah Di daftarkan, silahkan membuat yang lain',
            'password.required' => 'password Wajib Di isi'
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
        // $request->validate([
        //     'name'=>'required',
        //     'level'=>'required',
        //     'email'=>'required|email|unique:users',
        //     'password'=>'required'
        // ],[
        //     'name.required' => 'Nama Wajib Di isi',
        //     'level.required' => 'level Wajib Di isi',
        //     'email.required' => 'Email Wajib Di isi',
        //     'email.email' => 'Silahkan isi Email yang Valid',
        //     'email.unique' => 'Email sudah Di daftarkan, silahkan membuat yang lain',
        //     'password.required' => 'password Wajib Di isi'
        // ]);
        // $data =[
        //     'name' => $request->name,
        //     'level' => $request->level,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password)
        // ];
        // // dd($data);
        // User::create($data);
        return redirect()->route('login');//ubah en cok
    }
    public function failed(){
        return view('failed');
    }
}
