<?php

namespace App\Http\Controllers\Server\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\HospitalDoctor;
use App\Models\Pet;

class SuperAdminDashboardController extends Controller
{
    public function index()
    {
        return view('account.super-admin.dashboard');
    }

    public function showDoctors()
    {
        $private_doctors = Doctor::all();
        $hospital_doctors = HospitalDoctor::all();
        return view('account.super-admin.doctors.all', ['private_doctors' => $private_doctors, 'hospital_doctors' => $hospital_doctors]);
    }

    public function showHospitals()
    {
        $hospitals = Hospital::all();
        return view('account.super-admin.hospitals.all', ['hospitals' => $hospitals]);
    }

    public function showPets()
    {
        $pets = Pet::all();
        return view('account.super-admin.pets.all', ['pets' => $pets]);
    }
}
