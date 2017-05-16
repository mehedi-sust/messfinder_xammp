$(document).ready(function(){
	var addButton = $('#add_button');
	var formContainer = $('#form_container');
	var feature_field = 
	'<div class="form-group"><input type="text" class="form-control" name="feature_name[]" style="width:87%; display:inline-block" placeholder="Enter feature here" required><span>  </span><button type="button" id="remove_button" class="btn btn-danger">Remove</button></div>'
    var  numberOfFeature = 5;
    var featureCounter=1;
    
    function editFeatures(){ // add the features of the mess
    	while(featureCounter<numberOfFeature){
    		$("#next_div").before(feature_field);
    		++featureCounter;
    	}
    }

    editFeatures(); // invoke editFeature function
    
	$(addButton).click(function(){
		numberOfFeature++;
        $("#next_div").before(feature_field);
	});

       
	$("#basic_info_form").on("click","#remove_button",function (event){
		event.preventDefault();
		$(this).parent('div').remove();
		numberOfFeature--;

	}); 
});
