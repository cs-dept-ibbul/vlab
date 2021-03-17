<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\Util;
use App\Models\User;
use Illuminate\Http\Request;
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

        $customerArr = Util::csvToArray($file);

        $data = [];
        $exists = [];
        $newStudents = [];
        $password = 123456;
        
        for ($i = 0; $i < count($customerArr); $i++) {
            
            $checkDuplicateMatricNumber = User::where(['matric_number' => $customerArr[$i]['matric_number']])->first();
            
            if($checkDuplicateMatricNumber == null){
                $data[] = [
                    'id' => $this->uuid(),
                    'matric_number' => $customerArr[$i]['matric_number'],
                    'first_name' => $customerArr[$i]['first_name'],
                    'other_names' => $customerArr[$i]['other_names'],
                    'gender' => $customerArr[$i]['gender'],
                    'password' => $password,
                    'role_id' => $request->get('role_id'),
                    'user_ip_address' => $this->ip(),
                ];
                $newStudents[] = [
                    'matric_number' => $customerArr[$i]['matric_number']
                ];
            } else {
                $exists[] = [
                    'matric_number' => $customerArr[$i]['matric_number']
                ];
            }
        }
        User::insert($data);
        if(!empty($exists)){
            return response()->json(['error' => 'Some student already exist', 'new_students' => $newStudents, 'existing_students' => $exists], 409);
        }
        return response()->json(['success' => true], 200);
    }

    static public function getStudentByMatricNumber(String $matric_number)
    {
        $student = User::where(['matric_number' => $matric_number])->first();
        if(empty($student)){
            return response()->json(['error' => 'Student not found'], 404);
        }
        return $student;
    }

}
