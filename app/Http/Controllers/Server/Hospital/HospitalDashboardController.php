<?php

namespace App\Http\Controllers\Server\Hospital;

use App\Http\Controllers\Controller;
use App\Models\AppointmentStatus;
use App\Models\Date;
use App\Models\Doctor;
use App\Models\HospitalAppointment;
use App\Models\HospitalDoctor;
use App\Models\HospitalSchedule;
use App\Models\PetOwner;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HospitalDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $appointments = HospitalAppointment::where('hospital_id', $user_id)->get();

        $fromDate = Carbon::now()->subMonth()->startOfMonth()->toDateString();
        $tillDate = Carbon::now()->subMonth()->endOfMonth()->toDateString();
        $appointmentsMonthly = HospitalAppointment::whereBetween('appointment_time', [$fromDate, $tillDate])->get();
        $appointmentsCount = $appointmentsMonthly->count();

        $doc = DB::table('hospital_appointments')

            ->groupBy('doctor_id')
            ->orderByRaw('count(*) DESC')
            ->value('doctor_id');

        $bestDoc = HospitalDoctor::where('id',$doc)->first();

        if($bestDoc)
        {
            $bestDocName = $bestDoc->display_name;
        }
        else
        {
            $bestDocName = "---";
        }

        $hospital_doctors = HospitalDoctor::where('hospital_id', $user_id)->get();

        return view('account.hospital.dashboard', ['appointments' => $appointments, 'hospital_doctors' => $hospital_doctors, 'user' => $user,'appointmentsCount' => $appointmentsCount,'bestDocName' => $bestDocName]);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('account.profile', ['user' => $user]);
    }
    public  function fetch(){
        $res['success'] = false;
        $res['message'] = "Doctor Added Successfully With Schedules!";
        return response($res);

    }

    public function showAppointments()
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $appointments = HospitalAppointment::where('hospital_id', $user_id)->get();

        return view('account.hospital.appointment.all', ['appointments' => $appointments, 'user' => $user]);
    }

    public function showHospitalDoctorShedule()
    {
        $monday = HospitalSchedule::where('date', 'monday')->get();
        $tuesday = HospitalSchedule::where('date', 'tuesday')->get();
        $wednesday = HospitalSchedule::where('date', 'wednesday')->get();
        $thursday = HospitalSchedule::where('date', 'thursday')->get();
        $friday = HospitalSchedule::where('date', 'friday')->get();
        $saturday = HospitalSchedule::where('date', 'saturday')->get();
        $sunday = HospitalSchedule::where('date', 'sunday')->get();
        $user = Auth::user();
        return view('account.hospital.shedules.index', ['monday' => $monday, 'tuesday' => $tuesday, 'wednesday' => $wednesday, 'thursday' => $thursday, 'friday' => $friday
            , 'saturday' => $saturday, 'sunday' => $sunday, 'user' => $user]);
    }

    public function addDocSchedule(Request $request)
    {
        $doctor_id = $request->input('doc_id');
        $date = $request->input('date');
      //  $start = $request->input('start');
       // $end = $request->input('end');
        $type = $request->input('type');


//dd($date);

//        $current_time = $start->format('H:i');

        if ($type == 1) {
            $check = HospitalSchedule::where('hospital_doctor_id', $doctor_id)->where('date', $date)->where('type',$type)->get();


            $date = $request->input('date');
            $start = $request->input('start');
            $end = $request->input('end');
            $start_time = date('H:i', strtotime($start));
            $end_time = date('H:i', strtotime($end));

            foreach ($check as $ch) {
                $db_start = date('H:i', strtotime($ch->time_from));
                $db_end = date('H:i', strtotime($ch->time_to));

                if ($start_time > $db_start && $start_time < $db_end ) {
                    $res['success'] = false;
                    $res['message'] = 'Please Enter correct time ';
                    return response($res);
                }
                if ($end_time > $db_start && $end_time < $db_end) {
                    $res['success'] = false;
                    $res['message'] = 'Please Enter correct time slot ';
                    return response($res);
                }
                if ($start_time === $db_start && $end_time === $db_end  ) {
                    $res['success'] = false;
                    $res['message'] = 'Duplicate time slot';
                    return response($res);
                }
                if ($start_time === $db_start  ) {
                    $res['success'] = false;
                    $res['message'] = 'You have a another schedule starting on this time' ;
                    return response($res);
                }

            }

            $schedule = new HospitalSchedule();
            $schedule->hospital_doctor_id = $doctor_id;
            $schedule->date = $date;
            $schedule->time_from = $start_time;
            $schedule->time_to = $end_time;
            $schedule->type = $type;
            $schedule->save();

        }

        if ($type == 2) {
            $check = HospitalSchedule::where('hospital_doctor_id', $doctor_id)->where('date', $date)->where('type',$type)->get();


            $startH = $request->input('start');
            $endH = $request->input('end');
            $date = $request->input('date');
            $start_timeH = date('H:i', strtotime($startH));
            $end_timeH = date('H:i', strtotime($endH));
            foreach ($check as $ch) {
                $db_start = date('H:i', strtotime($ch->time_from));
                $db_end = date('H:i', strtotime($ch->time_to));

                if ($start_timeH > $db_start && $start_timeH < $db_end) {
                    $res['success'] = false;
                    $res['message'] = 'Please Enter correct time slot';
                    return response($res);
                }
                if ($end_timeH > $db_start && $end_timeH < $db_end ) {
                    $res['success'] = false;
                    $res['message'] = 'Please Enter correct time slot';
                    return response($res);
                }
               if ($start_timeH === $db_start && $end_timeH === $db_end ) {
                    $res['success'] = false;
                    $res['message'] = 'Duplicate time slot';
                    return response($res);
                }
                if ($start_timeH === $db_start  ) {
                    $res['success'] = false;
                    $res['message'] = 'You have a another schedule starting on this time';
                    return response($res);
                }

            }
            $schedule = new HospitalSchedule();
            $schedule->hospital_doctor_id = $doctor_id;

            $schedule->date = $date;
            $schedule->time_from = $start_timeH;
            $schedule->time_to = $end_timeH;
            $schedule->type = $type;
            $schedule->save();
        }




        $res['success'] = true;
        $res['message'] = 'Time slot added successfully';
        return response($res);
    }

    public function showAddShedule()
    {
        $user = Auth::user();
        return view('account.hospital.shedules.add', ['user', $user]);
    }

    public function showDoctors()
    {
        $user = Auth::user();
        $user_id = Auth::user()->id;
        $hospital_doctors = HospitalDoctor::where('hospital_id', $user_id)->get();

        return view('account.hospital.doctors.all', ['hospital_doctors' => $hospital_doctors, 'user' => $user]);
    }

    public function showAddDoctors()
    {

        $lastdoctor = HospitalDoctor::all()->last();
        $lastdoctor_id = $lastdoctor['id'];
        $id = $lastdoctor_id + 1;
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

        $monday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'monday')->get();
        $tuesday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'tuesday')->get();
        $wednesday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'wednesday')->get();
        $thursday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'thursday')->get();
        $friday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'friday')->get();
        $saturday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'saturday')->get();
        $sunday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'sunday')->get();

        //dd($monday_schedule);
        $user = Auth::user();
        return view('account.hospital.doctors.add', ['users' => $user, 'slots1' => $slots1, 'slots2' => $slots2, 'lastdoctor_id' => $lastdoctor_id, 'mondays' => $monday_schedule, 'tuesdays' => $tuesday_schedule, 'wednesdays' => $wednesday_schedule, 'thursdays' => $thursday_schedule, 'fridays' => $friday_schedule,
            'saturdays' => $saturday_schedule, 'sundays' => $sunday_schedule]);
    }

