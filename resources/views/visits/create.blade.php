@extends('layouts.app')

@section('content')

<div class="card">

    <h1>Add Patient Visit</h1>

    <p>
        <strong>Patient:</strong>
        {{ $patient->name }}
    </p>

    <form
        method="POST"
        action="{{ route('visits.store', $patient) }}"
    >

        @csrf

        <label>Visit Date</label>

        <input
            type="date"
            name="visit_date"
            value="{{ old('visit_date', date('Y-m-d')) }}"
            required
        >

        <label>Symptoms</label>

        <textarea
            name="symptoms"
            placeholder="Enter patient's symptoms"
            required
        >{{ old('symptoms') }}</textarea>

        <label>Prescription</label>

        <textarea
            name="prescription"
            placeholder="Enter prescription"
        >{{ old('prescription') }}</textarea>

        <button type="submit">
            Save Visit
        </button>

        <a
            href="{{ route('patients.show', $patient) }}"
            class="btn btn-secondary"
        >
            Cancel
        </a>

    </form>

</div>

@endsection