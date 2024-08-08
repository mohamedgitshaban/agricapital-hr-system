<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationAsbuilt extends Model
{
    use HasFactory;
    protected $fillable = [
        'technecal_requests_id',
        'data',
        'date',
        'location'
    ];

    protected $dates = ['date'];

    public function technecalRequest()
    {
        return $this->belongsTo(TechnecalRequest::class, 'technecal_requests_id');
    }
}
