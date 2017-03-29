@extends('layouts.wrapper')

@section('content')

    <div ><span style="padding:30px 500px 30px 0;"><img src="{{url('images/logo.png' )}}"  alt="logo" /></span>
    <div class="panel panel-default">
        <h2>REGISTER AS A TENANT</h2>
        <div class="panel-body">
            {{Form::open(['url'=>'/register/account','method'=>'POST'])}}
            <div class="row">
                <input hidden id="user_id" name="user_id">
                <div class="form-group col-xs-8">
                    {!! Form::label('username', 'Username') !!}
                    {!! Form::text('username', null, ['class' => 'form-control','id'=>'username']) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-8">
                    {!! Form::label('fname', 'First Name') !!}
                    {!! Form::text('firstName', null, ['class' => 'form-control','id'=>'fname']) !!}
                </div>
            </div>
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
                    {!! Form::text('email', null, ['class' => 'form-control','id'=>'email']) !!}
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
            <div class="row">
                <div class="col-lg-5">
                    <button class="btn btn-success"><i class="glyphicon glyphicon-floppy-save"></i> Save Changes</button>                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>


@endsection
