@extends('layouts.app')


@if (!Auth::check())
Sorry You cannot access this Page. Please Log in first.


@elseif(Auth::check() and Auth::user()->mess_id == 0)
@section('content')
<!-- begin:header -->
    <div id="header" class="heading" style="background-image: url(img/img01.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-sm-12">
            <div class="page-title">
              <h2>Create Mess</h2>
            </div>
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Create Mess</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- end:header -->

<!-- begin:progress steps -->
<div class="container">
    <div class="row bs-wizard" style="border-bottom:0;">
        <div class="col-xs-3 bs-wizard-step active">
          <div class="text-center bs-wizard-stepnum">Step 1</div>
          <div class="progress"><div class="progress-bar"></div></div>
          <a href="#" class="bs-wizard-dot"></a>
          <div class="bs-wizard-info text-center">Basic Information</div>
        </div>
        
        <div class="col-xs-3 bs-wizard-step disabled"><!-- complete -->
          <div class="text-center bs-wizard-stepnum">Step 2</div>
          <div class="progress"><div class="progress-bar"></div></div>
          <a href="#" class="bs-wizard-dot"></a>
          <div class="bs-wizard-info text-center">Room Information</div>
        </div>
        
        <div class="col-xs-3 bs-wizard-step disabled"><!-- complete -->
          <div class="text-center bs-wizard-stepnum">Step 3</div>
          <div class="progress"><div class="progress-bar"></div></div>
          <a href="#" class="bs-wizard-dot"></a>
          <div class="bs-wizard-info text-center">Member Information</div>
        </div>
        
        <div class="col-xs-3 bs-wizard-step disabled"><!-- active -->
          <div class="text-center bs-wizard-stepnum">Step 4</div>
          <div class="progress"><div class="progress-bar"></div></div>
          <a href="#" class="bs-wizard-dot"></a>
          <div class="bs-wizard-info text-center">Extra Features</div>
        </div>
    </div>
  </div>
<!-- end:progress steps -->


<!-- begin:form -->
<div class="content" id="create_mess_content">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-arillo">
        <div class="panel-heading"><h4>Basic Information</h4></div>
        <div class="panel-body">
          <form id="basic_info_form" action="mess_created" method="post">
          {{csrf_field() }}
            <div class="form-group required">
              <label for="mess_name" class="control-label"> Mess Name</label>
              <input type="text" class="form-control input-lg" id="mess_name" name="mess_name" placeholder="Enter mess name" required>
            </div>
            <div class="form-group required">
              <label for="mess_location" class="control-label">Location</label>
              <select class="form-control input-lg" id = "mess_location" name="location" required>
                    @foreach($location as $data)
                        <option value="{{$data->location}}">{{$data->location}}</option>
                    @endforeach
              </select>
            </div>
            <div class="form-group required">
             <label for="total_room" class="control-label">Total room</label>
             <input type="text" class="form-control input-lg" placeholder="Enter total number of rooms" name="total_room" required>
            </div>
            <div class = "form-group required">
             <label for="total_seat" class="control-label">Total Seat</label>
             <input type="text" class="form-control input-lg" id="total_seat" placeholder="Enter total number of seats" name="total_seat" required>
            </div>
            <div class = "form-group required">
             <label for="campus_distance" class="control-label">Distance from campus (in KM)</label>
             <input type="text" class="form-control input-lg" id="campus_distance" name="distance" placeholder="Enter the distance of mess from campus">
            </div>
              <div class="form-group col-md-offset-4" id="next_div">
              <button class="btn btn-success btn-lg" >Create Mess and Continue</button>
            </div>
          </form>
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
      <!-- /.col-md-8 -->
  </div>
  <!-- /.row -->
</div>
<!-- /.content -->
<!-- end:form -->
@endsection
@endif