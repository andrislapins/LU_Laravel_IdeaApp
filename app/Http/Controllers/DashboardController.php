<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        if(auth()->user()->admin == 1) {
            //$users = User::all();
            $users = User::where('id', '!=', auth()->id())->get();
        } else {
            $users = User::where( 'id', '=', '2' )->get();
        }
        return view('dashboard')->with(['posts' => $user->posts, 'users' => $users]);
    }
}
