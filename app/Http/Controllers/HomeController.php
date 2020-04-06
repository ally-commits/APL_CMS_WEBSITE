<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        $data = DB::table("users") 
            ->join("teams","teams.userId","users.id")
            ->select("teams.name as tName","users.*","teams.logo","users.image")
            ->get();

        return view('users.dashboard')->with("data",$data);
    }
    public function viewPlayer()
    {
        $data = DB::table("players")->get(); 
        return view("users.player.viewPlayer")->with("data",$data);  
    }
}
