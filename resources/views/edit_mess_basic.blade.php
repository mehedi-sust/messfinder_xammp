@extends('layouts.app')

@section('content')

@if(Auth::check() and Auth::user()->type == "Manager")
    <!-- begin:header -->
    <div id="header" class="heading" style="background-image: url(img/img01.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-sm-12">
            <div class="page-title">
              <h2>Edit Basic Information</h2>
            </div>
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Edit Basic Information</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- end:header -->

<!-- begin:form -->
<div class="content" id="create_mess_content">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-arillo">
        <div class="panel-heading"><h4>Edit Basic Information</h4></div>
        <div class="panel-body">
        @foreach($mess_info as $data)
          <form id="basic_info_form" action="mess_info_updated" method="post">
          {{csrf_field() }}
            <div class="form-group required">
              <label for="mess_name" class="control-label"> Mess Name</label>
              <input type="text" class="form-control input-lg" id="mess_name" name="mess_name" value = "{{$data->mess_name}}" placeholder="Enter mess name" required>
            </div>
            <div class="form-group required">
              <label for="mess_location" class="control-label">Location</label>
              <select class="form-control input-lg" id = "mess_location" name="location"  required>
                    <option value = "{{$data->mess_location}}">{{$data->mess_location}}</option>
                    <option>Varsity Gate</option>
                    <option>Tilargaogn</option>
                    <option>Topobon</option>
                    <option>Khuliapara</option>
                    <option>Surma</option>
                    <option value="Modina Market" >Modina Market</option>
              </select>
            </div>
            <div class="form-group required">
             <label for="total_room" class="control-label" >Total room</label>
             <input type="text" class="form-control input-lg" id="total_room" placeholder="Enter total number of rooms" name="total_room"  value = "{{$data->total_room}}"  required>
            </div>
            <div class = "form-group required">
             <label for="total_seat" class="control-label">Total Seat </label>
             <input type="text" class="form-control input-lg" id="total_seat" placeholder="Enter total number of seats" name="total_seat" value = "{{$data->total_seat}}" required>
            </div>
            <div class = "form-group required">
             <label for="campus_distance" class="control-label">Distance from campus (in KM)</label>
             <input type="text" class="form-control input-lg" id="campus_distance" name="distance" placeholder="Enter the distance of mess from campus" value = "{{$data->distance}}">
            </div>
              <div class="form-group col-md-offset-5" id="next_div">
              <button class="btn btn-success btn-lg" type="submit" >Save</button>
            </div>
          </form>
           @endforeach
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
      <!-- /.col-md-8 -->
  </div>
  <!-- /.row -->
</div>

@else

<h2> ERROR!!! You can not access this page.</h2>
@endif
<!-- /.content -->
<!-- end:form -->
@endsection