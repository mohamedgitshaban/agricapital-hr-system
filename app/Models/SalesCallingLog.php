<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesCallingLog extends Model
{
    use HasFactory;
    protected $fillable=[
        'clients_id',
        'status',
        "result",
        "reason",
        "date",
        "time"
    ];
}
