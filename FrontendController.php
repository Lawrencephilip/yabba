<?php

namespace App\Http\Controllers;

use App\Hostels;
use App\Http\Requests\UserRequest;
use App\Rooms;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function contact()
    {
        return view('front.contact');
    }

    public function about()
    {
        return view('front.about');
    }

    public function hostels()
    {
        $hostels = Hostels::get();
        $host = Hostels::get();
        return view('front.hostel',compact('hostels','host'));
    }

    public function index()
    {
        return view('front.welcome');
    }

    public function register()
    {
        return view('front.register');
    }

    public function save(UserRequest $request)
    {
        User::create([
            'username' => $request->input('username'),
            'firstName' => $request->input('firstName'),
            'surname' => $request->input('surname'),
            'phone_number' => $request->input('phone_number'),
            'email' =>$request->input('email'),
            'password'=>bcrypt($request['password']),
            'role' => 'Tenant'
        ]);
        Session::flash('success_message','You have created a new user account successfully.');
        return redirect('login');
    }

    public function rooms(Request $request)
    {
        $house_id = $request['house_id'];
        $room_id = $request['roomType'];

        $rooms = Rooms::where(['hostel_id'=>$house_id,'type'=>$room_id])->get();
        return $rooms;
    }

    public function room(Request $request)
    {
        $house_id = $request['hostel_id'];
        $room_id = $request['roomType'];

        $rooms = Rooms::where(['hostel_id'=>$house_id,'type'=>$room_id,'status'=>'Vacant'])->get();
        return $rooms;exit();
    }

    public function mail(Request $request)
    {
        $name = $request['name'];
        $email = $request['email'];
        $subject = $request['subject'];

        Mail::send('front.mail', ['name' => $name,'email'=>$email,'subject'=>$subject], function ($message)
        {

            // $message->from('me@gmail.com', 'Christian Nwamba');

            //$message->from('hello@app.com', 'Your Application');

            $message->to('lawrencekamau123@gmail.com')->subject('Client Comment!');

        });
        Session::flash('success_message','Your email has been sent');
        return redirect()->back();
    }
}
