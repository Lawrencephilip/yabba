<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ReportsController extends Controller
{public function __construct()
{
    $this->middleware('auth');
}

    public function getPayment()
    {
        return view('reports.payment');
    }

    public function savePayment(Request $request)
    {
        $start = $request['start-date'];
        $end = $request['end-date'];
        $rules = array(
            'start-date' => 'required',
            'end-date' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return Redirect::to('payment/report')->withErrors($validator);
        }
        $query =Payment::leftjoin('users','users.id','=','payment.user_id')
            ->leftjoin('booking','booking.id','=','payment.booking_id')
            ->leftjoin('rooms','rooms.id','=','booking.room_id')
            ->leftjoin('hostel','hostel.id','=','rooms.hostel_id');

        $transactions =  $query
            ->where(DB::raw('date(payment.created_at)'),'>=',$start)
            ->where(DB::raw('date(payment.created_at)'),'<=',$end)
            ->get();
        return view('reports.payment',compact('transactions','start','end'));
    }
}
