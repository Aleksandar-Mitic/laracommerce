<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    /**
     * Only authorized in "customer" guard are allowed except for logout.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:customer')->except('logout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.dashboard');
    }

}
