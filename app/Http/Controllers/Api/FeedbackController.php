<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class FeedbackController extends Controller
{
	  public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['feedback','getFeedback']]);
    }
    
    public function uuid()
    {
        return Str::uuid()->toString();
    }

	public function feedback(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'like' => 'required',
            'page_name' => 'required',
        ]);
     	$message = $request->get('message');
     	$like = $request->get('like');
     	$page_name = $request->get('page_name');     	
         if ($validator->fails()) {
            return response()->json(['error' => "All fields are required"], 400);
        }
     	

     	DB::table('feedback')->insert(['id'=>Util::uuid(),'message'=>$message,'like'=>$like, 'pagename'=>$page_name]);
        return response()->json(['success' => true], 200);
	}

	public function getFeedback()
	{
		$feeds = DB::table('feedback')->groupBy('pagename')
             ->get();
         return $feeds;
	}


}