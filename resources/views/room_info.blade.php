@extends('layouts.app')



@section('custom_css_js')
     @parent 
   <!-- Custom CSS for this page-->
    <script src="{{ asset('js/add_room_info.js') }}"></script>
    <style>
    #next_div{
        margin-top: 25px;
    }
    </style>
@endsection

@section('content')

@foreach ($mess as $value)



@if(Auth::user()->type == "Manager" and $value->room_info == "no")
    <!-- Navigation -->

    <div class="container" id="form_container" style="width:66.667%">
    <h2 class="page-header" style="text-align: center">Enter Room Information</h2>
    <form class="form-inline" action="room_info_inserted" method = "post" id="room_info_form">
    {{csrf_field()}}
    <div class="form-group required">
         <label for="total_room" class="control-label">Total Room: </label>
         <input type="text" class="form-control" id="total_room" placeholder="Enter total number of rooms" value="{{$value->total_room}}">
    </div>
    <legend>Room 1</legend>
        
        <div class="form-group">
            <label for="seat_no">No. of Seat: </label>
            <input type="text" class="form-control" name="seat_no[]" id="seat_no">
        </div>

        <div class="form-group">
            <label for="fare">Rent: </label>
            <input type="text" class="form-control" name="fare[]" id="fare">
        </div>
         
        <div class="form-group">
            <label for="more_info">More Information: </label>
            <textarea type="text" class="form-control" rows="3" name="more_info[]" id="more_info" placeholder="Enter additional information here..."></textarea>
        </div>

        <div class="form-group col-xs-offset-4" id="next_div">
            <button class="btn btn-success" id="next_button">Next</button>
        </div>
        </form>
    </div>    
    @else
    <div class="container">
        <h1 class="text-center">Sorry You Don't Have Access to This Page!</h1>
    </div>
@endif
@endforeach
@endsection