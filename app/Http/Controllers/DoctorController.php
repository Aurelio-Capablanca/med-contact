<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Models\Doctors;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
    public function retrieveModal($id): View|Factory
    {
        $doctor = DB::connection('mysql_logic')
            ->table('Doctors','d')
            ->select('d.*')
            ->where('d.idDoctor',$id)
            ->first();
        return view('modals/edit-doctor',compact('doctor'));
    }

    // Logical Operations
    public function createDoctors(DoctorRequest $request): RedirectResponse
    {
        Doctors::create($request->validated());
        return redirect()->route('doctors.form')
            ->with('success', 'Doctor Created');
    }

    public function updateDoctors(DoctorRequest $request, $id): RedirectResponse
    {
        $doctor = Doctors::findorFail($id);
        $doctor->update($request->validated());
        return redirect()->route('doctors.form')
            ->with('success', 'Doctor Updated');
    }



}
