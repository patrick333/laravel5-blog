<?php namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\AuthenticateUser;
use Illuminate\Http\Request;

class AuthController extends Controller {

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

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard $auth
     * @param  \Illuminate\Contracts\Auth\Registrar $registrar
     * @return void
     */
    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function login(AuthenticateUser $authenticateUser, Request $request, $provider = null)
    {
        return $authenticateUser->execute($request->all(), $this, $provider);
    }

    public function userHasLoggedIn($user)
    {
        //Session::flash(): store items in the session only for the next request.
        \Session::flash('message', 'Welcome, ' . $user->name);
        \Flash::message(\Session::get('message'));

        return redirect('/home');
    }

    public function getRegister()
    {
//        return view('errors.404');
        abort(404);
//        abort(403, 'Unauthorized action.');
//        \App::abort(403, 'Access denied');
    }

    public function postRegister()
    {
//        return view('errors.404');
        abort(404);
    }
}
