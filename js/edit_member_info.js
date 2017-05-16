$(document).ready(function(){
var numberOfRoom = 5;
var roomNo = populateSelect();

function populateSelect(){
 var room = "<div class=\"form-group\">"+
            "<label for=\"room_no\">Room No.: </label>"+
            " <select class=\"form-control\" name=\"room_no[]\" id=\"room_no\">"+
            "<option>Room 1</option>";
            
 var counter = 2;
 var room2 = "</select>"+
            "</div>";
 while(counter<=numberOfRoom){
  room = room + "<option>Room " + counter + "</option>";
  ++counter;
 }
 room = room + room2;
 return room;
}


var memberInfo = " ";
memberInfo = memberInfo + " " + roomNo;
memberInfo = memberInfo+
        " <div class=\"form-group\">"+
            " <label for=\"user_name\"> User Name: <\/label>"+
            " <input type=\"text\" class=\"form-control\" name=\"user_name[]\" id=\"user_name\" style=\"width:160px;\">"+
        "<\/div>"+
        " <div class=\"form-group\">"+
            " <label for=\"vacant_start_month\"> Vacant From(Month): <\/label>"+
            " <select name=\"vacant_start_month[]\" class=\"form-control\">"+
                "<option>NA<\/option>"+
                "<option>January<\/option>"+
                "<option>February<\/option>"+
                "<option>March<\/option>"+   
                "<option>April<\/option>"+
                "<option>May<\/option>"+
                "<option>June<\/option>"+
                "<option>July<\/option>"+
                "<option>August<\/option>"+
                "<option>September<\/option>"+
                "<option>October<\/option>"+
                "<option>November<\/option>"+
                "<option>December<\/option>"+
            "<\/select>"+
        "<\/div>"+
        " <div class=\"form-group\">"+
            " <label for=\"vacant_start_year\"> Vacant from(Year): <\/label>"+
            " <input type=\"text\" class=\"form-control\" rows=\"3\" name=\"vacant_start_year[]\" id=\"vacant_start_year\" style=\"width:160px;\">"+
        "<\/div><p></p><p></p>";
      
             
        $("#total_seat").focusout(function(){
            
        var numberOfMember = document.getElementById("total_seat").value;
        var memberCounter = 1;
        while(memberCounter <= numberOfMember){
        $("#submit_div").before(memberInfo);
        ++memberCounter;
        }       
        });
});