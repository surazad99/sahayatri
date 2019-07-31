<?php

namespace App\Http\Controllers\Api;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Dotenv\Regex\Success;
use  GuzzleHttp\Client;

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
            return response(['status'=>'error','message'=>'user not found']);
        }

        if(Hash::check($request->password, $user->password))
        {
        //    return response('login success');
           
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'http://localhost:8000',
            'defaults' => [
                'exceptions' => false
            ]
        ]);

            $response = $client->post('/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => '2',
                    'client_secret' => '1WfG6WH78KR2g2OJDgV7lkocwHk9GuCV3TGplNRb',
                    'username' => $request->email,
                    'password' => $request->password,
                    'scope' => ''

        
                ],
            ]);
            return response(['data' => json_decode((string) $response->getBody(), true)]);
        }
    }
}