/*
    public function showEditHospitalDoctor($id)
    {
        $doctor = HospitalDoctor::where('id', $id)->first();
        $type = HospitalDoctor::where('id', $id)->pluck('treatment_method')->first();

//        dd($doctor);
//        $dates = Date::all();
        $monday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'monday')->get();
        $tuesday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'tuesday')->get();
        $wednesday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'wednesday')->get();
        $thursday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'thursday')->get();
        $friday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'friday')->get();
        $saturday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'saturday')->get();
        $sunday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'sunday')->get();

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
        return view('account.hospital.doctors.edit', ['doctor' => $doctor, 'type' => $type, 'slots1' => $slots1, 'slots2' => $slots2, 'mondays' => $monday_schedule
            , 'tuesdays' => $tuesday_schedule, 'wednesdays' => $wednesday_schedule, 'thursdays' => $thursday_schedule, 'fridays' => $friday_schedule,
            'saturdays' => $saturday_schedule, 'sundays' => $sunday_schedule]);
    }
*/

    public function showEditHospitalDoctor($id)
    {

        $doctor = HospitalDoctor::where('id', $id)->first();
        $type = HospitalDoctor::where('id', $id)->pluck('treatment_method')->first();

//        dd($doctor);
//        $dates = Date::all();
/*
        if($type == 1) {

            $monday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'monday')->get();
            $tuesday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'tuesday')->get();
            $wednesday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'wednesday')->get();
            $thursday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'thursday')->get();
            $friday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'friday')->get();
            $saturday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'saturday')->get();
            $sunday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'sunday')->get();

            $monday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'monday')->where('type',4)->get();
            $tuesday_scheduleH =HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'tuesday')->where('type',4)->get();
            $wednesday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'wednesday')->where('type',4)->get();
            $thursday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'thursday')->where('type',4)->get();
            $friday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'friday')->where('type',4)->get();
            $saturday_scheduleH =HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'saturday')->where('type',4)->get();
            $sunday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'sunday')->where('type',4)->get();

        }
        if($type == 2){
            $monday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'monday')->where('type',4)->get();
            dd($monday_schedule);
            $tuesday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'tuesday')->where('type',4)->get();
            $wednesday_schedule =HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'wednesday')->where('type',4)->get();
            $thursday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'thursday')->where('type',4)->get();
            $friday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'friday')->where('type',4)->get();
            $saturday_schedule =HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'saturday')->where('type',4)->get();
            $sunday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'sunday')->where('type',4)->get();

            $monday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'monday')->get();
            $tuesday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'tuesday')->get();
            $wednesday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'wednesday')->get();
            $thursday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'thursday')->get();
            $friday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'friday')->get();
            $saturday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'saturday')->get();
            $sunday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'sunday')->get();
        }
        if($type==3) {
            $monday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'monday')->get();
            $tuesday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'tuesday')->get();
            $wednesday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'wednesday')->get();
            $thursday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'thursday')->get();
            $friday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'friday')->get();
            $saturday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'saturday')->get();
            $sunday_schedule = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'sunday')->get();

            $monday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'monday')->get();
            $tuesday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'tuesday')->get();
            $wednesday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'wednesday')->get();
            $thursday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'thursday')->get();
            $friday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'friday')->get();
            $saturday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'saturday')->get();
            $sunday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'sunday')->get();
        }
*/

        $monday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'monday')->get();
        $tuesday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'tuesday')->get();
        $wednesday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'wednesday')->get();
        $thursday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'thursday')->get();
        $friday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'friday')->get();
        $saturday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'saturday')->get();
        $sunday_scheduleH = HospitalSchedule::where('hospital_doctor_id', $id)->where('date', 'sunday')->get();

        $period1 = new CarbonPeriod('08:00', '15 minutes', '24:00'); // for create use 24 hours format later change format
        $slots1 = [];
        foreach($period1 as $item){
            array_push($slots1,$item->format("H:i"));
        }

        $period2 = new CarbonPeriod('08:15', '15 minutes', '24:00'); // for create use 24 hours format later change format
        $slots2 = [];
        foreach($period2 as $item){
            array_push($slots2,$item->format("H:i"));
        }


        return view('account.hospital.doctors.edit', ['doctor' => $doctor,'type'=>$type, 'slots1'=>$slots1,'slots2'=>$slots2,'mondaysH'=>$monday_scheduleH
            ,'tuesdaysH'=>$tuesday_scheduleH,'wednesdaysH'=>$wednesday_scheduleH,'thursdaysH'=>$thursday_scheduleH,'fridaysH'=>$friday_scheduleH,
            'saturdaysH'=>$saturday_scheduleH,'sundaysH'=>$sunday_scheduleH]);
    }

    public function showAppointmentDetails($id)
    {
        $user = Auth::user();
        $appointment = HospitalAppointment::where('id', $id)->first();

        $pet_owner = PetOwner::where('pet_owner_id', $appointment->pet_owner_id)->first();
        $pet_owner_user = User::where('id', $appointment->pet_owner_id)->first();
        return view('account.hospital.appointment.detail', ['appointment' => $appointment, 'user' => $user, 'pet_owner' => $pet_owner, 'pet_owner_user' => $pet_owner_user]);
    }

    public function saveDoctor(Request $request)
    {

        $user_id = Auth::user()->id;
        $hospital_doctor = new HospitalDoctor();
        $hospital_doctor->hospital_id = $user_id;
        $hospital_doctor->display_name = $request->input('name');
        $hospital_doctor->registration_no = $request->input('reg_no');
        $hospital_doctor->phone = $request->input('phone');
        $hospital_doctor->address = $request->input('address');
        $hospital_doctor->gender = $request->input('gender');
        $hospital_doctor->about = $request->input('about');
        $hospital_doctor->specialization = $request->input('spec');
        $hospital_doctor->bank_account = $request->input('bank_acc_no');
        $hospital_doctor->rate = $request->input('rate');
        $hospital_doctor->visit_rate = $request->input('visit_rate');
        $hospital_doctor->branch = $request->input('branch');
        $hospital_doctor->bank = $request->input('bank');
        $hospital_doctor->account_name = $request->input('account_name');
        $hospital_doctor->treatment_method = $request->input('treatment_method');

//get the last doctor id


        $hospital_doctor->save();
        $days_list = [];
        $monday = array(array());
        $tuesday = array(array());
        $wednesday = array(array());
        $thursday = array(array());
        $friday = array(array());
        $saturday = array(array());
        $sunday = array(array());

        $date_id = "";
        foreach ($request->all() as $key => $day) {
//            dump($key);
            $list = explode('_', $key);
//            dd($list[0]);
            if ($list[0] === 'monday') {
                if ($list[1] === 'start' && $day !== null) {
                    $monday[$list[2]]['start'] = $day;
                } elseif ($list[1] === 'end' && $day !== null && isset($monday[$list[2]]['start'])) {
                    $monday[$list[2]]['end'] = $day;
                }
            } elseif ($list[0] === 'tuesday') {
                if ($list[1] === 'start' && $day != null) {
                    $tuesday[$list[2]]['start'] = $day;
                } elseif ($list[1] === 'end' && $day != null && isset($tuesday[$list[2]]['start'])) {
                    $tuesday[$list[2]]['end'] = $day;
                }
            } elseif ($list[0] === 'wednesday') {
                if ($list[1] === 'start' && $day != null) {
                    $wednesday[$list[2]]['start'] = $day;
                } elseif ($list[1] === 'end' && $day != null && isset($wednesday[$list[2]]['start'])) {
                    $wednesday[$list[2]]['end'] = $day;
                }
            } elseif ($list[0] === 'thursday') {
                if ($list[1] === 'start' && $day != null) {
                    $thursday[$list[2]]['start'] = $day;
                } elseif ($list[1] === 'end' && $day != null && isset($thursday[$list[2]]['start'])) {
                    $thursday[$list[2]]['end'] = $day;
                }
            } elseif ($list[0] === 'friday') {
                if ($list[1] === 'start' && $day != null) {
                    $friday[$list[2]]['start'] = $day;
                } elseif ($list[1] === 'end' && $day != null && isset($friday[$list[2]]['start'])) {
                    $friday[$list[2]]['end'] = $day;
                }
            } elseif ($list[0] === 'saturday') {
                if ($list[1] === 'start' && $day != null) {
                    $saturday[$list[2]]['start'] = $day;
                } elseif ($list[1] === 'end' && $day != null && isset($saturday[$list[2]]['start'])) {
                    $saturday[$list[2]]['end'] = $day;
                }
            } elseif ($list[0] === 'sunday') {
                if ($list[1] === 'start' && $day != null) {
                    $sunday[$list[2]]['start'] = $day;
                } elseif ($list[1] === 'end' && $day != null && isset($sunday[$list[2]]['start'])) {
                    $sunday[$list[2]]['end'] = $day;
                }
            }
        }
//        dd($thursday);
        unset($monday[0]);
        unset($tuesday[0]);
        unset($wednesday[0]);
        unset($thursday[0]);
        unset($friday[0]);
        unset($saturday[0]);
        unset($sunday[0]);

        $shedule = HospitalSchedule::where('hospital_doctor_id', $hospital_doctor->id)->get();

        if ($shedule !== null) {
            $delete_shedule = HospitalSchedule::where('hospital_doctor_id', $hospital_doctor->id)->delete();
            if (count($monday) > 0) {
                foreach ($monday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 1;
                    $hospital_shedule->type = 1;

                    $hospital_shedule->save();

                }
            }
            if (count($tuesday) > 0) {
                foreach ($tuesday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 2;
                    $hospital_shedule->type = 1;
                    $hospital_shedule->save();

                }
            }
            if (count($wednesday) > 0) {
                foreach ($wednesday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 3;
                    $hospital_shedule->type = 1;
                    $hospital_shedule->save();

                }
            }
            if (count($thursday) > 0) {
                foreach ($thursday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 4;
                    $hospital_shedule->type = 1;
                    $hospital_shedule->save();

                }
            }
            if (count($friday) > 0) {
                foreach ($friday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 5;
                    $hospital_shedule->type = 1;
                    $hospital_shedule->save();

                }
            }
            if (count($saturday) > 0) {
                foreach ($saturday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 6;
                    $hospital_shedule->type = 1;
                    $hospital_shedule->save();

                }
            }
            if (count($sunday) > 0) {
                foreach ($sunday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 7;
                    $hospital_shedule->type = 1;
                    $hospital_shedule->save();

                }
            }
        } else {
            if (count($monday) > 0) {
                foreach ($monday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 1;
                    $hospital_shedule->type = 1;
                    $hospital_shedule->save();

                }
            }
            if (count($tuesday) > 0) {
                foreach ($tuesday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 2;
                    $hospital_shedule->type = 1;
                    $hospital_shedule->save();

                }
            }
            if (count($wednesday) > 0) {
                foreach ($wednesday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 3;
                    $hospital_shedule->type = 1;
                    $hospital_shedule->save();

                }
            }
            if (count($thursday) > 0) {
                foreach ($thursday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 4;
                    $hospital_shedule->type = 1;
                    $hospital_shedule->save();

                }
            }
            if (count($friday) > 0) {
                foreach ($friday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 5;
                    $hospital_shedule->type = 1;
                    $hospital_shedule->save();

                }
            }
            if (count($saturday) > 0) {
                foreach ($saturday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 6;
                    $hospital_shedule->type = 1;
                    $hospital_shedule->save();

                }
            }
            if (count($sunday) > 0) {
                foreach ($sunday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 7;
                    $hospital_shedule->type = 1;
                    $hospital_shedule->save();

                }
            }
        }

        /////////new schedule part

        if ($shedule !== null) {
            $delete_shedule = HospitalSchedule::where('hospital_doctor_id', $hospital_doctor->id)->delete();
            if (count($monday) > 0) {
                foreach ($monday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 1;
                    $hospital_shedule->type = 2;
                    $hospital_shedule->save();

                }
            }
            if (count($tuesday) > 0) {
                foreach ($tuesday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 2;
                    $hospital_shedule->type = 2;
                    $hospital_shedule->save();

                }
            }
            if (count($wednesday) > 0) {
                foreach ($wednesday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 3;
                    $hospital_shedule->type = 2;
                    $hospital_shedule->save();

                }
            }
            if (count($thursday) > 0) {
                foreach ($thursday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 4;
                    $hospital_shedule->type = 2;
                    $hospital_shedule->save();

                }
            }
            if (count($friday) > 0) {
                foreach ($friday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 5;
                    $hospital_shedule->type = 2;
                    $hospital_shedule->save();

                }
            }
            if (count($saturday) > 0) {
                foreach ($saturday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 6;
                    $hospital_shedule->type = 2;
                    $hospital_shedule->save();

                }
            }
            if (count($sunday) > 0) {
                foreach ($sunday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 7;
                    $hospital_shedule->type = 2;
                    $hospital_shedule->save();

                }
            }
        } else {
            if (count($monday) > 0) {
                foreach ($monday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 1;
                    $hospital_shedule->type = 2;
                    $hospital_shedule->save();

                }
            }
            if (count($tuesday) > 0) {
                foreach ($tuesday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 2;
                    $hospital_shedule->type = 2;
                    $hospital_shedule->save();

                }
            }
            if (count($wednesday) > 0) {
                foreach ($wednesday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 3;
                    $hospital_shedule->type = 2;
                    $hospital_shedule->save();

                }
            }
            if (count($thursday) > 0) {
                foreach ($thursday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 4;
                    $hospital_shedule->type = 2;
                    $hospital_shedule->save();

                }
            }
            if (count($friday) > 0) {
                foreach ($friday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 5;
                    $hospital_shedule->type = 2;
                    $hospital_shedule->save();

                }
            }
            if (count($saturday) > 0) {
                foreach ($saturday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 6;
                    $hospital_shedule->type = 2;
                    $hospital_shedule->save();

                }
            }
            if (count($sunday) > 0) {
                foreach ($sunday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $hospital_doctor->id;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 7;
                    $hospital_shedule->type = 2;
                    $hospital_shedule->save();

                }
            }
        }
        /// end new part

        $res['success'] = true;
        $res['message'] = "Doctor Added Successfully!";
        return response($res);
    }

    public function updateHospitalDoctor(Request $request)
    {
        $image = $request->file('image');
        $hospital_doctor = HospitalDoctor::where('id', $request->input('doctor_id'))->first();
        $hospital_doctor->display_name = $request->name;
        $hospital_doctor->registration_no = $request->reg_no;
        $hospital_doctor->phone = $request->phone;
        $hospital_doctor->address = $request->address;
        $hospital_doctor->gender = $request->gender;
        $hospital_doctor->rate = $request->rate;
        $hospital_doctor->specialization = $request->specialization;
        $hospital_doctor->visit_rate = $request->visit_rate;
        $hospital_doctor->bank_account = $request->input('bank_acc_no');
        $hospital_doctor->branch = $request->input('branch');
        $hospital_doctor->bank = $request->input('bank');
        $hospital_doctor->treatment_method = $request->input('treatment_method');
        $hospital_doctor->account_name = $request->input('account_name');
        if (!empty($image)) {

            $file_ex = strtolower(File::extension($image->getClientOriginalName()));

            if ($file_ex != "png" && $file_ex != "jpg" && $file_ex != "jpeg" && $file_ex != "gif") {
                $res['success'] = false;
                $res['message'] = 'Invalid photo type!';
                return response($res);
            }

            $filename = uniqid() . "." . $file_ex;
//
            $image->storeAs('public/avatars/hospital_doctors', $filename);
//            $uuid = Uuid::uuid4();
//
//            $path = "public/avatars/doctors/{$uuid->toString()}.$file_ex";
//
//            Storage::put($path, $resizeFile->__toString());

            $hospital_doctor->image = $filename;
        } else {
            $filename = "default.svg";
            $hospital_doctor->image = $filename;
        }
        $hospital_doctor->save();

        $res['success'] = true;
        $res['message'] = 'Hospital Doctor Updated successfully!';
        $res['id'] = $hospital_doctor->id;
        return response($res);
    }

    public function changeAppointmentStatus(Request $request)
    {
        $id = $request->input('id');
        $status_id = $request->input('status');
        $appointment = HospitalAppointment::where('id', $id)->first();
        $status = AppointmentStatus::where('id', $status_id)->first();
        $stat_type = ucwords($status->type);
        $appointment->status_id = $status_id;
        $appointment->save();

        $res['success'] = true;
        $res['message'] = "Appointment updated Successfully!";
        return response($res);
    }
}
