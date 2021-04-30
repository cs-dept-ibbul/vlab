<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
                return response()->json(['success' => true], 200);
            }
        } else {
            return response()->json(['error' => 'Session not found'], 404);
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

         if(!empty($session)){
            
            $session->status = 'Inactive';

            if($session->save()){
                return response()->json(['success' => true], 200);
            }
        } else {
            return response()->json(['error' => 'Session not found'], 404);
        }
    }

    public function getAllSession()
    {
        $session =  Session::all();
        return response()->json($session, 200);
    }

    static public function getCurrentSessionId()
    {
        $currentSession = Session::where('is_current', '1')->first();
        if(!empty($currentSession)){
            return $currentSession->id;
        }
    }
}
