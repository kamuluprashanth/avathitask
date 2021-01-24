@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hi! {{ucwords(Auth::user()->name)}}, You are logged in, You are now ready to create own blog.<br/>

                        <a href="{{url('createpost')}}" class="btn btn-primary mt-3">Create Blog</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
