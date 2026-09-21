@extends('layouts.app')

@section('content')

<div class="card">

    <h1>Register New Patient</h1>

    <form method="POST" action="{{ route('patients.store') }}">

        @csrf

        <label>Patient Name</label>

        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            required
        >

        <label>Age</label>

        <input
            type="number"
            name="age"
            value="{{ old('age') }}"
            min="0"
            max="120"
            required
        >

        <label>Gender</label>

        <select name="gender" required>

            <option value="">Select Gender</option>

            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>

        </select>

        <label>Phone</label>

        <input
            type="text"
            name="phone"
            value="{{ old('phone') }}"
            required
        >

        <label>Address</label>

        <textarea name="address">{{ old('address') }}</textarea>

        <button type="submit">
            Register Patient
        </button>

        <a
            href="{{ route('patients.index') }}"
            class="btn btn-secondary"
        >
            Cancel
        </a>

    </form>

</div>

@endsection