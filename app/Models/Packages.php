<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;

    protected $table = 'packages';
    
    protected $fillable = [
       'name',
       'description',
       'amount',
       'market_price',
       'image',
       'status',
       'sub_packages',
       'package_status',
       'direct',
       'passive',
       'fund',
       'affiliate_price'
    ];
}
