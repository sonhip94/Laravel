<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\RegisterRequest;
use Hash;
use Auth;

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

    public function getRegister()
    {
        return view("auth.register");
    }

    public function postRegister(RegisterRequest $request)
    {
        $user = new User();
        $user->username = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->remember_token = $request->_token;
        $user->save();
        return view('auth.login');
    }

    public function getLogin()
    {
        if (!Auth::check()) {
            return view("auth.login");
        }
        else {
            return redirect()->route("admin.user.list");
        }
    }

    public function postLogin(LoginRequest $request)
    {
        $auth = array(
            'email' => $request->email,
            'password' => $request->password
        );
        if (Auth::attempt($auth)) {
            return redirect("admin/user/list");
        } else {
            return redirect()->back()->with([
                'flash_message' => 'Email hoặc mật khẩu không đúng',
                'flash_level' => 'danger'
            ]);;
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route("getLogin");
    }
}
