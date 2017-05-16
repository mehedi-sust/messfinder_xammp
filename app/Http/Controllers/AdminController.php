<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->count();
        $mess = DB::table('basic_mess_info')->count();
        echo $users ."   ;  ".$mess;
        $total_seat = DB::table("basic_mess_info")->sum('total_seat');
        $vacant_seat = DB::table("basic_mess_info")->sum('vacant_seat');
        $mess_member = DB::table('mess_members')->count();
        return view('admin/admin_home',['users'=>$users])->with(['mess'=>$mess])->with(['total_seat'=>$total_seat])->with(['vacant_seat'=>$vacant_seat])->with(['mess_member'=>$mess_member]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_member(Request $req){
        $mess_id = Auth::user()->mess_id;
        $reg =  $req->input('mem_reg');
        $room_id = $req->input('room_id');
        echo $reg ;
        DB::table('mess_members')->where('reg', '=', $reg)->delete();
        echo "<br>delete done";
        DB::table('room_info')->where([['mess_id','=',$mess_id],['room_id' , '=' , $room_id]])->increment('vacant_seat');
      DB::table('basic_mess_info')->where ('mess_id','=',$mess_id)->increment('vacant_seat');
        return redirect('add_member');
    }

    public function get_change_manager()
    {
        $mess_id = Auth::user()->mess_id;
        $users = DB::table('users')
            ->join('mess_members', 'users.reg', '=', 'mess_members.reg')
            ->select('users.name', 'mess_members.*')
            ->where('mess_members.mess_id','=',$mess_id)
            ->get();

        return view('change_manager',['users'=>$users]);
    }

    public function get_user_list(){
        /*$user=DB::table('users')
            ->join('mess_members', 'users.reg', '=', 'mess_members.reg')
            ->select('users.name','users.reg','users.mobile','users.type','users.password','users.mess_id', 'mess_members.*')
            ->simplePaginate(2);
        */
            $user=DB::table('users')
            ->select('name','reg','mobile','type','password','mess_id')
            ->simplePaginate(2);
        return view('user_list',['user' => $user]);
    }

    public function upload_ad(Request $req){
    if($req->hasFile('image1') || $req->hasFile('image2') || $req->hasFile('image3') || $req->hasFile('image4') ){
    if($req->hasFile('image1')){
        $req->file('image1');
        $mess_id = Auth::user()->mess_id;
        $filename = "advertisement_1.jpg";
        //$req->image->path();
        //$req->image->extension();
        return $req->image1->storeAs('public',$filename);
        //return Storage::putFile('public',$req->file('image'));
    }
 
if($req->hasFile('image2')){
        $req->file('image2');
        $mess_id = Auth::user()->mess_id;
        $filename = "advertisement_2.jpg";
        //$req->image->path();
        //$req->image->extension();
        return $req->image2->storeAs('public',$filename);
        //return Storage::putFile('public',$req->file('image'));
    }
 
if($req->hasFile('image3')){
        $req->file('image3');
        $mess_id = Auth::user()->mess_id;
        $filename = "advertisement_3.jpg";
        //$req->image->path();
        //$req->image->extension();
        return $req->image3->storeAs('public',$filename);
        //return Storage::putFile('public',$req->file('image'));
    }
 

if($req->hasFile('image4')){
        $req->file('image4');
        $mess_id = Auth::user()->mess_id;
        $filename = "advertisement_4.jpg";
        //$req->image->path();
        //$req->image->extension();
        return $req->image4->storeAs('public',$filename);
        //return Storage::putFile('public',$req->file('image'));
    }
}
    else {
        return "No File Selected";
    }

    }

    public function get_add_location(){
        $location = DB::table('location')
            ->select('*')
            ->get();
        return view('admin/add_location')->with(['location'=>$location]);
    }

    public function location_added(Request $req){
        $location = $req->input('location');
        //echo $location;
        DB::table('location')
            ->insert(['location' => $location]);

        $location = DB::table('location')
            ->select('*')
            ->get();
        return view('admin/add_location')->with(['location'=>$location]);

    }

}
