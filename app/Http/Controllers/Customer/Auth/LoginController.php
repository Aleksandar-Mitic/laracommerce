<?php

namespace App\Http\Controllers\Customer\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'customer/dashboard';

    /**
     * Show the login form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login',[
            'title' => 'Customer Login',
            'loginRoute' => 'customer.login',
            'forgotPasswordRoute' => 'customer.password.request',
        ]);
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

        //Login the customer...
		if(Auth::guard('customer')->attempt($request->only('email','password'),$request->filled('remember'))){
			//Authentication passed...
			return redirect()
				->intended(route('customer.dashboard'))
				->with('status','You are Logged in as customer!');
	
		}

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
