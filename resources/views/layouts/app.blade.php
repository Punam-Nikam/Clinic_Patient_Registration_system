<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Clinic Patient Register</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            color: #222;
        }

        nav {
            background: #1f2937;
            padding: 16px 40px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 30px auto;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        h1, h2 {
            margin-top: 0;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 11px;
            margin-top: 6px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        label {
            font-weight: bold;
        }

        button,
        .btn {
            display: inline-block;
            border: none;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            background: #2563eb;
            color: white;
        }

        .btn-secondary {
            background: #6b7280;
        }

        .btn-danger {
            background: #dc2626;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border-bottom: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #f1f5f9;
        }

        .success {
            background: #dcfce7;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        .error {
            background: #fee2e2;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
    </style>
</head>

<body>

<nav>
    <a href="{{ route('patients.index') }}">
        Clinic Patient Register
    </a>
</nav>

<div class="container">

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="error">
            <strong>Please fix the following errors:</strong>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')

</div>

</body>
</html>