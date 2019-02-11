<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employ;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()){
            return redirect(route('dashboard'));
        }
        return view('home');
    }
    public function dashboard()
    {
        $total_employees = Employ::count();
        $total_companies = Company::count();
        return view('home', ['total_employees' => $total_employees, 'total_companies' => $total_companies ]);
    }
}
