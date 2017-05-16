@extends('layouts.app')
@section('content')
  <!-- begin:header -->
    <!-- end:header -->

  <!-- begin: add member form -->
  <div class="content" id="add_member_content_form">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-arillo">
          <div class="panel-heading"><h4>Add Location</h4></div>
            <div class="panel-body">
            <form class="form-inline" id="add_location" action="add_location" method="post">
                
                <div class="form-group">
                    <label for="location"> Location: </label>
                    <input type="text" class="form-control" name="location" id="location">
                </div>

                <div class="form-group col-md-offset-1">
                    <button class="btn btn-success" type="submit">Add</button>
                </div>
                {{csrf_field() }}
            </form>
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
          <div class="panel-heading"><h4>Location List</h4></div>
              <table class="table table-striped">
              <thead>
              <!--style="background-color: #5bc0de; color:#fff" -->
                <tr>
                  <th>Serial</th>
                  <th>Location</th>
                </tr>
              </thead>
              <?php  
                $i = 1;
                ?>
                @foreach($location as $data)
              <tbody>
                <td> <?php echo $i++; ?></td>
                <td>{{$data->location}}</td>
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
