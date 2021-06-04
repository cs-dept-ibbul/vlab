<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;

use function PHPUnit\Framework\isEmpty;

class AuthController extends Controller
{
    private $allFieldRequiredError = 'All fields are required';
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'verifyUser']]);
    }

    public function uuid()
    {
        return Str::uuid()->toString();
    }

    public function checkUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:1',
            'password' => 'required|min:1',
        ]);

        if ($validator->fails()) {
            return $this->allFieldRequiredError;
        }
        $credentials = [
            'username' => $request->get('username'),
            'password' => md5($request->get('password')),
        ];        
        
        return User::where($credentials)->first();
    }

    public function verifyUser(Request $request)
    {
        $user = $this->checkUser($request);

        if($user == $this->allFieldRequiredError){
            return response()->json(['error' => $this->allFieldRequiredError], 400);
        }

        if($user){
            return response()->json(['success' => true], 200);
        }

        return response()->json(['success' => false], 400);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {   
        $user = $this->checkUser($request);
        
        if($user == $this->allFieldRequiredError){
            return response()->json(['error' => $this->allFieldRequiredError], 400);
        }

        if(!empty($user)){
            $usingDefaultPassword = $user->using_default_password;

            if ($token = auth()->login($user)) {
                return $this->respondWithToken($token, $usingDefaultPassword);
            }
        }

        return response()->json(['error' => 'Invalid Credentials'], 401);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',            
            //'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => $this->me()->original
        ]);
    }
}
