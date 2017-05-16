@extends('layouts.app')

@section('content')

<div id="header" class="heading" style="background-image: url(img/img01.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-sm-12">
            <div class="page-title">
              <h2>Search Result</h2>
            </div>
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Search Result</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- end:header -->

<!-- begin:quick search-->
<div class="content" id="search_result_quick_search">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="quick-search">
              <div class="row">
                <form role="form" class="form-inline">
                   <div class="form-group col-md-offset-2">
                  <select class="form-control" id="area" name="area">
                  <option value="Location">Location</option>
                    @foreach($location as $data)
                    <option value="{{$data->location}}">{{$data->location}}</option>

                    @endforeach
                  </select>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Vacant Seat" id="vacant_seat" name="vacant_seat">
                </div>
              <!-- break -->
              <div class="input-group">
                  <span class="input-group-addon">KM.</span>
                  <input type="text" class="form-control" placeholder="Distance from Campus" id="campus_distance" name="distance">
                </div>
              <!-- break -->
                <div class="input-group">
                  <span class="input-group-addon">Tk.</span>
                  <select class="form-control" name="fare">
                    <option value="none">Mess Rent Range</option>
                    <option value="eco">Economy(500-1000)</option>
                    <option value="mod">Moderate(1001-2000)</option>
                    <option value="del">Deluxe(2001-3000)</option>
                    <option value="supdel">Super Deluxe(3001-5000)</option>
                  </select>
              </div>
                <input type="submit" name="submit" value="Search" class="btn btn-success">
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
    <!-- end:quick search -->

<div class="content" id="search_result_content">
    <div class = "container">
        <div class = "row">
            <div class = "col-md-10 col-md-offset-1">
                <table class="table table-striped" border='1' align = 'center'>
                <thead>
                    <tr style="background-color: #48cfad; color:#fff">
                        <th>Count</th>
                        <th>Mess Name</th>
                        <th>Location</th>
                        <th>Distance(KM)</th>
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
                        <td>{{$data->distance}}</td>
                      <!--  <td><form action="/">
               <button type="submit" class="btn btn-info">Apply</button>
                </form></td> -->
                        </tr>
            @endforeach
            {{$mess->links()}}
            </tbody>
        </table>
        </div>
        </div>
    </div>
</div>
@endsection