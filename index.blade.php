@extends('layouts.admin')

@section('content')
    <div class="modal  fade" tabindex="-1" role="dialog" id="delete">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete User</h4>
                </div>
                {!! Form::open(['url'=>'delete/user','method'=>'POST']) !!}
                <div class="modal-body">
                    <input hidden id="del" name="id">
                    <p>Are you sure you want to delete this user.&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button  class="btn btn-danger">Delete</button>
                </div>
                {!! Form::close() !!}
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- Modal -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit User</h4>
                </div>
                {{Form::open(['url'=>'user/update','method'=>'POST'])}}
                <div class="modal-body">
                    <div class="row">
                        <input hidden id="user_id" name="user_id">
                        <div class="form-group col-xs-8">
                            {!! Form::label('username', 'Username') !!}
                            {!! Form::text('username', null, ['class' => 'form-control','id'=>'username']) !!}
                        </div>
                    </div>
                 <!--    <div class="row">
                        <div class="form-group col-xs-8">
                            {!! Form::label('fname', 'First Name') !!}
                            {!! Form::text('firstName', null, ['class' => 'form-control','id'=>'fname']) !!}
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="form-group col-xs-8">
                            {!! Form::label('lname', 'Surname') !!}
                            {!! Form::text('surname', null, ['class' => 'form-control','id'=>'lname']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-8">
                            {!! Form::label('phone', 'Phone Number') !!}
                            {!! Form::number('phone_number', null, ['class' => 'form-control','id'=>'phone']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-8">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email', null, ['class' => 'form-control','type'=>'email','id'=>'email']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-8">
                            {!! Form::label('password', 'Password') !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-8">
                            {!! Form::label('conpass', 'Confirm Password') !!}
                            {!! Form::password('conpass', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button  class="btn btn-primary">Save changes</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-12" >
            <div class="tile-body p-0">
                <table class="table table-bordered" id="users">
                    <h1>Users</h1>
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->firstName }}</td>
                            <td>{{ $user->surname }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <div class="btn-group">
                                    <button id="{{$user->id}}" class="btn-default" data-toggle="modal" data-target="#edit">Edit</button>
                                    <button id="{{$user->id}}" data-toggle="modal" data-target="#delete" class="btn-danger" >Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(function () {
            $('#edit').on('show.bs.modal',function (e) {
                id = $(e.relatedTarget).attr('id');

                $.ajax({
                    url: url+'/user/'+id,
                    method: 'GET',
                    success: function (data) {
                        $("#user_id").val(id);
                        $("#username").val(data.username);
                        $("#fname").val(data.firstName);
                        $("#lname").val(data.surname);
                        $("#phone").val(data.phone_number);
                        $("#email").val(data.email);
                    }
                })
            });
            $("#delete").on('show.bs.modal',function (e) {
                ID = $(e.relatedTarget).attr('id');
                $("#del").val(ID);
            })
        });
    </script>
@endsection