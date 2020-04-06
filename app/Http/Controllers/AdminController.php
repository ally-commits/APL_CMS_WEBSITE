<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_teams = DB::table("teams")->count();
        $count_players = DB::table("players")->count();
        $admin = DB::table("admins")->count();
        $data = DB::table("users") 
            ->join("teams","teams.userId","users.id")
            ->select("teams.name as tName","users.*","teams.logo","users.image")
            ->get(); 
         
        return view('admin.dashboard')->with("admin",$admin)->with("data",$data)->with("count_teams", $count_teams)->with("count_players",$count_players);
    }
    public function generate() {
        $data = DB::table("users") 
            ->join("teams","teams.userId","users.id")
            ->select("teams.name as tName","users.*","teams.logo","teams.desc")
            ->inRandomOrder()
            ->get(); 
        
        return view("admin.fixtures")->with("data",$data);
    }
}