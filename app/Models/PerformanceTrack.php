<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceTrack extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'user_id',
        'tasks',
        'performancerate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
