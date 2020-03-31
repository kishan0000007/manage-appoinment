<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
 use App\Admin;
 use Auth;

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

    public function showAdminLoginForm()
    {
            return view('auth.login', ['url' => 'admin']);
    }
     public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect('clients');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    protected $redirectTo = 'clients';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

  
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

            $this->middleware('guest:admin')->except('logout');
    }
}
