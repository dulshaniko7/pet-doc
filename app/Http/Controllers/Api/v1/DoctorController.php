<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Doctor as DoctorResource;
use App\Http\Resources\API\v1\DoctorCollection;
use App\Models\Doctor;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return DoctorCollection
     */
    public function getAllDoctors(Request $request)
    {
        if ($request->filled('q')) {
            $doctors = Doctor::whereHas('user', function ($query) use ($request) {
                $query->where('name', 'LIKE', "%{$request->q}%",)
                    ->OrWhere('specialization', 'LIKE', "%{$request->q}%",);
            });
            return new DoctorCollection($doctors->paginate());
        } else {
            return new DoctorCollection(Doctor::paginate());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return DoctorResource|Application|ResponseFactory|Response
     */
    public function getDoctor(Request $request, $id)
    {
        if (Doctor::where('doctor_id', $id)->exists()) {
            return new DoctorResource(Doctor::where('doctor_id', $id)->first());
        } else {
            return response(['errors' => 'Record not found.'], 204);
        }
    }
}
