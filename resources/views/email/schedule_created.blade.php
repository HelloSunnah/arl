<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Schedule Created</title>
</head>
<body>
    <h1>New Schedule Created</h1>
    <p>A new schedule has been created:</p>
    <p>Candidate Name: {{ $schedule->candidate_name }}</p>
    <p>Candidate Country: {{ $schedule->candidate_country }}</p>
    <p>Schedule Date: {{ $schedule->schedule_date }}</p>
    <p>Schedule Time: {{ $schedule->candidate_time }}</p>
    <p>Schedule End Time: {{ $schedule->schedule_end }}</p>
</body>
</html>
