<?php

namespace App\Http\Controllers;

use Pesapal;
use App\Booking;
use App\Hostels;
use App\Http\Requests\HostelRequest;
use App\Payment;
use App\Rooms;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HostelsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $hostels = Hostels::paginate(10);
        return view('hostels.index',compact('hostels'));
    }

    public function create()
    {
        $hostels = Hostels::pluck('hostelName','id');
        return view('hostels.create',compact('hostels'));
    }

    public function save(HostelRequest $request)
    {

        //$imageTempName = $request->file('photo')->getPathname();
        $imageName = $request->file('image_url')->getClientOriginalName();
        $path = base_path() . '/public/images/';
        $request->file('image_url')->move($path , $imageName);
        Hostels::create([
            'hostelName' => $request->input('hostelName'),
            'location' => $request->input('location'),
            'caretakerName' => $request->input('caretakerName'),
            'image_url' => $imageName
        ]);
        Session::flash('success_message','You have added a new hostel');
        return redirect('list/hostels');
    }

    public function edit($id)
    {
        $hostels = Hostels::find($id);
        return $hostels;
    }

    public function update(Request $request)
    {
        $img = $request['image_url'];
        $id = $request['hostel_id'];
        $hostel = Hostels::where('id',$id)->first();
        if ($img == null || $img == ''){
            $hostel->update([
                'hostelName' => $request->input('hostelName'),
                'location' => $request->input('location'),
                'caretakerName' => $request->input('caretakerName'),

            ]);
        }else{
            $imageName = $request->file('image_url')->getClientOriginalName();
            $path = base_path() . '/public/images/';
            $request->file('image_url')->move($path , $imageName);
            $hostel->update([
                'hostelName' => $request->input('hostelName'),
                'location' => $request->input('location'),
                'caretakerName' => $request->input('caretakerName'),
                'image_url' => $imageName
            ]);
        }
        Session::flash('success_message','You have updated the hostel');
        return redirect('list/hostels');


    }

    public function remove(Request $request)
    {
        $id = $request['id'];
        $org = Hostels::find($id);
        $org->delete();
        Session::flash('success_message','You have deleted the hostel successfully');
        return redirect()->back();
    }


    public function payment(Request $request){//initiates payment
        $id = Auth::user()->id;

        $type = $request['type'];
        $room = $request['room'];
        $booking = Booking::where('room_id',$room)->first();
        $rooms = Rooms::where('id',$room)->first();
        if ($type == 'Single Room'){
            $book =  Booking::create([
                'user_id' => $id,
                'checkin' => $request['checkin'],
                'checkout' => $request['checkout'],
                'room_id' => $request['room'],
                'status' => 'Booked'
            ]);
        }else{

            if ($booking == null|| $booking == '' || $booking->status == '' || $booking->status == null || $booking == null){

                $book =  Booking::create([
                    'user_id' => $id,
                    'checkin' => $request['checkin'],
                    'checkout' => $request['checkout'],
                    'room_id' => $request['room'],
                    'status' => 'Partially Booked'
                ]);

            }elseif ($booking->status == 'Partially Paid'){

                Booking::create([
                    'user_id' => $id,
                    'checkin' => $request['checkin'],
                    'checkout' => $request['checkout'],
                    'room_id' => $request['room'],
                    'status' => 'Partially Booked'
                ]);
            }

            else{
                $book =  Booking::create([
                    'user_id' => $id,
                    'checkin' => $request['checkin'],
                    'checkout' => $request['checkout'],
                    'room_id' => $request['room'],
                    'status' => 'Booked'
                ]);
                $booking->update(['status'=>'BOOKED']);

            }

        }


        $payments = new Payment();
        $payments -> booking_id = $book->id; //Business ID
        $payments -> transaction_code = Pesapal::random_reference();
        $payments -> status = 'NEW'; //if user gets to iframe then exits, i prefer to have that as a new/lost transaction, not pending
        $payments -> amount = 1;
        $payments -> user_id = $id;
        $payments -> phone_number = $request['phone_number'];
        $payments -> save();

        $user = User::where('id',$id)->first();
        $details = array(
            'amount' => $payments -> amount,
            'description' => 'Test Transaction',
            'type' => 'MERCHANT',
            'first_name' => $user->firstName,
            'last_name' => $user->surname,
            'email' => 'test@test.com',
            'phonenumber' => $request['phone_number'],
            'reference' => $payments -> booking_id,
            'height'=>'400px',
            //'currency' => 'USD'
        );
        return        $iframe=Pesapal::makePayment($details);

        //return view('tenders.iframe', compact('iframe'));
    }
    public function paymentsuccess(Request $request)//just tells u payment has gone thru..but not confirmed
    {
        $tracking_code = $request->input('tracking_id');
        $ref = $request->input('merchant_reference');
        $payments = Payment::where('booking_id',$ref)->first();
        $status=Pesapal::getMerchantStatus($ref);
        $payments -> transaction_code = $tracking_code;
        $payments -> status = $status;
        $payments -> save();
        //return $payments;exit();
        /*
         $payments -> transaction_code = $tracking_code;
         $payments -> status = 'PENDING';
         $payments -> save();*/
        //go back home


//return $status;exit();
        if ($status == 'COMPLETED'){
            $payments = Payment::where('booking_id',$ref)->first();
            $payments -> status = $status;
            $payments -> save();

            $bookin = Booking::where('id',$payments->booking_id)->first();
           $rooms = Rooms::where('id',$bookin->room_id)->first();

            if ($bookin->status == 'Partially Booked'){
                $bookin->update(['status'=>'Partially Paid']);
            }elseif ($bookin->status == 'Booked'){
                $rooms->update(['status'=>'Occupied']);
                $bookin->update(['status'=>'Fully Paid']);
            }else{
                $rooms->update(['status'=>'Occupied']);
                $bookin->update(['status'=>'Fully Paid']);
            }
            Session::flash('success_message','Payment was successfull');
            return redirect('/');
        }else{
            Session::flash('error_message','Payment was not successfull please apply afresh');
            return redirect('/');
        }
        $payments=Payments::all();

    }
    //This method just tells u that there is a change in pesapal for your transaction..
    //u need to now query status..retrieve the change...CANCELLED? CONFIRMED?
    public function paymentconfirmation(Request $request)
    {
        $trackingid = $request->input('pesapal_transaction_tracking_id');
        $merchant_reference = $request->input('pesapal_merchant_reference');
        $pesapal_notification_type= $request->input('pesapal_notification_type');

        //use the above to retrieve payment status now..
        $this->checkpaymentstatus($trackingid,$merchant_reference,$pesapal_notification_type);
    }
    //Confirm status of transaction and update the DB
    public function checkpaymentstatus($trackingid,$merchant_reference,$pesapal_notification_type){
        $status=Pesapal::getMerchantStatus($merchant_reference);

        if ($status == 'PENDING'){
            $payments = Payment::where('transaction_code',$trackingid)->first();
            $payments -> status = $status;
            $payments -> payment_method = "PESAPAL";//use the actual method though...
            $payments -> save();


            Application::create([
                'reference_no' => $merchant_reference,
                'application_date' => Carbon::today(),
                'status' => $status,
                'tender_id' => $payments->tender_id,
                'user_id' => $payments->user_id
            ]);
            Session::flash('success_message','Payment was successfull');

        }else{
            Session::flash('error_message','Payment was not successfull please apply afresh');
        }

    }



}
