$(document).ready(function(){
	var roomInfo = 
	"<legend id=\"room_no\"><\/legend>" +
        " <div class=\"form-group\">" +
            "<label for=\"seat_no\"> No. of Seat: <\/label>" +
            " <input type=\"text\" class=\"form-control input-lg\" name=\"seat_no[]\" id=\"seat_no\">" +
        "<\/div>" +
        " <div class=\"form-group\">" +
            " <label for=\"fare\"> Rent: <\/label>" +
            " <input type=\"text\" class=\"form-control input-lg\" name=\"fare[]\" id=\"fare\">" +
        "<\/div>" +         
        " <div class=\"form-group\">"+
            " <label for=\"more_info\"> More Information: <\/label>" +
            " <textarea class=\"form-control input-lg\" rows=\"3\" name=\"more_info[]\" id=\"more_info\" style=\"resize:none;\" placeholder=\"Enter additional information here...\"><\/textarea>" +
        "<\/div>";
        
    	var numberOfRoom = $('#total_room').val();;
        var roomCounter = 2;
    	while(roomCounter <= numberOfRoom){
    	$("#add_room_info_btn").before(roomInfo);
        document.getElementsByTagName("LEGEND")[roomCounter-1].innerHTML = "Room "+roomCounter;
    	++roomCounter;    
        }	
});
