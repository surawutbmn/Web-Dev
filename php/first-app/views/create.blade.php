@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="mt-4 row justify-content-center">
            <div class="col-12 col-md-6">
                <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>student ID</label>
                        <input type="text" class="form-control" name="std_ID">
                        @if($errors->has('std_ID'))
                            <span class="text-danger">
                                {{$errors->first('std_ID')}}
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label>first name</label>
                        <input type="text" class="form-control" name="first_name">
                        @if($errors->has('first_name'))
                            <span class="text-danger">
                                {{$errors->first('first_name')}}
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label>last name</label>
                        <input type="text" class="form-control" name="last_name">
                        @if($errors->has('last_name'))
                            <span class="text-danger">
                                {{$errors->first('last_name')}}
                            </span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label>avatar</label>
                        <input type="file" class="form-control" name="avatar">
                        @if($errors->has('avatar'))
                            <span class="text-danger">
                                {{$errors->first('avatar')}}
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
