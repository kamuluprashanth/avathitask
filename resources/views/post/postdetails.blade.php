@extends('layouts.app')
@section('styles')
<style type="text/css">
	 .listtags
    {
        background-color: #ccc;
        color: #000;
        padding: 3px;
        border-radius: 3px;
        margin-right: 5px;
    }
    .bgcolor
    {
    	    background-color: #fff;
    padding: 10px 15px;
    box-shadow: 0 0px 2px rgba(30,32,34,.35);
    }
</style>
@endsection
@section('content')
<div class="container">
	<div class="row">

		<div class="col-md-12 col-12">
			@if(!empty($post))
			<div class="bgcolor">
			<h2>{{ucwords($post->title)}}</h2>
			<p>{{ucfirst($post->description)}}.</p>
			<div class="mt-3">
			<h6 style="font-weight: 700;">Categories:</h6>
			<p>
				@if(!empty($postcategory))
				@foreach($postcategory as $category)
				<span class="listtags">{{ucfirst($category->title)}}</span>
				@endforeach
				@endif
			</p>
			</div>
			<div class="mt-3">
			<h6 style="font-weight: 700;">Tags:</h6>
			<p>
				@if(!empty($posttags))
				@foreach($posttags as $tags)
				<span class="listtags">{{ucfirst($tags->title)}}</span>
				@endforeach
				
				@endif
			</p>
			</div>

			

			</div>
			@else
			<div class="bgcolor">
				<p>No Post details found</p>
			</div>
			@endif
		</div>
	</div>
</div>
@endsection