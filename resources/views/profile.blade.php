@extends('layouts.app')


@section('content')
<div class="wrapper">
    @include('layouts.sidebar')
    <div class="container pt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <figure>
                            <figcaption class="mb-2 ml-2 text-dark">Profile Settings</figcaption>
                            <div class="avator">
                                <img src="{{asset('images/img_avatar.png')}}" alt="a">
                            </div>
                        </figure>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-2  pt-5">
                        <a href="#" class="btn btn-outline-info w-100" data-toggle="modal" data-target="#profileEdit">Edit</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-1">

                    </div>
                    <div class="col-md-5 mb-2">
                        <h4><i class="fa fa-user" aria-hidden="true"></i> Name</h4>
                        <h5 class="pl-2">{{$profile->prefix . " " . $profile->name}}</h5>
                    </div>
                    <div class="col-md-5">
                        <h4><i class="fa fa-envelope" aria-hidden="true"></i>
                            Email</h4>
                        <h5 class="pl-4">{{$profile->email}}</h5>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <hr>

                <div class="row mt-5">
                    <div class="col-md-1">

                    </div>
                    <div class="col-md-5 mb-2">
                        <h4><i class="fa fa-user" aria-hidden="true"></i> Phone</h4>
                        <h5 class="pl-2">{{$profile->phone}}</h5>
                    </div>
                    <div class="col-md-5">
                        <h4><i class="fa fa-map-marker" aria-hidden="true"></i>
                            Address</h4>
                        <h5 class="pl-4">{{$profile->address . " Township / "}} @foreach($profile->townships as $township) {{$township->name}} @endforeach</h5>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <div class="text-left w-100">
                            @foreach($profile->educations as $education)
                            <div class=" tex-dark">
                                <p style="position: relative;" class=" border-bottom text-sm pt-2 font-weight-bold rounded pl-1 h-5 text-info">{{$education->name}} <a href='{{url("userEducationDelete/$profile->id/$education->id")}}' class=" pr-1 font-weight-bold text-info" style="position: absolute; right:0; font-size:1.5em; top:-1px; text-decoration:none;">&times;</a></p>
                            </div>
                            @endforeach
                        </div>
                        <a href="#" data-toggle="modal" data-target="#educationModal"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Add Education</a>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="educationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Add Your Education</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{url('userAddEducation')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="education">Education</label>
                                            <input type="text" name="user_id" id="" value="{{Auth::user()->id}}" hidden>
                                            <select name="education_id" id="education" class="form-control">
                                                <option value="">Choose your degree</option>
                                                @foreach($educations as $education)
                                                <option value="{{$education->id}}">{{$education->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end modal  -->
                    <div class="col-md-3">
                        <div class="text-left w-100">
                            @foreach($profile->designations as $designation)
                            <div class=" tex-dark">
                                <p style="position: relative;" class=" border-bottom text-sm pt-2 font-weight-bold rounded pl-1 h-5 text-info">{{$designation->name}} <a href='{{url("userDesignationDelete/$profile->id/$designation->id")}}' class=" pr-1 font-weight-bold text-info" style="position: absolute; right:0; font-size:1.5em; top:-1px; text-decoration:none;">&times;</a></p>
                            </div>
                            @endforeach
                        </div>
                        <a href="#" data-toggle="modal" data-target="#designModal"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Add Designation</a>
                    </div>
                    <!-- modal  -->
                    <div class="modal fade" id="designModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Add Your Designation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{url('userAddDesignation')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="designation">Designation</label>
                                            <input type="text" name="user_id" id="" value="{{Auth::user()->id}}" hidden>
                                            <select name="designation_id" id="designation" class="form-control">
                                                <option value="">Choose your designation</option>
                                                @foreach($designations as $designation)
                                                <option value="{{$designation->id}}">{{$designation->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end modal  -->

                    <div class="col-md-3">
                        <div class="text-left w-100">
                            @foreach($profile->specialities as $speciality)
                            <div class=" tex-dark">
                                <p style="position: relative;" class=" border-bottom text-sm pt-2 font-weight-bold rounded pl-1 h-5 text-info">{{$speciality->name}} <a href='{{url("userSpecialityDelete/$profile->id/$speciality->id")}}' class=" pr-1 font-weight-bold text-info" style="position: absolute; right:0; font-size:1.5em; top:-1px; text-decoration:none;">&times;</a></p>
                            </div>
                            @endforeach
                        </div>
                        <a href="#" data-toggle="modal" data-target="#specialModal"><i class="fa fa-plus mr-1" aria-hidden="true"></i>Add Speciality</a>
                    </div>
                    <!-- modal  -->
                    <div class="modal fade" id="specialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Add Your Speciality</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{url('userAddSpeciality')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="designation">Speciality</label>
                                            <input type="text" name="user_id" id="" value="{{Auth::user()->id}}" hidden>
                                            <select name="speciality_id" id="speciality" class="form-control">
                                                <option value="">Choose your speciality</option>
                                                @foreach($specialities as $speciality)
                                                <option value="{{$speciality->id}}">{{$speciality->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end modal  -->

                    <div class="col-md-1"></div>
                    <div class="col-md-1"></div>
                </div>


                <hr>

                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <h3><i class="fa fa-cog" aria-hidden="true"></i> Change passwords</h3>
                        <form action="{{url('changeUserPassword')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="user_id" id="" value="{{$profile->id}}" hidden>
                                <label for="current_password">Current Password</label>
                                <input type="password" name="current_password" id="current_password" class="form-control @error('current_password') is-invalid @enderror">
                                @error('current_password')
                                <span class="invalid-feedback">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror">
                                @error('new_password')
                                    <span class="invalid-feedback">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="confirm_new_password">Confirm Password</label>
                                <input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control @error('confirm_new_password') is-invalid @enderror">
                                @error('confirm_new_password')
                                    <span class="invalid-feedback">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Change Password" class="btn btn-outline-info">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5">
                        <h4>Password Requirements</h4>
                        <ul>
                            <li class="text-success">must have at least 8 charactors</li>
                            <li class="text-danger">must have at least one number</li>
                            <!-- <li class="text-info">must </li> -->
                        </ul>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="profileEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Change Profile</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{url('profileEdit')}}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="prefx">Prefix</label>
                                        <input type="text" name="profile_id" value="{{$profile->id}}" hidden>
                                        <input type="text" name="prefix" id="prefix" class="form-control" value="{{$profile->prefix}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{$profile->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{$profile->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" id="phone" class="form-control" value="{{$profile->phone}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" id="address" class="form-control" value="{{$profile->address}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="township">Township</label>
                                        <select name="township_id" id="township" class="form-control">
                                            @foreach($townships as $township)
                                                <option value="{{$township->id}}">{{$township->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.addEducation').click(function() {
                $('#educationForm').toggle();
            });

            $('#educationSubmit').click(function() {
                $('#educationForm').css('display', 'none');
            });
        });
    </script>
    @endsection