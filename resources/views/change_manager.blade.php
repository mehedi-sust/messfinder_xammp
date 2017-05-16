@extends('layouts.app')
        
        @section('content') 
        <div class="container" id="form_container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <h3 class="page-header text-center">Change Mess Manager</h3>
                    <form class="form-inline">
                        <div class="form-group">
                            <select class="form-control" name="manager_name" id="manager_name">
                            @foreach($users as $value)
                            <option>{{$value->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-offset-1" id="submit_div">
                            <input type="submit" class="btn btn-success" value="Make Manager">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection