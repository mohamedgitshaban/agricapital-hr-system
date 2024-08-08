<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageData extends Model
{
    use HasFactory;
    protected $fillable = [
        'technecal_requests_id',
        'Packedgestatus',
        'Packedgestartdate',
        'Packedgeenddate',
        'Packedgedata'
    ];

    public function technecalRequest()
    {
        return $this->belongsTo(TechnecalRequest::class, 'technecal_requests_id');
    }

}
