<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Models\Doctors;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\Application;

class DoctorController
{

    // UI Retrievals
    public function index(): View|Application
    {
        $doctors = Doctors::all();
        return view('doctors', compact('doctors'));
    }


    // Logical Operations
    public function createDoctors(DoctorRequest $request)
    {
        Doctors::create($request->validated());
        return redirect()->route('doctors.form')->with('success', 'Doctor Created');
    }

}
