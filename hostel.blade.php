@extends('layouts.frontend')

@section('content')

    <!---Rooms-->
    <div class="welcome">
        <div class="container">
            <h2 class="tittle">Hostels Under Our Management</h2>
            <hr>
            {{--*/ $counter = 1; /*--}}

            <p class="wel text ">Here at <strong>Yabba Hostels</strong>  we offer the best accomaodation to our customers.Below are the hostels that are available for accomodation.</p>
                  <div class="slide row" >

                      @if(isset($hostels) && !$hostels->isEmpty())
                      @foreach($hostels as $hostel)

                      @if ( (1 + $loop->index)%4 == 1 ) <div class="row"> @endif
                      <div class="col-md-3 col-sm-6 wel-grid pull-left">
            <hr>
                    <h4>{{$hostel->hostelName}}</h4>
                    <img src="{{url('images/'.$hostel->image_url)}}" class="img-responsive gray" alt="" />
                    <p>Located at {{$hostel->location}}</p>
                    <p>Our hostels are designed to offer a serene environments for our customers,feel free to pay us a visit.</p>
                     </div> 
                     @if ( (1 + $loop->index)%4 == 0 ) </div> @endif

                     {{--*/ $counter++; /*--}}
                        @endforeach
                        @endif
       <div class="clearfix"></div>
            <!-- </div> -->
        </div>
    </div>
    <!---728x90--->
    <!---Rooms-->
        <hr>
    <div class="reservation">
        <div class="container">
            <h3 class="tittle">Book A Room With Us</h3>
<hr>
            @if(\Illuminate\Support\Facades\Auth::check())
            {{Form::open(['url'=>'save/payment','method'=>'POST', 'files' => true])}}
            {{ csrf_field() }}
            <div class="reservation-grids">
                <div class="row">
                    <div class="col-md-4 reser-grid">
                        <h5>Check In</h5>
                        <div class="book_date">
                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                            {!! Form::date('checkin', null, [ 'data-date-format'=>'yyyy/mm/dd','required']) !!}
                        </div>
                    </div>
                    <div class="col-md-4 reser-grid">
                        <h5>Check out</h5>
                        <div class="book_date">
                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                            {!! Form::date('checkout', null, [ 'data-date-format'=>'yyyy/mm/dd','required']) !!}
                        </div>

                    </div>
                    <div class="col-md-4 reser-grid">
                        {!! Form::label('phone', 'Phone Number') !!}
                        {!! Form::number('phone_number', null, ['class' => 'form-control','id'=>'phone']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 reser-grid">
                        <h5>Hostel:</h5>
                        <div class="best-hot">
                            <select name="hostel" class="form-control" id="hostel">
                                <option value="0">Choose A hostel</option>
                                @foreach($host as $host)
                                    <option value="{{$host->id}}">
                                        {{$host->hostelName}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="reservation-grids">
                    <div class="col-md-4 reser-grid" id="type">
                        <h5>Room Type:</h5>
                        <select class="sel" name="type" id="roomType">
                            <option value="0">Choose one type</option>
                            <option value="Single Room">Single Room</option>
                            <option value="Double Room">Double Room</option>
                        </select>
                    </div>
                    <div class="col-md-4 reser-grid" id="room">
                        <h5>Room:</h5>
                        <select class="sel" id="session" name="room">

                        </select>
                        <select class="sel" id="session1" name="room">

                        </select>
                    </div>
                    <div class="col-md-4 reser-grid" >
                        <h5>Price</h5>
                        <input class="text" id="price" value="" name="price">
                        <input class="text" id="price1" value="" name="price">
                    </div>
                    <div class="col-md-4 reser-grid">
                        <div class="best-hot">
                            <input type="submit" value="PAY TO BOOK A ROOM">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            {!! Form::close() !!}
                @else
                <h3 class="text-center">Please Login to the site for you to book a room to a hostel of your choice.
                    <a type="button" class="btn btn-primary" style="float: inherit" href="{{url('login')}}">Login</a>
                </h3>
            @endif
        </div>
    </div>

    @endsection

@section('scripts')
    <script> var url = "{{ url('') }}"; </script>
    <script>
        var url = "{{ url('') }}";
        if($('#hostel').val()==='0'){
            $("#type").hide();
            $("#room").hide();
            $("#price").hide();
            $("#price1").hide();
        }else{
            $("#type").show();
            $("#price").hide();
            $("#price1").hide();
        }

        $('#hostel').change(function() {

            {
                var p=  $('#hostel').val();




                console.log(p);
                if($('#hostel').val()==='0'){
                    $("#type").hide();
                    $("#room").hide();
                    $("#price").hide();
                    $("#price1").hide();
                }else{
                    $('#roomType').change(function () {
                        var q = $('#roomType').val();
                        console.log(q);
                        console.log(p);
                        if (q == 'Single Room'){
                            $("#session1").show();
                            $("#session").hide();
                            $.ajax({
                                url:url+'/rooms',
                                method:'POST',
                                data:{
                                    'hostel_id': p,
                                    'roomType': q,

                                },
                                success:function (data) {
                                    console.log(data)
                                    var toAppend = '';
                                    $.each(data,function(i,o){
                                        $("#price").hide();
                                        $("#price1").show();
                                        document.getElementById("price1").value = o.price;
                                        // toAppend += '<option value=+o.id+>'+o.roomName+'</option>';
                                        $('#session1')
                                            .append($("<option name='room'></option>")
                                                .attr("value",o.id)
                                                .text(o.roomName));
                                    });

                                    // $('#session').append(toAppend);

                                }
                            })
                        }
                        else if(q == 'Double Room') {
                            $("#session").show();
                            $("#session1").hide();
                            $.ajax({
                                url:url+'/rooms',
                                method:'POST',
                                data:{
                                    'hostel_id': p,
                                    'roomType': q,

                                },
                                success:function (data) {
                                    console.log(data)
                                    var toAppend = '';
                                    $.each(data,function(i,o){
                                        $("#price1").hide();
                                        $("#price").show();
                                        document.getElementById("price").value = o.price;
                                        // toAppend += '<option value=+o.id+>'+o.roomName+'</option>';
                                        $('#session')
                                            .append($("<option name='room'></option>")
                                                .attr("value",o.id)
                                                .text(o.roomName));
                                    });




                                }
                            })
                        }else if (q == 0){

                            $("#session").hide();
                            $("#session1").hide();
                            $("#price").hide();
                            $("#price1").hide();
                        }

                    })
                    $("#type").show();
                    $("#room").show();
                    $("#price").hide();
                    $("#price1").hide();
                    $("#session").hide();
                    $("#session1").hide();
                }
            }

        })


    </script>

    @endsection