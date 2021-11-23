<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use App\Http\Requests\userSignupInfo;
use App\Http\Requests\updateUserPassword;

class LoginController extends Controller
{

    public function login()
    {
        try {
            //dd('i am here');
            return $this->getHomeService()->login();
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function signUp()
    {
        try {
            return $this->getHomeService()->signUp();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function signIn()
    {
        try {
            return $this->getHomeService()->signIn();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }
    

    public function memberSignup(userSignupInfo $request)
    {
        try {
            return $this->getHomeService()->memberSignup();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }


    public function otpVerify()
    {
        try {
            return $this->getHomeService()->otpVerify();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function forgotOTPVerify()
    {
        try {
            return $this->getHomeService()->forgotOTPVerify();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }
    

    public function verifyUser()
    {
        try {
            return $this->getHomeService()->verifyUser();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function resendOTP()
    {
        try {
            return $this->getHomeService()->resendOTP();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function forgotPassword()
    {
        try {
            return $this->getHomeService()->forgotPassword();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function recoverPassword()
    {
        try {
            return $this->getHomeService()->recoverPassword();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function changePassword()
    {
        try {
            return $this->getHomeService()->changePassword();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function updatePassword()
    {
        try {
            return $this->getHomeService()->updatePassword();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function updateNewPassword(updateUserPassword $request)
    {
        try {
            return $this->getHomeService()->updateNewPassword();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    
    public function signout()
    {
        try {
            \Illuminate\Support\Facades\Auth::logout();
            \Illuminate\Support\Facades\Session::flush();
            \Session::forget('userInfo');
            return redirect()->route('login')->with('success_message', 'You have logged out successfully');
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function newPassword()
    {
        try {
            return $this->getHomeService()->newPassword();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    public function setPassword()
    {
        try {
            return $this->getHomeService()->setPassword();
        } catch (\Illuminate\Database\QueryException $ex) {
            return $this->exception($ex);
        } catch (\Exception $ex) {
            return $this->exception($ex);
        }
    }

    
    
}
