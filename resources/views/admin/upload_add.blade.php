@extends('layouts.app')

@if(Auth::check() and Auth::user()->type == "Admin")
<!DOCTYPE html>
<html lang="en">

<head>

</head>


<body>

    <!-- Navigation -->
   
    <div class="container2" id="form_container" style="width:80%; margin-left: 260px;">
    <h2 class="page-header" style="text-align: center">Upload Advertisement</h2>
    
    <form action="uploaded_ad" enctype="multipart/form-data" method="post">

            <label for="image1">Advertisement 1</label><br>
            
		<?php 
if(file_exists( public_path() . '/storage/advertisement_1.jpg') )
 {
    $filename = "advertisement_1.jpg";
    //    return Storage::allfiles('public');
    $url = Storage::url($filename);
    //echo $url."<br>";
    echo "<label>Current Advertisement: </label>";
    echo "<img src='messfinder/public/".$url."/' width =30% hieght=30%/>";
}
else echo "No current Advertisement";

?>

            <input type="file" class="form-control" id="image1" name="image1" >
        {{csrf_field() }}


       
            <label for="image2">Advertisement 2</label><br>

<?php 
if(file_exists( public_path() . '/storage/advertisement_2.jpg') )
 {
    $filename = "advertisement_2.jpg";
    //    return Storage::allfiles('public');
    $url = Storage::url($filename);
    //echo $url."<br>";
    echo "<label>Current Advertisement: </label>";
    echo "<img src='messfinder/public/".$url."/' width =30% hieght=30%/>";
}else echo "No current Advertisement";


?>

            <input type="file" class="form-control" id="image2" name="image2" >
            

 

       
            <label for="image3">Advertisement 3</label><br>
<?php 
if(file_exists( public_path() . '/storage/advertisement_3.jpg') )
 {
    $filename = "advertisement_3.jpg";
    //    return Storage::allfiles('public');
    $url = Storage::url($filename);
    //echo $url."<br>";
    echo "<label>Current Advertisement: </label>";
    echo "<img src='messfinder/public/".$url."/' width =30% hieght=30%/>";
}else echo "No current Advertisement";

?>

            <input type="file" class="form-control" id="image3" name="image3" >


 

       
            <label for="image4">Advertisement 4</label><br>

<?php 
 if(file_exists( public_path() . '/storage/advertisement_4.jpg') )
 {
    $filename = "advertisement_4.jpg";
    //    return Storage::allfiles('public');
    $url = Storage::url($filename);
    //echo $url."<br>";
    echo "<img src='messfinder/public/".$url."/' width =30% hieght=30%/>";
}
else echo "No current Advertisement";
?>


            <input type="file" class="form-control" id="image4" name="image4" >
            <input type="submit" class="btn btn-success" value="Upload" >

</form>

</div>

</body>
</html>
@endif