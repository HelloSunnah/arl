<!DOCTYPE html>
<html>
<head>
    <title>Individual Buttons for Multiple HR</title>
    <style>
        .button {
            margin: 5px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f2f2f2;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Individual Buttons for Multiple HR</h1>

    @foreach ($appointments as $appointment)
        <button class="button">{{ $appointment->candidate_name }} </button>
    @endforeach
</body>
</html>
