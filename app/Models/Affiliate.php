<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use HasFactory;

    protected $table = 'affiliate';
    
    protected $fillable = [
       'user_id',
       'package_id',
       'send_by',
       'amount',
       'parents',
       'status',
       'timestamp',
       'total_parents',
       'order_id'
    ];
}
