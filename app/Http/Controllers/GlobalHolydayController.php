<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpFoundation\Response;
use App\Models\GlobalHolyday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GlobalHolydayController extends Controller
{
    // Index action to display all global holidays
    public function index()
    {
        $holidays = GlobalHolyday::latest()
        ->get();
        if (!$holidays->isEmpty()) {
            return response()->json(["data" => $holidays, "status" => Response::HTTP_OK]);
        }
        else {
            return response()->json(["data" => "There is No Data", "status" => Response::HTTP_NO_CONTENT ]);
        }
       
      
    }

    // Store the newly created global holiday
    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'date' => 'required|date',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $validatedData = $validator->validated();

    // Check if a record with the same date already exists
    $existingHoliday = GlobalHolyday::where('date', $validatedData['date'])->first();

    if ($existingHoliday) {
        return response()->json(['message' => 'Holiday with this date already exists.'], 409);
    } else {
        $holiday = GlobalHolyday::create($validatedData);
        return response()->json(['holiday' => $holiday, 'message' => 'Global holiday created successfully.'], 201);
    }
}


    // Update the specified global holiday in storage
    // public function update(Request $request, GlobalHoliday $holiday)
    // {
    //     $holiday->update($request->all());
    //     return redirect()->route('global_holidays.index')->with('success', 'Global holiday updated successfully.');
    // }

    // Remove the specified global holiday from storage
    public function destroy($id)
    {
        $holiday = GlobalHolyday::find($id);

        if ($holiday) {
            $holiday->delete();

            return response()->json(['message' => 'holiday deleted',"status"=>"202"], Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'holiday not found'], Response::HTTP_NO_CONTENT);
        }
       
    }
}
