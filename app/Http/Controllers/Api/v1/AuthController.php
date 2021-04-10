<?php

namespace App\Http\Controllers\Api\v1;

use App\Enums\RoleType;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\PetOwner as PetOwnerResource;
use App\Models\PetOwner;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Uuid;


/**
 * Class AuthController
 * @package App\Http\Controllers\API\v1
 */
class AuthController extends Controller
{

    /**
     * Login
     * @group Authentication
     * @unauthenticated
     * @bodyParam email string required User Email.
     * @bodyParam  password string required User Password.
     * @response status=200 scenario=success {
     * "data":{
     *      "id":7,
     *      "name":"user",
     *      "email":"user@user.com",
     *      "phone":"null",
     *      "address":"null",
     *      "active":"null",
     *      "display_name":"null",
     *      "gender":"null",
     *      "access_token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIzIiwianRpIjoiNTU1OTYyYjVmZmMxODY",
     *      "email_verified_at":"null",
     *      "created_at":"2020-12-09T18:29:58.000000Z",
     *      "updated_at":"2020-12-09T18:29:58.000000Z"
     *  }
     * }
     * @response status=422 scenario="Invalid Credentials" {
     * "errors":[
     *      "Invalid Credentials."
     *  ]
     * }
     * @param Request $request
     * @return PetOwnerResource|Application|ResponseFactory|Response
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response(['errors' => ['Invalid Credentials']], 422);
        }

        $user = Auth::user();

        $petOwner = PetOwner::where('pet_owner_id', $user->id)->first();

        $petOwner->access_token = $user->createToken('authToken')->accessToken;

        return new PetOwnerResource($petOwner);
    }

    /**
     * Register
     * @group Authentication
     * @unauthenticated
     * @bodyParam name string required Username.
     * @bodyParam email string required User Email.
     * @bodyParam  password string required User Password. Should be minimum 8 characters.
     * @bodyParam  password_confirmation string required User Password Conformation. Should be minimum 8 characters.
     * @response status=201 scenario="User Created" {
     * "data":{
     *      "id":7,
     *      "name":"user",
     *      "email":"user@user.com",
     *      "phone":"null",
     *      "address":"null",
     *      "active":"null",
     *      "display_name":"null",
     *      "gender":"null",
     *      "email_verified_at":"null",
     *      "created_at":"2020-12-09T18:29:58.000000Z",
     *      "updated_at":"2020-12-09T18:29:58.000000Z"
     *  }
     * }
     * @response status=422 scenario="Existing Email" {
     * "errors":[
     *      "The email has already been taken."
     *  ]
     * }
     * @response status=422 scenario="Passwords does not match" {
     * "errors":[
     *      "The password confirmation does not match."
     *  ]
     * }
     * @param Request $request
     * @return PetOwnerResource|Application|ResponseFactory|Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'display_name' => ['nullable', 'string', 'max:100'],
            'gender' => ['nullable', 'string', 'max:20'],
            'phone' => ['nullable', 'string', 'max:15'],
            'address' => ['nullable', 'string'],
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        if ($request->has('phone')) {
            $user->phone = $request->input('phone');
        }

        if ($request->has('address')) {
            $user->address = $request->input('address');
        }

        $user->save();

        $user->refresh();

        $user->assignRole(RoleType::PET_OWNER);

        $petOwner = new PetOwner();

        $petOwner->pet_owner_id = $user->id;

        if ($request->has('display_name')) {
            $petOwner->display_name = $request->input('display_name');
        }

        if ($request->has('gender')) {
            $petOwner->gender = $request->input('gender');
        }

        $petOwner->save();

        return new PetOwnerResource($petOwner);
    }

    /**
     * Logout
     * @group Authentication
     * @response status=200 scenario=success {
     * "message":{
     *      "Successfully logged out"
     *  }
     * }
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function logout(Request $request)
    {
        Auth::user()->token()->revoke();

        return response([
            'message' => 'Successfully logged out'
        ], 200);
    }

    /**
     * Get Current User
     * Use this endpoint to get current User.
     * @group Authentication
     * @response status=200 scenario=success {
     * "data":{
     *      "id":7,
     *      "name":"user",
     *      "email":"user@user.com",
     *      "phone":"null",
     *      "address":"null",
     *      "active":"null",
     *      "display_name":"null",
     *      "gender":"null",
     *      "email_verified_at":"null",
     *      "created_at":"2020-12-09T18:29:58.000000Z",
     *      "updated_at":"2020-12-09T18:29:58.000000Z"
     *  }
     * }
     * @response status=422 scenario="Existing Email" {
     * "errors":[
     *      "The email has already been taken."
     *  ]
     * }
     * @param Request $request
     * @return PetOwnerResource
     */
    public function user(Request $request)
    {
        $user = Auth::user();

        $petOwner = PetOwner::where('pet_owner_id', $user->id)->first();

        return new PetOwnerResource($petOwner);
    }

