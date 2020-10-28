@extends('layouts.app')
@section('content')

<div class="wrapper">
    @include('layouts.sidebar')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="bg-success w-100 text-center p-2 rounded mt-2">Education List</h2>
                <div class="row mt-3">
                    <div class="col-md-2">
                        <a href="#" class="btn btn-outline-success mb-2" data-toggle="modal" data-target="#addEducation">ADD Education</a>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        <form action="#">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="search" name="educationSearch" id="educationSearch" class="form-control bg-outline-success d-inline-block" placeholder="Search">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <input type="submit" value="Search" class="btn btn-outline-success">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                @if(session()->has('addEducationSuccess'))
                <div class="alert alert-success">
                    {{session()->get('addEducationSuccess')}}
                </div>
                @endif
                <hr>
                <div class="row">
                    @foreach($educations as $key => $education)
                    <div class="col-md-3">
                        <div class="w-full sm:w-1/2 lg:w-1/4 px-2">
                            <div class="rounded-lg bg-white shadow-sm text-sm mb-4 p-3 flex items-center justify-between text-center">
                                <h3 class="float-left">{{$education->name}}</h3>
                                <h3 class="float-right" style="cursor: pointer;" id="gg" onclick="myFun({{ $key }})">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </h3>
                                <div class="clearfix text-right pr-3">
                                    <small class="setting" id="{{ $key }}" style="display: none;">
                                        <p>
                                            <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><br>
                                            <a href="#" class="text-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </p>

                                    </small>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Modal -->
                <div class="modal fade" id="addEducation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add Education</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!-- <form action="{{url('/education')}}" method="https://www.w3schools.com/jsref/prop_node_attributes.asppost"> -->
                            <form action="{{url('/education')}}" method="post">
                                @csrf
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="educationName">Name</label>
                                        <input type="text" name="name" id="educationName" class="form-control @error('name') is-invalid @enderror" required>
                                        <span class="text-danger text-size-sm" id="errorEducation" style="display: none;">
                                            This field is required!
                                        </span>
                                        @error('name')
                                        <span class="invalid-feedback">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="saveEducation">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- end modal  -->

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#saveEducation').click(function(e) {
            let val = $('#educationName').val();
            if (!val) {
                $('#educationName').addClass('is-invalid');
                $('#errorEducation').css('display', 'block');
                e.preventDefault();
            }
        });

        // $('#gg').click(function(e) {
        //     e.preventDefault();
        //     var id = $('.setting').prop('id');
        //     console.log(id);
        // });

    });
    // var toggleIndex=null;

    function myFun(key) {
        // e.preventDefault();
        // var show = false;
        let id = document.querySelectorAll(".setting");
        var length = id.length;
        // var key = key;

        if (id[key].style.display == "none") {
            id[key].style.display = "block";
        } else {
            id[key].style.display = "none";
        }

        // alert(key);


    }
</script>

@endsection