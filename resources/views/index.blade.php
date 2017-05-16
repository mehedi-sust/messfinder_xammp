@extends('layouts.app')

@section('content')
    <!-- begin:header -->
    <div id="header">
      <div class="container">
     <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <!--
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>

    </ol>
   -->

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="img/site_slide1.jpg" alt="Los Angeles">
        <div class="carousel-caption">
          
        </div>
      </div>

        
    @foreach ($mess as $data)
    <?php 
    $link = "/storage/banner_".$data->mess_id.".jpg";
if(file_exists( public_path() . $link) )
 {
    $filename = "banner_".$data->mess_id.".jpg";
    //    return Storage::allfiles('public');
    $url = Storage::url($filename);
    //echo $url."<br>";
    echo '
    <div class="item">
        <img src="messfinder/public/'.$url.'/" id="index_slide_photo" "/> >
        ';?>
        <div class="carousel-caption" style="color: #00e6e6; text-shadow: 2px 2px 5px black;" >
          <a href='<?php echo "messfinder/mess_profile/?id=". $data->mess_id; ?>' > <h3>{{$data->mess_name}}</h3></a>
          <h4>Location : {{$data->mess_location}}</h4>
          <h4>Vacant Seat : {{$data->vacant_seat}}</h4>
          <h4>Total Seat : {{$data->total_seat}}</h4>
          <h4>Mess Id: {{$data->mess_id}}</h4>
        </div>
      </div>
      <?php
      
} ?>  

    @endforeach

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

      </div>
    </div>
    <!-- end:header -->
    


    <!-- begin:quick search-->
    <div class="row">
      <div class="col-md-12">
        <div class="quick-search" id="homepage_row_search">
          <div class="row">
            <form action="search" method="get" role="form" class="form-inline">
                <div class="form-group col-md-offset-2">
                  <select class="form-control" id="area" name="area">
                  <option value="Location">Location</option>
                    @foreach($locations as $data)
                    <option value="{{$data->location}}">{{$data->location}}</option>

                    @endforeach
                  </select>
                </div>
              <!-- break -->
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
    <!-- end:quick search -->

    <!-- begin:service -->
    <div id="service">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2>Looking For a Suitable Mess?<small>We are here to help you.</small></h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-md-offset-1 col-sm-6 col-xs-12">
            <div class="service-container">
              <div class="service-icon">
                <a href="#"><i class="fa fa-home"></i></a>
              </div>
              <div class="service-content">
                <h3>Create a new mess</h3>
                <p>You can easily create new mess and advertise it for borders.</p>
              </div>
            </div>
          </div>
          <!-- break -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="service-container">
              <div class="service-icon">
                <a href="#"><i class="fa fa-search"></i></a>
              </div>
              <div class="service-content">
                <h3>Find a suitable mess</h3>
                <p>You can search for a suitable mess with desired criteria using advanced search options.</p>
              </div>
            </div>
          </div>
          <!-- break -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="service-container">
              <div class="service-icon">
                <a href="#"><i class="fa fa-calendar"></i></a>
              </div>
              <div class="service-content">
                <h3>Manage Mess Events</h3>
                <p>You can create mess events and invite your friends in the event.</p>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
    <!-- end:service -->
    
    <!-- begin:subscribe -->
    <div id="subscribe">
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-md-offset-2 col-sm-8 col-xs-12">
            <h3>Get Newsletter Update</h3>
          </div>
          <div class="col-md-3 col-sm-4 col-xs-12">
            <div class="input-group">
              <input type="text" class="form-control input-lg" placeholder="Enter your mail">
              <span class="input-group-btn">
                <button class="btn btn-success btn-lg" type="submit"><i class="fa fa-envelope"></i></button>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end:subscribe -->

    <!-- begin:modal-signin -->
    <div class="modal fade" id="modal-signin" tabindex="-1" role="dialog" aria-labelledby="modal-signin" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Sign in</h4>
          </div>
          <div class="modal-body">
            <form role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
              <div class="form-group{{ $errors->has('reg') ? ' has-error' : '' }}">
                <label for="regNo">Regestration No.</label>
                <input type="text" class="form-control input-lg" placeholder="Enter registration no." id="reg" name="reg" value="{{ old('reg') }}" required autofocus>
                                                @if ($errors->has('reg'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reg') }}</strong>
                                    </span>
                                @endif

              </div>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        
                <label for="password">Password</label>
                <input type="password" class="form-control input-lg" placeholder="Enter Password" id="password" name="password" required>
                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Keep me logged in
                </label>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <p>Don't have account ? <a href="#modal-signup"  data-toggle="modal" data-target="#modal-signup">Sign up here.</a></p>
            <input type="submit" class="btn btn-success btn-block btn-lg" value="Sign in">
            <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
          </div>
        </div>
      </div>
    </div>
    <!-- end:modal-signin -->

    <!-- begin:modal-signup -->
    <div class="modal fade" id="modal-signup" tabindex="-1" role="dialog" aria-labelledby="modal-signup" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Sign up</h4>
          </div>
          <div class="modal-body">
            <form role="form">
              <div class="form-group">
                <input type="text" class="form-control input-lg" placeholder="Full Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control input-lg" placeholder="Registration No.">
              </div>
              <div class="form-group">
                <input type="email" class="form-control input-lg" placeholder="Enter email">
              </div>
              <div class="form-group">
                <input type="password" class="form-control input-lg" placeholder="Password">
              </div>
              <div class="form-group">
                <input type="password" class="form-control input-lg" placeholder="Confirm Password">
              </div>
              <div class="form-group">
                <input type="text" class="form-control input-lg" placeholder="Contact No.">
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="agree"> Agree to our <a href="#">terms of use</a> and <a href="#">privacy policy</a>
                </label>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <p>Already have account ? <a href="#modal-signin" data-toggle="modal" data-target="#modal-signin">Sign in here.</a></p>
            <input type="submit" class="btn btn-success btn-block btn-lg" value="Sign up">
          </div>
        </div>
      </div>
    </div>
    <!-- end:modal-signup -->   
  @endsection
