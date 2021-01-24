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
                    <div class="card-header bg-primary text-white">Create Your Blog <a href="{{url('/showcategory')}}" class="float-right text-white viewallusers"></a></div>

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

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/storecategory') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="txtid" value="0">
                            <div class="row">
                                 <div class="col-md-12">
                                 <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="name" class="control-label">Title</label>

                               
                                    <input id="txttitle" type="text" class="form-control" name="title" value="{{ old('title') }}"
                                           required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                             

                           

                             <div class="col-md-6 col-12">
                             <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="txtcategory" class=" control-label">Categories</label>
                                    <select class="js-example-basic-multiple form-control" name="category[]" multiple>
    
                                        </select>
                                
                                    
                                    @if ($errors->has('category'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                              <div class="col-md-6 col-12">
                             <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                                <label for="txttags" class=" control-label">Tags</label>
                                    <select class="js-example-basic-multiple form-control" name="tags[]" multiple>
    
                                        </select>
                                
                                    
                                    @if ($errors->has('tags'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('tags') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                             <div class="col-md-12">
                             <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="email" class=" control-label">Description</label>

                                
                                    <textarea rows="4" cols="50" name="description" id="description" class="form-control">{{ old('description') }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
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
