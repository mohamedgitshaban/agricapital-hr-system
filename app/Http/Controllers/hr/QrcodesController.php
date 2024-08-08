<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Models\Qrcodes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Storage;

use Maatwebsite\Excel\Facades\Excel;

class QrcodesController extends Controller
{

    public function index()
    {
        $Qrcodess = Qrcodes::select(
                "id",
                'name',
                'phone',
                'email',
                'profile_image',
                'name_ar',
                'national_id',
                'hrcode',
                'location',
                'JobTitel',
                'JobTitel_ar',
                'employee_date',
                'qrcode',
            )->orderBy('created_at', 'desc')
            ->get();
        if (!$Qrcodess->isEmpty()) {
            return response()->json(["data" => $Qrcodess, "status" => Response::HTTP_OK]);
        } else {
            return response()->json(["data" => "there is no Employee", "status" => Response::HTTP_NO_CONTENT ]);
        }
    }

 public function create(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'name_ar' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'profile_image' => 'required|file',
        'JobTitel_ar' => 'required',
        'national_id' => 'required',
        'hrcode' => 'required',
        'JobTitel' => 'required',
        'location' => 'required',
        'employee_date' => 'required|date',
    ]);

    if ($validator->fails()) {
        return response()->json(["data"=>$validator->errors(),"status"=> 422]);
    }

    $vali = $validator->validated();

    $image = $request->file('profile_image');
    $imageName = time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('images'), $imageName);
    $vali["profile_image"] = "images/" . $imageName;

    $Qrcodes = Qrcodes::create($vali);

    // Generate and save QR code
    $qrCodeContent = 'http://scan.agricapital-eg.com/employeescan/' . $Qrcodes->id;
    $qrCode = QrCode::format('png')->style('round')->size(120)->generate($qrCodeContent);
    $qrCodeName = $Qrcodes->hrcode . '.png';
    $qrCodePath = public_path('images/' . $qrCodeName);

    // Save QR code to the public/images folder
    file_put_contents($qrCodePath, $qrCode);

    // Update the Qrcodes record with the QR code path
    $Qrcodes->update(['qrcode' => 'images/' . $qrCodeName]);

    return response()->json(["data" => $Qrcodes, "status" => 201]);
}


    public function updateById(Request $request, $id)
    {
        $employee = Qrcodes::find($id);
        if (!$employee) {
            return response()->json(['error' => 'Qrcodes not found'], 404);
        }
       else{
        $validator = Validator::make($request->all(), [
           'name' => 'required',
        'name_ar' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'JobTitel_ar' => 'required',
        'national_id' => 'required',
        'hrcode' => 'required',
        'JobTitel' => 'required',
        'location' => 'required',
        'employee_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(["data"=>$validator->errors(),"status"=>203]);
        }
        $vali= $validator->validated();
        // return response()->json(["data"=>$vali,"status"=> 201]);
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $vali["profile_image"] = "images/" . $imageName;
        }
        Qrcodes::where("id","=",$id)->update($vali);
        return response()->json(["data"=>"updated succeful","status"=> 201]);
       }
    }
    public function show($id)
    {
        $Qrcodes = Qrcodes::find($id);
        if ($Qrcodes != null) {
            return response()->json(["data" => $Qrcodes, "status" => Response::HTTP_OK]);
        } else {
            return response()->json(["data" => "there is no Qrcodes", "status" => Response::HTTP_NO_CONTENT]);
        }
    }

    public function destroyByid($id)
    {
        $Qrcodes = Qrcodes::find($id);

        if ($Qrcodes) {
            $Qrcodes->delete();

            return response()->json(['message' => 'Qrcodes deleted'], Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'Qrcodes not found'], Response::HTTP_NO_CONTENT);
        }
    }

}
