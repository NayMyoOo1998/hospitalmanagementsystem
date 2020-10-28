@extends('layouts.app')
@section('content')
<div class="wrapper">
    @include('layouts.sidebar')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="mt-2 w-100" border="1">
                    <thead>
                        <tr>
                            <th colspan="10">
                                <h2 class="text-center w-100">Doctor List</h2>
                            </th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Dob</th>
                            <th>Education</th>
                            <th>Speciality</th>
                            <th>Designality</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        @foreach($doctors as $doctor)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$doctor->name}}</td>
                            <td>{{$doctor->email}}</td>
                            <td>{{$doctor->phone}}</td>
                            <td>{{$doctor->address}} /
                                {{$doctor->townships->first()->name}}
                            </td>
                            @if($doctor->gender == 1)
                            <td>Male</td>
                            @else
                            <td>Female</td>
                            @endif

                            <td>{{$doctor->dob}}</td>
                            <td>
                                <ul class="list-unstyled">
                                    @foreach($doctor->educations as $key => $education)

                                    <li> {{++$key}}. {{$education->name}}</li>

                                    @endforeach
                                </ul>
                            </td>

                            <td>
                                <ul class="list-unstyled">
                                    @foreach($doctor->designations as $key => $designation)

                                    <li> {{++$key}}. {{$designation->name}}</li>

                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <ul class="list-unstyled">
                                    @foreach($doctor->specialities as $key => $speciality)

                                    <li> {{++$key}}. {{$speciality->name}}</li>

                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection