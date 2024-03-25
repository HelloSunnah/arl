<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->input('date');
        $appointments = Schedule::whereDate('schedule_start', $date)->get();
        return response()->json($appointments);
    }

    public function updateStatus(Request $request, $id)
    {
        $appointment = Schedule::find($id);
        if (!$appointment) {
            return response()->json(['error' => 'Appointment not found'], 404);
        }

        $status = $request->input('1');
        $appointment->status = $status;
        $appointment->save();

        return response()->json(['message' => 'Appointment status updated successfully']);
    }
    
    public function getAppointmentsForDate(Request $request)
    {
        $selectedDate = Carbon::createFromFormat('Y-m-d', $request->input('date'));
        
        $appointments = Schedule::whereDate('schedule_date', $selectedDate)->get();
        
        return response()->json($appointments);
    

}
}

