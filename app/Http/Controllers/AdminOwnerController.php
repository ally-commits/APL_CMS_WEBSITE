<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use DB;
use Hash;
use App\User;
use App\Teams;

class AdminOwnerController extends Controller
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
        $data = DB::table("users") 
            ->join("teams","teams.userId","users.id")
            ->select("teams.name as tName","users.*","teams.logo","teams.desc")
            ->get(); 
        return view("admin.owner.viewOwner")->with("data",$data);      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view("admin.owner.addOwner");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'name' => ['required', 'string'],  
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image'=> ['required','image'],
            'tName' => ['required','string'],
            'logo' => ['required','image'],
            'desc' => ['required','string']
        ]);   
        $image = $request->file('image');
        $imageName = time().'.'.$data['image']->getClientOriginalExtension();
        $image->move('images/', $imageName);
        
        $logo = $request->file('logo');
        $logoName = time().'.'.$data['logo']->getClientOriginalExtension();
        $logo->move('logos/', $logoName);

        $user = User::create([
            'name' => $data['name'],
            'image' => 'images/'. $imageName,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        Teams::create([
            'logo' => 'logos/'. $logoName,
            'name' => $data['tName'],
            'desc' => $data['desc'],
            'userId' => $user->id
        ]);
        return Redirect::route('owner.index')->with('message', 'Owner Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table("users") 
            ->join("teams","teams.userId","users.id")
            ->select("teams.name as tName","users.*","teams.logo","teams.desc")
            ->get(); 
        return view("admin.owner.editOwner")->with("d",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $request->validate([
            'name' => ['required', 'string'],  
            'email' => ['required', 'string', 'max:255'], 
            'tName' => ['required','string'], 
            'desc' => ['required','string']
        ]);  
        if($request['image'] != null) { 
            $request->validate([ 
                'image' => ['required']
            ]);
            $images = $request->file('image');
            $imagesName = time().'.'.$data['image']->getClientOriginalExtension();
            $images->move('images/', $imagesName);

            DB::table('users')
                ->where('id' ,'=', $id)
                ->update(['image' => 'images/'.$imagesName]);
        } 
        if($request['logo'] != null) { 
            $request->validate([ 
                'logo' => ['required']
            ]);
            $logos = $request->file('logo');
            $logosName = time().'.'.$data['logo']->getClientOriginalExtension();
            $logos->move('logos/', $logosName);

            DB::table('teams')
                ->where('userId' ,'=', $id)
                ->update(['logo' => 'logos/'.$logosName]);
        } 
        if($request->password != '') {
            $request->validate([
                'password' => ['required','min:8','confirmed']
            ]);
            DB::table("users")
                ->where("id", '=', $data['id'])
                ->update(['password' => Hash::make($data['password'])]);
        }
        DB::table("users")
        ->where('id',"=",$id)
            ->update(['name'=> $data['name'], "email" => $data['email']]);
        DB::table("teams")
        ->where('userId',"=",$id)
        ->update(['desc'=> $data['desc'], 'name' => $data['tName']]);

        return Redirect::route('owner.index')->with('message', 'Owner Edited Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::find($id);
        $team = DB::table("teams")->where("userId",$id)->delete();
        $user->delete();

        return Redirect::route('owner.index')->with('message', 'User Deleted Succesfully');
    }
}