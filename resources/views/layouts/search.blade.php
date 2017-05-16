<div class="row">
      <div class="col-md-12">
        <div class="quick-search" id="homepage_row_search">
          <div class="row">
            <form action="search/" method="get" role="form" class="form-inline">
                <div class="form-group col-md-offset-2">
                  <select class="form-control" id="area" name="area">
                  <option value="Location">Location</option>
                    @foreach($location as $data)
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

 @yield('content') 
        