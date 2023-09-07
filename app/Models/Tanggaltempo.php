<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggaltempo extends Model
{
    use HasFactory;
    protected $table ='tanggaltempo';
    protected $fillable =[
        'bulan',
        'tahun',
    ];
    public function bill()
    {
        return $this->hasMany(Billing::class,'tempo_id');
    }
    public function logpaket()
    {
        return $this->belongsTo(Logpaket::class,'tempo_id');
    }
}
