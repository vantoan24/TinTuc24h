<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\Interfaces\AuthServiceInterface;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $authServiceInterface;
    public function __construct(AuthServiceInterface $authServiceInterface){
        $this->authServiceInterface = $authServiceInterface;
    }

    public function login()
    {
        return view('backend.auth.login');

    }

    public function postLogin(LoginRequest $request){

        if ($this->authServiceInterface->postLogin($request)) {
            return redirect()->route('dashboard.index');
        } else {
            Session::flash('error_phone','Đăng nhập không thành công');
            return redirect()->back();
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
