@extends('layouts.app')

@section('content')
<div class="wrapper">
    @include('layouts.sidebar')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center bg-success mt-1 w-100 rounded">Patient list</h1>
                <a href="{{url('add-patient')}}" class="btn btn-outline-success mb-2">ADD PATIENT</a>
                <div class="w-100">
                    <table border="1" class="w-100 table text-center">
                        <thead>
                            <tr>
                                <th scope="row"># SL.No</th>
                                <th scope="row">Name</th>
                                <th scope="row">NRC</th>
                                <th scope="row">Phone</th>
                                <th scope="row">Address</th>
                                <th scope="row">SEX</th>
                                <th scope="row">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patients as $key => $patient)
                            <tr>
                                <td>
                                    {{++$key}}
                                </td>
                                <td>{{$patient->name}}</td>
                                <td>{{$patient->nrc}}</td>
                                <td>{{$patient->contact_person_phone}}</td>
                                <td>{{$patient->current_address}}</td>
                                @if($patient->gender == 1)
                                <td>Male</td>
                                @else
                                <td>Female</td>
                                @endif
                                <td>
                                    <a href="#" class="btn btn-sm bg-success text-white"><i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{url('/edit-patient/'.$patient->id)}}" class="btn btn-sm bg-info text-white pEdit" data-toggle="modal" id="{{$patient->id}}" data-target="#patientEdit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm bg-warning text-white"><i class="fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{url('patient-delete/'. $patient->id)}}" class="btn-sm bg-danger text-white"><i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{$patients->links()}}
                </div>
                 <!-- Modal -->
                 <div class="modal fade" id="patientEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Patient Edit</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{url('/patientDataTakeModal')}}" method="post" id="groupEditForm" class="p-2">
                            

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
        $('.pEdit').click(function() {
            var id = this.id;
            $.ajax({
                url: "{{url('/patientDataTakeModal')}}",
                type: "get",
                data: {
                    id: id
                },
                success: function(res) {
                    $('#groupEditForm').html(res);
                }
            });
        });
    });
</script>
@endsection