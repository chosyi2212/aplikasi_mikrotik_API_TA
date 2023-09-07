<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouterConnect extends Model
{
    use HasFactory;
    protected $table ='router_connect';
    protected $fillable = [
        'name',
        'ip',
        'username',
        'password',
        'status',
    ];
}
