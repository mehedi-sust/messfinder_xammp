@extends('layouts.app')

@section('custom_css_js')
     @parent 
   <!-- Custom CSS for this page-->
    <style>
        .page-header{
            color:#c9302c; 
            border-color:#761c19;
        }
    </style>
   @endsection

   @section('content')
    <body>
        <div class="container" id="page_container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="page-header text-center">Delete Mess</h2>
                    <form class="form-inline" action = "/delete_mess_request" method = "post">
                        {{csrf_field() }}
                        <div class="form-group">
                            <label>Are you sure you want to delete the mess with all its data?</label>
                            <!-- 3 is the mess_id which should be brought dynamically -->
                            <input type="hidden" name="mess_id" value="3">
                            <input class="btn btn-danger" type= "submit" value="Delete Mess"> 
                        </div>
                    </form>
                </div>
                <!-- /.col-md-6 col-md-offset-3-->
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    @endsection
   
