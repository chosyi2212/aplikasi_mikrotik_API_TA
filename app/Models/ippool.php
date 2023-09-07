<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ippool extends Model
{
    use HasFactory;
    protected $table ='ippool';
    protected $fillable =[
        'ranges',
    ];
}
