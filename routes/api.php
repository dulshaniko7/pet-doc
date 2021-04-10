<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\DoctorController;
use App\Http\Controllers\Api\v1\HospitalController;
use App\Http\Controllers\Api\v1\HospitalDoctorController;
use App\Http\Controllers\Api\v1\PaymentDataController;
use App\Http\Controllers\Api\v1\PetController;
use App\Http\Controllers\Api\v1\TempController;
use App\Http\Controllers\Api\v1\TreatmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['middleware' => ['json.response']], function () {

    Route::prefix('v1')->group(function () {

        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);

        Route::group(['middleware' => 'auth:api'], function () {
            Route::get('logout', [AuthController::class, 'logout']);
            Route::get('user', [AuthController::class, 'user']);
            Route::get('validate-token', [AuthController::class, 'validateToken']);

            Route::get('pets', [PetController::class, 'getAllPets']);
            Route::get('pets/{id}', [PetController::class, 'getPet']);
            Route::delete('pets/{id}', [PetController::class, 'deletePet']);
            Route::get('pet-types', [PetController::class, 'getPetTypes']);

            Route::get('doctors', [DoctorController::class, 'getAllDoctors']);
            Route::get('doctors/{id}', [DoctorController::class, 'getDoctor']);

            Route::get('hospitals', [HospitalController::class, 'getAllHospitals']);
            Route::get('hospitals/{id}', [HospitalController::class, 'getHospital']);

            Route::get('hospitals/{id}/hospital_doctors/', [HospitalDoctorController::class, 'getAllHospitalDoctors']);
            Route::get('hospitals/{id}/hospital_doctors/{doctor_id}', [HospitalDoctorController::class, 'getHospitalDoctor']);

            Route::get('user/payment-data', [PaymentDataController::class, 'getAllPaymentData']);
            Route::get('user/payment-data/{paymentId}', [PaymentDataController::class, 'getPaymentData']);

            Route::get('treatments/{id}', [TreatmentController::class, 'getTreatments']);

            Route::get('temp/pets', [TempController::class, 'getAllPets']);
            Route::get('temp/doctors', [TempController::class, 'getAllDoctors']);
            Route::get('temp/hospitals', [TempController::class, 'getAllHospitals']);
            Route::get('temp/hospitals/{id}/hospital_doctors', [TempController::class, 'getAllHospitalDoctors']);
            Route::get('temp/appointments/hospitals', [TempController::class, 'getHospitalAppointments']);
            Route::get('temp/appointments/doctors', [TempController::class, 'getDoctorAppointments']);
        });
    });
});

Route::prefix('v1')->group(function () {

    Route::middleware(['auth:api', 'optimizeImages'])->group(function () {
        Route::post('user/update', [AuthController::class, 'updateUser']);
        Route::post('pets', [PetController::class, 'addPet']);
        Route::post('pets/update/{id}', [PetController::class, 'updatePet']);
        Route::post('temp/appointment/hospitals', [TempController::class, 'addHospitalAppointment']);
        Route::post('temp/hospitals/{id}/hospital_doctors/{doctor_id}/appointment', [TempController::class, 'getHospitalAppointmentAvailableTimes']);
        Route::post('temp/appointment/doctors', [TempController::class, 'addDoctorAppointment']);
        Route::post('temp/doctors/{id}/appointment', [TempController::class, 'getDoctorAppointmentAvailableTimes']);

    });
});

Route::post('c408352bdcd8', [PaymentDataController::class, 'payhereNotification']);


