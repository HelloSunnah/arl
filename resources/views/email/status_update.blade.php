<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Schedule Book</title>
</head>
<body>
    <h1>Scheduled Booked For {{ $schedule->candidate_name }}</h1>
    <p>Candidate Country: {{ $schedule->candidate_country }}</p>
    <p>Schedule Date: {{ $schedule->schedule_date }}</p>
    <p>Schedule Time: {{ $schedule->candidate_time }}</p>
    <p>Schedule End Time: {{ $schedule->schedule_end }}</p>
</body>
</html>
