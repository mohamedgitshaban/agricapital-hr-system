<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',//
        'user_id',//
        'Date',//
        'workdays',//
        'holidays',//
        'attendance',//
        'PresenceMargin',
        'excuses',//
        'additions',//
        'deductions',//
        'dailyrate',//
        'paiddays',//
        'SocialInsurance',//
        'MedicalInsurance',//
        'tax',//
        'TotalPay',
        'TotalLiquidPay',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    }
