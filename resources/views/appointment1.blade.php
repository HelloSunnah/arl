<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css
">
    <title>Appointment Data</title>
    <style>
        /* Add your CSS styles here */
        .appointment-button {
            margin: 5px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f2f2f2;
            cursor: pointer;
        }
        .confirmation-form {
            display: none;
        }
    </style>
</head>
<body>
    <h1>Appointment Data</h1>

    <label for="calendar">Select Date: </label>
    <input type="date" id="calendar" name="calendar">

    <div id="appointment-buttons">
        @foreach($appointments as $appointment)
        <button class="appointment-button">{{$appointment->schedule_start}} -{{ $appointment->schedule_end}}</button>
        @endforeach
        <!-- Appointment buttons will be inserted here -->
    </div>
    
 <!-- Confirmation form -->
 <div id="confirmation-form" class="confirmation-form" style="display: none;">
        <h2>Confirmation Form</h2>
        <!-- Add form fields for confirmation -->
        <button id="book-btn">Book</button>
    </div>
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

     

            
            $('#calendar').on('change', function() {
                var selectedDate = $(this).val();
                $.ajax({
                    url: '/appointments',
                    type: 'GET',
                    data: { date: selectedDate },
                    success: function(response) {
                        $('#appointment-buttons').empty();
                        response.forEach(function(appointment) {
                            var button = $('<button class="appointment-button">').text(appointment.schedule_start + ' - ' + appointment.schedule_end);
                            $('#appointment-buttons').append(button);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });   // Event listener for button click
            $(document).on('click', '.appointment-button', function() {
                var appointmentId = $(this).data('id');
                var confirmationForm = $('#confirmation-form');
                confirmationForm.data('appointment-id', appointmentId);
                confirmationForm.show();
            });

            $('#book-btn').click(function() {
            var appointmentId = $('#confirmation-form').data('appointment-id');
            var formData = {
                appointment_id: appointmentId,

            };
        

            $.ajax({
                url: "{{ route('updateStatus') }}",
                type: 'post',
                data: formData,
                success: function(response) {
                    console.log(response);
                    $('#confirmation-form').hide();
                    var button = $('.appointment-button[data-id="' + appointmentId + '"]');
                    button.text('Booked');
                    button.css('background-color', 'gray'); 
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
   
        
 
</body>
</html>
