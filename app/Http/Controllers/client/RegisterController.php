<?php

namespace App\Http\Controllers\client;

use App\Models\Role;
use App\Models\User;
use App\Mail\otpMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SendMailRequest;
use App\Http\Requests\verifyOtpRequest;

class RegisterController extends Controller
{
    public function create(){
        return view('client.register.create');
    }
    public function sendMail(SendMailRequest $request){
        $user = User::genrateOtp($request);
        return redirect(route('client.register.otp',$user));
    }
    public function otp(User $user){
        return view('client.register.otp',[
            'user' => $user
        ]);
    }
    public function verifyotp(verifyOtpRequest $request,User $user){
        if(Hash::check($request->get('otp'),$user->password)){
            auth()->login($user);
            return redirect(route('client.index'));
        }
        return back()->withErrors(['otp' => 'کد وارد شده صحیح نیست.']);
    }
    public function destroy(){
        auth()->logout();
        return redirect(route('client.index'));
    }
}
