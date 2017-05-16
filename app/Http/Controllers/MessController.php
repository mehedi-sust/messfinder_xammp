<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Response;
use input;
use App\Mess;
use DB;
use Auth;
use File;
use Session;
use Image;
class MessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
      $location = DB::table('location')
            ->select('*')
            ->get();
        return view('add_basic_info')->with(['location'=>$location]);
    }

public function insert(Request $request){
      $name = $request->input('mess_name');
      $location = $request->input('location');
      $total_seat = $request->input('total_seat');
      $vacant_seat = $request->input('total_seat');
      $total_room = $request->input('total_room');
      $distance = $request->input('distance');
      $description = $request->input('description');
      $manager = Auth::user()->reg;
      DB::insert('insert into basic_mess_info (mess_name,mess_location,total_seat,vacant_seat,total_room,distance,description,manager) values(?,?,?,?,?,?,?,?)',[$name,$location,$total_seat,$vacant_seat,$total_room,$distance,$description,$manager]);

      
      $mess = DB::table('basic_mess_info')->select()->where('manager',$manager)->get();
      $mess_id =0;
      foreach ($mess as $value) {

        $mess_id = $value->mess_id; 
        echo $value->mess_name . "  " . $value->mess_location . "   " . $value->total_room;
      }
      
      DB::table('users')->where('reg',$manager)->update(['mess_id' => $mess_id, 'type' => 'Manager']);

      $room = DB::table('basic_mess_info')
            ->select('*')
            ->where('mess_id' , $mess_id)
            ->get();
      
      return view('add_room_info')->with(['mess' => $room]);
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
        $this->validate($request,array(
                'mess_name'=>'required',
                'location' => 'required',
                'distance' => 'required'
            ));
        $mess = new Mess ;
        $mess->name = $request->input('mess_name');
        $mess->location = $request->input('mess_location');
        $mess->distance = $request->input('distance');
        $mess->description = $request->input('description');

        /*
        $mess->name = $request->mess_name;
        $mess->location = $request->mess_location;
        $mess->distance = $request->distance;
        $mess->description = $request->description;

        $mess_name = $request->input('mess_name');
        $location = $request->input('mess_location');
        $distance = $request->input('distance');
        $description = $request->input('description');
*/
        $data = array('name'=>$mess_name,'location'=>$location,'distance'=>$distance,'description'=>$description);
        DB::table('messes')->insert($data);
        echo $mess->name ."  ". $mess->location;
        $mess->save();
        //return redirect()->route('messes.show',$mess->id);
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
        $id = 1;
        $mess = DB::select('select * from basic_mess_info where mess_id = ?',[$id]);
      return view('pages/mess_profile',['mess'=>$mess]);
        echo "success";
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
    public function destroy($id)
    {
        //
    }

    public function show_mess_profile()
    {
        $mess_id = $_GET['id'];
        //$mess_id = 3;
        //echo $mess_id;
        $reg = 0;
        $man = DB::table('basic_mess_info')->select('manager')->where('mess_id','=',$mess_id)->get();
        foreach ($man as $value) {
          # code...
          $reg = $value->manager;
        }
        echo $reg;
        $mobile= DB::table('users')->select('mobile','name')->where('reg','=',$reg)->get();
        $mess = DB::select('select * from basic_mess_info where mess_id = ?',[$mess_id]);
        $feature = DB::select('select * from mess_features where mess_id = ?',[$mess_id]);
        $room = DB::select('select * from room_info where mess_id =?',[$mess_id]);
        $member = DB::select('select distinct room_id,name,users.reg,mobile,vacant_from from mess_members,users where mess_members.mess_id =? and users.reg = mess_members.reg group by room_id',[$mess_id]);
      return view('mess_profile',['mess'=>$mess])->with(['feature'=>$feature])->with(['room'=>$room])->with(['member'=>$member])->with(['mobile'=>$mobile]);
       //return view('test',['mess'=>$mess])->with(['room'=>$room])->with(['member'=>$member])->with(['feature'=>$feature])->with(['mobile'=>$mobile])->with(['member'=>$member]);
        echo "success";
    }

public function insert_room(Request $request){
  $i =0;
  $input = $request->all();
  $seat = "";
  $mess_id = Auth::user()->mess_id;
  foreach ($input as $req) {
    $seat = $request->input('seat_no');
    $cost = $request->input('fare');
    $add_info = $request->input('more_info');
    //echo $seat[$i]."  ".$rent[$i] ."<br>" ;

    $i=$i+1;  

  }

  $len = count($seat);
  //echo $len;

  for($i=0;$i<$len;$i++){
    DB::insert('insert into room_info (room_id,mess_id,total_seat,vacant_seat,cost,add_info) values(?,?,?,?,?,?)',[$i+1,$mess_id,$seat[$i],$seat[$i],$cost[$i],$add_info[$i]]);

    //echo $seat[$i]."   ".$seat[$i]."   ".$cost[$i]."    ".$add_info[$i]."<br>";
  }
    //echo $seat[4]."<br>";

    $room = DB::table('room_info')->where('mess_id','=',$mess_id)->get();
   
    $member_info= DB::table('mess_members')->where('mess_id','=',$mess_id)->orderBy('room_id')->get();
    
  
    return view('add_member')->with(['room'=>$room])->with(['member_info'=>$member_info]);
      
   }

   public function simple_search(Request $req){
    $location = $_GET['area'];
    $seat = $_GET['vacant_seat'];
    $distance = $_GET['distance'];
    $fare = $_GET['fare'];
    $rent_start = 0;
    $rent_last = 0;

    
    if($location=="Location"){
        $location ="%%";
    }else{
      $location = "%".$location."%";
    }
    if($seat == NULL){
        $seat = 0;
    }
    if($distance == NULL){
        $distance = 1000000;
    }
    if($fare == "eco"){
        $rent_start=500;
        $rent_last = 1000;
    } elseif($fare == "mod"){
        $rent_start= 1001;
        $rent_last = 2000;
    } elseif($fare == "del"){
        $rent_start= 2001;
        $rent_last = 3000;
    }elseif($fare == "supdel"){
        $rent_start= 3001;
        $rent_last = 5000 ;
    }else{
        $rent_start= 0;
        $rent_last = 1000000;
    }

    //echo "Loc -".$location." dist-".$distance." rent-".$rent_start." to ".$rent_last." ." ;
    //$search_location = DB::table('basic_mess_info')->select('mess_id','mess_name','distance','mess_location')->where('mess_location','like',$location);
  //  dd($mess);
    //$search_vacant = DB::table('basic_mess_info')->select('mess_id','mess_name','distance','mess_location')->where('vacant_seat','>=',$seat);//->union($search_location);
//    $search_cost = DB::table('room_info')->select('mess_id','cost')->wherebetween('cost',[$rent_start,$rent_last])->union($search_vacant)->groupby('mess_id')->distinct()->get();
    $mess= DB::table('basic_mess_info')->join('room_info', 'basic_mess_info.mess_id', '=', 'room_info.mess_id')->select('basic_mess_info.*')->where([['basic_mess_info.vacant_seat','>=',$seat],['mess_location','like',$location],['distance','<=',$distance]])->wherebetween('cost',[$rent_start,$rent_last])->groupby('room_info.mess_id')->distinct()->simplePaginate(15);


#foreach ($mess as $mess) {
    # code...
#    $val = $mess->mess_name;
#    echo $val;
#}

    //select distinct basic_mess_info.mess_id,basic_mess_info.vacant_seat,mess_name,mess_location,cost from basic_mess_info, room_info where basic_mess_info.mess_id = room_info.mess_id and basic_mess_info.mess_location like '?' and basic_mess_info.vacant_seat >= ? and basic_mess_info.distance <= ? and room_info.cost between ? and ? GROUP BY basic_mess_info.mess_id,basic_mess_info.vacant_seat,mess_name,mess_location",[$location,$seat,$distance,$rent_start,$rent_last]);

//echo $location . " " . $seat . "  "  . $fare . "  " .$rent_start . "  " . $rent_last; 
             

    $location = DB::table('location')
            ->select('*')
            ->get();
            
     return view('search_result')->with(['mess'=>$mess])->with(['location'=>$location]);
        echo "success";
        
   }

   public function test(){
    /*$room_id = $req->input('room_id');
    $reg = $req->input('reg_no');
    $date = $req->input('vacant_from');
    $mess_id = 3;
    if($room_id != NULL and $reg != NULL) {
        DB::table('mess_members')->insert(['mess_id'=>$mess_id,'room_id' => $room_id , 'reg'=> $reg , 'vacant_from' => $date]);

        //DB::insert('insert into mess_members (mess_id, room_id,reg,vacant_from) values(?,?,?,?)',[$mess_id,$room_id,$reg,$date]);
    }

    
    $member_info= DB::table('mess_members')->where('mess_id','=',$mess_id)->get();
    $room = DB::table('room_info')->where('mess_id','=',$mess_id)->get();
   echo "room id : ".$room_id."reg : ".$reg."vacant_from : ".$date;
   // return view('test')->with(['room'=>$room])->with(['member_info'=>$member_info]);
    */
    $mess_id = $_GET['id'];
        echo $mess_id;
        $mess = DB::select('select * from basic_mess_info where mess_id = ?',[$mess_id]);
        $feature = DB::select('select * from mess_features where mess_id = ?',[$mess_id]);
        $room = DB::select('select * from room_info where mess_id =?',[$mess_id]);
        $member = DB::select('select distinct room_id,name from mess_members,users where mess_members.mess_id =?',[$mess_id]);
      return view('test',['mess'=>$mess]);

   }

   public function mess_list(){
        
    $mess= DB::table('basic_mess_info')->simplePaginate(2);

     return view('mess_list')->with(['mess'=>$mess]);
        echo "success";
        
   }

   public function mess_edit(){
    //$mess_id = Auth::user()->mess_id;
    $mess_id = Auth::user()->mess_id;
    $mess_info= DB::table('basic_mess_info')->where('mess_id','=',$mess_id)->get();
    return view('edit_mess_basic')->with(['mess_info'=>$mess_info]);
   }

   public function edit_room_info(){
    //$mess_id = Auth::user()->mess_id;
    $mess_id = $mess_id = Auth::user()->mess_id;
    ;
    $room_info= DB::table('room_info')->where('mess_id','=',$mess_id)->get();
    return view('edit_mess_room_info')->with(['room_info'=>$room_info]);
   }

   public function edit_single_room_info($room_id, $total_seat, $vacant_seat, $cost, $add_info){
    $mess_id = $mess_id = Auth::user()->mess_id;
    ;
    /*
    $room_info= DB::table('room_info')->where([
                                        ['mess_id','=',$mess_id],
                                        ['room_id','=',$room_id]
                                        ])
                                      ->get();
                                      */
    $room_info = [];
    $room_info['room_id'] = $room_id;
    $room_info['total_seat'] = $total_seat;
    $room_info['vacant_seat'] = $vacant_seat;
    $room_info['cost'] = $cost;
    $room_info['add_info'] = $add_info;

    return view('update_room_info')->with("room_info",$room_info);
   }

    public function member_list(Request $req){
    $room_id = $req->input('room_id');
    $reg = $req->input('reg_no');
    $date = $req->input('vacant_from');
    //$mess_id = Auth::user()->mess_id;
    $mess_id = Auth::user()->mess_id;
    $vacant = 0;
    
    $member_info= DB::table('mess_members')->where('mess_id','=',$mess_id)->orderBy('room_id')->get();
    $room = DB::table('room_info')->where('mess_id','=',$mess_id)->get();
   
    $mess = DB::table('basic_mess_info')->select()->where('mess_id','=',$mess_id)->get();
    
    if($room_id != NULL and $reg != NULL) {
        DB::table('mess_members')->insert(['mess_id'=>$mess_id,'room_id' => $room_id , 'reg'=> $reg , 'vacant_from' => $date]);

      DB::table('users')->where('reg','=',$reg)->update(['mess_id'=>$mess_id]);
      DB::table('room_info')->where([['mess_id','=',$mess_id],['room_id' , '=' , $room_id]])->decrement('vacant_seat');
      DB::table('basic_mess_info')->where ('mess_id','=',$mess_id)->decrement('vacant_seat');  //DB::insert('insert into mess_members (mess_id, room_id,reg,vacant_from) values(?,?,?,?)',[$mess_id,$room_id,$reg,$date]);
    }
    
    $member_info= DB::table('mess_members')->where('mess_id','=',$mess_id)->orderBy('room_id')->get();
    $room = DB::table('room_info')->where('mess_id','=',$mess_id)->get();
   
    $mess = DB::table('basic_mess_info')->select()->where('mess_id','=',$mess_id)->get();
    
    return view('add_member')->with(['room'=>$room])->with(['member_info'=>$member_info]);
   
   }

   public function mess_info_updated(Request $request){
    $mess_id = Auth::user()->mess_id;
    $name = $request->input('mess_name');
      $location = $request->input('location');
      $total_seat = $request->input('total_seat');
      $vacant_seat = $request->input('vacant_seat');
      $total_room = $request->input('total_room');
      $distance = $request->input('distance');
      $description = $request->input('description');
      DB::table('basic_mess_info')->where('mess_id','=',$mess_id)->update(['mess_name' => $name,'mess_location' => $location,'total_seat' => $total_seat,'vacant_seat' => $vacant_seat,'total_room' =>$total_room ,'distance' => $distance,'description' => $description]);
      //return view('/mess_profile');
      //echo $mess_id;
      //echo $location . "  " . $total_seat." ".$name ." ".$total_seat." ".$total_room;
      //echo "success";
      return redirect()->route('edit_mess');
   }

public function room_info_update(Request $request){
    $mess_id = Auth::user()->mess_id;
    //foreach($request as $request) {
    $room_id = $request->input('room_id');
    $seat = $request->input('seat_no');
    
    $vacant_seat = $request->input('vacant_seat');
    $cost =$request->input('fare') ;
      $description = $request->input('add_info');
      DB::table('room_info')->where([
                                        ['mess_id',$mess_id],
                                        ['room_id',$room_id]
                                        ])
      ->update(['total_seat' => $seat,'vacant_seat' => $vacant_seat,'cost' => $cost,'add_info' => $description]);
      //return view('/'); 
    //}
    //session::flush('success','Update successful!');
    //return view('edit_room_info');
      echo "mess_id".$mess_id;
}

public function manager_change(){

}

public function show_map(){
    return view('map');
}

public function upload_img(Request $req){
 /*   $user = 3;
    $file = $req->file('ban_img');
    $filename = 'banner_'.$user.'.jpg';
    if($file){
        Storage::disk('local')->put($filename,File::get($file));
    }
    echo $filename;
    return view('upload_photo');

    if($req->hasFile('image')){
        $req->file('image');
        return $req->image->store('public',$req->file('image'));
    }
    else{
        return "no file selected";
    }*/
    if($req->hasFile('image')){
        $image=$req->file('image');
        $mess_id = Auth::user()->mess_id;
        $filename = "banner_".$mess_id.".".$image->getClientOriginalExtension();
        //$req->image->path();
        //$req->image->extension();
        echo "cover successfully uploaded<br> <a href = 'manage_mess'>GO BACK</a><br>";
        return $req->image->storeAs('public',$filename);

        //$url = Storage::url($filename);
        //$path = public_path($filename);
        //Image::make($image->getRealPath())->resize(1200, 700)->save($path);
       // $img = Image::make($image->getRealPath())->resize(1200, 700)
        //return Storage::putFile('public',$req->file('image'));
        
    }
    else {
        return "No File Selected";
    }

}

public function get_mess_img($filename){
    $file = Storage::disk('local')->get($filename);
    return new Response($file, 200);
}
public function show_image(){
        //return "show";
    /*$mess_id = 3;
    $filename = "banner_".$mess_id.".jpg";
    //    return Storage::allfiles('public');
    $url = Storage::url($filename);
    return "<img src='".$url."'/>";
    */
    return view('show_image');
    }

public function delete_mess(){
  $mess_id = Auth::user()->mess_id;
  return view('delete_mess')->with(['mess_id'=>$mess_id]);
}

public function delete_mess_request(Request $delete_request){
  $mess_id = $delete_request->input('mess_id');
  return view('home');
}

public function add_mess_feature(){
  //$mess_id = Auth::user()->mess_id; 
  $mess_id = Auth::user()->mess_id;
  $current_features = DB::table('mess_features')->where('mess_id','=',$mess_id)->get();
  return view('add_mess_feature')->with(['current_features'=>$current_features]);
}

public function mess_feature_added(Request $add_mess_feature){
  $mess_id = Auth::user()->mess_id; 
  $feature_name = $add_mess_feature->input('feature_name');  
  DB::table('mess_features')->insert(['mess_id'=>$mess_id,'feature'=>$feature_name]);
  return redirect()->route('add_mess_feature');
}
public function mess_feature_deleted(Request $delete_mess_feature){
  $mess_id = Auth::user()->mess_id; 
  $feature_id = $delete_mess_feature->input('feature_id');
  DB::table('mess_features')->where([['mess_id','=', $mess_id],['count','=',$feature_id]])->delete();
  return redirect()->route('add_mess_feature');
}

public function get_slide(){
  $mess = DB::select('select * from basic_mess_info ');
  return view('slide')->with(['mess'=>$mess]);
}

}


