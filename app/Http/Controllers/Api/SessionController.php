<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \DB;
class SessionController extends Controller
{
    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'session' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "session field is required"], 400);
        }

        $id = Util::uuid();
        $_session = $request->get('session');
        $isCurrent = $request->get('is_current') ?? '0';
        $status = $request->get('status') ?? 'Active';

        $session = new Session();
        $session->id = $id;
        $session->session = $_session;
        $session->is_current = $isCurrent;
        $session->status = $status;

        $checksession = Session::where(['session' => $_session])->first();
        if (empty($checksession)) {
            if ($session->save()) {

                 $is_current = $request->get('is_current');

                 if ($is_current != 0) {                     
                    $getSessionId = Session::where(['session' => $_session])->first()->id;
                    $is_current = Session::find($getSessionId);
                    $is_current->is_current = 1;
                    Session::whereNotIn('id', [$getSessionId])->update(['is_current' => 0]);
                    $is_current->save();
                 }

                return response()->json(['success' => true], 200);
            }
            return response()->json(['success' => false], 400);
        }
        return response()->json(['error' => 'This session already exist'], 409);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'session_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "session_id field is required"], 400);
        }

        $sessionId = $request->get('session_id');
        $session = Session::find($sessionId);

        if(!empty($session)){

            $request->get('session') != null ? $session->session = $request->get('session') : null;
            $request->get('is_current') != null ? $session->is_current = $request->get('is_current') : null;

            if($session->save()){                

                $is_current = $request->get('is_current');
                if ($is_current != 0) {                    
                    $is_current = Session::find($sessionId);
                    $is_current->is_current = 1;
                    Session::whereNotIn('id', [$sessionId])->update(['is_current' => 0]);
                    $is_current->save();
                }
                return response()->json(['success' => true], 200);
            }
        } else {
            return response()->json(['error' => 'Session not found'], 404);
        }
    }
    public function setSession(Request $request)
    {
        $validator = Validator::make($request->all(),[
              'session_id' => 'required',
        ]);

        $session_id = $request->get('session_id');

        $session = Session::find($session_id);
        $session->is_current = 1;
        Session::whereNotIn('id', [$session_id])->update(['is_current' => 0]);

        if($session->save()){
            return response()->json(['success' => true], 200);
        }

    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'session_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => "session_id field is required"], 400);
        }

        $sessionId = $request->get('session_id');
        $session = Session::find($sessionId);
        $check  = DB::table('users')->where('session_id', $sessionId)->first();
        $check1 = DB::table('courses')->where('session_id',$sessionId)->first();
        $check2 =  Session::find($sessionId)->where('is_current','1')->first();

        if (is_null($check2)) {            
            if (is_null($check) && is_null($check1)) {
                //delete
                if(!empty($session)){
                    
                    $session->status = 'Inactive';

                    if($session->save()){
                        return response()->json(['success' => true], 200);
                    }
                } else {
                    return response()->json(['error' => 'Session not found'], 404);
                }
            }else{
                //cant delete
                return response()->json(['error' => "can't delete this faculty"], 409);        
            }
        }else{
            return response()->json(['error' => "can't delete this faculty"], 409);        
        }
    }

    public function getAllSession()
    {
        $session =  Session::all();
        return response()->json($session, 200);
    }

    static public function getCurrentSession()
    {
        $currentSession = Session::where(['is_current'=>'1','status'=>'Active'])->first();
        if(!empty($currentSession)){
            return $currentSession;
        }
        return response()->json(['error' => 'Session not found'], 404);

    }
    static public function getCurrentSessionId($value='')
    {
        $currentSession = Session::where(['is_current'=>'1','status'=>'Active'])->first();
        if(!empty($currentSession)){
            return $currentSession->id;
        }
    }

}
