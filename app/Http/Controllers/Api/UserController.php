<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Util;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use \DB;
class UserController extends Controller
{

    private $currentUser;
    private $schoolId;
    private $facultyId;
    private $departmentId;
    private $userId;
    private $roleId;

    public function __construct()
    {
        if (Auth::check()) {
            $this->currentUser = Auth::user();
            $this->schoolId = $this->currentUser->school_id;
            $this->facultyId = $this->currentUser->faculty_id;
            $this->departmentId = $this->currentUser->department_id;
            $this->userId = $this->currentUser->id;
            $this->roleId = Util::$roleId;
            $this->currentSession = SessionController::getCurrentSessionId();            
        }
    }

    public function create(Request $request)
    {
        $user = new User();

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
            'first_name' => 'required',
            'faculty_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "All fields are required"], 400);
        }

        $id = Util::uuid();
        $email = $request->get('email');
        $password = md5($request->get('password'));
        $matric_number = $request->get('matric_number')??'';
        $first_name = $request->get('first_name');
        $other_names = $request->get('other_names');
        $faculty_id = $request->get('faculty_id');
        $department_id = $request->get('department_id');
        $gender = $request->get('gender');
        $phone = $request->get('phone');
        $salute = $request->get('title')??'';
        $user_ip_address = (new Util())->ip();
        $status = $request->get('status') ?? 'Active';
        $role = $request->get('role')??'';        

        $checkDuplicate = User::where('email', $email)->first();

