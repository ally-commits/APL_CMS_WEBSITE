<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TeamController extends Controller
{
    public function index() {
        $data = DB::table("users") 
            ->join("teams","teams.userId","users.id")
            ->select("teams.name as tName","users.*","teams.logo","teams.desc")
            ->get(); 
        return view("teams")->with("data",$data);
    }
    public function viewTeam($id) {
        $data = DB::table("users") 
            ->join("teams","teams.userId","users.id")
            ->select("teams.name as tName","users.*","teams.logo","teams.desc")
            ->where("users.id", $id)
            ->get(); 
        return view("viewTeam")->with("data",$data);
    }
}
