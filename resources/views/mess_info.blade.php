<html>
   
   <head>
      <title>View Student Records</title>
   </head>
   
   <body>
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Mess Finder</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="about">About</a>
                    </li>
                    <li>
                        <a href="services.html">Services</a>
                    </li>
                    <li>
                        <a href="contact">Contact</a>
                    </li>
                </ul>
                <ul class = "nav navbar-nav navbar-right">
                    <li>
                        <a href="signup">Sign Up</a>
                    </li>
                    <li>
                        <a href="login">Login</a>
                    </li>
            </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->

    </nav>
         <strong>
         @foreach ($mess as $value)
            <label> ID:</label>{{ $value->mess_id }}<br>
            <label>Mess Name:</label>{{ $value->mess_name }}
         @endforeach
     </strong>
   </body>
</html>