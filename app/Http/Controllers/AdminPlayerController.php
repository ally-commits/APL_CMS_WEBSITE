<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use Auth;
use Redirect;
use DB;
class AdminPlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $data = DB::table("players")->get(); 
        return view("admin.player.viewPlayer")->with("data",$data);  
    }

    public function delete($id) {
        $player = Player::find($id);
        $player->delete();

        return Redirect::route('player.index')->with('message', 'Player Deleted Succesfully');
    }
}