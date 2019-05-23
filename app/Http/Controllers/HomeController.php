<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->user()->hasRole('Admin')){
            return redirect('admin');
        }else if($request->user()->hasRole('User')){
            $user = Auth::user()->user_details;
            if (!$user) {
                return redirect('user_detail/create');
            } else {
                return redirect('/');
            }
        }else{
            return redirect('/');
        }
    }
}
