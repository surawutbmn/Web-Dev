@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session()->get('success'))
            <div class="mt-4 alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif
       <div class="row mt-4">
            @if(!empty($stds))
                <div class="row mb-4">
                    <div class="col-12">
                        <form action="{{route('home')}}" method="get">
                            <label>search</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" value="{{Request::get('search')}}">
                                <button class="btn btn-primary">search</button>
                            </div>
                        </form>
                    </div>
                </div>
                @foreach($stds as $std_name)
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card">
                            <div class="card-img-top ratio ratio-1x1" style="background-image: url({{asset('uploads/'.$std_name->avatar)}})">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$std_name->std_ID}}</h5>
                                <p class="card-text">{{$std_name->first_name.' '.$std_name->last_name}}</p>
                                <p class="card-text">{{'created at ID'.' '.$std_name->id}}</p>
                                <div class="d-flex justify-content-between">
                                    <a href="{{route('edit',['id'=>$std_name->id])}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('delete',['id'=>$std_name->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
{{--    <h1>Hi!!! {{$std_name}} Welcome to Home</h1>--}}
@endsection
