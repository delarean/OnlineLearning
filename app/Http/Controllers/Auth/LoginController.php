<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Role;
use App\Teacher;
use App\Student;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/teacher';

    public function redirectPath(){

        $role_id = Auth::user()->role_id;
        $id = Auth::user()->id;

            switch ($role_id) {
                case 1:
                    Teacher::where('user_id',$id)->first();
                    break;
                case 2:
                    $student_credentials = Student::where('user_id',$id)->first();
                    Auth::user()->__set('name' , $student_credentials['name']);
                    Auth::user()->__set('surname' , $student_credentials['surname']);
                    Auth::user()->__set('pathronymic' , $student_credentials['pathronymic']);
                    Auth::user()->__set('e-mail' , $student_credentials['e-mail']);
                    Auth::user()->__set('telephone' , $student_credentials['telephone']);
                    Auth::user()->__set('skype' , $student_credentials['skype']);
                    Auth::user()->__set('country' , $student_credentials['country']);
                    break;
                case 3:
                    break;
            }


        return view('profile');

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.mylogin');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'id';
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), true
        );
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //redirect()->intended($this->redirectPath());
        return $this->redirectPath();
        //return redirect('/student/');
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user());
    }


}
