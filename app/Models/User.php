<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile_no',
        'state',
        'ref_by_user',
        'package_id',
        'status',
        'user_pass',
        'terms_accept',
        'bank_name',
        'account_no',
        'ifsc_code',
        'referral_code',
        'gender',
        'dob',
        'address',
        'city',
        'profile_pic',
        'pin_code',
        'order_status',
        'enable_third_tier',
        'enable_team_helping',
        'show_only_courses',
        'is_show_leaderboard',
        'enable_account',
        'sponsor_comm',
        'timestamp',
        'role',
        'paymentMode'
    ];

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


    public function getState(){
        return $this->belongsTo(States::class, 'state', 'id');   
    }

    public function getRefBy(){
        return $this->belongsTo(User::class, 'ref_by_user', 'id');   
    }

    public function getCourses(){
        return $this->belongsTo(Packages::class, 'package_id', 'id');   
    }

}
