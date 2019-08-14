<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Vote;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Config;
use Mail;
use Request;
use Log;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    protected $loginPath = '/auth/login';
    protected $redirectTo = '/';
    protected $redirectAfterLogout = '/';

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'captcha' => 'required|captcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {   
        // generate a confirmation code
        $key = Config::get('app.key');
        $confirmation_code = hash_hmac('sha256', str_random(40), $key);

        Mail::send('email.verify', ['confirmation_code' => $confirmation_code, 'name' => $data['name']], 
            function($message) use ($data){
            $message->from('us@example.com', 'LMS');
            $message->to($data['email'], $data['name'])
                    ->subject('Е-мэйл хаягаа баталгаажуулах.');
        });

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => '4',
            'confirmation_code' => $confirmation_code,
        ]);
    }

    public function confirm($confirmation_code)
    {
        if( ! $confirmation_code)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if ( ! $user)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        return redirect()
                ->route('auth.login')
                ->withSuccess('Таны е-мэйл амжилттай баталгаажлаа. Та нэвртэрч орно уу.');
    }
    public function activate()
    {
        return view('auth.activate');
    }
    public function updateVote($name,$best,$good,$bad,$year,$month,$day,$hour,$minute)
    {
    	Vote::create([
    		'name'=> $name,
            'best' => $best,
            'good' => $good,
            'bad' => $bad,
            'time' => $year.'-'.$month.'-'.$day.' '.$hour.':'.$minute.':'.'00',
        ]);
    }
}   
