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
                    <div class="card-header bg-primary text-white">Create Catalogue</div>

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

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/storecategroyitems') }}">
                            {{ csrf_field() }}
                            <div class="row">
                               

                             <div class="col-md-6">
                            <div class="form-group{{ $errors->has('selectcategory') ? ' has-error' : '' }}">
                                <label for="password" class=" control-label">Category:</label>

                               
                                    <select id="selectroles" type="text" class="form-control js-example-basic-multiple" name="selectcategory" value="{{ old('selectcategory') }}"
                                           required>
                                               @if(!empty($category))
                                                @foreach($category as $selectcategory)
                                                <option value="{{$selectcategory->id}}">{{$selectcategory->name}}</option>
                                                @endforeach
                                               @endif

                                           </select>

                                    @if ($errors->has('selectroles'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                             <div class="col-md-6">
                            <div class="form-group{{ $errors->has('selectitem') ? ' has-error' : '' }}">
                                <label for="password" class=" control-label">Items:</label>

                               
                                    <select id="selectroles" type="text" class="form-control js-example-basic-multiple" name="selectitem[]" value="{{ old('selectitem') }}"
                                           required multiple="multiple">
                                               @if(!empty($items))
                                                @foreach($items as $selectitems)
                                                <option value="{{$selectitems->id}}">{{$selectitems->name}}</option>
                                                @endforeach
                                               @endif

                                           </select>

                                    @if ($errors->has('selectitems'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('selectitems') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                           
                            </div>
                            <div class="form-group col-12 px-0">
                               
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
