@extends('layouts.app')

@section('content')

<div class="card">

    <h1>Patient Details</h1>

    <p>
        <strong>Name:</strong>
        {{ $patient->name }}
    </p>

    <p>
        <strong>Age:</strong>
        {{ $patient->age }}
    </p>

    <p>
        <strong>Gender:</strong>
        {{ $patient->gender }}
    </p>

    <p>
        <strong>Phone:</strong>
        {{ $patient->phone }}
    </p>

    <p>
        <strong>Address:</strong>
        {{ $patient->address ?? 'Not provided' }}
    </p>

    <div class="actions">

        <a
            href="{{ route('patients.edit', $patient) }}"
            class="btn btn-secondary"
        >
            Edit Patient
        </a>

        <a
            href="{{ route('visits.create', $patient) }}"
            class="btn"
        >
            Add Visit
        </a>

        <a
            href="{{ route('patients.index') }}"
            class="btn btn-secondary"
        >
            Back
        </a>

    </div>

</div>


<div class="card">

    <h2>Visit History</h2>

    @if($patient->visits->count() > 0)

        <table>

            <thead>

                <tr>
                    <th>Date</th>
                    <th>Symptoms</th>
                    <th>Prescription</th>
                </tr>

            </thead>

            <tbody>

                @foreach($patient->visits->sortByDesc('visit_date') as $visit)

                    <tr>

                        <td>
                            {{ $visit->visit_date->format('d-m-Y') }}
                        </td>

                        <td>
                            {{ $visit->symptoms }}
                        </td>

                        <td>
                            {{ $visit->prescription ?? 'Not provided' }}
                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <p>No visits recorded for this patient.</p>

    @endif

</div>

@endsection