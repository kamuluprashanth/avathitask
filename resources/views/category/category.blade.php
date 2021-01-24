@extends('layouts.app')
@section('styles')
<style type="text/css">
    .card .card-header
    {
        background-color: #102b58 !important;
        font-weight: 600;
    }
    .viewallusers
    {
        text-decoration: none !important;
    }
</style>
@endsection
@section('content')

   <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto mt-5">
                <div class="card">
                    <div class="card-header bg-primary text-white">Add Category <a href="{{url('showcategory')}}" class="float-right text-white viewallusers">View All Category</a></div>

                    <div class="card-body">
                       
                        

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/storecategory') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="txtid" value="0">
                            <div class="row">
                                 <div class="col-md-12">
                                 <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="control-label">Title</label>

                               
                                    <input id="name" type="text" class="form-control" name="title" value="{{ old('title') }}" maxlength="100" 
                                            autofocus>

                                    @if ($errors->has('title'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                             

                            <div class="col-md-12">
                             <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="email" class=" control-label">Description</label>

                                
                                    <textarea rows="4" cols="50" name="description" id="description" class="form-control" maxlength="255">{{ old('description') }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                             
                            <div class="form-group col-12">
                               
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>

                                  
                                </div>
                            
                        </form>
                            </div>
                           
                           

                         



                          

                    </div>
                </div> 
            </div>
              
        </div>

@endsection
