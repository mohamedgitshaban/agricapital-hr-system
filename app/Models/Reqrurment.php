<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reqrurment extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'hrstatus',
        'adminstatus',
        'status',
        'cvs',
        'interviewtime',
        'asignby',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'asignby');
    }
}
