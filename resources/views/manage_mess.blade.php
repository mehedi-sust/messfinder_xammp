@extends('layouts.app')

@section('content')

@if(Auth::check() and Auth::user()->type == "Manager")

<div class="container">
  <h2>Manage My Mess</h2>
  <div class="list-group" style="text-align: center;">
    <a href="edit_mess" class="list-group-item">Edit Mess Basic Information</a>
    @foreach($check as $data)
    @if($data->room_info == "no")
    <a href="room_info" class="list-group-item">Add Room Information</a>
    
    @else
    <a href="edit_room_info" class="list-group-item">Edit Room Information</a>
    
    @endif
    @endforeach
    <a href="add_member" class="list-group-item">Update Mess Member List</a>
    <a href="add_mess_feature" class="list-group-item">Update Mess Features</a>
    <a href="upload_photo" class="list-group-item">Upload Mess Cover Photo</a>
    <a href="change_manager" class="list-group-item">Change Manager</a>
  </div>
</div>


@else

<h2> ERROR!!! You can not access this page.</h2>
@endif
<!-- /.content -->
<!-- end:form -->
@endsection