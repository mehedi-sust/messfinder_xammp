@extends('layouts.app')
@section('content')
  <!-- begin:header -->
    <div id="header" class="heading" style="background-image: url(img/img01.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-sm-12">
            <div class="page-title">
              <h2>Edit Room Information</h2>
            </div>
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Edit Room Information</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- end:header -->

<!-- begin:room list -->
  <div class="content" id="add_member_content_list">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-arillo">
          <div class="panel-heading"><h4>Room Information</h4></div>
              <table class="table table-striped">
              <thead>
              <!--style="background-color: #5bc0de; color:#fff" -->
                <tr>
                  <th>Room No.</th>
                  <th>No. of Seat</th>
                  <th>Vacant Seat</th>
                  <th>Rent</th>
                  <th>Additional Information</th>
                  <th>Edit</th>
                </tr>
              </thead>
                
              <tbody>
              @foreach($room_info as $data)
                <tr>
                  <td>Room {{$data->room_id}}</td>
                  <td>{{$data->total_seat}}</td>
                  <td>{{$data->vacant_seat}}</td>
                  <td>{{$data->cost}}</td>
                  <td>{{$data->add_info}}</td>
                  <td>
                    <a class="btn btn-info" href = "{{ route('edit_single_room_info', ['room_id' => $data->room_id, 'total_seat' => $data->total_seat, 'vacant_seat' =>$data->vacant_seat, 'cost'=>$data->cost, 'add_info'=>$data->add_info]) }}" id="edit_button">Edit</a>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
        </div>
        <!-- /.panel -->
      </div>
      <!-- /.col-md-8 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.content -->
  <!-- end:room list -->
@endsection



