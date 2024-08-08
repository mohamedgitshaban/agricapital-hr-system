<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\EmployeeRFE;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        "hr_code",
        'password',
        'remember_token',
        'date',//birth date
        'address',
        'salary',
        'profileimage',
        'department',
        'job_role',
        'job_tybe',
        'pdf',
        'Supervisor',
        'phone',
        'MedicalInsurance',
        'SocialInsurance',
        'EmploymentDate',
        'EmploymentDateEnd',
        'isemploee',
        'kpi',
        'tax',
        'TimeStamp',
        'grade',
        'segment',
        'startwork',
        'endwork',
        'clockin',
        'clockout',
        'Reason',
        'last_login',
        "financeaccess",
        "hraccess",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];
    public function employeeRFE()
    {
        return $this->hasMany(EmployeeRFE::class);
    }
    public function supervisor()
    {
        return $this->belongsTo(User::class, 'Supervisor');
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

}
