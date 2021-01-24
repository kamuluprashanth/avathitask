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
    .cardsection .card
    {
        /*width: 32%;*/
        padding-right: 7px;
          padding-left: 7px;
          margin:5px;
        /*display: inline-block;*/
        box-shadow: 0 0px 1px rgba(30,32,34,.35);
        flex: 0 0 32%;
    max-width: 32%;

    }
    .cardsection .card .listtags
    {
        background-color: #ccc;
        color: #000;
        padding: 3px;
        border-radius: 3px;
        margin-bottom: 15px;
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
                    <div class="card-header bg-primary text-white">Show Posts <a href="{{url('createpost')}}" class="float-right text-white viewallusers">{{'+'}} Add Post</a></div>

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
                 <div class="row">
                     <div class="col-12 cardsection d-flex">
                         @if(count($posts)>0)
        @foreach($posts as $viewposts)
                         <div class="card" >
                          <div class="card-body">
                            <h5 class="card-title text-capitalize" style="font-weight: 700;">{{$viewposts->title}}
                              <small class="d-block mt-2">{{$viewposts->slug}}</small>
                            </h5>
                            <p class="card-text">
                              @if(strlen($viewposts->description)>100)
                                {{substr($viewposts->description,100).'...'}}
                                @else
                               {{ ucfirst($viewposts->description)}}
                                @endif

                              </p>
                            <p>
                                

                 

                            </p>

                             <p>Categories ({{count($viewposts->category)}}): <br /> 

                                @foreach($viewposts->category as $viewcategory)
               <span class="listtags"> {{$viewcategory->title}}</span>
                @endforeach

                @if($viewposts->postcategorycount>0)
                    <span class="listtags"> {{'+'.$viewposts->postcategorycount}}</span>
                    @else

                    @endif
            </p>
                <p>Tags ({{count($viewposts->tags)}}):<br /> @foreach($viewposts->tags as $viewtags)
               <span class="listtags"> {{$viewtags->title}}</span>
                    @endforeach
                    @if($viewposts->posttagscount>0)
                    <span class="listtags"> {{'+'.$viewposts->posttagscount}}</span>
                    @else

                    @endif
             
            </p>
                            <a tabindex="0" href="{{url('postdetails?slug='.$viewposts->id)}}" class="editicon" data-toggle="tooltip" title="View Post"><i class="fa fa-eye"></i></a>
                            <a href="{{url('/editposts/'.$viewposts->id)}}" class="editicon" data-toggle="tooltip" title="Edit Post"><i class="fa fa-pencil"></i></a>
<a href="{{url('/deleteposts/'.$viewposts->id)}}" class="editicon  text-danger" data-toggle="tooltip" title="Delete Post"><i class="fa fa-trash-o"></i></a>
                          </div>
                        </div>

                          @endforeach

                          @else

                          <p>No Data is Avaiable.</p>

        @endif
                        
                        
                     </div>
                 </div>      
<!-- <table class="table table-bordered table-striped">
    <thead>
    <th>SNo</th>
    <th>Title</th>  
  <th>Description</th>  
   <th>Category</th>  
    <th>Tags</th>  
     <th>Action</th>
    </thead>
    <tbody>
        @if(!empty($posts))
        @foreach($posts as $viewposts)
        <tr>
            <td>{{$viewposts->id}}</td>
             <td>{{$viewposts->title}}</td>
               <td>{{$viewposts->description}}</td>
            
               <td>
               @foreach($viewposts->category as $viewcategory)
               <span> {{$viewcategory->title.'|'}}</span>
                @endforeach
                </td>
                <td>
               @foreach($viewposts->tags as $viewtags)
               <span> {{$viewtags->title.'|'}}</span>
                @endforeach
                </td>
               
            
               <td><a href="{{url('/edittags/'.$viewposts->id)}}" class="editicon"><i class="fa fa-pencil"></i></a>
<a href="{{url('/deletetags/'.$viewposts->id)}}" class="editicon ml-2 text-danger" ><i class="fa fa-trash-o"></i></a>
               </td>
        </tr>
        @endforeach
        @endif
    </tbody>

</table> -->
                       

                    </div>
                </div>
            </div>
        </div>
</div>

@endsection
