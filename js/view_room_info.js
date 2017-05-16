$(document).ready(function(){    
    	var numberOfRoom = 6;
        var roomCounter = 4;
        

    	while(roomCounter <= numberOfRoom){
        $("#nav_pill_container").append("<li>"+
                                        "<a href=\"#room"+roomCounter+"\" data-toggle=\"tab\">Room"+roomCounter+"</a>"+
                                    "</li>");
        
    	$("#tab_content_container").append("<div class=\"tab-pane\" id=\"room"+roomCounter+"\">"+
                                                "<div class=\"table-responsive\">"+
                                                    "<table class=\"table custom-table\">"+
                                                    "<tbody>"+
                                                        "<tr>"+
                                                            "<td><strong>Total Seat:</strong></td>"+
                                                            "<td>3</td>"+
                                                        "</tr>"+
                                                        "<tr>"+
                                                            "<td><strong>Rent:</strong></td>"+
                                                            "<td>3600</td>"+
                                                        "</tr>"+
                                                        "<tr>"+
                                                            "<td><strong>Members:</strong>"+
                                                            "<td>"+
                                                                "<ul>"+
                                                                    "<li>Raihan</li>"+
                                                                    "<li>Zakaria</li>"+
                                                                    "<li>Rakib</li>"+
                                                                "</ul>"+
                                                            "</td>"+
                                                        "</tr>"+
                                                        "</tbody>"+
                                                    "</table>"+
                                                "</div>"+
                                            "</div>");
    	++roomCounter;    	
     
    }
});
