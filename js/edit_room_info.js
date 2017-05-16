$(document).ready(function(){
	var roomInfo = 
	"<legend id=\"room_no[]\"><\/legend>" +
        " <div class=\"form-group\">" +
            "<label for=\"seat_no\"> No. of Seat: <\/label>" +
            " <input type=\"text\" class=\"form-control\" name=\"seat_no[]\" id=\"seat_no\" style=\"width:160px;\">" +
        "<\/div>" +
        " <div class=\"form-group\">" +
            " <label for=\"vacant_seat\"> Vacant Seat: <\/label>" +
            " <input type=\"text\" class=\"form-control\" name=\"vacant_seat[]\" id=\"vacant_seat\" style=\"width:160px;\">" +
        "<\/div>" +
        " <div class=\"form-group\">" +
            " <label for=\"fare\"> Fare: <\/label>" +
            " <input type=\"text\" class=\"form-control\" name=\"fare[]\" id=\"fare\" style=\"width:160px;\">" +
        "<\/div>" +         
        " <div class=\"form-group\">"+
            " <label for=\"more_info\"> More Information: <\/label>" +
            " <textarea class=\"form-control\" rows=\"3\" name=\"more_info[]\" id=\"more_info\" style=\"width:180px;\" placeholder=\"Enter additional information here...\"><\/textarea>" +
        "<\/div>";
        
    $("#total_room").focusout(function(){
    	var numberOfRoom = document.getElementById("total_room").value;
        var roomCounter = 2;
    	while(roomCounter <= numberOfRoom){
    	$("#next_div").before(roomInfo);
        document.getElementsByTagName("LEGEND")[roomCounter-1].innerHTML = "Room "+roomCounter;
    	++roomCounter;    	
    }
    document.getElementById("total_room").disabled=true;
    });
});


	