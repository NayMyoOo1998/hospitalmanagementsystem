@extends('layouts.app')
@section('content')
<div class="wrapper">
    @include('layouts.sidebar')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center bg-success mt-2">Add Type By Admin</h1>
                <a href="{{url('type-list')}}" class="btn btn-outline-success mb-2">TYPE LIST</a>
                @if(session()->has('typeAddSuccess'))
                <div class="alert alert-success">
                    {{session()->get('typeAddSuccess')}}
                </div>
                @endif
                <form action="{{url('add-type')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Type Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <input type="submit" value="Save" class="btn btn-outline-info">
                    <input type="reset" value="Reset" class="btn btn-outline-danger">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection