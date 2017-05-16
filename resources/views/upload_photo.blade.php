@extends('layouts.app')

@if(Auth::check() and Auth::user()->type == "Manager")
<!DOCTYPE html>
<html lang="en">

<head>

</head>


<body>

    <!-- Navigation -->
   
    <div class="container2" id="form_container" style="width:80%; margin-left: 260px;">
    <h2 class="page-header" style="text-align: center">Upload </h2>
    
    <form action="uploaded" enctype="multipart/form-data" method="post">

    

       
            <label for="image">Mess Banner</label>
            <input type="file" class="form-control" id="image" name="image" >
            <input type="submit" value="Upload" class="btn btn-success" >
        {{csrf_field() }}
</form>
</div>

</body>
</html>
@endif