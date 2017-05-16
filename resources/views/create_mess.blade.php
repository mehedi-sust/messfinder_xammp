@extends('layouts.app')

@if (!Auth::check())
Sorry You cannot access this Page. Please Log in first.


@elseif(Auth::check() and Auth::user()->mess_id == 0)

<body>

    <!-- Navigation -->

   <div class="container2" id="form_container" style="width:50%">
      <h3 class="page-header text-center">Basic Information of Mess</h3>
      <form id="basic_info_form" action="/mess_created" method="post">
      {{csrf_field() }}
        <div class="form-group required">
          <label for="mess_name" class="control-label"> Mess Name</label>
          <input type="text" class="form-control" id="mess_name" name="mess_name" placeholder="Enter mess name" required>
        </div>
        <div class="form-group required">
          <label for="mess_location" class="control-label">Location</label>
          <input type="text" class="form-control" id="mess_location" placeholder="Enter location of mess" name="location" required>
        </div>
        <div class="form-group required">
         <label for="total_room" class="control-label">Total room</label>
         <input type="text" class="form-control" id="total_room" placeholder="Enter total number of rooms" name="total_room" required>
        </div>
        <div class = "form-group required">
         <label for="total_seat" class="control-label">Total Seat </label>
         <input type="text" class="form-control" id="total_seat" placeholder="Enter total number of seats" name="total_seat" required>
        </div>
        <div class = "form-group required">
         <label for="campus_distance" class="control-label">Distance from campus (in KM)</label>
         <input type="text" class="form-control" id="campus_distance" name="distance" placeholder="Enter the time required to reach campus from mess">
        </div>
           <div class="form-group" id="next_div">
            <button class="btn btn-success" >Create Mess and Continue</button>
        </div>

      </form>
    </div>
</body>
</html>
@else

<div class="container2" id="form_container" style="width:50%">

<h2> You are already in a mess.</h2>

</div>

@endif