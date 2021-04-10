<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\HospitalDoctor as HospitalDoctorResource;
use App\Http\Resources\API\v1\HospitalDoctorCollection;
use App\Models\Hospital;
use App\Models\HospitalDoctor;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HospitalDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return HospitalDoctorCollection|Application|ResponseFactory|Response
     */
    public function getAllHospitalDoctors(Request $request, $hospital_id)
    {
        if (Hospital::where('hospital_id', $hospital_id)->exists()) {
            if ($request->filled('q')) {
                $hospital_doctors = HospitalDoctor::where('hospital_id', $hospital_id)
                    ->where('display_name', 'LIKE', "%{$request->q}%")
                    ->orWhere('specialization', 'LIKE', "%{$request->q}%");

                return new HospitalDoctorCollection($hospital_doctors->paginate());
            } else {
                $hospital_doctors = HospitalDoctor::where('hospital_id', $hospital_id);

                return new HospitalDoctorCollection($hospital_doctors->paginate());
            }
        } else {
            return response(['errors' => 'Record not found.'], 204);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return HospitalDoctorResource|Application|ResponseFactory|Response
     */
    public function getHospitalDoctor(Request $request, $hospital_id, $doctor_id)
    {
        if (Hospital::where('hospital_id', $hospital_id)->exists()) {
            if (HospitalDoctor::where('id', $doctor_id)->where('hospital_id', $hospital_id)->exists()) {
                return new HospitalDoctorResource(HospitalDoctor::where('id', $doctor_id)->first());
            } else {
                return response(['errors' => 'Record not found.'], 204);
            }
        } else {
            return response(['errors' => 'Record not found.'], 204);
        }
    }
}
