<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'Date',
        'Clock_In',
        'Clock_Out',
        'Must_C_In',
        'Must_C_Out',
        'Absent',
        'late',
        'note',
        'Work_Time',
        'Exception',
        'addetion',
        'deduction',
        'created_at'
    ];
    protected $casts = [
        'addetion' => 'float',
        'deduction' => 'float',
        'Absent' => 'boolean',

        'Must_C_In' => 'boolean',
        'Must_C_Out' => 'boolean',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
