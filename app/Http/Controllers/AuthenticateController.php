<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use phpDocumentor\Reflection\Types\Array_;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthenticateController extends Controller
{
    public function __construct(){

        $this->middleware('jwt.auth',['except' => ['authenticate','signup']]);
    }
    public function index(){
        $users = User::all();
        return $users;
    }
    public function authenticate(Request $request){
        $credentials = $request->only('email','password');
        try{
            if(! $token = JWTAuth::attempt($credentials)){
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        }catch (JWTException $e){
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }
    public function signup(Request $request){
        $userData = $request->only(['name', 'email', 'password']);
        $validationRules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ];
        $validator = Validator::make($userData,$validationRules);
        if($validator->fails()){
            //throw new ValidationException( json_encode($validator->errors()->all()));
            return json_encode( ['errors' => $validator->errors()] );
        }
        $userData['u_isAdmin'] = false;
        $userData['password'] = Hash::make($userData['password']);
        User::unguard();
        User::create($userData);
        User::reguard();

        return redirect()->route('authenticate.login')->with($userData);
    }
}
?>
