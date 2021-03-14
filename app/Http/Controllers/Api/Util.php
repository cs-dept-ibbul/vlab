<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

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

    public function ip()
    {
        return $_SERVER['REMOTE_ADDR'];
    }
}
