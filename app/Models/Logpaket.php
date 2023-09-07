<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logpaket extends Model
{
    use HasFactory;
    protected $table ='logpaket';
    protected $fillable =[
        'id',
        'pelanggan_id',
        'tempo_id',
        'pakets_id',
        'paket_sebelumnya',
        'harga',
        'status',
        'keterangan',

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
    public function billing()
    {
        return $this->belongsTo(Billing::class, 'id');
    }
}
