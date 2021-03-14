<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Location;

class Util extends Controller
{
    static public function uuid()
    {
        return Str::uuid()->toString();
    }

    static public function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return response()->json(['error' => "Error while reading file"], 400);

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }

    // public function importCsv(Request $request)
    // {
    //     $file = public_path($request->get('data_url'));

    //     $customerArr = $this->csvToArray($file);

    //     $data = [];
    //     $exists = [];
    //     $newStudents = [];
        
    //     for ($i = 0; $i < count($customerArr); $i++) {
            
    //         $checkDuplicateMatricNumber = User::where(['matric_number' => $customerArr[$i]['matric_number']])->first();
            
    //         if($checkDuplicateMatricNumber == null){
    //             $data[] = [
    //                 'id' => $this->uuid(),
    //                 'matric_number' => $customerArr[$i]['matric_number'],
    //                 'first_name' => $customerArr[$i]['first_name'],
    //                 'other_names' => $customerArr[$i]['other_names'],
    //                 'gender' => $customerArr[$i]['gender'],
    //                 'password' => $customerArr[$i]['password'],
    //                 'role_id' => $request->get('role_id'),
    //                 'user_ip_address' => $this->ip(),
    //             ];
    //             $newStudents[] = [
    //                 'matric_number' => $customerArr[$i]['matric_number']
    //             ];
    //         } else {
    //             $exists[] = [
    //                 'matric_number' => $customerArr[$i]['matric_number']
    //             ];
    //         }
    //     }
    //     User::insert($data);
    //     if(!empty($exists)){
    //         return response()->json(['error' => 'Some student already exist', 'new_students' => $newStudents, 'existing_students' => $exists], 409);
    //     }
    //     return 'All student has been uploaded';
    // }


    public function ip()
    {
        return $_SERVER['REMOTE_ADDR'];
    }
}