    /**
     * Validate Token
     * Use this endpoint to check if token is valid.
     * Return 200 if valid, 401 if invalid.
     * @group Authentication
     * @response status=200 scenario=success {
     * "data":{
     *      "id":7,
     *      "name":"user",
     *      "email":"user@user.com",
     *      "phone":"null",
     *      "address":"null",
     *      "active":"null",
     *      "display_name":"null",
     *      "gender":"null",
     *      "email_verified_at":"null",
     *      "created_at":"2020-12-09T18:29:58.000000Z",
     *      "updated_at":"2020-12-09T18:29:58.000000Z"
     *  }
     * }
     * @response status=401 scenario="Unauthorized" {
     * "message":[
     *      "Unauthenticated."
     *  ]
     * }
     * @param Request $request
     * @return PetOwnerResource
     */
    public function validateToken(Request $request)
    {
        $user = Auth::user();

        $petOwner = PetOwner::where('pet_owner_id', $user->id)->first();

        return new PetOwnerResource($petOwner);
    }


    /**
     * Update User
     * @group Authentication
     * @param Request $request
     * @return PetOwnerResource|Application|ResponseFactory|Response
     */
    public function updateUser(Request $request)
    {
        $user = Auth::user();

        $petOwner = PetOwner::where('pet_owner_id', $user->id)->first();


        if ($petOwner == null) {
            return response(['errors' => 'Record not found.'], 204);
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:200'],
            'phone' => ['required', 'string', 'max:20'],
            'display_name' => ['required', 'string', 'max:100'],
            'gender' => ['required', 'string', 'max:10'],
            'city' => ['required', 'string', 'max:50'],
            'image' => ['nullable', 'image'],
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

//        'name' => $user->name,
//            'phone' => $this->phone,
//            'address' => $this->address,
//            'display_name' => $this->display_name,
//            'gender' => $this->gender,
//            'first_name' => $this->first_name,
//            'last_name' => $this->last_name,
//            'city' => $this->city,

        $user->name = $request->input('name');

        $user->save();

        $petOwner->telephone = $request->input('telephone');
        $petOwner->gender = $request->input('gender');
        $petOwner->address = $request->input('address');
        $petOwner->city = $request->input('city');
        $petOwner->first_name = $request->input('name');
        $petOwner->last_name = $request->input('name');

        if ($request->has('image')) {
            Storage::delete("public/images/pet_owners/{$petOwner->image}");

            $resizeFile = Image::make($request->file('image'))->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('png');

            $uuid = Uuid::uuid4();

            $path = "public/images/pet_owners/{$uuid->toString()}.png";

            Storage::put($path, $resizeFile->__toString());

            $petOwner->image = "images/pet_owners/{$uuid->toString()}.png";
        }

        $petOwner->save();
        $petOwner->refresh();

        return new PetOwnerResource($petOwner);
    }
}
