<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnecalRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'sales_crms_id',
        'qcstatus',
        'Reason',
        'qcstartdate',
        'qcenddate',
        'qcdata',
        'Packedgestatus',
        'Packedgestartdate',
        'Packedgeenddate',
        'Packedgedata',
        'asbuildrequest'
    ];

    protected $dates = ['qcstartdate', 'qcenddate', 'Packedgestartdate', 'Packedgeenddate'];

    public function packageData()
    {
        return $this->hasOne(PackageData::class);
    }
    public function salesCrm()
    {
        return $this->belongsTo(SalesCrm::class, 'sales_crms_id');
    }
    public function operationAsbuilts()
    {
        return $this->hasMany(OperationAsbuilt::class, 'technecal_requests_id');
    }
}
