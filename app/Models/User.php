<?php

namespace App\Models;

use App\Mail\otpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public static function genrateOtp(Request $request){
        $otp = random_int(11111,99999);//code 5 raqami =>one time password
        $userquery = User::query()->where('email',$request->get('email'));
        if($userquery->exists()){
            $user = $userquery->first();
            $user->update([
                'password' => bcrypt($otp)
            ]);
        }else{
            $user = User::query()->create([
                'email' => $request->get('email'),
                'role_id' => Role::findByTitle('user')->id,
                'password' => bcrypt($otp)
            ]);
        }
        Mail::to($user->email)->send(new otpMail($otp));
        return $user;
    }
}
