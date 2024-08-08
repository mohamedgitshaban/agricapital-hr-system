<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskLog extends Model
{
    use HasFactory;
    protected $fillable = [

        'description',
        'user_id',
        'assigned_by',
        'dependencies',
        'status',
        'priority',
        "starttask",
        'start_date',
        'actualstartdate',
        'end_date',
        'actualenddate',
        'resson',
        'DaysSpent',
        'Taregt',
        'Space',
        'completion_date',
        'rate',
        'notes',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'completion_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function dependencies()
    {
        return $this->belongsTo(TaskLog::class, 'dependencies');
    }
}
