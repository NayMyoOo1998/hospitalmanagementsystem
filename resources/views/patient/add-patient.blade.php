@extends('layouts.app')

@section('content')

<div class="wrapper">
    @include('layouts.sidebar')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{session()->get('success')}}
                        </div>
                        @endif
                        <form action="{{url('add-patient')}}" method="post" class="mt-3 w-100">
                            @csrf
                            <input type="text" name="auth_user_id" id="" value="{{Auth::user()->id}}" hidden>
                            <table border="1" class="w-100">
                                <thead>
                                    <tr>
                                        <th colspan="4" class="bg-info">
                                            <h1 class="text-center text-dark">Add Patient</h1>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p-1">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </td>
                                        <td class="p-1">
                                            <div class="form-group p-2">
                                                <label for="father-name">Father Name</label>
                                                <input type="text" name="father_name" id="father-name" class="form-control @error('father_name') is_invalid @enderror">
                                                @error('father_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </td>
                                        <td class="p-1">
                                            <div class="form-group">
                                                <label for="gender">Gender</label><br>
                                                <input type="radio" name="gender" id="gender" value="0"> Female <br>
                                                <input type="radio" name="gender" id="gender" value="1">Male
                                            </div>
                                        </td>
                                        <td class="p-1">
                                            <div class="form-group">
                                                <label for="dob">DOB</label><br>
                                                <input type="date" name="dob" id="dob" class="form-control @error('dob') is-invalid @enderror">
                                                @error('dob')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">
                                            <div class="form-group">
                                                <label for="age">Age</label>
                                                <input type="number" name="age" id="age" class="form-control @error('age') is-invalid @enderror">
                                                @error('age')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </td>
                                        <td class="p-1">
                                            <div class="form-group">
                                                <label for="nrc">NRC</label>
                                                <input type="text" name="nrc" id="nrc" class="form-control @error('nrc') is-invalid @enderror">
                                                @error('nrc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </td>
                                        <td class="p-1">
                                            <div class="form-group">
                                                <label for="nationality">Nationality</label>
                                                <input type="text" name="nationality" id="nationality" class='form-control'>
                                            </div>
                                        </td>
                                        <td class="p-1">
                                            <div class="form-group">
                                                <label for="place-of-birth">Place Of Birth</label>
                                                <input type="text" name="place_of_birth" id="place-of-birth" class="form-control @error('place_of_birth') is-invalid @enderror">
                                                @error('place_of_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">
                                            <div class="form-group">
                                                <label for="current-address">Current Address</label>
                                                <input type="text" name="current_address" id="current-address" class="form-control @error('current_address') is-invalid @enderror ">
                                                @error('current_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </td>
                                        <td class="p-1">
                                            <div class="form-group">
                                                <label for="contact-person-name">Contact Person Name</label>
                                                <input type="text" name="contact_person_name" id="contact-person-name" class="form-control @error('contact_person_name') is-invalid @enderror">
                                                @error('contact_person_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </td>
                                        <td class="p-1">
                                            <div class="form-group">
                                                <label for="contact-person-phone">Contact Person Phone</label>
                                                <input type="text" name="contact_person_phone" id="contact-person-phone" class="form-control @error('contact_person_phone') is-invalid @enderror">
                                                @error('contact_person_phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </td>
                                        <td class="p-1">
                                            <div class="form-group">
                                                <label for="patient-code">Patient Code</label>
                                                <input type="text" name="patient-code" id="patient-code" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-1">
                                            <div class="form-group">
                                                <label for="martial-status">Martial Code</label>
                                                <input type="text" name="martial-status" id="martial-status" class="form-control">
                                            </div>
                                        </td>
                                        <td class="p-1">
                                            <div class="form-group">
                                                <label for="occupation">Occupation</label>
                                                <input type="text" name="occupation" id="occupation" class="form-control">
                                            </div>
                                        </td>
                                        <td class="p-1">
                                            <div class="form-group">
                                                <label for="alleregies">Allergies</label>
                                                <input type="text" name="allergies" id="alleregies" class="form-control">
                                            </div>
                                        </td>
                                        <td class="p-1">
                                            <div class="form-group">
                                                <label for="blood-type">Blood Type</label>
                                                <input type="text" name="blood-type" id="blood-type" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-1" colspan="20">
                                            <div class="form-group">
                                                <label for="medical-info-remark">Medical Info Remark</label>
                                                <input type="text" name="medical-info-remark" id="medical-info-remark" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center pt-2" colspan="2">
                                            <div class="form-group">
                                                <input type="submit" value="Save" class="form-control btn btn-outline-info">
                                            </div>
                                        </td>
                                        <td class=" text-center  pt-2" colspan="2">
                                            <div class="form-group">
                                                <input type="cancel" value="Cancel" class="btn btn-outline-danger form-control">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection