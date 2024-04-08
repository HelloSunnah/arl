<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PaymentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('master');
    }
    public function user(Request $request){
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make(123456789),
            
        ]);
        return redirect()->back()->with('success', 'User Create successfully');


    }
    public function reason_post(Request $request,$id){
        $reason=PaymentRequest::find($id);
        
        $reason->update(
            [
                'comment'=>$request->comment,
                'status'=>2
        ]);
            return redirect()->back()->with('Error', 'Cancel  successfully');

    }
    public function approval_post($id){
        $reason=PaymentRequest::find($id);
        
        $reason->update(
            [
                'status'=>1,
                'approved_by'=>Auth::user()->id
        ]);
        return redirect()->back()->with('success', 'approved  successfully');
    }
}
