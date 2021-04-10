<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Server\Admin\AdminDashboardController;
use App\Http\Controllers\Server\Doctor\DoctorDashboardController;
use App\Http\Controllers\Server\Hospital\HospitalDashboardController;
use App\Http\Controllers\Server\SuperAdmin\SuperAdminDashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/our_service', function () {
    return view('pages.service');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/faq', function () {
    return view('pages.faq');
});


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::post('/password_verification', 'DashboardController@password_verification');
    Route::post('/password', 'DashboardController@store')->name('password.store');
    Route::post('/profile/update', 'DashboardController@updateProfile');
});


Route::group(['prefix' => '/account/doctor','middleware' => ['role:doctor']], function () {
    Route::get('/dashboard', [DoctorDashboardController::class,'index']);
    Route::get('/pets', [DoctorDashboardController::class,'showPets']);
    Route::get('/appointments', [DoctorDashboardController::class, 'showAppointments']);
    Route::get('/treatments', [DoctorDashboardController::class,'showTreatments']);
    Route::get('/schedule', [DoctorDashboardController::class,'showSchedule']);
    Route::post('/add/schedule', [DoctorDashboardController::class,'addDocSchedule']);
    Route::get('/treatments/add/{id}', [DoctorDashboardController::class,'showAddTreatments']);
    Route::post('/treatment/save', [DoctorDashboardController::class,'saveTreatments']);
    Route::get('/appointment/{id}', [DoctorDashboardController::class,'showAppointmentDetails']);
    Route::post('/appointment/status', [DoctorDashboardController::class,'changeAppointmentStatus']);
    Route::get('fullcalender', [DoctorDashboardController::class, 'test']);
    Route::post('fullcalenderAjax', [DoctorDashboardController::class, 'testajax']);
    // Route::get('/appointment', 'DashboardController@viewAppoinments');
    // Route::get('/patient/profile', 'DashboardController@viewPatientDetails');
});

Route::group(['prefix' => '/account/hospital','middleware' => ['role:hospital']], function () {
    Route::get('/dashboard', [HospitalDashboardController::class,'index']);
    Route::get('/profile', [HospitalDashboardController::class,'profile']);
    Route::get('/appointments', [HospitalDashboardController::class,'showAppointments']);
    Route::get('/doctors', [HospitalDashboardController::class,'showDoctors']);
    Route::get('/doctors/add', [HospitalDashboardController::class,'showAddDoctors']);
    Route::get('/doctors/add/fetch', [HospitalDashboardController::class,'fetch']);
    Route::get('/shedules/', [HospitalDashboardController::class,'showHospitalDoctorShedule']);
    Route::get('/shedules/add', [HospitalDashboardController::class,'showAddShedule']);
    Route::post('/doctors/save', [HospitalDashboardController::class,'saveDoctor']);
    Route::get('/appointment/{id}', [HospitalDashboardController::class,'showAppointmentDetails']);
    Route::post('/appointment/status', [HospitalDashboardController::class,'changeAppointmentStatus']);
    Route::get('/doctor/{id}', [HospitalDashboardController::class,'showEditHospitalDoctor']);
    Route::post('/doctor/update', [HospitalDashboardController::class,'updateHospitalDoctor']);
    Route::post('/doctor/add/schedule', [HospitalDashboardController::class,'addDocSchedule']);
//    Route::get('/dashboard', [HospitalDashboardController::class,'index']);

    // Route::get('/patients', 'DashboardController@viewPatients');
    // Route::get('/appoinmet', 'DashboardController@viewAppoinments');
    // Route::get('/patient/profile', 'DashboardController@viewPatientDetails');



});

Route::group(['prefix' => '/account/admin','middleware' => ['role:admin']], function () {
    Route::get('/dashboard', [AdminDashboardController::class,'index']);
    Route::get('/profile', [AdminDashboardController::class,'profile']);
    Route::get('/doctors', [AdminDashboardController::class,'showDoctors']);
    Route::get('/doctor/add', [AdminDashboardController::class,'showAddDoctors']);

    Route::get('/doctor/edit/{id}', [AdminDashboardController::class,'showEditDoctor']);
    Route::post('/doctor/add/schedule', [AdminDashboardController::class,'addDocSchedule']);
    Route::post('/doctor/save', [AdminDashboardController::class,'createDoctor']);
    Route::post('/doctor/update', [AdminDashboardController::class,'updateDoctor']);
    Route::get('/hospitals', [AdminDashboardController::class,'showHospitals']);
    Route::get('/hospital/add', [AdminDashboardController::class,'showAddHospital']);
    Route::post('/hospital/save', [AdminDashboardController::class,'createHospital']);
    Route::get('/hospital/edit/{id}', [AdminDashboardController::class,'showEditHospital']);
    Route::post('/hospital/edit/save', [AdminDashboardController::class,'updateHospital']);
    Route::get('/hospital/doctors/add/{id}', [AdminDashboardController::class,'showAddDocToHospital']);
    Route::get('/hospital/doctor/{id}', [AdminDashboardController::class,'showEditHospitalDoctor']);
    Route::post('hospital/doctors/save', [AdminDashboardController::class,'saveHospitalDoctor']);
    Route::post('/hospital/doctor/update', [AdminDashboardController::class,'updateHospitalDoctor']);
    Route::post('/hospital/doctor/schedule/save', [AdminDashboardController::class,'saveHospitalDoctorSchedule']);
    Route::post('/hospital/doctor/exception_schedule/save', [AdminDashboardController::class,'saveHospitalDoctorExceptionSchedule']);
    // Route::get('/patients', 'DashboardController@viewPatients');
    // Route::get('/appoinmet', 'DashboardController@viewAppoinments');
    // Route::get('/patient/profile', 'DashboardController@viewPatientDetails');

    //   new add for schedule check
    Route::get('doctor/schedule', [DoctorDashboardController::class,'showSchedule']);
    Route::get('hospital/shedules/', [HospitalDashboardController::class,'showHospitalDoctorShedule']);
});

Route::group(['prefix' => '/account/super-admin','middleware' => ['role:super-admin']], function () {
    Route::get('/dashboard', [SuperAdminDashboardController::class,'index']);
    Route::get('/doctors', [SuperAdminDashboardController::class,'showDoctors']);
    Route::get('/hospitals', [SuperAdminDashboardController::class,'showHospitals']);
    Route::get('/pets', [SuperAdminDashboardController::class,'showPets']);
    // Route::get('/appoinmet', 'DashboardController@viewAppoinments');
    // Route::get('/patient/profile', 'DashboardController@viewPatientDetails');
});

// Route::get('account/patients', 'DashboardController@viewPatients');
// Route::get('account/appoinmet', 'DashboardController@viewAppoinments');
// Route::get('account/patient/profile', 'DashboardController@viewPatientDetails');
