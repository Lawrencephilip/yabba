@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12" >
                <table class="table table-bordered" id="users">
                    <h1>Tenants</h1>
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Mobile Number</th>
                        <th>Email</th>
                        <th>Role</th>
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $users->Render() }}
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