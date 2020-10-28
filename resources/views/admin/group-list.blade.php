@extends('layouts.app')
@section('content')

<div class="wrapper">
    @include('layouts.sidebar')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center bg-success mt-2 rounded">Group List</h1>
                <a href="{{url('add-group')}}" class="btn btn-outline-success mb-2">ADD GROUP</a>
                @if(session()->has('groupUpdateSuccess'))
                <div class="alert alert-success">
                    {{session()->get('groupUpdateSuccess')}}
                </div>
                @endif
                @if(session()->has('groupDeleteSuccess'))
                <div class="alert alert-danger">
                    {{session()->get('groupDeleteSuccess')}}
                </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Type Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groups as $key => $group)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$group->name}}</td>
                            <th>{{$group->type->name}}</th>
                            <td>
                                <a href="groupEdit/{{$group->id}}" class="btn btn-info gEdit" id="{{$group->id}}" data-toggle="modal" data-target="#groupEdit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="groupDelete/{{$group->id}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                <!-- Modal -->
                <div class="modal fade" id="groupEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{url('/groupTakeModal')}}" method="post" id="groupEditForm">

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
        $('.gEdit').click(function() {
            var id = this.id;
            $.ajax({
                url: "{{url('/groupTakeModal')}}",
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