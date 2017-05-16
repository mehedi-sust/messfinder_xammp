
<?php 
if(file_exists( public_path() . '/storage/advertisement_1.jpg') )
 {
    $filename = "advertisement_1.jpg";
    //    return Storage::allfiles('public');
    $url = Storage::url($filename);
    echo $url."<br>";
    echo "<label>Current Advertisement: </label>";
    echo "<img src='\public\storage\advertisement_1.jpg' width =30% hieght=30%/>";
}
else echo "No current Advertisement";

?>
<br><br>


<?php 
    $mess_id = 3;
    $filename = "banner_".$mess_id.".jpg";
    //    return Storage::allfiles('public');
    $url = Storage::url($filename);
    echo $url."<br>";
    echo "<img src='messfinder/public/".$url."/' width ='100%' height='500'/>";
?>

@if(file_exists('img/la.jpg') )
 {
    <div>
        <img src="img/la.jpg" alt="Los Angeles">
        <div class="carousel-caption">
          
        </div>
      </div>
}
@else echo "No current Advertisement";

@endif
