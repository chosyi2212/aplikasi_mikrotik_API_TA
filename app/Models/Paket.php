<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $fillable =[
        'namapaket',
        'kecepatan',
        'harga',
    ];

    public function pelanggans()
    {
        return $this->belongsTo(Pelanggan::class,'pakets_id');
    }
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
    public function billing()
    {
        return $this->hasMany(Billing::class,'pakets_id');
    }
    public function logpaket()
    {
        return $this->belongsTo(Logpaket::class,'pakets_id');
    }
}
