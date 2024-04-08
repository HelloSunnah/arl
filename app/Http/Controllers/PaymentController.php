<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PaymentRequest;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function paymentRequest()
    {
        return view('pages.Payment');
    }
    public function payment_Request_post(Request $request)
    { {
            $latestRecord = PaymentRequest::latest()->first();
            $lastReferenceId = $latestRecord ? $latestRecord->reference_id : null;

            $year = date('y');
            $month = date('m');

            if ($lastReferenceId && substr($lastReferenceId, 3, 2) == $year && substr($lastReferenceId, 5, 2) == $month) {
                $lastNumber = (int) substr($lastReferenceId, -3);
                $newNumber = $lastNumber + 1;
            } else {
                $newNumber = 1;
            }

            $newReferenceId = $this->generateReferenceId($year, $month, $newNumber);

            $validatedData = $request->validate([
                'signature' => 'required|string',
                'descriptions.*' => 'required|string',
                'amounts.*' => 'required|numeric',
            ]);

            $signature = $validatedData['signature'];

            foreach ($validatedData['descriptions'] as $key => $description) {
                PaymentRequest::create([
                    'description' => $description,
                    'user_id' => Auth()->user()->id,
                    'amount' => $validatedData['amounts'][$key],
                    'signature' => $signature,
                    'reference_id' => $newReferenceId,
                ]);
            }

            return redirect()->back()->with('success', 'Data stored successfully. Reference ID: ' . $newReferenceId);
        }
    }
    private function generateReferenceId($year, $month, $number)
    {
        return 'out' . $year . $month . str_pad($number, 3, '0', STR_PAD_LEFT);
    }




    public function payment_dashboard()
    {
        $pay_reqeust = PaymentRequest::all();
        return view('pages.paymentDashboard', compact('pay_reqeust'));
    }
    public function payment_approved()
    {
        $user = User::where('user_type', 'account')->get();
        $permission = User::where('permission', '1')->get();
        return view('pages.paymentApproved', compact('permission', 'user'));
    }
    public function payment_approved_post(Request $request)
    {
        $user = User::find($request->permission);
        if ($user->permission == 1) {
            return redirect()->back()->with('success', 'You have assigned him already');
        } else {



            $user->update([
                'permission' => '1',
            ]);
            return redirect()->back()->with('success', ' Permission Assign  successfully');
        }
    }
    public function payment_remove_post($id)
    {
         $user=User::find($id);
         $user->update([
            'permission' => '0',
        ]);
        return redirect()->back()->with('danger', ' Permission removed');


    }
}
