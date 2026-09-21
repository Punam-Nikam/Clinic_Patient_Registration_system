<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $query = Patient::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('phone', 'like', '%' . $request->search . '%');
        }

        $patients = $query->latest()->get();

        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0|max:120',
            'gender' => 'required|in:Male,Female,Other',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string|max:500',
        ]);

        Patient::create($validated);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient registered successfully.');
    }

    public function show(Patient $patient)
    {
        $patient->load('visits');

        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0|max:120',
            'gender' => 'required|in:Male,Female,Other',
            'phone' => 'required|string|max:15',
            'address' => 'nullable|string|max:500',
        ]);

        $patient->update($validated);

        return redirect()
            ->route('patients.show', $patient)
            ->with('success', 'Patient updated successfully.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient deleted successfully.');
    }
}