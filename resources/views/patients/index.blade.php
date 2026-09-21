@extends('layouts.app')

@section('content')

<div class="card">

    <h1>Patients</h1>

    <a href="{{ route('patients.create') }}" class="btn">
        Register New Patient
    </a>

</div>

<div class="card">

    <form method="GET" action="{{ route('patients.index') }}">

        <label>Search Patient</label>

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search by name or phone"
        >

        <button type="submit">
            Search
        </button>

        <a href="{{ route('patients.index') }}" class="btn btn-secondary">
            Clear
        </a>

    </form>

</div>

<div class="card">

    @if($patients->count() > 0)

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach($patients as $patient)

                    <tr>

                        <td>{{ $patient->id }}</td>

                        <td>{{ $patient->name }}</td>

                        <td>{{ $patient->age }}</td>

                        <td>{{ $patient->gender }}</td>

                        <td>{{ $patient->phone }}</td>

                        <td>

                            <div class="actions">

                                <a
                                    href="{{ route('patients.show', $patient) }}"
                                    class="btn"
                                >
                                    View
                                </a>

                                <a
                                    href="{{ route('patients.edit', $patient) }}"
                                    class="btn btn-secondary"
                                >
                                    Edit
                                </a>

                                <form
                                    method="POST"
                                    action="{{ route('patients.destroy', $patient) }}"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                        onclick="return confirm('Delete this patient?')"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <p>No patients found.</p>

    @endif

</div>

@endsection