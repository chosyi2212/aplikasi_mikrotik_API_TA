<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';

    protected $fillable =[

        'infoice_id',
        'pelanggan_id',
        'pakets_id',
        'tanggaltempo_id',
        'logpaket_id',
        'harga',
        'status',
        'photo',
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class,'pakets_id');
    }

    public function bulantempo()
    {
        return $this->belongsTo(Tanggaltempo::class,'tanggaltempo_id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
    public static function searchByName($name)
    {
        return static::where('name', $name)->get();
    }
    public function logpaket()
    {
        return $this->belongsTo(Logpaket::class,'pelanggan_id');
    }
}
