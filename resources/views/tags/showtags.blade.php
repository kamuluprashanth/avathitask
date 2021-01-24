@extends('layouts.app')
@section('styles')
<style type="text/css">
    .card .card-header
    {
        background-color: #102b58 !important;
        font-weight: 600;
    }
    .editicon
    {

        border: 1px solid #242424;
    padding: 1px 6px;
    border-radius: 5px;
    }
</style>
@endsection
@section('content')

   <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto mt-2">
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>

                @endif
                <div class="card">
                    <div class="card-header bg-primary text-white">Show Tags <a href="{{url('tags')}}" class="float-right text-white viewallusers">{{'+'}} Add Tags</a></div>

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
                        
<table class="table table-bordered table-striped">
    <thead>
    <th>SNo</th>
    <th>Title</th>  
  <th>Description</th>  
     <th style="width: 15%;">Action</th>
    </thead>
    <tbody>
        @if(!empty($tags))
        @foreach($tags as $viewtags)
        <tr>
            <td>{{$viewtags->id}}</td>
             <td>{{$viewtags->title}}</td>
               <td>{{$viewtags->description}}</td>
            
               <td><a href="{{url('/edittags/'.$viewtags->id)}}" class="editicon"><i class="fa fa-pencil"></i></a>
<a href="{{url('/deletetags/'.$viewtags->id)}}" class="editicon ml-2 text-danger" ><i class="fa fa-trash-o"></i></a>
               </td>
        </tr>
        @endforeach
        @endif
    </tbody>

</table>
                       

                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
