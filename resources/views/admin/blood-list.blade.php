@extends('layouts.app')
@section('content')

<div class="wrapper">
    @include('layouts.sidebar')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="bg-info mt-2 text-center rounded">Blood Type List</h1>
                <a href="{{url('/add-blood-type')}}" class="btn btn-outline-success mb-2"><i class="fa fa-plus" aria-hidden="true"></i> ADD Blood Type</a>
                @if(session()->has('bloodUpdateSuccess'))
                <div class="alert alert-success">
                    {{session()->get('bloodUpdateSuccess')}}
                </div>
                @endif
                @if(session()->has('bloodDeleteSuccess'))
                <div class="alert alert-danger">
                    {{session()->get('bloodDeleteSuccess')}}
                </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="row">#</th>
                            <th scope="row">Type</th>
                            <th scope="row">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bloods as $key => $blood)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$blood->type}}</td>
                            <td>
                                <a href="#" class="btn btn-sm bg-info text-white bloodEdit" id="{{$blood->id}}" data-toggle="modal" data-target="#bloodEdit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <a href="{{url('/blood-delete/'.$blood->id)}}" class="btn-sm bg-danger text-white"><i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Modal -->
                <div class="modal fade" id="bloodEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{url('/blood-edit')}}" method="post" id="groupEditForm">


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
    $(document).ready(function(){
        $('.bloodEdit').click(function(){
            var id = this.id;
            $.ajax({
                url:'/blood-edit',
                method: 'get',
                data:{id:id},
                success:function(res){
                    $('#groupEditForm').html(res);
                }
            });
        });
    });
</script>

@endsection