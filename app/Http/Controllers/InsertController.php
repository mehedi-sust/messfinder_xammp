<?php 
namespace App\Http\Controllers;

class InsertController{

	function insert_mess_basic(Request $req){
		$mess_name = $req->input('mess_name');
		$location = $req->input('mess_location');
		$distance = $req->input('distance');
		$description = $req->input('description');

		$data = array('mess_name'=>$mess_name,'mess_location'=>$location,'distance'=>$distance,'description'=>$description);
		DB::table('basic_mess_info')->insert($data);
	}
}


?>