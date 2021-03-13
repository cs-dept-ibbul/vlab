<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Util extends Controller
{
    static public function uuid()
    {
        return Str::uuid()->toString();
    }
}
