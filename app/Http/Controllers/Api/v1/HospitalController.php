<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\Hospital as HospitalResource;
use App\Http\Resources\API\v1\HospitalCollection;
use App\Models\Hospital;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return HospitalCollection
     */
    public function getAllHospitals(Request $request)
    {
        if ($request->filled('q')) {
            $hospitals = Hospital::whereHas('user', function ($query) use ($request) {
                $query->where('name', 'LIKE', "%{$request->q}%");
            });
            return new HospitalCollection($hospitals->paginate());
        } else {
            return new HospitalCollection(Hospital::paginate());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return HospitalResource|Application|ResponseFactory|Response
     */
    public function getHospital(Request $request, $id)
    {
        if (Hospital::where('hospital_id', $id)->exists()) {
            return new HospitalResource(Hospital::where('hospital_id', $id)->first());
        } else {
            return response(['errors' => 'Record not found.'], 204);
        }
    }
}
