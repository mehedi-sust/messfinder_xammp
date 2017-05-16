@extends('layouts.app')
@section('content')
  <!-- begin:header -->
    <div id="header" class="heading" style="background-image: url(img/img01.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-sm-12">
            <div class="page-title">
              <h2>Add Mess Member</h2>
            </div>
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Add Member</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- end:header -->

<?php 
$i=0;
foreach ($member_info as $value) {
  $i++;
}
if($i==0){

?>

  <!-- begin:progress steps -->
<div class="container">
    <div class="row bs-wizard" style="border-bottom:0;">
        <div class="col-xs-3 bs-wizard-step complete">
          <div class="text-center bs-wizard-stepnum">Step 1</div>
          <div class="progress"><div class="progress-bar"></div></div>
          <a href="#" class="bs-wizard-dot"></a>
          <div class="bs-wizard-info text-center">Basic Information</div>
        </div>
        
        <div class="col-xs-3 bs-wizard-step complete"><!-- complete -->
          <div class="text-center bs-wizard-stepnum">Step 2</div>
          <div class="progress"><div class="progress-bar"></div></div>
          <a href="#" class="bs-wizard-dot"></a>
          <div class="bs-wizard-info text-center">Room Information</div>
        </div>
        
        <div class="col-xs-3 bs-wizard-step active"><!-- complete -->
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
<?php } ?>


  <!-- begin: add member form -->
  <div class="content" id="add_member_content_form">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-arillo">
          <div class="panel-heading"><h4>Add Member Information</h4></div>
            <div class="panel-body">
            <form class="form-inline" id="member_infor_form" action="add_member" method="post">
                <div class="form-group">
                    <label for="sel1">Room No.:</label>
                    <select class="form-control" id="sel1" name="room_id">
                        @foreach($room as $room)
                            @if($room->vacant_seat > 0)
                            <option value ="{{$room->room_id}}" > Room {{$room->room_id}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="reg_no"> Reg. No.: </label>
                    <input type="text" class="form-control" name="reg_no" id="reg_no">
                </div>

                <div class="form-group">
                <label>Vacant from :</label>
                <input  type="date" class="form-control" id="vacant_start_month" name="vacant_from" />
                </div>

                <div class="form-group col-md-offset-1">
                    <button class="btn btn-success" type="submit">Add</button>
                </div>
                {{csrf_field() }}
            </form>
                <a href = "{{ route('add_mess_feature')}}" class="btn btn-success col-md-offset-5" id="add_member_next_btn">Next</a>
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
   <!-- end:add member form -->
  
  <!-- begin:member list -->
  <div class="content" id="add_member_content_list">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-arillo">
          <div class="panel-heading"><h4>Member List</h4></div>
              <table class="table table-striped">
              <thead>
              <!--style="background-color: #5bc0de; color:#fff" -->
                <tr>
                  <th>Room No.</th>
                  <th>Reg. No.</th>
                  <th>Vacant From</th>
                  <th>Delete Member</th>
                </tr>
              </thead>
                
                
                @foreach($member_info as $data)
              <tbody>
                <td>Room {{$data->room_id}}</td>
                <td>{{$data->reg}}</td>
                @if($data->vacant_from != NULL)
                <td>{{date('F d, Y', strtotime($data->vacant_from))}}</td>
                @else
                <td></td>
                @endif
                <td> 
                <form class="delete" action="delete_member" method="POST">
                  <input type="hidden" name="mem_reg" value="{{$data->reg}}">
                  <input type="hidden" name="room_id" value="{{$data->room_id}}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <input type="submit" value="Delete" class="btn btn-danger" >
                </form>
                </td>
              </tbody>
              @endforeach
              </table>
        </div>
        <!-- /.panel -->
      </div>
      <!-- /.col-md-8 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.content -->
  <!-- end:member list -->
@endsection



