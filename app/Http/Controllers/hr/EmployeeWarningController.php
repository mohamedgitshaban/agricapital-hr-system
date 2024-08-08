<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\EmployeeWarning;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EmployeeWarningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $User = User::leftJoin('employee_warnings', function($join) {
            $join->on('users.id', '=', 'employee_warnings.user_id')
                ->whereRaw('MONTH(employee_warnings.created_at) = MONTH(NOW())');
        })->where('users.isemploee', '=', true)
        ->select('users.name','users.hr_code','users.department',"users.profileimage", 'users.id', DB::raw('COUNT(employee_warnings.user_id) as warning_count'))
        ->groupBy('users.id', 'users.name','users.hr_code','users.department',"users.profileimage")
        ->get();

    return response()->json(["data" => $User, "status" => 200]);

    }

    public function addwarnig($id)
    {   $warning=new EmployeeWarning();
        $warning->user_id=$id;
        $warning->save();
        $this->index();
    }

}
