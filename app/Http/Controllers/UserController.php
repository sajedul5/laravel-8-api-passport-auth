<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use Hash;
class UserController extends Controller
{
    // public function login(Request $request)
    // {
    //     $user = User::where('email', $request->email)->first();
    //     if(!$user || !Hash::check($request->password, $user->password)){
    //         return response([
    //             'message' => ['Not a valid user']
    //         ], 404);
    //     }
    //     $token = $user->createToken('my-aap-token')->plainTextToken;

    //         $response = [
    //             'user' =>$user,
    //             'token' =>$token
    //         ];
    //         return response($response, 201);
    // }


    // public function register(Request $request)
    // {
    //     $user = new User;
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);
    //     $result = $user->save();

    //     if($result){
    //         return 'Registered!';
    //     }else{
    //         return 'Not Registered!';
    //     }
    // }


    public function register(Request $request)
    {
            $validation = Validator::make($request->all(),[
                'name'=> 'required',
                'email'=> 'required|email',
                'password'=>'required',
                'c_password'=>'required|same:password',
            ]);

            if($validation->fails()){
                return response()->json($validation->errors(), 202);
            }
            $allData = $request->all();
            $allData['password']= bcrypt($allData['password']);

            $user = User::create($allData);

            $resArr = [];
            $resArr['token'] = $user->createToken('api-application')->accessToken;
            $resArr['name']=$user->name;

            return response()->json($resArr, 200);
    }


    public function login(Request $request)

    {
        if(Auth::attempt([
            'email' => $request->email,
            'password'=> $request->password,
        ])){
            $user = Auth::user();
            $resArr = [];
            $resArr['token'] = $user->createToken('api-application')->accessToken;
            $resArr['name']=$user->name;

            return response()->json($resArr, 200);
        }else{
            return response()->json(['error'=>'Unauthorized Access'], 203);
        }
    }

    public function userData()
    {
        $user = User::all();
        return response()->json($user, 200);
    }
}
