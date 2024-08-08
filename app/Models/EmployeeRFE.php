<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeRFE extends Model
{
    use HasFactory;
    protected $fillable = [
        'request_type',
        'hr_approve',
        'admin_approve',
        'from_date',
        'to_date',
        'from_ci',
        'to_co',
        'user_id',
        'description'
    ];

    protected $casts = [
        'from_date' => 'date',
        'to_date' => 'date',
        'from_ci' => 'datetime:H:i',
        'to_co' => 'datetime:H:i',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
