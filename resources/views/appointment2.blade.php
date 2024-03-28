<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <link href="{{url('assets/css/evo-calendar.midnight-blue.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/evo-calendar.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/css/evo-calendar.css')}}" rel="stylesheet">


    <div class="cal-list" style="padding: 50px 30px;">
        <div class="calendar-size" id="calendar" style="margin-top: 10px">calender</div>
        <!-- <div id="calendar"></div> -->
    </div>


    <!-- <script src="{% static 'js/fontawesome.js' %}" crossorigin="anonymous"></script> -->



    <script>
        $(document).ready(function() {
            fetch('http://127.0.0.1:8000/api/list/date')
                .then(response => response.json())
                .then(data => {
                    // Array to hold calendar events
                    var calendarEvents = [];

                    // Iterate over each date
                    for (const date in data) {
                        // Iterate over appointments for each date
                        data[date].forEach(appointment => {
                            // Convert date and time to required format
                            var dateTime = appointment.schedule_date + ' ' + appointment.schedule_start;
                            var formattedDate = new Date(dateTime);

                            // Add appointment as an event to calendarEvents array
                            calendarEvents.push({
                                id: appointment.id.toString(), // Convert ID to string
                                name: appointment.candidate_name, // Event name
                                date: formattedDate, // Event date
                                description: 'Schedule Start: ' + appointment.schedule_start + ', Schedule End: ' + appointment.schedule_end,
                                type: 'event', // Event type
                                time: appointment.schedule_start // Start time
                            });
                        });
                    }


                })
                .catch(error => {
                    // Handle error fetching data
                    console.error('Error fetching appointment data:', error);
                    // Initialize EvoCalendar with default events
                    $("#calendar").evoCalendar({
                        calendarEvents: [{
                            id: 'bHay68s', // Event's ID (required)
                            name: "New Year", // Event name (required)
                            date: "January/1/2024", // Event date (required)
                            type: "holiday", // Event type (required)
                            everyYear: true // Same event every year (optional)
                        }]
                    });
                });
        });
    </script>
     <script>
        // initialize your calendar, once the page's DOM is ready
        $(document).ready(function() {
            $('#calendar').evoCalendar({
                settingName: settingValue
            })
        })
        </script>
     <script src="{{url('assets/js/evo-calendar.min.js')}}"></script>
    <script src="{{url('assets/js/jquery.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    </body>

</html>