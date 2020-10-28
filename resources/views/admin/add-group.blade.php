@extends('layouts.app')
@section('content')
<div class="wrapper">
    @include('layouts.sidebar')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center bg-success mt-2">Add Group By Admin</h1>
                <a href="{{url('group-list')}}" class="btn btn-outline-success .mb-2">Group List</a>
                @if(session()->has('groupAddSuccess'))
                <div class="alert alert-success">
                    {{session()->get('groupAddSuccess')}}
                </div>
                @endif
                <form action="{{url('add-group')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name"> Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="type_id"> Type Name</label>
                       <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
                            <option value="">Choose type</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                       </select>
                        @error('type_id')
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