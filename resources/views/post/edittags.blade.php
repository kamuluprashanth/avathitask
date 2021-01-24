@extends('layouts.app')
@section('styles')
<style type="text/css">
    .card .card-header
    {
        background-color: #102b58 !important;
        font-weight: 600;
    }
</style>
@endsection
@section('content')

   <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                @if(Session::has('success'))
               <span class="alert alert-success">    Tag has been updated successfully </span>
                @endif
                <div class="card">
                    <div class="card-header bg-primary text-white">Edit Tag</div>

                    <div class="card-body">
                        <!-- Display Validation Errors -->
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('storetags') }}">
                            {{ csrf_field() }}
                            @if(isset($tags))
                            <div class="row">
                                 <div class="col-md-6">
                                 <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="name" class="control-label">Title</label>

                               <input  type="hidden" class="form-control" name="txtid" value="{{$tags->id}}">
                                    <input id="name" type="text" class="form-control" name="title" value="{{$tags->title}}"
                                           required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                           

                            <div class="col-md-6">
                             <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="email" class=" control-label">Description</label>

                                
                                    <textarea rows="4" cols="50" name="description" id="description" class="form-control" >{{ $tags->description }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                  <div class="col-12">
                              
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>

                                  
                                
                            </div>
                        </form>
                            </div>
                            @endif
                            </div>
                           
                           

                         



                          
                      

                    </div>
                </div>
            </div>
        </div>

@endsection
