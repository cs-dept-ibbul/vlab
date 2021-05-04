<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Util;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        }
    }

    public function createFacultyAdmin(Request $request)
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
        $first_name = $request->get('first_name');
        $other_names = $request->get('other_names');
        $faculty_id = $request->get('faculty_id');
        $gender = $request->get('gender');
        $user_ip_address = (new Util())->ip();
        $status = $request->get('status') ?? 'Active';

        $checkDuplicate = User::where('email', $email)->first();

        if (empty($checkDuplicate)) {
            $user->id = $id;
            $user->username = $user->email = $email;
            $user->password = $password;
            $user->first_name = $first_name;
            $user->other_names = $other_names;
            $user->gender = $gender;
            $user->user_ip_address = $user_ip_address;
            $user->role_id = $this->roleId['faculty_admin'];
            $user->school_id = $this->schoolId;
            $user->faculty_id = $faculty_id;
            $user->department_id = null;
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
        $user = User::find($userId);

        if ($user) {
            if ($email != null) {
                $checkEmail = User::where('email', $email)->first();
                if (!$checkEmail) {
                    $user->email = $user->username = $email;
                }
            }

            $request->get('first_name') != null ? $user->first_name = $request->get('first_name') : null;
            $request->get('other_names') != null ? $user->other_names = $request->get('other_names') : null;

            $save = $user->save();

            if ($save) {
                return response()->json(['success' => true], 200);
            }
        } else {
            return response()->json(['error' => 'user not found'], 404);
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

    public function getFacultyAdmins()
    {
        $facultyAdmins = User::where('role_id', $this->roleId['faculty_admin'])->get();

        return $facultyAdmins;
    }

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
        $roleId = '3e836670-a9d5-4c78-bfb8-0bdcda27263c';

        foreach ($students as $student) {

            $checkDuplicateMatricNumber = User::where(['matric_number' => $student['matric_number']])->first();

            if ($checkDuplicateMatricNumber == null) {
                $data[] = [
                    'id' => $this->uuid(),
                    'matric_number' => $student['matric_number'],
                    'username' => $student['matric_number'],
                    'first_name' => $student['first_name'],
                    'other_names' => $student['other_names'],
                    'gender' => $student['gender'],
                    'password' => $password,
                    'role_id' => $roleId,
                    'school_id' => $this->schoolId,
                    'faculty_id' => $this->facultyId,
                    'department_id' => $this->departmentId,
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

        if (!empty($exists)) {
            return response()->json(['error' => 'Some student already exist', 'new_students' => $newStudents, 'existing_students' => $exists], 409);
        }
        return response()->json(['success' => true], 200);
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
