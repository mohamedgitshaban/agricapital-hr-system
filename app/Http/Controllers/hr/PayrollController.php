<?php

namespace App\Http\Controllers\hr;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\User;
use Carbon\CarbonTimeZone;
use App\Models\payroll;
use App\Models\Attendance;
use App\Models\GlobalHolyday;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Http\Request;

class PayrollController extends Controller
{

    public function index()
    {
        $payrolls=payroll::join("users",'users.id', '=', 'payrolls.user_id')
        ->select('users.id as userid','payrolls.id as id',
        'users.hr_code as hr_code',
        'users.name',
        'users.department',
        'users.salary',
        'users.kpi',
        'users.Supervisor',
        'payrolls.Date',
        'workdays',
        'holidays',
        'attendance',
        'PresenceMargin',
        'excuses',
        'additions',
        'deductions',
        'dailyrate',
        'paiddays',
        'payrolls.SocialInsurance',
        'payrolls.MedicalInsurance',
        'payrolls.tax',
        'TotalPay',
        'TotalLiquidPay',
        )
        ->orderBy('users.salary')->get();


         return response()->json(["data" => $payrolls, "status" => Response::HTTP_OK]);

    }
    public function storeForUser($userId, $date)
    {
        $date = Carbon::parse($date);
        $date2 = $date->copy()->endOfMonth();
        $period = CarbonPeriod::create($date, $date2);
        $numberOfDays = iterator_count($period);
    
        $user = User::find($userId);
    
        if (!$user) {
            return response()->json(["data" => "User not found", "status" => Response::HTTP_NO_CONTENT]);
        }
    
        $workingDays = 0;
        $AttendanceCount = Attendance::where('user_id', $user->id)->where("Absent", "0")->whereBetween('Date', [$date, $date2])->count();
    
        $PayrollUser = new payroll();
        $PayrollUser->user_id = $user->id;
        $PayrollUser->Date = $date;
    
        if ($user->startwork == "Sunday") {
            Carbon::setWeekendDays([Carbon::FRIDAY, Carbon::SATURDAY]);
        } else {
            Carbon::setWeekendDays([Carbon::FRIDAY]);
        }
    
        foreach ($period as $perioddate) {
            if ($perioddate->isWeekday()) {
                $workingDays += 1;
            }
        }
    
        $globalholyday = GlobalHolyday::whereBetween('date', [$date, $date2])->count();
        $PayrollUser->workdays = $workingDays - $globalholyday;
    
        $holidays = $numberOfDays - $workingDays + $globalholyday;
        $PayrollUser->holidays = $holidays;
        $PayrollUser->attendance = $AttendanceCount;
        $PayrollUser->PresenceMargin = 1;
        $excuses = 0;
        $addetion = Attendance::where('user_id', $user->id)->whereBetween('Date', [$date, $date2])->where('Absent', '!=', "1")->sum("addetion");
        $deduction = Attendance::where('user_id', $user->id)->whereBetween('Date', [$date, $date2])->where('Absent', '!=', "1")->sum("deduction");
    
        $PayrollUser->excuses = $excuses;
        $PayrollUser->additions = $addetion;
        $PayrollUser->deductions = $deduction;
        $dailyrate = $user->salary / 31;
        $PayrollUser->dailyrate = $dailyrate;
    
        $paidday = $excuses + $AttendanceCount + $holidays + $addetion - $deduction;
        $PayrollUser->paiddays = $AttendanceCount > 0 ? $paidday : 0;
        $PayrollUser->SocialInsurance = $user->SocialInsurance;
        $PayrollUser->MedicalInsurance = $user->MedicalInsurance;
        $PayrollUser->tax=$user->tax;

        $PayrollUser->TotalLiquidPay=$paidday*$dailyrate;
        $PayrollUser->TotalPay=($paidday*$dailyrate)-$user->tax+$user->MedicalInsurance+$user->SocialInsurance;
               
        $PayrollUser->save();
    
        return response()->json(["data" => $PayrollUser, "status" => Response::HTTP_OK]);
    }
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'Date' => ['required', 'regex:/^\d{4}-(0[1-9]|1[0-2])$/'],
        ],[
            'Date.regex' => 'The :attribute must be in the format YYYY-MM.',
        ]);
        if ($validatedData->fails()) {
            return response()->json(['errors' => $validatedData->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        else{
            $validatedData = $validatedData->validated();
            $Users=User::latest()->get();
            if($Users->isEmpty()){
                return response()->json(["data"=>"there is no emploee ","status"=>Response::HTTP_NO_CONTENT]);
            }
           else{
                $date = Carbon::createFromFormat('Y-m', $validatedData["Date"])->startOfMonth();
                $date2 = Carbon::createFromFormat('Y-m', $validatedData["Date"])->endOfMonth();


                $period = CarbonPeriod::create($date, $date2);
                // dd($period);

                $numberOfDays = iterator_count($period);
                // dd($numberOfDays);
                foreach ($Users as $user) {
                $workingDays=0;
                $AttendanceCount = Attendance::where('user_id', $user->id)->where("Absent","0")->whereBetween('Date', [$date, $date2])->count();

                $PayrollUser= new payroll();
                $PayrollUser->user_id= $user->id;
                $PayrollUser->Date=$date;
                    if($user->startwork=="Sunday"){
                        Carbon::setWeekendDays([Carbon::FRIDAY, Carbon::SATURDAY]);
                    }
                    else{
                        Carbon::setWeekendDays([Carbon::FRIDAY]);
                    }
                foreach ($period as $perioddate) {
                    // Exclude weekends (Saturday and Sunday)
                    if ($perioddate->isWeekday()) {
                        // Exclude public holidays in Egypt
                            $workingDays+=1;
                    }
                }
                $globalholyday = GlobalHolyday::whereBetween('date', [$date,  $date2])->count("date");
                $PayrollUser->workdays=$workingDays-$globalholyday;


                $holidays=$numberOfDays-$workingDays+$globalholyday;
                $PayrollUser->holidays=$holidays;
                $PayrollUser->attendance=$AttendanceCount;
                $PayrollUser->PresenceMargin=1;
                $excuses = 0;
                $addetion = Attendance::where('user_id', $user->id)->whereBetween('Date', [$date,  $date2])->where('Absent', '!=', "1")->sum("addetion");
               
                $deduction = Attendance::where('user_id', $user->id)->whereBetween('Date', [$date,  $date2])->where('Absent', '!=', "1")->sum("deduction");
               
                $PayrollUser->excuses=$excuses;
                $PayrollUser->additions=$addetion;
                $PayrollUser->deductions=$deduction;
                $dailyrate=$user->salary/31;
                $PayrollUser->dailyrate= $dailyrate;

                $paidday=$excuses+ $AttendanceCount+$holidays+$addetion-$deduction;
                if($AttendanceCount>0){
                    $PayrollUser->paiddays=$paidday;
                }
                else{
                    $PayrollUser->paiddays=0;
                }
                $PayrollUser->SocialInsurance=$user->SocialInsurance;
                $PayrollUser->MedicalInsurance=$user->MedicalInsurance;
                $PayrollUser->tax=$user->tax;
                $PayrollUser->TotalLiquidPay=$paidday*$dailyrate;
                $PayrollUser->TotalPay=($paidday*$dailyrate)-$user->tax+$user->MedicalInsurance+$user->SocialInsurance;
                $PayrollUser->save();
            }
            return response()->json(['message' => "hello"], Response::HTTP_OK);

            }
        }



    }
    
    public function Sammry(Request $request)
    {
        // Validate the request data
        $validatedData = Validator::make($request->all(), [
            'fromDate' => ['required', 'date_format:Y-m-d'],
            'toDate' => ['required', 'date_format:Y-m-d', 'after_or_equal:fromDate'],
        ], [
            'fromDate.required' => 'The fromDate field is required.',
            'fromDate.date_format' => 'The fromDate must be in the format YYYY-MM-DD.',
            'toDate.required' => 'The toDate field is required.',
            'toDate.date_format' => 'The toDate must be in the format YYYY-MM-DD.',
            'toDate.after_or_equal' => 'The toDate must be equal to or after the fromDate.',
        ]);
    
        // Check for validation errors
        if ($validatedData->fails()) {
            return response()->json(['errors' => $validatedData->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    
        // Extract and parse the validated data
        $validatedData = $validatedData->validated();
        $fromDate = Carbon::createFromFormat('Y-m-d', $validatedData["fromDate"])->startOfDay();
        $toDate = Carbon::createFromFormat('Y-m-d', $validatedData["toDate"])->endOfDay();
    
        // Fetch users
        $users = User::latest()->where("isemploee",1)->get();
    
        if ($users->isEmpty()) {
            return response()->json(["data" => "There are no employees.", "status" => Response::HTTP_NO_CONTENT]);
        }
    
        // Initialize an array to store payroll data
        $payrolls = [];
    
        // Iterate through each user to calculate payroll data
        foreach ($users as $user) {
            $workingDays = 0;
          $attendanceCount = Attendance::where('user_id', $user->id)
    ->where('Absent', '0')
    ->whereBetween('Date', [$fromDate, $toDate])
    ->whereNotIn('Date', function ($query) {
        $query->select('date')
              ->from('global_holydays');
    })
    ->count();
    
            if ($user->startwork == "Sunday") {
                Carbon::setWeekendDays([Carbon::FRIDAY, Carbon::SATURDAY]);
            } else {
                Carbon::setWeekendDays([Carbon::FRIDAY]);
            }
    
            $period = CarbonPeriod::create($fromDate, $toDate);
            foreach ($period as $periodDate) {
                if ($periodDate->isWeekday()) {
                    $workingDays += 1;
                }
            }
    
            $globalHolidayCount = GlobalHolyday::whereBetween('date', [$fromDate, $toDate])->count();
            $totalWorkdays = $workingDays - $globalHolidayCount;
            $holidays = $period->count() - $workingDays + $globalHolidayCount;
    
            $excuses = 0;
            $additions = Attendance::where('user_id', $user->id)
                ->whereBetween('Date', [$fromDate, $toDate])
                ->where('Absent', '!=', "1")
                ->sum("addetion");
    
            $deductions = Attendance::where('user_id', $user->id)
                ->whereBetween('Date', [$fromDate, $toDate])
                ->where('Absent', '!=', "1")
                ->sum("deduction");
    
            $dailyRate = $user->salary / ($totalWorkdays+$holidays);
            $paidDays = $excuses + $attendanceCount + $holidays + $additions - $deductions;
    
            $payrollData = [
                'user_id' => $user->id,
                'hr_code' => $user->hr_code,
                'name' => $user->name,
                'department' => $user->department,
                'salary' => $user->salary,
                'kpi' => $user->kpi,
                'Supervisor' => $user->Supervisor,
                'Date' => $fromDate,
                'workdays' => $totalWorkdays,
                'holidays' => $holidays,
                'attendance' => $attendanceCount,
                'PresenceMargin' => 1,
                'excuses' => $excuses,
                'additions' => $additions,
                'deductions' => $deductions,
                'dailyrate' => $dailyRate,
                'paiddays' => $attendanceCount > 0 ? $paidDays : 0,
                'SocialInsurance' => $user->SocialInsurance,
                'MedicalInsurance' => $user->MedicalInsurance,
                'tax' => $user->tax,
                'TotalPay' => $paidDays * $dailyRate,
                'TotalLiquidPay' => ($paidDays * $dailyRate)-$user->SocialInsurance,
            ];
    
            // Store the payroll data in the array
            $payrolls[] = $payrollData;
        }
    
        // Return the payroll data as a JSON response
        return response()->json(['payrolls' => $payrolls], Response::HTTP_OK);
    }
    

    private function isPublicHoliday($date)
    {


        $publicHolidays = [
            // Example public holidays in Egypt
            '2023-12-25', // Christmas Day
        ];

        return in_array($date->toDateString(), $publicHolidays);
    }

    public function show($id)
    {
        $payroll=payroll::find($id);
        if($payroll!=null){
            return response()->json(["data"=>$payroll,"status"=>Response::HTTP_OK]);
        }
        else{
            return response()->json(["data"=>"there is no excuses","status"=>Response::HTTP_NOT_FOUND ]);

        }
    }
    public function destroy($id)
    {
        $payroll=payroll::find($id);

        if ($payroll){
            $payroll->delete();

            return response()->json(['message' => 'payroll deleted'], Response::HTTP_OK);
        }
        else{
            return response()->json(['message' => 'payroll not found'], Response::HTTP_NOT_FOUND );
        }
    }
}
