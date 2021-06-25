<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{

    private $currentUser;
    private $schoolId;
    private $facultyId;
    private $departmentId;
    private $userId;

    public function __construct()
    {
        if (Auth::check()) {
            $this->currentUser = Auth::user();
            $this->schoolId = $this->currentUser->school_id;
            $this->facultyId = $this->currentUser->faculty_id;
            $this->departmentId = $this->currentUser->department_id;
            $this->userId = $this->currentUser->id;
        }
    }

    public function create(Request $request)
    {
        $id = Util::uuid();
        $departmentName = $request->get('name');
        $departmentCode = $request->get('code');
        $facultyId = $request->get('faculty_id');
        $status = $request->get('status') ?? 'Active';
        $department = new Department();
        $department->id = $id;
        $department->name = $departmentName;
        $department->code = $departmentCode;    
        $department->faculty_id = $facultyId;
        $department->status = $status;


        $checkDepartment = Department::where(['name' => $departmentName,'status'=>'Active'])->first();
        $checkDepartment1 = Department::where(['code' => $departmentCode,'status'=>'Active'])->first();                
        //$checkDepartment1 = Department::where(['name' => $departmentName,'status'=>'Inactive'])->first();

        if (empty($checkDepartment) && empty($checkDepartment1)) {
            if ($department->save()) {
                return response()->json(['success' => true], 201);
            }
            return response()->json(['success' => false], 400);
        }
        return response()->json(['error' => 'This department already exist'], 409);
    }

    public function deleteDepartment(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'department_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "department_id field is required"], 400);
        }

        $departmentId = $request->get('department_id');
        $check = DB::table('users')->where('department_id',$departmentId)->first();

        if (is_null($check)) {
            //delete
            $department = Department::find($departmentId);
            if ($department) {
                $department->status = 'Inactive';
                $save = $department->save();
                if ($save) {
                    return response()->json(['success' => true], 200);
                }
            } else {
                return response()->json(['error' => 'No department with this id'], 404);
            }
            return response()->json(['success' => false], 400);
        }else{
            //cant delete
            return response()->json(['error' => "can't delete this department"], 409);        
        }

    }

    public function updateDepartment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "department_id field is required"], 400);
        }

        $departmentId = $request->get('department_id');
        $departmentName = $request->get('name');
        $departmentCode = $request->get('code');
        $facultyId = $request->get('faculty_id');
        
        $department = Department::find($departmentId);
        if ($department) {
            $department->name = $departmentName;
            $department->code = $departmentCode;
            $department->faculty_id = $facultyId;

            if (empty($departmentName) && empty($departmentCode)) {
                return response()->json(['message' => 'Nothing to update'], 200);
            } else {
                $save = $department->save();
                if ($save) {
                    return response()->json(['success' => true], 200);
                }
            }
        } else {
            return response()->json(['error' => 'No department with this id'], 404);
        }

        return response()->json(['success' => false], 400);
    }

    public function getAllDepartments()
    {
        $departments =  Department::all();
        return response()->json($departments, 200);
    }

    public function getDepartment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department_id' => 'required|max:36',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "All fields are required"], 400);
        }

        $departmentId = $request->get('department_id');
        $department = department::where(['id' => $departmentId])->first();

        if (!empty($department)) {
            return response()->json($department, 200);
        } else {
            return response()->json(['error' => 'department not found'], 404);
        }
    }
}
