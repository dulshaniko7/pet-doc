<?php

namespace App\Http\Controllers\Server\Admin;

use App\Http\Controllers\Controller;

use App\Models\Appointment;
use App\Models\Date;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Models\Hospital;
use App\Models\HospitalAppointment;
use App\Models\HospitalDoctor;
use App\Models\HospitalDoctorException;
use App\Models\HospitalSchedule;
use App\Models\Pet;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class AdminDashboardController extends Controller
{
    public function index()
    {
        //monthly channels

        $fromDate = Carbon::now()->subMonth()->startOfMonth()->toDateString();
        $tillDate = Carbon::now()->subMonth()->endOfMonth()->toDateString();

        $appointments = HospitalAppointment::whereBetween('appointment_time', [$fromDate, $tillDate])->get();
        $appointmentsCount = $appointments->count();

        $totalPets = Pet::all()->count();
        $totalDoc = Doctor::all()->count();
        $totalHos = Hospital::all()->count();
        $totalApp = Appointment::all()->count();

        //best Doc

 //uncomment when db table hospital_appointents fill

        $doc = DB::table('hospital_appointments')

            ->groupBy('doctor_id')
            ->orderByRaw('count(*) DESC')
            ->value('doctor_id');
      // dd($doc);
        $bestDoc = Doctor::where('id',$doc)->get();

       $bestDocName = $bestDoc->pluck('display_name')[0];


       //

  // upto here and pass the value to view

/*
            $test = DB::table('hospital_schedules')

            ->groupBy('hospital_doctor_id')
            ->orderByRaw('count(*) DESC')
            ->value('hospital_doctor_id');
                $bestDoc = HospitalDoctor::findOrFail($test);
            dd($bestDoc['display_name']);
*/
        return view('account.admin.dashboard', compact('appointmentsCount','bestDocName','totalPets','totalDoc','totalHos','totalApp'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('account.admin.profile', ['user' => $user]);
    }

    public function showDoctors()
    {
        $doctors = Doctor::all();
        return view('account.admin.doctors.all', ['doctors' => $doctors]);
    }

    public function showAddDoctors()
    {
        $doctors = Doctor::all();
        $year = date("Y");
        if (count($doctors) > 0) {

            $last_doctor = Doctor::latest()->first();
            $doctor_petdoc_id = $last_doctor->petdoc_id;

            list($d_letter, $d_date, $d_id) = explode('-', $doctor_petdoc_id);
            $doc_petdoc_id = 'D' . '-' . $year . '-' . ($d_id + 1);
        } else {
            $doc_petdoc_id = 'D' . '-' . $year . '-' . '1';
        }


        return view('account.admin.doctors.add', ['doc_petdoc_id' => $doc_petdoc_id]);
    }

    public function showEditDoctor($id)
    {
        $doctor = Doctor::where('doctor_id', $id)->first();

        $monday_schedule = DoctorSchedule::where('doctor_id', $id)->where('date', 'monday')->get();
        $tuesday_schedule = DoctorSchedule::where('doctor_id', $id)->where('date', 'tuesday')->get();
        $wednesday_schedule = DoctorSchedule::where('doctor_id', $id)->where('date', 'wednesday')->get();
        $thursday_schedule = DoctorSchedule::where('doctor_id', $id)->where('date', 'thursday')->get();
        $friday_schedule = DoctorSchedule::where('doctor_id', $id)->where('date', 'friday')->get();
        $saturday_schedule = DoctorSchedule::where('doctor_id', $id)->where('date', 'saturday')->get();
        $sunday_schedule = DoctorSchedule::where('doctor_id', $id)->where('date', 'sunday')->get();

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
        return view('account.admin.doctors.edit', ['doctor' => $doctor, 'slots1' => $slots1, 'slots2' => $slots2, 'mondays' => $monday_schedule
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

    public function updateHospital(Request $request)
    {
        $petdoc_id = $request->input('petdoc_id');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $reg_no = $request->input('reg_no');
        $address = $request->input('address');
        $rate = $request->input('rate');
        $image = $request->file('image');
        $bank_acc_no = $request->input('bank_acc_no');
        $branch = $request->input('branch');

        $bank = $request->input('bank');
        $account_name = $request->input('account_name');

        $hospital = Hospital::where('petdoc_id', $petdoc_id)->first();
        $hospital_user = User::where('id', $hospital->hospital_id)->first();
        $hospital->display_name = $name;
        $hospital->registration_no = $reg_no;
        $hospital->rate = $rate;
        $hospital->address = $address;
        $hospital->bank_account = $bank_acc_no;
        $hospital->branch = $branch;
        $hospital->bank = $bank;
        $hospital->account_name = $account_name;

        if (!empty($image)) {

            $file_ex = strtolower(File::extension($image->getClientOriginalName()));

            if ($file_ex != "png" && $file_ex != "jpg" && $file_ex != "jpeg" && $file_ex != "gif") {
                $res['success'] = false;
                $res['message'] = 'Invalid photo type!';
                return response($res);
            }

            $filename = uniqid() . "." . $file_ex;
//
            $image->storeAs('public/avatars/hospitals', $filename);
//            $uuid = Uuid::uuid4();
//
//            $path = "public/avatars/doctors/{$uuid->toString()}.$file_ex";
//
//            Storage::put($path, $resizeFile->__toString());

            $hospital->image = $filename;
        }
        $hospital->save();

        $hospital_user->phone = $phone;
        $hospital_user->email = $email;

        $hospital_user->save();
        $res['success'] = true;
        $res['message'] = 'Hospital Updated successfully!';
        return response($res);
    }

    public function showEditHospital($id)
    {
        $hospital = Hospital::where('hospital_id', $id)->first();
        $hospital_doctors = HospitalDoctor::where('hospital_id', $id)->get();

        return view('account.admin.hospitals.edit', ['hospital' => $hospital, 'hospital_doctors' => $hospital_doctors, 'hospital_id' => $id]);
    }

    public function showEditHospitalDoctor($id)
    {
        $doctor = HospitalDoctor::where('id', $id)->first();
        $doctor_shedule = HospitalSchedule::where('id', $doctor->id)->get();
        $dates = Date::all();
        return view('account.admin.hospitals.edit_doctor', ['doctor' => $doctor, 'dates' => $dates]);
    }

    public function updateDoctor(Request $request)
    {
//        dd($request->all());

        $petdoc_id = $request->input('petdoc_id');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $reg_no = $request->input('reg_no');
        $address = $request->input('address');
        $rate = $request->input('rate');
        $gender = $request->input('gender');
        $image = $request->file('image');
        $password = $request->input('password');
        $bank = $request->input('bank');
        $branch = $request->input('branch');
        $bank_account = $request->input('bank_acc_no');
        $account_name = $request->input('account_name');


        $doctor = Doctor::where('petdoc_id', $petdoc_id)->first();
        $doctor_user = User::where('id', $doctor->doctor_id)->first();
        $doctor_user->name = $name;
        $doctor_user->phone = $phone;
        $doctor_user->email = $email;

        if ($password !== null) {
            $doctor_user->password = Hash::make($password);
            $doctor_user->save();
        }
        $doctor_user->save();
        $doctor->doctor_id = $doctor_user->id;
        $doctor->registration_no = $reg_no;
        $doctor->clinic_address = $address;
        $doctor->gender = $gender;
        $doctor->bank = $bank;
        $doctor->branch = $branch;
        $doctor->bank_account = $bank_account;
        $doctor->account_name = $account_name;


        if (!empty($image)) {

            $file_ex = strtolower(File::extension($image->getClientOriginalName()));

            if ($file_ex != "png" && $file_ex != "jpg" && $file_ex != "jpeg" && $file_ex != "gif") {
                $res['success'] = false;
                $res['message'] = 'Invalid photo type!';
                return response($res);
            }

            $filename = uniqid() . "." . $file_ex;
//
            $image->storeAs('public/avatars/doctors', $filename);
//            $uuid = Uuid::uuid4();
//
//            $path = "public/avatars/doctors/{$uuid->toString()}.$file_ex";
//
//            Storage::put($path, $resizeFile->__toString());

            $doctor->image = $filename;
        }
        $doctor->petdoc_id = $petdoc_id;
        $doctor->rate = $rate;
        $doctor->save();

        $res['success'] = true;
        $res['message'] = 'Doctor Updated successfully!';
        return response($res);


    }

    public function showAddDocToHospital($id)
    {
//dd($id);
        return view('account.admin.hospitals.add_doctor', ['hospital_id' => $id]);
    }

    public function saveHospitalDoctor(Request $request)
    {
        $user_id = $request->input('hospital_id');
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
        $hospital_doctor->branch = $request->input('branch');

        $hospital_doctor->save();

        $res['success'] = true;
        $res['message'] = "Doctor Added Successfully!";
        $res['id'] = $user_id;
        return response($res);

    }

    public function saveHospitalDoctorSchedule(Request $request)
    {
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
//dump($monday);
//dump($tuesday);
//dump($wednesday);
//dump($thursday);
//dump($friday);
//dump($saturday);
//dd($sunday);
        $shedule = HospitalSchedule::where('hospital_doctor_id', $request->input('petdoc_id'))->get();

        if ($shedule !== null) {
            $delete_shedule = HospitalSchedule::where('hospital_doctor_id', $request->input('petdoc_id'))->delete();
            if (count($monday) > 0) {
                foreach ($monday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 1;
                    $hospital_shedule->save();

                }
            }
            if (count($tuesday) > 0) {
                foreach ($tuesday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 2;
                    $hospital_shedule->save();

                }
            }
            if (count($wednesday) > 0) {
                foreach ($wednesday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 3;
                    $hospital_shedule->save();

                }
            }
            if (count($thursday) > 0) {
                foreach ($thursday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 4;
                    $hospital_shedule->save();

                }
            }
            if (count($friday) > 0) {
                foreach ($friday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 5;
                    $hospital_shedule->save();

                }
            }
            if (count($saturday) > 0) {
                foreach ($saturday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 6;
                    $hospital_shedule->save();

                }
            }
            if (count($sunday) > 0) {
                foreach ($sunday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 7;
                    $hospital_shedule->save();

                }
            }
        } else {
            if (count($monday) > 0) {
                foreach ($monday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 1;
                    $hospital_shedule->save();

                }
            }
            if (count($tuesday) > 0) {
                foreach ($tuesday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 2;
                    $hospital_shedule->save();

                }
            }
            if (count($wednesday) > 0) {
                foreach ($wednesday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 3;
                    $hospital_shedule->save();

                }
            }
            if (count($thursday) > 0) {
                foreach ($thursday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 4;
                    $hospital_shedule->save();

                }
            }
            if (count($friday) > 0) {
                foreach ($friday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 5;
                    $hospital_shedule->save();

                }
            }
            if (count($saturday) > 0) {
                foreach ($saturday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 6;
                    $hospital_shedule->save();

                }
            }
            if (count($sunday) > 0) {
                foreach ($sunday as $key => $day) {

                    $hospital_shedule = new HospitalSchedule();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->date_id = 7;
                    $hospital_shedule->save();

                }
            }
        }


        $res['success'] = true;
        $res['message'] = 'Shedule Updated successfully!';
        return response($res);

    }

    public function saveHospitalDoctorExceptionSchedule(Request $request)
    {
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
//dump($monday);
//dump($tuesday);
//dump($wednesday);
//dump($thursday);
//dump($friday);
//dump($saturday);
//dd($sunday);
        $shedule = HospitalDoctorException::where('hospital_doctor_id', $request->input('petdoc_id'))->get();

        if ($shedule !== null) {
            $delete_shedule = HospitalDoctorException::where('hospital_doctor_id', $request->input('petdoc_id'))->delete();
            if (count($monday) > 0) {
                foreach ($monday as $key => $day) {

                    $hospital_shedule = new HospitalDoctorException();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->date_id = 1;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->save();

                }
            }
            if (count($tuesday) > 0) {
                foreach ($tuesday as $key => $day) {

                    $hospital_shedule = new HospitalDoctorException();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->date_id = 2;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->save();

                }
            }
            if (count($wednesday) > 0) {
                foreach ($wednesday as $key => $day) {

                    $hospital_shedule = new HospitalDoctorException();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->date_id = 3;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->save();

                }
            }
            if (count($thursday) > 0) {
                foreach ($thursday as $key => $day) {

                    $hospital_shedule = new HospitalDoctorException();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->date_id = 4;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->save();

                }
            }
            if (count($friday) > 0) {
                foreach ($friday as $key => $day) {

                    $hospital_shedule = new HospitalDoctorException();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->date_id = 5;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->save();

                }
            }
            if (count($saturday) > 0) {
                foreach ($saturday as $key => $day) {

                    $hospital_shedule = new HospitalDoctorException();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->date_id = 6;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->save();

                }
            }
            if (count($sunday) > 0) {
                foreach ($sunday as $key => $day) {

                    $hospital_shedule = new HospitalDoctorException();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->date_id = 7;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->save();

                }
            }
        } else {
            if (count($monday) > 0) {
                foreach ($monday as $key => $day) {

                    $hospital_shedule = new HospitalDoctorException();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->date_id = 1;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->save();

                }
            }
            if (count($tuesday) > 0) {
                foreach ($tuesday as $key => $day) {

                    $hospital_shedule = new HospitalDoctorException();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->date_id = 2;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->save();

                }
            }
            if (count($wednesday) > 0) {
                foreach ($wednesday as $key => $day) {

                    $hospital_shedule = new HospitalDoctorException();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->date_id = 3;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->save();

                }
            }
            if (count($thursday) > 0) {
                foreach ($thursday as $key => $day) {

                    $hospital_shedule = new HospitalDoctorException();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->date_id = 4;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->save();

                }
            }
            if (count($friday) > 0) {
                foreach ($friday as $key => $day) {

                    $hospital_shedule = new HospitalDoctorException();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->date_id = 5;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->save();

                }
            }
            if (count($saturday) > 0) {
                foreach ($saturday as $key => $day) {

                    $hospital_shedule = new HospitalDoctorException();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->date_id = 6;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->save();

                }
            }
            if (count($sunday) > 0) {
                foreach ($sunday as $key => $day) {

                    $hospital_shedule = new HospitalDoctorException();
                    $hospital_shedule->hospital_doctor_id = $request->input('petdoc_id');
                    $hospital_shedule->date_id = 7;
                    $hospital_shedule->time_from = $day['start'];
                    $hospital_shedule->time_to = $day['end'];
                    $hospital_shedule->save();

                }
            }
        }


        $res['success'] = true;
        $res['message'] = 'Exception Schedule Updated successfully!';
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
        $hospital_doctor->visit_rate = $request->visit_rate;
        $hospital_doctor->bank_account = $request->input('bank_acc_no');
        $hospital_doctor->branch = $request->input('branch');
        $hospital_doctor->bank = $request->input('bank');
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
        $res['id'] = $hospital_doctor->hospital_id;
        return response($res);
    }

    public function createDoctor(Request $request)
    {
        $petdoc_id = $request->input('petdoc_id');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $reg_no = $request->input('reg_no');
        $address = $request->input('address');
        $spec = $request->input('spec');
        $bank_acc_no = $request->input('bank_acc_no');
        $branch = $request->input('branch');
        $rate = $request->input('rate');
        $visit_rate = $request->input('visit_rate');
        $about = $request->input('about');
        $gender = $request->input('gender');
        $image = $request->file('image');
        $password = $request->input('password');


        $bank = $request->input('bank');
        $account_name = $request->input('account_name');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => Hash::make($password),
        ]);
//
        $role = Role::findByName('doctor');
//
        $user->assignRole($role);
        $user_id = $user->id;

        $doctor = new Doctor();
        $doctor->doctor_id = $user_id;
        $doctor->display_name = $name;
        $doctor->registration_no = $reg_no;
        $doctor->clinic_address = $address;
        $doctor->gender = $gender;

        if (!empty($image)) {

            $file_ex = strtolower(File::extension($image->getClientOriginalName()));

            if ($file_ex != "png" && $file_ex != "jpg" && $file_ex != "jpeg" && $file_ex != "gif") {
                $res['success'] = false;
                $res['message'] = 'Invalid photo type!';
                return response($res);
            }

            $filename = uniqid() . "." . $file_ex;
//
            $image->storeAs('public/avatars/doctors', $filename);
//            $uuid = Uuid::uuid4();
//
//            $path = "public/avatars/doctors/{$uuid->toString()}.$file_ex";
//
//            Storage::put($path, $resizeFile->__toString());

            $doctor->image = $filename;
        } else {
            $filename = "default.svg";
            $doctor->image = $filename;
        }
        $doctor->petdoc_id = $petdoc_id;
        $doctor->rate = $rate;
        $doctor->about = $about;
        $doctor->visit_rate = $visit_rate;
        $doctor->bank_account = $bank_acc_no;
        $doctor->branch = $branch;
        $doctor->specialization = $spec;
        $doctor->bank = $bank;
        $doctor->account_name = $account_name;

        $doctor->save();

        $res['success'] = true;
        $res['message'] = 'Doctor Added successfully!';
        return response($res);

//            case RoleType::HOSPITAL():
//                $last_hospital = Hospital::latest()->first();
//                $hospital_petdoc_id = $last_hospital->petdoc_id;
//                list($h_letter,$h_date,$h_id) = explode('-',$hospital_petdoc_id);
//                $hos_petdoc_id = 'H'.'-'.$year.'-'.($h_id+1);
//                $hospital = new Hospital();
//                $hospital->hospital_id = $user_id;
//                $hospital->petdoc_id = $hos_petdoc_id;
//                $hospital->save();
//                //Create hospital class
//                break;
    }

    public function showHospitals()
    {
        $hospitals = Hospital::all();
        return view('account.admin.hospitals.all', ['hospitals' => $hospitals]);
    }

    public function showAddHospital()
    {
        $doctors = Hospital::all();
        $year = date("Y");
        if (count($doctors) > 0) {

            $last_hospital = Hospital::latest()->first();
            $hospital_petdoc_id = $last_hospital->petdoc_id;
            list($h_letter, $h_date, $h_id) = explode('-', $hospital_petdoc_id);
            $hos_petdoc_id = 'H' . '-' . $year . '-' . ($h_id + 1);
        } else {
            $hos_petdoc_id = 'H' . '-' . $year . '-' . '1';
        }
        return view('account.admin.hospitals.add', ['hos_petdoc_id' => $hos_petdoc_id]);
    }

    public function createHospital(Request $request)
    {

        $petdoc_id = $request->input('petdoc_id');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $reg_no = $request->input('reg_no');
        $address = $request->input('address');
        $rate = $request->input('rate');
        $image = $request->file('image');
        $password = $request->input('password');
        $bank_acc_no = $request->input('bank_acc_no');
        $branch = $request->input('branch');
        $about = $request->input('about');
        $bank = $request->input('bank');
        $account_name = $request->input('account_name');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => Hash::make($password),
        ]);
//
        $role = Role::findByName('hospital');
//
        $user->assignRole($role);
        $user_id = $user->id;


        $hospital = new Hospital();
        $hospital->hospital_id = $user_id;
        $hospital->display_name = $name;
        $hospital->registration_no = $reg_no;
        $hospital->address = $address;

        if (!empty($image)) {

            $file_ex = strtolower(File::extension($image->getClientOriginalName()));

            if ($file_ex != "png" && $file_ex != "jpg" && $file_ex != "jpeg" && $file_ex != "gif") {
                $res['success'] = false;
                $res['message'] = 'Invalid photo type!';
                return response($res);
            }

            $filename = uniqid() . "." . $file_ex;
//
            $image->storeAs('public/avatars/hospitals', $filename);
//            $uuid = Uuid::uuid4();
//
//            $path = "public/avatars/doctors/{$uuid->toString()}.$file_ex";
//
//            Storage::put($path, $resizeFile->__toString());

            $hospital->image = $filename;
        } else {
            $filename = "default.svg";
            $hospital->image = $filename;
        }
        $hospital->petdoc_id = $petdoc_id;
        $hospital->rate = $rate;
        $hospital->about = $about;
        $hospital->bank_account = $bank_acc_no;
        $hospital->branch = $branch;
        $hospital->bank = $bank;
        $hospital->account_name = $account_name;
        $hospital->save();

        $res['success'] = true;
        $res['message'] = 'Hospital Added successfully!';
        return response($res);
    }


}
