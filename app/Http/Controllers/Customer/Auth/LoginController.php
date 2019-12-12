<?php

namespace App\Http\Controllers\Customer\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    
    /**
     * This trait has all the login functionality.
     */
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'customer/dashboard';

    /**
     * Max login attempts allowed.
     */
    public $maxAttempts = 5;
    /**
     * Number of minutes to lock the login.
     */
    public $decayMinutes = 3;


    /**
     * Create a new controller instance.
     * Only authorized "customers" are allowed, but don't check logout route.
     * 
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest:customer')->except('customer.logout');
    }


    /**
     * Username used in ThrottlesLogins trait
     * 
     * @return string
     */
    public function username() {
        return 'email';
    }

    /**
     * Show the login form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('customer.login');
        // return 'test';
    }
    /**
     * Login the admin.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        //Validation...
		$this->validator($request);

        //check if the user has too many login attempts.
        if ($this->hasTooManyLoginAttempts($request)){
            //Fire the lockout event.
            $this->fireLockoutEvent($request);
            //redirect the user back after lockout.
            return $this->sendLockoutResponse($request);
        }

        //Login the customer...
        if (Auth::guard('customer')->attempt($request->only('email','password'),$request->filled('remember'))) 
        {
			//Authentication passed...
			return redirect()
				->intended(route('customer.dashboard'))
				->with('status','You are Logged in as customer!');
        }
        
        //keep track of login attempts from the user.
        $this->incrementLoginAttempts($request);

		//Authentication failed...
		return $this->loginFailed();
    }
    /**
     * Logout the admin.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
	    //logout the admin...
        Auth::guard('customer')->logout();
      
	    return redirect()
		    ->route('customer.login')
		    ->with('status','Customer has been logged out!');
    }
    /**
     * Validate the form data.
     * 
     * @param \Illuminate\Http\Request $request
     * @return 
     */
    private function validator(Request $request)
    {
        //validation rules.
		$rules = [
			'email'    => 'required|email|exists:customers|min:5|max:191',
			'password' => 'required|string|min:4|max:255',
		];
		//custom validation error messages.
		$messages = [
			'email.exists' => 'These credentials do not match our records.',
		];
		//validate the request.
		$request->validate($rules,$messages);
    }
    /**
     * Redirect back after a failed login.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    private function loginFailed()
    {
		//Login failed...
		return redirect()
			->back()
			->withInput()
			->with('error','Login failed, please try again!');
    }
}
