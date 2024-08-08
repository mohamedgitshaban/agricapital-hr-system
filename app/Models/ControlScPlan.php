<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlScPlan extends Model
{
    use HasFactory;
     protected $fillable = ['Priority','Deadline','financewait','financestart', 'time',"source", 'from', 'price','pricestate', 'description', 'status'];

     public function ToLocationS()
    {
        return $this->hasMany(ToLocation::class, 'control_sc_plan_id');
    }
}
