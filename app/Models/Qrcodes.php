<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qrcodes extends Model
{
    use HasFactory;

    // Specify the table name if it differs from the default naming convention
    protected $table = 'Qrcode';

    protected $fillable = [
        'id',
        'name', // Consider removing the comment or making it more informative
        'phone',
        'email',
        'profile_image', // Consider removing the comment or making it more informative
        'JobTitel', // Consider renaming to 'job_title' to follow convention
        'national_id',
        'hrcode',
        'location',
        'employee_date',
        'qrcode','name_ar','JobTitel_ar',
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
