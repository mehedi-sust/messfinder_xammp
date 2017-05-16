@extends('layouts.app')

@if(Auth::check() and Auth::user()->type == "Admin")
<div class="jumbotron">
    <h1>Mess List</h1> <vr>
    <br>
</div>
<table class="table table-striped" border='1' align = 'center'>
<thead><tr style="background-color: #5bc0de; color:#fff">
<th>Count</th>
<th>Mess Name</th>
<th>Location</th>
<th>Total Seats</th>
<th>Rooms</th>
<th>Vacant Seat(s)</th>
<th>Distance from sust</th>
<th>Created On</th>
</tr>
</thead>

<tbody>
<?php     
$i=1;
  ?>    @foreach ($mess as $data) 
 <?php $mess_id = $data->mess_id;
 $a = "mess_profile?id=".$mess_id;
 ?>
            <tr>
            <td><?php echo $i++;?></td>
            <td><a href=<?php echo $a;?>>{{$data->mess_name}}</a></td>
            <td>{{$data->mess_location}}</td>
            <td>{{$data->total_seat}}</td>
            <td>{{$data->total_room}}</td>
            <td>{{$data->vacant_seat}}</td>
            <td>{{$data->distance}} KM</td>
            <td>{{ date('F d, Y', strtotime($data->created_at)) }}</td>
            </tr>
@endforeach 
 </tbody>
</table>

{!! $mess->render() !!}

@endif