<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Hostels;
use App\Http\Requests\RoomsRequest;
use App\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RoomsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $hostels = Rooms::leftjoin('hostel','hostel.id','=','rooms.hostel_id')
            ->select('rooms.*','hostel.hostelName')
            ->paginate(10);
        return view('rooms.index',compact('hostels'));
    }

    public function create()
    {
        $hostels = Hostels::pluck('hostelName','id');
        return view('rooms.create',compact('hostels'));
    }

    public function edit($id)
    {

        $room = Rooms::find($id);
        return $room;
    }

    public function save(RoomsRequest $request)
    {
        Rooms::create([
            'roomName' => $request->input('roomName'),
            'price' => $request->input('price'),
            'type' => $request->input('type'),
            'hostel_id' => $request->input('hostel_id'),
            'status' => 'Vacant'

        ]);
        Session::flash('success_message','You have added a new room');
        return redirect('list/rooms');
    }

    public function update(Request $request)
    {
        $id = $request['room_id'];

        $room = Rooms::find($id);


        $room->update([
            'roomName' => $request->input('roomName'),
            'price' => $request->input('price'),
            'type' => $request->input('type'),
        ]);
        Session::flash('success_message','You have updated the room');
        return redirect('list/rooms');
    }

    public function remove(Request $request)
    {
        $id = $request['id'];
        $org = Rooms::find($id);
        $org->delete();
        Session::flash('success_message','You have deleted the room successfully');
        return redirect()->back();
    }

    public function checkout()
    {
        $id = Auth::user()->id;
        $room_id = Booking::where('user_id',$id)->first();
        $room = Rooms::where('id',$room_id->room_id)->first();

        //return $room;exit();
        if ($room == null || $room == '' || $room->status == 'Vacant'){
            Session::flash('error','You dont have an active room to checkout from.');
            return redirect()->back();
        }else{
            if ($room->status == 'Occupied' && $room->type == 'Double Room'){
                $room->update(['status'=>'Partially Occupied']);
                Session::flash('success_message','You have checked out from your room please book with us again.');
                return redirect()->back();
            }elseif ($room->status == 'Partially Occupied' && $room->type == 'Double Room'){
                $room->update(['status'=>'Vacant']);
                Session::flash('success_message','You have checked out from your room please book with us again.');
                return redirect()->back();
            }else{
                $room->update(['status'=>'Vacant']);
                Session::flash('success_message','You have checked out from your room please book with us again.');
                return redirect()->back();
            }

        }
    }
}
