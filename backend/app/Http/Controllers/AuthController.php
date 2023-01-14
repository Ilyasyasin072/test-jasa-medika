<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    CONST STATUS_ADMIN = 1;
    public function register(Request $request) {
        if(Auth::check() && Auth::user()->role_id == self::STATUS_ADMIN) {
            $validate = Validator::make($request->all(),[
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:mysql.users',
                'password' => 'required|string|min:8',
                'role_id' => 'required'
            ]);
    
            if(!$validate->fails()) {
    
                $validate_data = $request->all();
                $user = new User();
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = Hash::make($request->input('password'));
                $user->role_id = $request->input('role_id');
                // $user->fill($validate_data);
    
                if($user->save()) {
                    return response()->json(compact('user'));
                };
    
            } else {
                return $validate->errors();
            }

        } else {
            return response()->json(['status' => 'Unauthorize'], 400);
        }

    }

    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        if(!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'message' => 'invalid login'
            ], 401);
        }

        try {

            $user = User::where('email', $request->email)->firstOrFail();

            return response()->json($user, 200);

        } catch (\Throwable $th) {
            die;
        }
    }

    public function getUserToken(Request $request): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => $request->user(),
        ]);
    }

    public function getUserAll() {
        $user = User::all();
        return response()->json($user);
    }
}