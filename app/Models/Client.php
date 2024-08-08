<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        'name',
        'phone',
        'email',
        'source',
        'type',
        'status',
        'company',
        'Job_role',
    ];
    public function salesCrms()
    {
        return $this->hasMany(SalesCrm::class, 'clients_id');
    }
}
