<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesCrm extends Model
{
    use HasFactory;
    protected $fillable = [
        'clients_id',
        'location',
        'description',
        'status',
        "tasbuilt",
        'reason',
        'grade',
        'Qutationstatus',
        'Qutationstartdate',
        'Qutationenddate',
        'Qutationdata',
        "offerstartdate",
        "offerenddate",
        "offerdata",
        "offerstatus",
        "qutationadminreason",
        "qutationclientreason",
        "contract",
        "contractValue",
    ];

    protected $dates = ['Qutationstartdate', 'Qutationenddate'];


    public function client()
    {
        return $this->belongsTo(Client::class, 'clients_id');
    }
}
