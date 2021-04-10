<?php

namespace App\Http\Controllers\Api\v1;

use App\Enums\AppointmentStatusType;
use App\Http\Resources\API\v1\AppointmentCollection;
use App\Http\Resources\API\v1\DoctorCollection;
use App\Http\Resources\API\v1\HospitalAppointmentCollection;
use App\Http\Resources\API\v1\HospitalCollection;
use App\Http\Resources\API\v1\HospitalDoctorCollection;
use App\Http\Resources\API\v1\PetCollection;
use App\Models\Appointment;
use App\Models\AppointmentStatus;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Models\Hospital;
use App\Models\HospitalAppointment;
use App\Models\HospitalDoctor;
use App\Models\HospitalSchedule;
use App\Models\Pet;
use App\Models\PetOwner;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TempController extends Controller
{
    public function getAllPets(Request $request)
    {
        $user = Auth::user();

        $petOwner = PetOwner::where('pet_owner_id', $user->id)->first();

        $pets = Pet::where('pet_owner_id', $petOwner->pet_owner_id)->get();

        return new PetCollection($pets);
    }

    public function getAllDoctors(Request $request)
    {
        return new DoctorCollection(Doctor::all());
    }

    public function getAllHospitals(Request $request)
    {
        return new HospitalCollection(Hospital::all());
    }

    public function getAllHospitalDoctors(Request $request, $hospital_id)
    {
        if (Hospital::where('hospital_id', $hospital_id)->exists()) {
            $hospital_doctors = HospitalDoctor::where('hospital_id', $hospital_id)->get();

            return new HospitalDoctorCollection($hospital_doctors);
        } else {
            return response(['errors' => 'Record not found.'], 204);
        }
    }

    public function addHospitalAppointment(Request $request)
    {
        $user = Auth::user();

        $petOwner = PetOwner::where('pet_owner_id', $user->id)->first();

        $status = AppointmentStatus::where('type', AppointmentStatusType::PENDING)->first();

        $appointment = new HospitalAppointment();

        $appointment->pet_id = $request->input('pet_id');
        $appointment->hospital_id = $request->input('hospital_id');
        $appointment->pet_owner_id = $petOwner->pet_owner_id;
        $appointment->doctor_id = $request->input('doctor_id');
        $appointment->status_id = $status->id;
        $appointment->appointment_time = $request->input('appointment_time');
        $appointment->address = "";

        if ($request->has('report')) {

            //Storage::delete('/public/reports/'.$user->report);

            $filenameWithExt = $request->file('report')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('report')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('report')->storeAs('public/documents/appointments/reports', $fileNameToStore);

            $appointment->report = 'documents/appointments/reports/' . $fileNameToStore;
        }

        $appointment->save();

        return response(['message' => 'success'], 200);
    }

    public function getHospitalAppointments(Request $request)
    {
        $user = Auth::user();

        $petOwner = PetOwner::where('pet_owner_id', $user->id)->first();

        $appointments = HospitalAppointment::with(['doctor', 'pet', 'status'])
            ->where('pet_owner_id', $petOwner->pet_owner_id)
            ->orderBy('updated_at', 'desc')
            ->get();

        return new HospitalAppointmentCollection($appointments);
    }

    public function getHospitalAppointmentAvailableTimes(Request $request, $id, $doctor_id)
    {
        $user = Auth::user();

        $petOwner = PetOwner::where('pet_owner_id', $user->id)->first();

        if ($petOwner == null) {
            return response(['errors' => 'Record not found.'], 204);
        }

        if (Hospital::where('hospital_id', $id)->exists()) {
            $hospital_doctor = HospitalDoctor::where('hospital_id', $id)->where('id', $doctor_id)->first();

            if ($hospital_doctor == null) {
                return response(['errors' => 'Record not found.'], 204);
            }

            $date = $request->input('date');

            $dayOfWeek = strtolower(date('l', strtotime($date)));

            $hospitalSchedule = HospitalSchedule::where('hospital_doctor_id', $hospital_doctor->id)->where('date', $dayOfWeek)->get();
            
//            $hospitalDoctorException = HospitalDoctorException::where('hospital_doctor_id',$hospital_doctor->id)->whereDate('date', date('Y-m-d', strtotime($date)))->get();

            $lower = 0;
            $upper = 86400;
            $step = 900;

            $times = array();

            foreach (range($lower, $upper, $step) as $increment) {
                $increment = gmdate('H:i', $increment);

                list($hour, $minutes) = explode(':', $increment);

                try {
                    $date_gen = new DateTime(date('Y-m-d', strtotime($date)) . $hour . ':' . $minutes);
                } catch (\Exception $e) {
                    Log::error($e);
                }

                foreach ($hospitalSchedule as $s) {
                    $current_time = $date_gen->format('H:i');
                    $start = date('H:i', strtotime($s->time_from));
                    $end = date('H:i', strtotime($s->time_to));

                    if ($current_time >= $start && $current_time <= $end) {
                        array_push($times, $date_gen->format('Y-m-d H:i'));
                    }
                }
            }

            return response()->json(['times' => $times], 200);
        } else {
            return response(['errors' => 'Record not found.'], 204);
        }
    }

    public function addDoctorAppointment(Request $request)
    {
        $user = Auth::user();

        $petOwner = PetOwner::where('pet_owner_id', $user->id)->first();

        $status = AppointmentStatus::where('type', AppointmentStatusType::PENDING)->first();

        $appointment = new Appointment();

        $appointment->pet_id = $request->input('pet_id');
        $appointment->pet_owner_id = $petOwner->pet_owner_id;
        $appointment->doctor_id = $request->input('doctor_id');
        $appointment->status_id = $status->id;
        $appointment->appointment_time = $request->input('appointment_time');
        $appointment->address = "";

        if ($request->has('report')) {

            //Storage::delete('/public/reports/'.$user->report);

            $filenameWithExt = $request->file('report')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('report')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('report')->storeAs('public/documents/appointments/reports', $fileNameToStore);

            $appointment->report = 'documents/appointments/reports/' . $fileNameToStore;
        }

        $appointment->save();

        return response(['message' => 'success'], 200);
    }

    public function getDoctorAppointments(Request $request)
    {
        $user = Auth::user();

        $petOwner = PetOwner::where('pet_owner_id', $user->id)->first();

        $appointments = Appointment::with(['doctor', 'pet', 'status'])
            ->where('pet_owner_id', $petOwner->pet_owner_id)
            ->orderBy('updated_at', 'desc')
            ->get();

        return new AppointmentCollection($appointments);
    }

    public function getDoctorAppointmentAvailableTimes(Request $request, $id)
    {
        $user = Auth::user();

        $petOwner = PetOwner::where('pet_owner_id', $user->id)->first();

        if ($petOwner == null) {
            return response(['errors' => 'Record not found.'], 204);
        }

        if (Doctor::where('doctor_id', $id)->exists()) {
            $doctor = Doctor::where('doctor_id', $id)->first();

            $date = $request->input('date');

            $dayOfWeek = strtolower(date('l', strtotime($date)));

            $doctorSchedule = DoctorSchedule::where('doctor_id', $doctor->doctor_id)->where('date', $dayOfWeek)->get();

//            $hospitalDoctorException = HospitalDoctorException::where('hospital_doctor_id',$hospital_doctor->id)->whereDate('date', date('Y-m-d', strtotime($date)))->get();

            $lower = 0;
            $upper = 86400;
            $step = 900;

            $times = array();

            foreach (range($lower, $upper, $step) as $increment) {
                $increment = gmdate('H:i', $increment);

                list($hour, $minutes) = explode(':', $increment);

                try {
                    $date_gen = new DateTime(date('Y-m-d', strtotime($date)) . $hour . ':' . $minutes);
                } catch (\Exception $e) {
                    Log::error($e);
                }

                foreach ($doctorSchedule as $s) {
                    $current_time = $date_gen->format('H:i');
                    $start = date('H:i', strtotime($s->time_from));
                    $end = date('H:i', strtotime($s->time_to));

                    if ($current_time >= $start && $current_time <= $end) {
                        array_push($times, $date_gen->format('Y-m-d H:i'));
                    }
                }
            }

            return response()->json(['times' => $times], 200);
        } else {
            return response(['errors' => 'Record not found.'], 204);
        }
    }
}
