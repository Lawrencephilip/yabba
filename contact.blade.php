@extends('layouts.frontend')
@section('content')
    <!---contact-->
    <div class="contact">
        <div class="container">
            <h2 class="tittle">How To Find Us</h2>
            <div class="contact-bottom">
                <iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJz8usDHM_LxgRISyr_DeczmE&key=AIzaSyB_nJ4BMKtzU2VafOXWzXZKL5t_UVlvmDo" allowfullscreen></iframe>
            </div>

            <div class="col-md-4 contact-left">
                <h4>Address</h4>
                <p>For you to reach out to us for more information about our services:
                    <span>RD-342 Nairobi, Kenya</span></p>
                <ul>
                    <li>Free Phone :+254 4589 2456</li>
                    <li>Telephone :+254 4589 2456</li>
                    <li><i class="fa fa-keyboard-o" aria-hidden="true"></i>Fax :+254 78 4589 2456</li>
                    <div class="input-group margin-bottom-sm">
                    <li></i></span><a href="mailto:info@yabbahostels.com">info@yabbahostels.com</a></li>
                    </div>
                </ul>
            </div>
            <div class="col-md-8 contact-left cont">
                <h4>Contact Form</h4>
                {{Form::open(['url'=>'save/mail','method'=>'POST', 'files' => true])}}
                    <input type="text" name="name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
                    <input type="email" name="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                    <textarea type="text" name="subject"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
                    <input type="submit" value="Submit" >
                    <input type="reset" value="Clear" >
                {{Form::close()}}
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!---contact-->

    @endsection