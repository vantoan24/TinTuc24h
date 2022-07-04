<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthRepository extends EloquentRepository implements AuthInterface
{

    public function getModel()
    {  
        return User::class;
    }


     public function postLogin($request){

        $data = $request->only('email','password');
        // dd(Hash::make(123456789));
        if( Auth::attempt($data)){
            return true;
        }else{
            return false;
        }
    }

}
