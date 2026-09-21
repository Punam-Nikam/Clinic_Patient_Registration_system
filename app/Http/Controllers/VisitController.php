<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function create(Patient $patient)
    {
        return view('visits.create', compact('patient'));
    }

    public function store(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'visit_date' => 'required|date',
            'symptoms' => 'required|string',
            'prescription' => 'nullable|string',
        ]);

        $patient->visits()->create($validated);

        return redirect()
            ->route('patients.show', $patient)
            ->with('success', 'Visit added successfully.');
    }
}