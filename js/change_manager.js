$(document).ready(function(){
    alert("GOT IT!!!");
var numberOfMember = 5;
var memberName = populateSelect();

function populateSelect(){
 var member = "<div class=\"form-group\">"+
            "<label for=\"member_no\">Member Name: </label>"+
            " <select class=\"form-control\" name=\"manager_name\" id=\"manager_name\">"+
            "<option>member 1</option>";
            
 var counter = 1;
 var member2 = "</select>"+
            "</div>";
 while(counter<=numberOfmember){
  member = member + "<option>member " + counter + "</option>";
  ++counter;
 }
 member = member + member2;
 return member;
}

$("#submit_div").before(memberName);
});