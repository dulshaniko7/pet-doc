<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\API\v1\TreatmentCollection;
use App\Models\Pet;
use App\Models\PetOwner;
use App\Models\Treatment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class TreatmentController extends Controller
{
    /**
     * Get Treatments
     * @group Authentication
     * @param Request $request
     * @return TreatmentCollection|Application|ResponseFactory|Response
     */
    public function getTreatments(Request $request, $id)
    {
        $user = Auth::user();

        $petOwner = PetOwner::where('pet_owner_id', $user->id)->first();

        $pet = Pet::where('pet_owner_id', $petOwner->pet_owner_id)->where('id', $id)->first();

        if ($pet == null) {
            return response(['errors' => 'Record not found.'], 204);
        }

        $treatments = Treatment::where('pet_id', $pet->id)->orderBy('created_at', 'ASC');


        return new TreatmentCollection($treatments->paginate());
    }
}
