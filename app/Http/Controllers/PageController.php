<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Storage;
use DB;
use Auth;
class PageController extends Controller{
	public function getIndex() {
		# process varibale data or params
		#talk to the Model
		#recive from model
		#compile or process the data fform the model if needed
		#pass that data to the correct view
		$mess = DB::select('select * from basic_mess_info ');
		$locations = DB::table('location')
            ->select('*')
            ->get();
        
		return view('index')->with(['locations'=>$locations])->with(['mess'=>$mess]);
	}

	public function getAbout(){
		return view('pages/about');// .or / works the same they mean the directory 
	}

	public function  getContact(){
		return view('pages/contact');
	}

	public function getCreateMess() {
		return view('create_mess');
	}

	public function getMessInfo(){
		return view('mess_info');
	}

	public function getMessProfile(){
		return view('mess_profile');
	}
	public function getRoomInfo(){
		//$mess_id = Auth::user()->mess_id;
		$mess_id = Auth::user()->mess_id;
		$mess = DB::table('basic_mess_info')->select()->where('mess_id','=',$mess_id)->get();
		$room = DB::table('room_info')->select('*')->where('mess_id','=',$mess_id)->get();
		echo $mess_id;
		return view('add_room_info',['mess'=> $mess])->with(['room'=>$room]);
	}

	public function getSearchResult(){
		return view('search_result');
	}

	public function test(){
		return view('test');
	}

	public function get_edit_mess(){
		return view('edit_mess_basic');
	}

	public function get_edit_room_info(){
		return view('edit_mess_room_info');
	}

	public function get_mess_info_home(){
		return view('mess_info_home');
	}

	public function show_upload_photo(){
		return view('upload_photo');
	}

	public function get_upload_add(){
		return view('admin/upload_add');
	}	

	public function get_manage_mess(){
		$mess_id = Auth::user()->mess_id;
		$check = DB::table('basic_mess_info')->where('mess_id','=',$mess_id)->get();
		foreach ($check as  $value) {
			# code...
			//echo $value->room_info;
		}
		return view('manage_mess')->with(['check'=>$check]);
	}

}

?>