        if (empty($checkDuplicate)) {
            $user->id = $id;
            $user->username = $user->email = $email;
            $user->password = $password;
            $user->first_name = $first_name;
            $user->other_names = $other_names;
            $user->gender = $gender;
            $user->user_ip_address = $user_ip_address;
            $user->role_id = $role;
            $user->school_id = $this->schoolId;
            $user->faculty_id = $faculty_id;
            $user->department_id = $department_id;
            $user->phone = $phone;
            $user->matric_number = $matric_number;
            $user->salute = $salute;


            $user->status = $status;

            if ($user->save()) {
                return response()->json(['success' => true], 200);
            }
            return response()->json(['success' => false], 400);
        } else {
            return response()->json(['error' => "user already exsit"], 409);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "user_id field is required"], 400);
        }

        $userId = $request->get('user_id');
        $email = $request->get('email');
        $password = md5($request->get('phone'));
        $matric_number = $request->get('matric_number')??'';
        $first_name = $request->get('first_name');
        $other_names = $request->get('other_names');
        $faculty_id = $request->get('faculty_id');
        $department_id = $request->get('department_id');
        $gender = $request->get('gender');
        $phone = $request->get('phone');
        $salute = $request->get('title')??'';
        $role = $request->get('role')??'';
        $user_ip_address = (new Util())->ip();        
        
        
        $msg ='user exists with that email';
        $user =  User::where('email',$email)->whereNotIn('id', [$userId])->first();

        if ($matric_number != '') {
            $msg ='user exists with that matric number';
            $user =  User::where('matric_number',$matric_number)->whereNotIn('id', [$userId])->first();            
        }
        if (is_null($user)) {
            $user = User::find($userId);
            if ($email != null) {
                $checkEmail = User::where('email', $email)->first();
                if (!$checkEmail) {
                    $user->email = $user->username = $email;
                }
            }
            $user->username = $user->email = $email;
            $user->password = $password;
            $user->first_name = $first_name;
            $user->other_names = $other_names;
            $user->gender = $gender;
            $user->user_ip_address = $user_ip_address;
            $user->role_id = $role;
            $user->school_id = $this->schoolId;
            $user->faculty_id = $faculty_id;
            $user->department_id = $department_id;
            $user->phone = $phone;
            $user->matric_number = $matric_number;
            $user->salute = $salute;
    
            $save = $user->save();

            if ($save) {
                return response()->json(['success' => true], 200);
            }
        } else {
            return response()->json(['error' => $msg], 409);
        }

        return response()->json(['success' => false], 400);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "user_id field is required"], 400);
        }

        $userId = $request->get('user_id');
        $user = User::find($userId);

        if ($user) {
            $user->status = 'Inactive';
            if ($user->save()) {
                return response()->json(['success' => true], 200);
            }
        } else {
            return response()->json(['error' => 'User Not found'], 404);
        }
        return response()->json(['success' => false], 400);
    }

    public function getStudents()
    {
        $students = User::where('role_id', $this->roleId['student'])->get();
        return $students;
    }

    
    public function getAllUsersBySearch(Request $request)
    {       

        $department_id = $request->get('department_id');
        $session_id = $request->get('session_id');
        $role_id = $request->get('role_id');      

        $search = ($session_id=='')?'':' users.session_id ="'. $session_id.'"';
        $search .= ($department_id =='')?'':' and users.department_id="'. $department_id.'"';
        $search .= ($role_id =='')?'':' and users.role_id="'. $role_id.'"';        

        $users = User::with('department')->whereRaw($search)->get();          
        return $users;    
    }


    public function getAllUsers()
    {
        $users = User::with('department')->take(2000)->get();            
        return $users;
    }
    

    public function getFacultyAdmins()
    {
        $facultyAdmins = User::orWhere('role_id', $this->roleId['faculty_admin'])->get();

        return $facultyAdmins;
    }

    public function importStudents(Request $request)
    {
        $file = $request->csv->path();

        $validator = Validator::make($request->all(), [
            'csv' => 'required',
        ]);
        $departmentId = $request->get('department_id');
        $facultyId = $request->get('faculty_id');
        $roleId = $request->get('role_id');
        if ($validator->fails()) {
            return response()->json(['error' => "data_url field is required"], 400);
        }

        $users = Util::csvToArray($file);
        //return dd($students);
            

        $data = [];
        $exists = [];
        $newStudents = [];
        $password = md5(123456);

        foreach ($users as $user) {

            $checkDuplicateMatricNumber = User::where(['matric_number' => $user['matric_number']])->first();
            $checkDuplicateEmail = User::where(['email' => $user['email']])->first();

            if ($user['matric_number'] != '') {
                if ($checkDuplicateMatricNumber == null) {                        
                    $data[] = [
                        'id' => Util::uuid(),
                        'matric_number' => $user['matric_number'],
                        'username' => $user['matric_number'] ?? $user['email'],
                        'email' => $user['email'],
                        'first_name' => $user['first_name'],
                        'other_names' => $user['other_names'],
                        'gender' => $user['gender'],
                        'password' => md5($user['phone'])?? $password,
                        'role_id' => $roleId,
                        'phone' => $user['phone'],
                        'salute'=>$user['salute'],
                        'school_id' => $this->schoolId,
                        'faculty_id' => $facultyId,
                        'department_id' => $departmentId,
                        'session_id' => $this->currentSession,
                        'user_ip_address' => Util::ip()                        
                    ];
                    $newStudents[] = $user['matric_number'];
                    
                } else {
                    $exists[] = $user['matric_number'];                    
                }
            }else if($user['email'] != ''){
                 if ($checkDuplicateEmail == null) {                        
                    $data[] = [
                        'id' => Util::uuid(),
                        'matric_number' => $user['matric_number'],
                        'username' => $user['email'],
                        'email' => $user['email'],
                        'first_name' => $user['first_name'],
                        'other_names' => $user['other_names'],
                        'gender' => $user['gender'],
                        'password' => md5($user['phone'])?? $password,
                        'role_id' => $roleId,
                        'phone' => $user['phone'],
                        'salute'=>$user['salute'],
                        'school_id' => $this->schoolId,
                        'faculty_id' => $facultyId,
                        'department_id' => $departmentId,
                        'session_id' => $this->currentSession,
                        'user_ip_address' => Util::ip()
                    ];
                    $newStudents[] = $user['email'];
                } else {
                    $exists[] = $user['email'];
                }

            }else{
                //matric number and email cannot be empty
            }

        }

        User::insert($data);        
        return response()->json(['success' =>true, 'msg'=> 'upload successfully', 'uploaded' => $newStudents, 'failed' => $exists], 200);
    }

    public function updatePassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "All fields is required"], 400);
        }

        if (strcmp(md5($request->get('old_password')), Auth::user()->password)) {
            return response()->json(['errors' => ['current' => ['Current password does not match']]], 422);
        }

        if (strcmp($request->get('old_password'), $request->get('new_password')) == 0) {
            return response()->json(['errors' => ['current' => ['New Password cannot be same as your current password']]], 422);
        }

        $user = Auth::user();
        $user->password = md5($request->get('new_password'));
        $user->using_default_password = '0';
        if ($user->save()) {
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
        if (empty($student)) {
            return response()->json(['error' => 'Student not found'], 404);
        }
        return $student;
    }
}
