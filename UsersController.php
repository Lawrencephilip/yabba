<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where('role','!=','Tenant')->paginate(10);
        return view('users.index',compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return $user;
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
            'role' => 'Receptionist'
        ]);
        Session::flash('success_message','You have created a new user successfully.');
        return redirect('list/users');
    }

    public function update(Request $request)
    {
        $user_id = $request['user_id'];
        $user = User::find($user_id);

        $user->update([
            'username' => $request->input('username'),
            'firstName' => $request->input('firstName'),
            'surname' => $request->input('surname'),
            'phone_number' => $request->input('phone_number'),
            'email' =>$request->input('email'),
            'password'=>bcrypt($request['password']),
        ]);

        Session::flash('success_message','You have editted the user successfully');
        return redirect()->back();
    }

    public function remove( Request $request ) {
        $id = $request['id'];
        $org = User::find($id);
        $org->delete();
        Session::flash('success_message','You have deleted the permission successfully');
        return redirect()->back();
    }

    public function tenants()
    {
        $users = User::where('role','Tenant')->paginate(10);
        return view('users.tenants',compact('users'));
    }
}
