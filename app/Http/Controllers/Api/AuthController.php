<?php

namespace App\Http\Controllers\Api;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Dotenv\Regex\Success;
use  GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users',
            'password' =>'required|string|min:8',
            'phone_number' => 'required',
            'nationality' => 'required',
            'role_id' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone_number = $request->phone_number;
        $user->nationality = $request->nationality;
        $user->role_id = $request->role_id;
        $user->save();

        return response(['status'=>'success','message'=>'user created successfully']);
        
        
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email',$request->email)->first();
        if(!$user){
            return response(['status'=>'error','message'=>'user not found'],400);
        }

        if(Hash::check($request->password, $user->password))
        {
        //    return response('login success');
           
        $client = new Client;

            $response = $client->post(url('oauth/token'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => '2',
                    'client_secret' => 'f056em6oeNGXvKGSnDkSwp1ZTipS7Af8yTavudya',
                    'username' => $request->email,
                    'password' => $request->password,
                    'scope' => ''
                ],
            ]);
            return response(['data' => json_decode((string) $response->getBody(), true)]);
        }
        else
        {
            return response(['status'=>'error','message'=>'credentials do not match'],400);
        }
    }

    public function logout(Request $request) {
        // return Auth::user();
        $request->user()->token()->revoke();

        return response()->json([
            'data' => 'Successfully logged out'
        ]);
    }

    public function user(Request $request)
    {
        return new UserResource($request->user());
    }
}
