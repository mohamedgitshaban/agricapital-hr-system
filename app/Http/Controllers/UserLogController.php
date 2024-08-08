<?php

namespace App\Http\Controllers;
use App\Models\UserLog;

use Illuminate\Http\Request;

class UserLogController extends Controller
{
     public function index()
    {
        $userLogs = UserLog::with('user')->latest()->get();
        if(!$userLogs->isEmpty()){
            return response()->json(["data"=>$userLogs,"status"=>200]);
        }
        else{
            return response()->json(["data"=>"there is no users","status"=>404]);

        }
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'type' => 'required|in:login,logout',
        ]);

        UserLog::create($validatedData);

        return response()->json(['message' => 'User log stored successfully']);
    }
}
