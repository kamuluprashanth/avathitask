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
                  @if(Session::has('danger'))
                <div class="alert alert-danger">{{Session::get('danger')}}</div>

                @endif
                <div class="card">
                    <div class="card-header bg-primary text-white">Create Your Post <a href="{{url('/showposts')}}" class="float-right text-white viewallusers">View all post</a></div>

                    <div class="card-body">
                       

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/storeposts') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="txtid" value="0">
                            <div class="row">
                                 <div class="col-md-12">
                                 <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="name" class="control-label">Title *</label>

                               
                                    <input id="txttitle" type="text" class="form-control" name="title" value="{{ old('title') }}"
                                            autofocus>

                                    @if ($errors->has('title'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                             <div class="col-md-4 col-12">
                             <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="txtslug" class=" control-label">Slug *</label>
                                     <input id="txtslug" type="text" class="form-control" name="slug" value="{{ old('slug') }}" maxlength="100">

                                    @if ($errors->has('slug'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                             

                           

                             <div class="col-md-4 col-12">
                             <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="txtcategory" class=" control-label">Categories *</label>
                                    <select id="txtcategory" class="js-example-basic-multiple form-control" name="category[]" multiple>
                                         @if(count($Objcategory)>0)
                                        @foreach($Objcategory as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                         @else
                                         <option value="category">Add Category</option>
                                        @endif
                                        </select>
                                
                                    
                                    @if ($errors->has('category'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                              <div class="col-md-4 col-12">
                             <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                                <label for="txttags" class=" control-label">Tags *</label>
                                    <select id="txttags" class="js-example-basic-multiple form-control" name="tags[]" multiple>
                                        @if(count($Objtags)>0)
                                        @foreach($Objtags as $tags)
                                        <option value="{{$tags->id}}">{{$tags->title}}</option>
                                        @endforeach
                                        @else
                                         <option value="tags">Add Tags</option>
                                        @endif
    
                                        </select>
                                
                                    
                                    @if ($errors->has('tags'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('tags') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                             <div class="col-md-12">
                             <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="email" class=" control-label">Description *</label>

                                
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

@section('scripts')


@endsection
