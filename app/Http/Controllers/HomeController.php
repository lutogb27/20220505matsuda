<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
            $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function redirectIndex()
    {
        return redirect(route('admin.home'));
    }

    public function index(Request $request)
    {
        return view('home');
    }
}
