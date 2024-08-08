<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\hr\AttendanceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\hr\PayrollController;
use App\Http\Controllers\hr\EmployeeWarningController;
use App\Http\Controllers\hr\EmployeeRFEController;
use App\Http\Controllers\UserLogController;
use App\Http\Controllers\GlobalHolydayController;
use App\Http\Controllers\hr\QrcodesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix'=>'v1'],function(){
    Route::post('/login', [UserController::class,"login"]);
     Route::middleware('auth:sanctum')->group(function () {
        Route::post('user-logs', [UserLogController::class, 'store']);
        Route::get('user-logs', [UserLogController::class, 'index']);
        Route::post('/logout', [UserController::class,"logout"]);
    Route::group(['prefix'=>'users',],function () {

        Route::get('/', [UserController::class,"index"]);
        Route::get('/getUsersWithWarningCounts', [EmployeeWarningController::class,"index"]);
        Route::get('/{id}/addWarning', [EmployeeWarningController::class,"addwarnig"]);
        Route::get('/{id}', [UserController::class,"show"])->where('id', '[0-9]+');
        Route::post('/{id}/incress', [UserController::class,"incress"])->where('id', '[0-9]+');
        Route::post('/{id}/decress', [UserController::class,"decress"])->where('id', '[0-9]+');
        Route::get('/profile', [UserController::class,"user"]);
        Route::post('/create', [UserController::class,"create"]);
        Route::delete('/{id}', [UserController::class,"destroy"])->where('id', '[0-9]+');
        Route::post('/{id}/update', [UserController::class,"update"])->where('id', '[0-9]+');
        Route::post('/updateProfile', [UserController::class,"updateProfile"]);
        Route::get('/download/{filename}', [UserController::class,"downloadPDF"]);
        Route::get('/getLastLogin', [UserController::class,"getLastLogin"]);

    });


    Route::group(['prefix'=>'Requestfe',],function () {
        Route::get('/', [EmployeeRFEController::class,"index"]);
        
        Route::post('/create', [EmployeeRFEController::class,"store"]);
        Route::post('/{id}/hrapprove', [EmployeeRFEController::class,"hrapprove"])->where('id', '[0-9]+');
        Route::post('/{id}/hrreject', [EmployeeRFEController::class,"hrreject"])->where('id', '[0-9]+');
        Route::post('/{id}/adminapprove', [EmployeeRFEController::class,"adminapprove"])->where('id', '[0-9]+');
        Route::post('/{id}/adminreject', [EmployeeRFEController::class,"adminreject"])->where('id', '[0-9]+');
        Route::get('/{id}', [EmployeeRFEController::class,"show"])->where('id', '[0-9]+');
        Route::post('/{id}/update', [EmployeeRFEController::class,"update"]);
        Route::delete('/{id}', [EmployeeRFEController::class,"destroy"]);
    });

    Route::group(['prefix'=>'payroll',],function () {
        Route::get('/', [PayrollController::class,"index"]);
        Route::post('/create', [PayrollController::class,"store"]);
        Route::get('/{id}', [PayrollController::class,"show"])->where('id', '[0-9]+');
        Route::delete('/{id}', [PayrollController::class,"destroy"]);
    });
            Route::post('/sammry', [PayrollController::class,"sammry"]);

    Route::group(['prefix'=>'attendance',],function () {
        Route::get('/', [AttendanceController::class,"index"]);
        Route::get('/employeeattendance', [AttendanceController::class,"employeeattendance"]);
        Route::post('/create', [AttendanceController::class,"store"]);
        Route::post('/createmanual', [AttendanceController::class,"createmanual"]);
        Route::get('/{id}', [AttendanceController::class,"show"]);
        Route::post('/{id}/update', [AttendanceController::class,"updateById"]);
        // Route::put('/update', [AttendanceController::class,"updateByDate"]);
        // Route::delete('/', [AttendanceController::class,"destroyByRangeDate"]);
        Route::delete('/{id}', [AttendanceController::class,"destroyByid"]);
        Route::post('/{id}/addetion', [AttendanceController::class,"addetion"]);
        Route::post('/{id}/deduction', [AttendanceController::class,"deduction"]);
        Route::post('/{id}/deductiondata', [AttendanceController::class,"deductiondata"]);

    });
    Route::group(['prefix'=>'globalholyday',],function () {
        Route::get('/', [GlobalHolydayController::class,"index"]);
        Route::post('/create', [GlobalHolydayController::class,"store"]);
        Route::delete('/{id}', [GlobalHolydayController::class,"destroy"]);


    });
        Route::group(['prefix'=>'qrcode',],function () {
        Route::get('/', [QrcodesController::class,"index"]);
        Route::post('/create', [QrcodesController::class,"create"]);
        Route::post('/{id}/update', [QrcodesController::class,"updateById"]);
        Route::get('/{id}', [QrcodesController::class,"show"]);
        Route::delete('/{id}', [QrcodesController::class,"destroyByid"]);


    });

    });
 });
