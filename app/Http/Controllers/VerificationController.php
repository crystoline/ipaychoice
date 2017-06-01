<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VerificationController extends Controller
{
    public function index(Request $request, $email){
        Auth::guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        $user = User::where(['email' =>$email, 'verified' => '0'])->get()->first();
        if(!$user) {
            return view('verification.invalid_account')->with(['messages' => _t('Invalid account')]);
        }

            return view('verification.index')->with(['user' => $user]);
    }
    public function verify($email,$code){
        $user = User::where(['email' =>$email])->get()->first();
        if(!$user) {
            return view('verification.invalid_account')->with(['messages' => _t('Invalid account')]);
        }
        if($user->verification_code == $code){
            Auth::login($user);
            $user->verified = 1;
            $user->save();
            return redirect('/verified');
        }
        return view('verification.index')->with(['user' => $user, 'code'=> $code,'messages' => _t('Verification failure. Invalid code')]);
    }

    public function resend($email){
        $user = User::where(['email' =>$email, 'verified' => '0'])->get()->first();
        if(!$user) {
            return view('verification.invalid_account')->with(['message' => _t('Invalid account')]);
        }

        $code = rand(1000000000, 9999999999);
        //send code
        $user->verification_code = $code;
        $user->save();
        self::sendCode($user);
        return redirect()->route('user.unverified',['email'=>$user->email])->with([ 'messages' => _t('Verification code was sent')]);

    }

    public  function verified(){
        return view('verification.verified')->with(['user' => Auth::user()]);
    }

    public static function sendCode(User $user){
        Mail::send('verification.mail', ['user' => $user], function ($m) use ($user) {
            $m->from(env('MAIL_USERNAME'), env('APP_NAME'));
            $m->to($user->email, $user->first_name)->subject(_t(':name Account Verification', ['name' => env('APP_NAME')]));
        });

    }
}
