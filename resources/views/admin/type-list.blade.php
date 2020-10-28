@extends('layouts.app')
@section('content')

<div class="wrapper">
    @include('layouts.sidebar')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center bg-success mt-2 rounded">Type List</h1>
                <a href="{{url('add-type')}}" class="btn btn-outline-success mb-2">ADD TYPE</a>
                @if(session()->has('typeUpdateSuccess'))
                <div class="alert alert-success">
                    {{session()->get('typeUpdateSuccess')}}
                </div>
                @endif

                @if(session()->has('typeDeleteSuccess'))
                <div class="alert alert-danger">
                    {{session()->get('typeDeleteSuccess')}}
                </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($types as $key => $type)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$type->name}}</td>
                            <td>
                                <a href="typeEdit/{{$type->id}}" class="btn btn-info tEdit text-white" id="{{$type->id}}" data-toggle="modal" data-target="#typeEdit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="typeDelete/{{$type->id}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="typeEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{url('/typeDataTypeModal')}}" method="post" id="groupEditForm">

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
        $('.tEdit').click(function() {
            var id = this.id;
            $.ajax({
                url: "{{url('/typeDataTypeModal')}}",
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