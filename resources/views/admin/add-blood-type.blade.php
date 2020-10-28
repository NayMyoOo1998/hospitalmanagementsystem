@extends('layouts.app')
@section('content')

    <div class="wrapper">
        @include('layouts.sidebar')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="bg-info mt-2 text-center" >Add Blood Type</h1>
                    <a href="{{url('blood-list')}}" class="btn btn-outline-success mb-2">Blood Tpye List</a>
                    @if(session()->has('addBloodSuccess'))
                        <div class="alert alert-success">
                            {{session()->get('addBloodSuccess')}}
                        </div>
                    @endif
                    <form action="" method="post">
                        @csrf 
                        <div class="form-group">
                            <label for="type">Blood Type</label>
                            <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" placeholder="e.g  A+">
                            @error('type')
                            <span class="invalid-feedback">
                                {{$message}}
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