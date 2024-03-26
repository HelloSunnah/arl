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
public function list_date() {
    try{
        $appointments = Schedule::orderBy('schedule_date')->get()->groupBy('schedule_date');
        return response()->json($appointments);
        }
    catch (\Exception $e) {
                return $this->sendError('Internal Server Error. ' . $e->getMessage(), [], 500);
        }
    
}
}

