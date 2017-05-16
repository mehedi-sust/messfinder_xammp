<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="description" content="arillo is responsive html real estate theme">
    <meta name="author" content="afriq yasin ramadhan">
    <meta name="editor" content="raihan ahmed">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Mess Finder</title>

    <!-- Bootstrap core CSS -->
   <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,600,800" rel='stylesheet' type='text/css'>
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery-ui.css')}}" rel="stylesheet">
    <link href="{{asset('css/progress-steps.css')}}" rel="stylesheet">
    <link href="{{asset('css/customize-style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!--
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    -->
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="{{ asset('js/html5shiv.js') }}"></script>
      <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
    
    @section('custom_css')

    @show
</head>

  <body id="top">
    <!-- begin:navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-top">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/messfinder"><img src="{{asset('img/logo.png')}}" alt="Image Not Found"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-top">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/messfinder">Home</a></li>
            @if (Auth::check() and Auth::user()->reg == "admin")
                    <li>
                        <a href="admin_home">Admin Dashboard</a>
                    </li>
                @endif
                
            <li><a href="#">List a Mess</a></li>
            <li><a href="about">About</a></li>
            <li><a href="http://www.sust.edu/d/cse/contact-us">Contact</a></li>
            @if (Auth::guest())
            <li><a href="login" >Sign in</a></li>
            <li><a href="register" class="signup">Sign up</a></li>
            @else
            <ul class = "nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    {{ Auth::user()->name }} <b class="caret"></b>
                                </a>

                                <ul class="dropdown-menu" role="menu" id = "user_dropdown">
                                    @if(Auth::user()->mess_id != 0)
                                    <li><a href="<?php echo "mess_profile?id=".Auth::user()->mess_id ?> ">
                                        Veiw My Mess
                                        </a>
                                    </li>
                                    @elseif(Auth::user()->type =='User' && Auth::user()->mess_id == 0 )
                                    <li><a href="create_mess">
                                        Create New Mess
                                        </a>
                                    </li> 
                                    @endif
                                    @if(Auth::user()->type == "Manager")
                                    <li><a href="manage_mess">
                                        Manage My Mess
                                        </a>
                                    </li>
                                    @endif
                                    </li>
                                    <li class = "divider"></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
    <!-- end:navbar -->
    
    @yield('content')

<!-- begin:footer -->
<div id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-1 col-sm-6 col-xs-12">
        <div class="widget">
          <h5><a href="#">Home</a></h5>
          </ul>
        </div>
      </div>
      <!-- break -->
      <div class="col-md-1 col-sm-6 col-xs-12">
        <div class="widget">
            <h5><a href="#">List Mess</a></h5>
          </ul>
        </div>
      </div>
      <!-- break -->
      <div class="col-md-1 col-sm-6 col-xs-12">
        <div class="widget">
          <h5><a href="#">About</a></h5>
        </div>
      </div>
      <!-- break -->
      <div class="col-md-1 col-sm-6 col-xs-12">
        <div class="widget">
          <h5><a href="#">Contact</a></h5>
        </div>
      </div>
      <div class="col-md-3 col-md-offset-5 col-sm-6 col-xs-12">
        <div class="widget">
          <h3>Mess Finder</h3>
          <address>
            <strong>Dept. of CSE, SUST</strong><br>
            Kumargaogn, Akhalia, Sylhet-3114.<br>
            <br>
            Email : www.sust.edu
          </address>
        </div>
      </div>
      <!-- break -->
    </div>
    <!-- break -->

    <!-- begin:copyright -->
    <div class="row">
      <div class="col-md-12 copyright">
        <p>Copyright &copy; 2017 Dept. of CSE,SUST. <strong>All Right Reserved.</strong></p>
        <p>Theme : Arillo 1.0 Designed by <strong>templateninja.</strong></p>
        <a href="#top" class="btn btn-success scroltop"><i class="fa fa-angle-up"></i></a>
      </div>
    </div>
    <!-- end:copyright -->

  </div>
</div>
<!-- end:footer -->

<style type="text/css">
    .container2 {
        margin-left: 10%;
        margin-top: 10%;
        margin-right: 10%;
        margin-bottom: 10%;
    }
    .container3 {
        padding: 8%;
        margin-left: 10%;
        
    }
    textarea{
        resize:none;
    }
</style>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
     <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script src="{{ asset('js/gmap3.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.js') }}"></script>
    <script src="{{ asset('js/jquery.jcarousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/jquery.backstretch.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{asset('js/script.js')}}"></script>
     
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}"></script>
    <!-- Customized JavaScript for different pages
    ================================================== -->
    <!-- Applicable to add_room_info.blade.php -->
    <script src="{{ asset('js/add_room_info.js') }}"></script>
    <!-- Applicable to edit_mess_room_info.blade.php -->
    <script src="{{ asset('js/edit_room_info.js') }}"></script>
    
    @section('custom_js')

    @show

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!-- jQuery UI code for datepicker -->
    <script>
    $( function() {
    $( "#vacant_start_month" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
    });
    </script>
    <script>
    $(".delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });
</script>
  </body>
</html>


