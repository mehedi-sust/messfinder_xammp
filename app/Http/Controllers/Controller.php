<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function insert_mess_basic(Request $req){
		$mess_name = $req->input('mess_name');
		$location = $req->input('mess_location');
		$distance = $req->input('distance');
		$description = $req->input('description');

		$data = array('mess_name'=>$mess_name,'mess_location'=>$location,'distance'=>$distance,'description'=>$description);
		DB::table('basic_mess_info')->insert($data);
		return "success";
	}

	function show_mess_info(){
		//$data = DB::select('select mess_name from basic_mess_info where mess_id = ?',[1]);
		//$mess['mess'] = DB::table('basic_mess_info')->get();
		$id = 1;
		$mess = DB::select('select * from basic_mess_info where mess_id = ?',[$id]);
		
		$name = DB::select('select mess_name from basic_mess_info where mess_id = ?',[$id]);
		
		$location = DB::select('select mess_location from basic_mess_info where mess_id = ?',[$id]);
		

		$total_row = count($mess);
		if($total_row>0){
			echo "row is is greater then zoero ::";
			echo $total_row;
			echo $name;
			echo $location;
			/*@foreach ($mess as $value) {
				echo $value->mess_name;
			}//dont work
			@endforeach*/
		}
		else {
			echo "row count zero";
		}

		//$data = "hello";
		//echo $data['mess_id'];
		//return view('mess_info',['basic_mess_info' => $data]);
	}

	public function showdb(){
		$id =2;
      $mess = DB::select('select * from basic_mess_info where mess_id = ?',[$id]);
      return view('mess_info',['mess'=>$mess]);
   }

   public function show_mess_profile()
    {
        //
        $id = 3;
        $mess = DB::select('select * from basic_mess_info where mess_id = ?',[$id]);
      return view('mess_profile',['mess'=>$mess]);
        echo "success";
    }
}
