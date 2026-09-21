@extends('layouts.app')

@section('content')

<div class="card">

    <h1>Edit Patient</h1>

    <form method="POST" action="{{ route('patients.update', $patient) }}">

        @csrf
        @method('PUT')

        <label>Patient Name</label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $patient->name) }}"
            required
        >

        <label>Age</label>

        <input
            type="number"
            name="age"
            value="{{ old('age', $patient->age) }}"
            min="0"
            max="120"
            required
        >

        <label>Gender</label>

        <select name="gender" required>

            <option value="Male"
                {{ $patient->gender == 'Male' ? 'selected' : '' }}>
                Male
            </option>

            <option value="Female"
                {{ $patient->gender == 'Female' ? 'selected' : '' }}>
                Female
            </option>

            <option value="Other"
                {{ $patient->gender == 'Other' ? 'selected' : '' }}>
                Other
            </option>

        </select>

        <label>Phone</label>

        <input
            type="text"
            name="phone"
            value="{{ old('phone', $patient->phone) }}"
            required
        >

        <label>Address</label>

        <textarea name="address">{{ old('address', $patient->address) }}</textarea>

        <button type="submit">
            Update Patient
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