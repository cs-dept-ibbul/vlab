<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FacultyController extends Controller
{
    public function uuid()
    {
        return Str::uuid()->toString();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $this->uuid();
        $facultyName = $request->get('faculty_name');
        $facultyCode = $request->get('faculty_code');
        $schoolID = $request->get('school_id');
        $status = $request->get('status') ?? 'Active';
        $faculty = new Faculty();
        $faculty->id = $id;
        $faculty->name = $facultyName;
        $faculty->code = $facultyCode;
        $faculty->school_id = $schoolID;
        $faculty->status = $status;
        

        $checkSchool = Faculty::where(['name' => $facultyName])->first();
        if(empty($checkSchool)){
            if($faculty->save()){
                return response()->json(['success' => true], 200);
            }
            return response()->json(['success' => false], 200);
        }
        return response()->json(['error' => 'This faculty already exist'], 409);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
