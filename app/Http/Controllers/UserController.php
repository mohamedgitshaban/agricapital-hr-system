<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
class UserController extends Controller
{
   public function index()
    {
        $User=User::latest()->get();
        if(!$User->isEmpty()){
            return response()->json(["data"=>$User,"status"=>200]);
        }
        else{
            return response()->json(["data"=>"there is no users","status"=>404]);

        }
    }

    public function create(Request $request) {

        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8',
            'password_confirm' => 'required|same:password',
            'date' => 'required|date',
            'hr_code' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'profileimage' => 'required|image|mimes:jpg,bmp,png,jpeg',
            'salary' => 'required|numeric',
            'Trancportation' => 'required|numeric',
            'kpi' => 'required|numeric',
            'tax' => 'required|numeric',
            'Supervisor' => 'required|exists:users,id',
            'EmploymentDate' => 'required|date',
            'MedicalInsurance' => 'required|numeric',
            'SocialInsurance' => 'required|numeric',
            'phone' => 'required|string',
            'department' => 'required|string|max:255',
            'job_role' => 'required|string|max:255',
            'job_tybe' => 'required|string|max:255',
            'pdf' => 'required|file',
            'TimeStamp' => 'required|string',
            'grade' => 'required|string',
            'segment' => 'required|string',
            'startwork' => 'required|string',
            'endwork' => 'required|string',
            'clockin' => 'required|date_format:H:i',
            'clockout' => 'required|after_or_equal:clockin|date_format:H:i',
        ]);
        if ($validatedData->fails()) {
            return response()->json(['errors' => [$validatedData->errors(),$request->all()],"status"=>Response::HTTP_UNAUTHORIZED],Response::HTTP_OK );
        }
       else{
        $validator = $validatedData->validated();
        $file=$request->file('pdf');
        $fileName = time().'.'.$file->getClientOriginalExtension();
        $validator["pdf"]= '/uploads/userdoc/'.$fileName;
        // Move the file to the desired location
        $file->move(public_path('uploads/userdoc'), $fileName);

        $file=$request->file('profileimage');
        $fileName = time().'.'.$file->getClientOriginalExtension();
        $validator["profileimage"]= '/uploads/profileimages/'.$fileName;
        // Move the file to the desired location
        $file->move(public_path('uploads/profileimages'), $fileName);

        // Validation passed, create the user
        User::create($validator);

        return response()->json(['message' => 'User created successfully',"status"=> Response::HTTP_OK]);
       }
    }

    public function downloadPDF($filename)
    {
        $filePath = public_path( $filename);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return response()->json(['message' => 'PDF file not found'], 404);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::with('supervisor')->find($id);

        if ($user != null) {
            $user->password_confirm=$user->password;
            if ($user->supervisor != null) {
                $supervisorName = $user->supervisor->name;
            } else {
                $supervisorName = "No Manger";
            }

            // Modify the user object to include the supervisor name
            $user->supervisor_name = $supervisorName;

            return response()->json(["data" => $user, "status" => 202]);
        } else {
            return response()->json(["data" => "There is no user with the provided ID", "status" => 404]);
        }
    }


    public function incress($id)
    {
        $User=User::find($id);
        if($User!=null){
            $User->VacationBalance=$User->VacationBalance+1;
            $User->save();
            return response()->json(["data"=>$User,"status"=>202]);
        }
        else{
            return response()->json(["data"=>"there is no users","status"=>404]);

        }

    }
    public function decress($id)
    {
        $User=User::find($id);
        if($User!=null){
            $User->VacationBalance=$User->VacationBalance-1;
            $User->save();
            return response()->json(["data"=>$User,"status"=>202]);
        }
        else{
            return response()->json(["data"=>"there is no users","status"=>404]);

        }

    }
    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
                'max:255',
            ],
            'date' => 'required|date',
            'hr_code' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'salary' => 'required|numeric',
            // 'Trancportation' => 'required|numeric',
            'password' => 'required|string|min:8',
            'password_confirm' => 'required|string|min:8',
            'kpi' => 'required|numeric',
            'tax' => 'required|numeric',
            'Supervisor' => 'required|exists:users,id',
            'EmploymentDate' => 'required|date',
            'MedicalInsurance' => 'required|numeric',
            'SocialInsurance' => 'required|numeric',
            'phone' => 'required|string',
            'department' => 'required|string|max:255',
            'job_role' => 'required|string|max:255',
            'job_tybe' => 'required|string|max:255',
            'TimeStamp' => 'required|string',
            'grade' => 'required|string',
            'segment' => 'required|string',
            'startwork' => 'required|string',
            'endwork' => 'required|string',
            'clockin' => 'required|date_format:H:i:s',
            'clockout' => 'required|after_or_equal:clockin|date_format:H:i:s',
        ]);
        if ($validatedData->fails()) {
            return response()->json(['errors' => [$validatedData->errors(),$request->all()],"status"=>Response::HTTP_UNAUTHORIZED],Response::HTTP_OK );
        }
       else{
        $validator = $validatedData->validated();
        $user=User::find($id);
        if ($request->hasFile('profileimage')) {
            $file=$request->file('profileimage');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $validator["profileimage"]= '/uploads/profileimages/'.$fileName;
            $file->move(public_path('uploads/profileimages'), $fileName);

        }
        if ($request->hasFile('pdf')) {
            $file=$request->file('pdf');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $validator["pdf"]='/uploads/userdoc'. $fileName;
            // Move the file to the desired location
            $file->move(public_path('uploads/userdoc'), $fileName);
        }
        if($validator["password"]==$validator["password_confirm"]){
            if($validator["password"]!=$user->password){
                $validator["password"]=Hash::make($validator["password"]);
            }
        }
        // Validation passed, create the user
        $user->update($validator);

        return response()->json(['message' => 'User updated successfully',"status"=>Response::HTTP_OK], 200);
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        // $validatedData = Validator::make($request->all(), [
        //     'Reason' => 'required|string|max:255',
        // ]);
        // if ($validatedData->fails()) {
        //     return response()->json(['errors' => [$validatedData->errors(),$request->all()],"status"=>Response::HTTP_UNAUTHORIZED],Response::HTTP_OK );
        // }
        $User=User::find($id);

        if ($User){
            // $validatedData = $validatedData->validated();
            $User->isemploee=false;
            // $User->Reason=$validatedData["Reason"];
            $User->EmploymentDateEnd=now();
            $User->save();

            return response()->json(['message' => 'User deleted'], 202);
        }
        else{
            return response()->json(['message' => 'User not found'], 404);
        }
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Validation Error',
                'message' => $validator->errors(),
                'status'=>Response::HTTP_BAD_REQUEST
            ], Response::HTTP_OK);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'error' => 'Invalid Credentials',
                'message' => 'Invalid email or password',
                'status'=>Response::HTTP_UNAUTHORIZED
            ], Response::HTTP_OK);
        }

        $user = Auth::user();
        $token = $user->createToken("token")->plainTextToken;
        $cookie = cookie('jwt', $token, 60 * 60);

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' =>$user,
            'status'=>Response::HTTP_OK
        ])->withCookie($cookie);
    }
    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required|date',
            'phone' => 'required|string',
            'address' => 'required|string|max:255',
            'profileimage' => 'nullable|image|mimes:jpg,bmp,png',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = Auth::guard('sanctum')->user();

        // Update the user's fields if provided
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->date = $request->input('date');
        $user->address = $request->input('address');


        if ($request->hasFile('profileimage')) {
            $file = $request->file('profileimage');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/profileimages'), $fileName);
            $user->profileimage ='/uploads/profileimages' . $fileName;
        }

        $user->save();

        return response()->json(['message' => 'User profile updated successfully'], 200);
    }
    public function user(Request $request)
    {

            $user = Auth::guard('sanctum')->user();
            if ($user) {
                return response()->json([
                    'success' => true,
                    'user' => $user,
                     'status'=>Response::HTTP_OK
                ], 200);
            }


        return response()->json([
            'success' => false,
            'message' => $request->cookie('jwt'),
             'status'=>Response::HTTP_UNAUTHORIZED
        ], 200);
    }
    public function logout()
    {
        $userId = Auth::id();
        $user = User::find($userId);
        // $user->last_login=now();
        $user->save();
        $cookie = Cookie::forget('jwt');

        return response()->json([
            'message' => 'Success'
        ])->withCookie($cookie);
    }
    public function getLastLogin()
{
    $userId = Auth::id();
    $user = User::find($userId);

    return response()->json([
        'last_login' => $user->last_login,
    ]);
}

}
