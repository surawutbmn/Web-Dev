@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="mt-4 row justify-content-center">
            <div class="col-12 col-md-6">
                <form action="{{route('update',['id'=>$std->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="mb-3">
                        <label>student ID</label>
                        <input type="text" class="form-control" name="std_ID" value="{{$std->std_ID}}">
                        @if($errors->has('std_ID'))
                            <span class="text-danger">
                                {{$errors->first('std_ID')}}
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label>first name</label>
                        <input type="text" class="form-control" name="first_name" value="{{$std->first_name}}">
                        @if($errors->has('first_name'))
                            <span class="text-danger">
                                {{$errors->first('first_name')}}
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label>last name</label>
                        <input type="text" class="form-control" name="last_name" value="{{$std->last_name}}">
                        @if($errors->has('last_name'))
                            <span class="text-danger">
                                {{$errors->first('last_name')}}
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label>avatar</label>
                            <img class="img-fluid img-thumbnail" src="{{asset('uploads/'.$std->avatar)}}">
                        <input type="file" class="form-control" name="avatar">
                        @if($errors->has('avatar'))
                            <span class="text-danger">
                                {{$errors->first('avatar')}}
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
