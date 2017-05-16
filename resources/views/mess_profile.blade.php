@extends('layouts.app')
   
   @section('content')
   @foreach ($mess as $value)
   <?php 
   
    $mess_id = $_GET['id'];
    $filename = "banner_".$mess_id.".jpg";
    //    return Storage::allfiles('public');
    $url = Storage::url($filename);
    //echo $url."<br>";
    if(file_exists( public_path() . $url) ){
    echo "<img src='messfinder/public/".$url."/' id='mess_cover_photo'/>";
   // echo "<img src='/storage/advertisement_1.jpg' id=\"mess_cover_photo\"/>";
  }
?>

    <div class="container"> 
    <div class="container2"> 
      <div class="content">
        <div class="row">
          <div class="col-md-8 col-md-offset-1">
            <h2 class="page-header text-center" style="margin-left: 10px;">Basic Information</h2>
              <div id="table-responsive">
                <table class="table table-striped custom-table ">
                  <tbody>
                    <tr>
                      <td><strong>Mess Name:</strong></td>
                      <td><!--php code for mess name-->{{$value->mess_name}}</td>
                    </tr>
                    <tr>
                      <td><strong>Location:</strong></td>
                      <td><!--php code for location-->{{$value->mess_location}}</td>
                    </tr>

                    <tr>
                      <td><strong>Distacne from campus(in KM):</strong></td>
                      <td><!--php code-->{{$value->distance}}</td>
                    </tr>

                    <tr>
                      <td><strong>Total Room:</strong></td>
                      <td><!--php code--> {{$value->total_room}}</td>
                    </tr>

                    <tr>
                      <td><strong>Total Seat:</strong></td>
                      <td><!--php code--> {{$value->total_seat}}</td>
                    </tr>
                    <tr>
                      <td><strong>Vacant Seat:</strong></td>
                      <td><!--php code--> {{$value->vacant_seat}}</td>
                    </tr>
                    @endforeach
                    <tr>
                      <td><strong>Features:</strong></td>
                      <td>
                        <ul>
                        @foreach($feature as $value)
                          <li>{{$value->feature}}</li>
                        @endforeach
                        </ul>
                        </td>
                    </tr>
                    <tr>
                      <td><strong>Contact(Mobile):</strong></td>
                      <ul>
                        <td>  @foreach($mobile as $value)
                              
                              0{{$value->mobile}} ({{$value->name}})
                              @endforeach 
                        </td>         
                      </ul>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!--/.table-responsive-->
                        
                        <!--/.table-responsive-->
                        
                        <h2 class="page-header text-center">Vacancy Informamtion</h2>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr style="background-color: #48cfad; color:#fff">
                                        <th>Room No.</th>
                                        <th>Vacant Seat</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($room as $value)
                                    <tr>
                                        <td>Room {{$value->room_id}}</td>
                                        <td>{{$value->vacant_seat}}</td>
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--/.table-responsive-->

<h2 class="page-header text-center">Members Information</h2>
<div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr style="background-color: #48cfad; color:#fff">
                                        <th>Room No.</th>
                                        <th>Reg no.</th>
                                        <th>Name</th>
                                        @if(Auth::check() && Auth::user()->type == 'Admin')
                                        <th>Mobile</th>
                                        @endif
                                        <th>Vacant From</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($member as $value)
                                    <tr>
                                        <td>Room {{$value->room_id}}</td>
                                        <td>{{$value->reg}}</td>
                                        <td>{{$value->name}}</td>
                                        @if(Auth::check() && Auth::user()->type == 'Admin')
                                        <td>{{$value->mobile}}</td>
                                        @endif
                                        <td></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                       

                       <h2 class="page-header text-center">Room Information</h2>
                            <div class="container">
                                <ul class="nav nav-pills">
                                    @foreach($room as $value)
                                    <?php 
                                        $id = $value->room_id;
                                        $link = "<a href='#room".$id."' data-toggle='tab'>";
                                        if($id==1){
                                    ?>
                                    <li class="active">
                                    <?php }
                                    else echo"<li>";
                                       echo $link; ?>
                                        Room {{$value->room_id}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!--/.container-->

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tab-content clearfix">
                                        @foreach ($room as $value)
                                        <?php
                                         $id = $value->room_id;
                                         if($id==1){
                                        $link = "<div class='tab-pane active' id='room".$id."'>";
                                        }
                                        else $link = "<div class='tab-pane' id='room".$id."'>";
                                         
                                         echo $link;
                                        ?>
                                                <div class="table-responsive">
                                                    <table class="table custom-table">
                                                    <tbody>
                                                        <tr>
                                                            <td><strong>Total Seat:</strong></td>
                                                            <td>{{$value->total_seat}}</td>
                                                        </tr>

                                                        <tr>
                                                            <td><strong> Vacant:</strong></td>
                                                            <td>{{$value->vacant_seat}}</td>
                                                        </tr>

                                                        <tr>
                                                            <td><strong>Rent:</strong></td>
                                                            <td>{{$value->cost}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Additional Info:</strong></td>
                                                            <td>{{$value->add_info}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Members:</strong>
                                                            <td>
                                                                <ul>
                                             @foreach($member as $person)
                                                @if($person->room_id==$value->room_id)
                                                <li><a href="">{{$person->name}}</a> </li>
                                                @endif
                                             @endforeach 
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--/.table-responsive-->                
                                            </div>
                                            <!--/.tab-pane-->
                                            @endforeach
                                       </div>
                                        <!--/.tab-content clearfix-->
                                    </div>
                                    <!--/.col-md-6-->
                                </div>
                                <!--/.row-->
                        </div>
                       <!--/.col-md-5-->
                    </div>
                    <!--/.row-->
                </div>
                <!-- /.content-->
           </div>     
           <!-- /.container2-->
           </div>
           <!-- /.container-->
   @endsection