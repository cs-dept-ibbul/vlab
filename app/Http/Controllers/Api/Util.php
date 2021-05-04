<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class Util extends Controller
{
    static public $roleId = [
        'student'=>'3e836670-a9d5-4c78-bfb8-0bdcda27263c',
        'school_admin'=>'61947969-78e6-4619-be35-50541aef8cb3',
        'faculty_admin'=>'9260655c-6933-45a0-8d01-6de3d6a52657',
    ];

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

    public function ip()
    {
        return $_SERVER['REMOTE_ADDR'];
    }
}
