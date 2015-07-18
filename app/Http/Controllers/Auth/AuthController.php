<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Role;
use App\Invitation;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    use AuthenticatesUsers, ThrottlesLogins, RedirectsUsers {
        AuthenticatesUsers::redirectPath insteadof RedirectsUsers;
    }

    protected $redirectPath = '/dashboard';

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
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
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
        return User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister(Request $request)
    {
        if ($request->has('t')) {
            $invitation = Invitation::where(['token' => $request->input('t')])->first();
            $query_params = '?t=' . $request->input('t');
        } else {
            $query_params = '';
        }

        return view('auth.register', [
            'query_params' => $query_params
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());
        Auth::login($user);

        if ($request->has('t')) {
            $invitation = Invitation::where([
                'token' => $request->input('t')
            ])->first();

            if ($invitation) {
                Role::create(['user_id' => $user->id, 'organization_id' => $invitation->organization_id, 'role' => 'admin']);
                $invitation->delete();
            }
        }

        return redirect($this->redirectPath());
    }
}
