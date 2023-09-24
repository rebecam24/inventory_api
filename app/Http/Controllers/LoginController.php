<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Resources\UserResource as UserCollection;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    use ApiResponse;
   
    public function login(Request $request){

        $data = $request->validate([
            'email'        => ['required','string','email'],
            'password'     => ['required','string','min:8'],
        ]);

        $user = User::where('email',$data['email'])->first();

        if (!Auth::attempt($data)) {
            return $this->error('Credentials not match', 401);
        }

        /** @var \App\Models\MyUserModel $user **/
        $user = Auth::user();
        $tokenEncrypt = $user->createToken('API Token')->plainTextToken;

        return $this->success([
            'token'  => $tokenEncrypt,
            'user'   => new UserCollection($user),
        ],'User logged in');
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return $this->success([],'Unlogged user, Token revoked');
    }
}
