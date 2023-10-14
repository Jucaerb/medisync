<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    protected function index() {
        return view('carer.home');
    }
}
