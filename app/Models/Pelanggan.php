<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table ='pelanggans';
    protected $primaryKey = 'pelanggan_id';
    public $incrementing = false;
    protected $fillable =[
        'pelanggan_id',
        'userpelanggans_id',
        'full_name',
        'passpppoe',
        'pakets_id',
        'alamat',
        'status',
        'billing_id',
        'no_telfon',
    ];
    // function generatePelangganId()
    // {
    //     $timestamp = now()->timestamp;
    //     $randomNumber = mt_rand(1000, 9999);
    //     return 'AZZH-' . $timestamp . '-' . $randomNumber;
    // }
    public static function getId()
    {
        return $getId = DB::table('pelanggans')->orderBy('id','DESC')->take(1)->get();
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class,'pakets_id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class,'pelanggan_id');
    }
    public function logpaket()
    {
        return $this->hasMany(Logpaket::class,'pelanggan_id');
    }
    public function userpelanggan()
    {
        return $this->belongsTo(Userpelanggan::class,'userpelanggans_id');
    }
    public function billing()
    {
        return $this->belongsTo(Billing::class,'id');
    }
}
