<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\API\v1\Pet as PetResource;
use App\Http\Resources\API\v1\PetCollection;
use App\Http\Resources\API\v1\PetType as PetTypeResource;
use App\Models\Pet;
use App\Models\PetOwner;
use App\Models\PetType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Uuid;

class PetController extends Controller
{
    /**
     * Get Pet Types
     * @group Authentication
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function getPetTypes(Request $request)
    {
        return PetTypeResource::collection(PetType::all());
    }

    /**
     * Get Pet Types
     * @group Authentication
     * @param Request $request
     * @return PetCollection
     */
    public function getAllPets(Request $request)
    {
        $user = Auth::user();

        $petOwner = PetOwner::where('pet_owner_id', $user->id)->first();

        $pets = Pet::where('pet_owner_id', $petOwner->pet_owner_id);

        return new PetCollection($pets->paginate());
    }

    /**
     * Get Pet Types
     * @group Authentication
     * @param Request $request
     * @return PetResource|Application|ResponseFactory|Response
     */
    public function getPet(Request $request, $id)
    {
        $user = Auth::user();

        $petOwner = PetOwner::where('pet_owner_id', $user->id)->first();

        $pet = Pet::where('pet_owner_id', $petOwner->pet_owner_id)->where('id', $id)->first();

        if ($pet == null) {
            return response(['errors' => 'Record not found.'], 204);
        }

        return new PetResource($pet);
    }

    /**
     * Add Pet
     * @group Authentication
     * @param Request $request
     * @return PetResource|Application|ResponseFactory|Response
     */
    public function addPet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:100'],
            'pet_type' => ['required', 'numeric'],
            'gender' => ['required', 'string', 'max:10'],
            'breed' => ['nullable', 'string', 'max:50'],
            'dob' => ['nullable', 'date'],
            'height' => ['nullable', 'numeric'],
            'weight' => ['nullable', 'numeric'],
            'color' => ['nullable', 'string', 'max:30'],
            'blood_group' => ['nullable', 'string', 'max:10'],
            'notes' => ['nullable', 'string'],
            'image' => ['nullable', 'image'],
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $petType = PetType::find($request->input('pet_type'));

        if ($petType == null) {
            return response(['errors' => ['Pet Type not found']], 422);
        }

        $pet = new Pet();

        $pet->name = $request->input('name');
        $pet->pet_type = $request->input('pet_type');
        $pet->gender = $request->input('gender');

        if ($request->has('breed')) {
            $pet->breed = $request->input('breed');
        }

        if ($request->has('dob')) {
            $pet->birth_day = $request->input('dob');
        }

        if ($request->has('height')) {
            $pet->height = $request->input('height');
        }

        if ($request->has('weight')) {
            $pet->weight = $request->input('weight');
        }

        if ($request->has('color')) {
            $pet->colour = $request->input('color');
        }

        if ($request->has('blood_group')) {
            $pet->blood_group = $request->input('blood_group');
        }

        if ($request->has('notes')) {
            $pet->note = $request->input('notes');
        }

        if ($request->has('image')) {
            $resizeFile = Image::make($request->file('image'))->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('png');

            $uuid = Uuid::uuid4();

            $path = "public/images/pets/{$uuid->toString()}.png";

            Storage::put($path, $resizeFile->__toString());

            $pet->image = "images/pets/{$uuid->toString()}.png";
        }

        $user = Auth::user();

        $petOwner = PetOwner::where('pet_owner_id', $user->id)->first();

        $pet->pet_owner_id = $petOwner->pet_owner_id;
        $pet->pet_type = $petType->id;

        $pet->save();

        return new PetResource($pet);
    }

    /**
     * Update Pet
     * @group Authentication
     * @param Request $request
     * @return PetResource|Application|ResponseFactory|Response
     */
    public function updatePet(Request $request, $id)
    {
        $user = Auth::user();

        $petOwner = PetOwner::where('pet_owner_id', $user->id)->first();

        $pet = Pet::where('pet_owner_id', $petOwner->pet_owner_id)->where('id', $id)->first();

        if ($pet == null) {
            return response(['errors' => 'Record not found.'], 204);
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:100'],
            'pet_type' => ['required', 'numeric'],
            'gender' => ['required', 'string', 'max:10'],
            'breed' => ['nullable', 'string', 'max:50'],
            'dob' => ['nullable', 'date'],
            'height' => ['nullable', 'numeric'],
            'weight' => ['nullable', 'numeric'],
            'color' => ['nullable', 'string', 'max:30'],
            'blood_group' => ['nullable', 'string', 'max:10'],
            'notes' => ['nullable', 'string'],
            'image' => ['nullable', 'image'],
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $petType = PetType::find($request->input('pet_type'));

        if ($petType == null) {
            return response(['errors' => ['Pet Type not found']], 422);
        }

        $pet->name = $request->input('name');
        $pet->pet_type = $request->input('pet_type');
        $pet->gender = $request->input('gender');

        if ($request->has('breed')) {
            $pet->breed = $request->input('breed');
        }

        if ($request->has('dob')) {
            $pet->birth_day = $request->input('dob');
        }

        if ($request->has('height')) {
            $pet->height = $request->input('height');
        }

        if ($request->has('weight')) {
            $pet->weight = $request->input('weight');
        }

        if ($request->has('color')) {
            $pet->colour = $request->input('color');
        }

        if ($request->has('blood_group')) {
            $pet->blood_group = $request->input('blood_group');
        }

        if ($request->has('notes')) {
            $pet->note = $request->input('notes');
        }

        if ($request->has('image')) {
            Storage::delete("public/images/pets/{$pet->image}");

            $resizeFile = Image::make($request->file('image'))->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('png');

            $uuid = Uuid::uuid4();

            $path = "public/images/pets/{$uuid->toString()}.png";

            Storage::put($path, $resizeFile->__toString());

            $pet->image = "images/pets/{$uuid->toString()}.png";
        }

        $pet->save();

        return new PetResource($pet);
    }

    /**
     * Delete Pet
     * @group Authentication
     * @param Request $request
     * @return PetResource|Application|ResponseFactory|Response
     */
    public function deletePet(Request $request, $id)
    {
        $user = Auth::user();

        $petOwner = PetOwner::where('pet_owner_id', $user->id)->first();

        $pet = Pet::where('pet_owner_id', $petOwner->pet_owner_id)->where('id', $id)->first();

        if ($pet == null) {
            return response(['errors' => 'Record not found.'], 204);
        }

        $pet->delete();

        return new PetResource($pet);
    }
}
