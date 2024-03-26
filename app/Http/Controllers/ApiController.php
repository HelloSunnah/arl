<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Schedule;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use HttpResponse;

    public function index(Request $request)
    {
        {
            try{
                $selectedDate = Carbon::today();
            
                $appointments = Schedule::whereDate('schedule_date', $selectedDate)->get();
                
                return response()->json($appointments);}
            catch (\Exception $e) {
                return $this->sendError('Internal Server Error. ' . $e->getMessage(), [], 500);
            }
        }
       
    }

    public function updateStatus(Request $request, $id)
    {
        {
            try{
                $appointment = Schedule::find($id);
                if (!$appointment) {
                    return response()->json(['error' => 'Appointment not found'], 404);
                }
        
                ;
                $appointment->status = 1;
                $appointment->save();
        
                return response()->json(['message' => 'Appointment status updated successfully']);
                        } 
            catch (\Exception $e) {
                return $this->sendError('Internal Server Error. ' . $e->getMessage(), [], 500);
            }
        }

    }



    
    public function getAppointmentsForDate(Request $request)
    {
        try{
        $selectedDate = Carbon::createFromFormat('Y-m-d', $request->input('date'));
        
        $appointments = Schedule::whereDate('schedule_date', $selectedDate)->get();
        
        return response()->json($appointments);
        }
 catch (\Exception $e) {
                return $this->sendError('Internal Server Error. ' . $e->getMessage(), [], 500);
            }
}


//done
// public function list_date(Request $request) {
//     try{
//         $appointments = Schedule::orderBy('schedule_date')->get()->groupBy('schedule_date');
//         $exact_date = $request->input('date');
//         $filtered_response = collect($appointments)->filter(function ($items, $date) use ($exact_date) {
//             return Carbon::parse($date)->eq($exact_date);
//         })->all();  
//         return response()->json($appointments);
//         }
//     catch (\Exception $e) {
//                 return $this->sendError('Internal Server Error. ' . $e->getMessage(), [], 500);
//         }
    
// }
// }

// public function list_date(Request $request) {
//     try {
//         $appointments = Schedule::orderBy('schedule_date')->get()->groupBy('schedule_date');
//         $exact_date = $request->input('date');
//         $exact_time= $request->input('time');
//         if ($exact_date) {
//             try{
//                 $appointments = Schedule::orderBy('schedule_date')->get()->groupBy('schedule_date');
//                 $exact_date = $request->input('date');
//                 $filtered_response = collect($appointments)->filter(function ($items, $date) use ($exact_date) {
//                     return Carbon::parse($date)->eq($exact_date);
//                 })->all();
//                 return response()->json($filtered_response);
//                 }
//             catch (\Exception $e) {
//                         return $this->sendError('Internal Server Error. ' . $e->getMessage(), [], 500);
//                 }
//         }
//         if ($exact_time) {
//             try{
//                 $appointments = Schedule::orderBy('schedule_date')->get()->groupBy('schedule_date');
//                 $exact_time = $request->input('time');
//                 $filtered_response = collect($appointments)->filter(function ($items, $time) use ($exact_time) {
//                     return Carbon::parse($time)->eq($exact_time);
//                 })->all();
//                 return response()->json($filtered_response);
//                 }
//             catch (\Exception $e) {
//                         return $this->sendError('Internal Server Error. ' . $e->getMessage(), [], 500);
//                 }
//         }
//     } catch (\Exception $e) {
//         // Handle exceptions here
//         return response()->json(['error' => $e->getMessage()], 500);
//     }
// }
public function list_date(Request $request) {
    try {
        $appointments = Schedule::orderBy('schedule_date')->get()->groupBy('schedule_date');
        $exact_date = $request->input('date');
        $exact_time = $request->input('time');

        if ($exact_date) {
            try {
                $filtered_response = $appointments->filter(function ($items, $date) use ($exact_date) {
                    return Carbon::parse($date)->eq($exact_date);
                })->all();
                return response()->json($filtered_response);
            } catch (\Exception $e) {
                return $this->sendError('Internal Server Error. ' . $e->getMessage(), [], 500);
            }
        } elseif ($exact_time) {
            try {
                $filtered_response = $appointments->filter(function ($items) use ($exact_time) {
                    return $items->contains('schedule_start', $exact_time);
                })->all();
                return response()->json($filtered_response);
            } catch (\Exception $e) {
                return $this->sendError('Internal Server Error. ' . $e->getMessage(), [], 500);
            }
        } else {
            // Neither exact date nor time is provided
            return response()->json($appointments);
        }
    } catch (\Exception $e) {
        // Handle exceptions here
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
}