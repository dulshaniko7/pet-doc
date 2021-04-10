<?php

namespace App\Http\Controllers\Server\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AppointmentStatus;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Models\Event;
use App\Models\HospitalAppointment;
use App\Models\Pet;
use App\Models\Report;
use App\Models\Treatment;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DoctorDashboardController extends Controller
{
    public function index()
    {
        $fromDate = Carbon::now()->subMonth()->startOfMonth()->toDateString();
        $tillDate = Carbon::now()->subMonth()->endOfMonth()->toDateString();
        $appointmentsMonthly = HospitalAppointment::whereBetween('appointment_time', [$fromDate, $tillDate])->get();
        $appointmentsCount = $appointmentsMonthly->count();

        $doc = DB::table('hospital_appointments')

            ->groupBy('doctor_id')
            ->orderByRaw('count(*) DESC')
            ->value('doctor_id');
        // dd($doc);
        $bestDoc = Doctor::where('id',$doc)->get();

        $bestDocName = $bestDoc->pluck('display_name')[0];

        $appointmentsPending = Appointment::where('status_id',1)->get()->count();
        $appointmentsAppored = Appointment::where('status_id',2)->get()->count();

        return view('account.doctor.dashboard',compact('appointmentsCount','bestDocName','appointmentsPending','appointmentsAppored'));
    }

    public function showPets()
    {
        $pets = Pet::all();
        return view('account.doctor.pets.all');
    }

    public function showAppointments()
    {
        $user_id = Auth::user()->id;
        $doctor = Doctor::where('doctor_id', $user_id)->first();

        $appointments = Appointment::where('doctor_id', $user_id)->get();
        return view('account.doctor.appointment.all', ['appointments' => $appointments]);
    }

    public function showTreatments()
    {
        $user_id = Auth::user()->id;
        $doctor = Doctor::where('doctor_id', $user_id)->first();

        $treatments = Treatment::where('doctor_id', $user_id)->get();
//        dd($treatments[0]->pets->pet_owner->display_name);
        return view('account.doctor.treatments.all', ['treatments' => $treatments]);
    }

    public function saveTreatments(Request $request)
    {
        $user_id = Auth::user()->id;
        $doctor = Doctor::where('doctor_id', $user_id)->first();

//        dd($doctor);
        $treatment = new Treatment();
        $treatment->pet_id = $request->input('pet_id');
        $treatment->doctor_id = $user_id;
        $treatment->treatment = $request->input('treatments');

        $treatment->save();
        $res['success'] = true;
        $res['message'] = "Treatment added Successfully";
        return response($res);
    }

    public function showSchedule()
    {
        $doctor = Auth::user();
        $monday_schedule = DoctorSchedule::where('doctor_id', $doctor->id)->where('date', 'monday')->get();
        $tuesday_schedule = DoctorSchedule::where('doctor_id', $doctor->id)->where('date', 'tuesday')->get();
        $wednesday_schedule = DoctorSchedule::where('doctor_id', $doctor->id)->where('date', 'wednesday')->get();
        $thursday_schedule = DoctorSchedule::where('doctor_id', $doctor->id)->where('date', 'thursday')->get();
        $friday_schedule = DoctorSchedule::where('doctor_id', $doctor->id)->where('date', 'friday')->get();
        $saturday_schedule = DoctorSchedule::where('doctor_id', $doctor->id)->where('date', 'saturday')->get();
        $sunday_schedule = DoctorSchedule::where('doctor_id', $doctor->id)->where('date', 'sunday')->get();

        $period1 = new CarbonPeriod('08:00', '15 minutes', '24:00'); // for create use 24 hours format later change format
        $slots1 = [];
        foreach ($period1 as $item) {
            array_push($slots1, $item->format("H:i"));
        }

        $period2 = new CarbonPeriod('08:15', '15 minutes', '24:00'); // for create use 24 hours format later change format
        $slots2 = [];
        foreach ($period2 as $item) {
            array_push($slots2, $item->format("H:i"));
        }
        return view('account.doctor.schedule.index', ['doctor' => $doctor, 'slots1' => $slots1, 'slots2' => $slots2, 'mondays' => $monday_schedule
            , 'tuesdays' => $tuesday_schedule, 'wednesdays' => $wednesday_schedule, 'thursdays' => $thursday_schedule, 'fridays' => $friday_schedule,
            'saturdays' => $saturday_schedule, 'sundays' => $sunday_schedule]);
    }

    public function addDocSchedule(Request $request)
    {
        $doctor_id = $request->input('doc_id');
        $date = $request->input('date');
        $start = $request->input('start');
        $end = $request->input('end');

        $check = DoctorSchedule::where('doctor_id', $doctor_id)->where('date', $date)->get();


//        $current_time = $start->format('H:i');
        $start_time = date('H:i', strtotime($start));
        $end_time = date('H:i', strtotime($end));

        foreach ($check as $ch) {
            $db_start = date('H:i', strtotime($ch->time_from));
            $db_end = date('H:i', strtotime($ch->time_to));

            if ($start_time > $db_start && $start_time < $db_end) {
                $res['success'] = false;
                $res['message'] = 'Please Enter correct time slot';
                return response($res);
            }
            if ($end_time > $db_start && $end_time < $db_end) {
                $res['success'] = false;
                $res['message'] = 'Please Enter correct time slot';
                return response($res);
            }
            if ($start_time === $db_start && $end_time === $db_end) {
                $res['success'] = false;
                $res['message'] = 'Duplicate time slot';
                return response($res);
            }

        }

        $schedule = new DoctorSchedule();
        $schedule->doctor_id = $doctor_id;
        $schedule->date = $date;
        $schedule->time_from = $start_time;
        $schedule->time_to = $end_time;
        $schedule->save();

        $res['success'] = true;
        $res['message'] = 'Time slot added successfully';
        return response($res);
    }


    public function showAddTreatments($id)
    {
        $pets = Pet::where('id', $id)->first();
        return view('account.doctor.treatments.add', ['pets' => $pets]);
    }

    public function showAppointmentDetails($id)
    {
        $appointment = Appointment::where('id', $id)->first();
        $reports = Report::where('appointment_id', $appointment->id)->get();
        return view('account.doctor.appointment.detail', ['appointment' => $appointment, 'reports' => $reports]);
    }

    public function changeAppointmentStatus(Request $request)
    {
        $id = $request->input('id');
        $status_id = $request->input('status');
        $appointment = Appointment::where('id', $id)->first();
        $status = AppointmentStatus::where('id', $status_id)->first();
        $stat_type = ucwords($status->type);
        $appointment->status_id = $status_id;
        $appointment->save();

        $res['success'] = true;
        $res['message'] = "Appointment $stat_type!";
        return response($res);
    }

    public function test(Request $request)
    {
        if ($request->ajax()) {

            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end', '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);
        }

        return view('account.doctor.schedule.index');
    }

    public function testajax(Request $request)
    {
        switch ($request->type) {
            case 'add':
                $event = Event::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'update':
                $event = Event::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = Event::find($request->id)->delete();

                return response()->json($event);
                break;

            default:
                # code...
                break;
        }
    }
}
