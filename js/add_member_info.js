$(document).ready(function(){
var numberOfRoom = 5;
var roomNo = populateSelect();

function populateSelect(){
 var room = "<div class=\"form-group\">"+
            "<label for=\"room_no\">Room No.: </label>"+
            " <select class=\"form-control\" name=\"room_no[]\" id=\"room_no\">"+
            "<option>Room 1</option>";
            
 var counter = 1;
 var room2 = "</select>"+
            "</div>";
 while(counter<=numberOfRoom){
  room = room + "<option>Room " + counter + "</option>";
  ++counter;
 }
 room = room + room2;
 return room;
}

$("#reg_div").before(roomNo);

/*

var memberInfo = " ";
memberInfo = memberInfo + " " + roomNo;
memberInfo = memberInfo+
        "<div class=\"form-group\">"+
            " <label for=\"reg_no\"> Reg. No.: <\/label>"+
            " <input type=\"text\" class=\"form-control\" name=\"reg_no[]\" id=\"reg_no\">"+
        "<\/div>"+
        " <div class=\"form-group\">"+
            " <label for=\"vacant_start_month\"> Vacant From: <\/label>"+
            " <input type=\"date\" name=\"vacant_start_month[]\" class=\"form-control\">"+
        "<\/div>"+
        "<p></p><p></p><p></p>";
      
        	
    	var numberOfMember = 5;
        var memberCounter = 1;
    	while(memberCounter <= numberOfMember){
    	$("#submit_div").before(memberInfo);
    	++memberCounter;
    	}    	
        */
});