<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\Util;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    public function importStudents(Request $request)
    {
        $file = public_path($request->get('data_url'));

        $validator = Validator::make($request->all(), [
            'data_url' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "data_url field is required"], 400);
        }

        $students = Util::csvToArray($file);

        $data = [];
        $exists = [];
        $newStudents = [];
        $password = md5(123456);
        
        foreach ($students as $student) {

            $checkDuplicateMatricNumber = User::where(['matric_number' => $student['matric_number']])->first();
            
            if($checkDuplicateMatricNumber == null){
                $data[] = [
                    'id' => $this->uuid(),
                    'matric_number' => $student['matric_number'],
                    'username' => $student['matric_number'],
                    'first_name' => $student['first_name'],
                    'other_names' => $student['other_names'],
                    'gender' => $student['gender'],
                    'password' => $password,
                    'role_id' => $request->get('role_id'),
                    'user_ip_address' => $this->ip(),
                ];
                $newStudents[] = [
                    'matric_number' => $student['matric_number']
                ];
            } else {
                $exists[] = [
                    'matric_number' => $student['matric_number']
                ];
            }

        }

        User::insert($data);
        
        if(!empty($exists)){
            return response()->json(['error' => 'Some student already exist', 'new_students' => $newStudents, 'existing_students' => $exists], 409);
        }
        return response()->json(['success' => true], 200);
    }

    public function updatePassword(Request $request){

        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => "All fields is required"], 400);
        }

        if (strcmp(md5($request->get('old_password')), Auth::user()->password)) {
            return response()->json(['errors' => ['current'=> ['Current password does not match']]], 422);
        }

        if(strcmp($request->get('old_password'), $request->get('new_password')) == 0){
            return response()->json(['errors' => ['current'=> ['New Password cannot be same as your current password']]], 422);
        }
        
        $user = Auth::user();
        $user->password = md5($request->get('new_password'));
        $user->using_default_password = '0';
        if($user->save()){
            return response()->json(['success' => true], 200);
        }
    }
    
    public function getStudentByMatricNumber(Request $request)
    {
        $matric_number = $request->get('matric_number');
        $student = $this->studentByMatricNumber($matric_number);
        return $student;
    }
    
    static public function studentByMatricNumber(String $matric_number)
    {
        $student = User::where(['matric_number' => $matric_number])->first();
        if(empty($student)){
            return response()->json(['error' => 'Student not found'], 404);
        }
        return $student;
    }


}
