<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Userpelanggan extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table ='user_pelanggans';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',

    ];
    public function pelanggans()
    {
        return $this->hasOne(Pelanggan::class,'userpelanggans_id');
    }
    public function pakets()
    {
        return $this->hasOne(Paket::class,'pakets_id');
    }
    public function logpaket()
    {
        return $this->hasOne(Logpaket::class,'id');
    }
    public function transkasi()
    {
        return $this->hasOne(Transaksi::class,'id');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
