@foreach($mess as $value)

<?php 
    $mess_id = $value->mess_id;
    $filename = "banner_".$mess_id.".jpg";
    //    return Storage::allfiles('public');
    $url = Storage::url($filename);
    echo $url."<br>";
    echo "<img src='".$url."' width =800 hieght=300/>";
?>

@endforeach