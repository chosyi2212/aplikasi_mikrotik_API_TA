<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    protected $table ='billing';
    protected $fillable =[
        'id',
        'pelanggan_id',
        'tempo_id',
        'pakets_id',
        'harga',

    ];
    public function paket()
    {
        return $this->belongsTo(Paket::class, 'pakets_id');
    }
    public function tanggaltempo()
    {
        return $this->belongsTo(Tanggaltempo::class, 'tempo_id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
    public function logpaket()
    {
        return $this->belongsTo(Logpaket::class,'pelanggan_id');
    }

}
