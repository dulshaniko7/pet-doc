<?php

namespace App\Http\Controllers\Api\v1;

use App\Enums\AppointmentStatusType;
use App\Http\Controllers\Controller;
use App\Http\Resources\API\v1\PaymentData as PaymentDataResource;
use App\Http\Resources\API\v1\PaymentDataCollection;
use App\Models\AppointmentStatus;
use App\Models\HospitalAppointment;
use App\Models\PaymentData;
use App\Models\PetOwner;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentDataController extends Controller
{

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
     * @return PaymentDataCollection|Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function getAllPaymentData(Request $request)
    {

        $user = Auth::user();

        $petOwner = PetOwner::with('payment_data')->where('pet_owner_id', $user->id)->first();

        if ($petOwner == null) {
            return response(['errors' => 'Record not found.'], 204);
        }

        $paymentData = PaymentData::where('pet_owner_id', $petOwner->pet_owner_id)->get();

        return new PaymentDataCollection($paymentData);
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
     * @return PaymentDataResource|Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function getPaymentData(Request $request, $paymentId)
    {

        $user = Auth::user();

        $petOwner = PetOwner::with('payment_data')->where('pet_owner_id', $user->id)->first();

        if ($petOwner == null) {
            return response(['errors' => 'Record not found.'], 204);
        }

        $paymentData = PaymentData::where('pet_owner_id', $petOwner->pet_owner_id)
            ->where('payment_id', $paymentId)
            ->first();

        if ($paymentData == null) {
            return response(['errors' => 'Record not found.'], 204);
        }

        return new PaymentDataResource($paymentData);
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
     * @return Application|\Illuminate\Contracts\Routing\ResponseFactory|Response |ResponseFactory
     */
    public function payhereNotification(Request $request)
    {

//        $validator = Validator::make($request->all(), [
//            'status_code' => ['required', 'max:1'],
//            'order_id' => ['required', 'max:100'],
//            'payment_id' => ['required', 'unique:payment_data', 'max:100'],
//            'customer_token' => ['required', 'max:100'],
//            'method' => ['required', new EnumValue(PaymentType::class)],
//            'payhere_currency' => ['required', new EnumValue(CurrencyType::class)],
//            'card_holder_name' => ['nullable', 'max:100'],
//            'card_no' => ['nullable', 'max:30'],
//            'card_expiry' => ['nullable', 'max:10'],
//        ]);
//
//        if ($validator->fails()) {
//            return response(['errors' => $validator->errors()->all()], 422);
//        }


        Log::error($request->all());

        $status_code = $request->input('status_code');

        if ($status_code === '2') {

            $val = explode("_", $request->input('order_id'));

            $appointment_id = $val[1];

            $appointment = HospitalAppointment::with(['doctor', 'pet', 'status'])
                ->where('id', $appointment_id)
                ->first();

            $status = AppointmentStatus::where('type', AppointmentStatusType::IN_PROGRESS)->first();


            $appointment->status_id = $status->id;

            $appointment->save();

//            $pet_owner_id = $request->input('order_id');
//
//            $user = User::where('id', $pet_owner_id)->first();
//
//            $petOwner = PetOwner::where('pet_owner_id', $user->id)->first();
//
//            if ($petOwner == null) {
//                return response(['error' => 'user not found'], 204);
//            }
//
//            $payment_id = $request->input('payment_id');
//            $customer_token = $request->input('customer_token');
//            $payment_method = PaymentType::fromValue($request->input('method'));
//            $currency = CurrencyType::fromValue($request->input('payhere_currency'));
//
//            $payment_data = new PaymentData();
//
//            $payment_data->payment_id = $payment_id;
//            $payment_data->customer_token = $customer_token;
//            $payment_data->payment_method = $payment_method;
//            $payment_data->currency = $currency;
//
//            if ($payment_method == PaymentType::MASTER() || $payment_method == PaymentType::VISA()) {
//                $card_holder_name = $request->input('card_holder_name');
//                $card_no = $request->input('card_no');
//                $card_expiry = $request->input('card_expiry');
//
//                $payment_data->card_holder_name = $card_holder_name;
//                $payment_data->card_no = $card_no;
//                $payment_data->card_expiry = $card_expiry;
//            }
//
//            $payment_data->pet_owner_id = $petOwner->pet_owner_id;
//
//            $payment_data->save();
        }
    }
}
