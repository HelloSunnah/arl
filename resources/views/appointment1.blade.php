<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Appointment System</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    /* Add your CSS styles here */

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa; /* Optional: Change background color */
    }

    .container {
        max-width: 800px;
        margin: 200px auto;
        padding: 20px;
        background-color: #ffffff; /* Optional: Change container background color */
        border-radius: 8px; /* Optional: Add some border radius */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional: Add a subtle box shadow */
    }

    h1, h2 {
        text-align: center;
    }

    .calendar-container {
        text-align: center;
        margin-bottom: 20px;
    }

    .appointment-buttons {
        padding: 10px 10px;
        text-align: center;
       
    }

    .contact-form {
        display: none; /* Initially hide the form */
    }

    /* Add your button styles */
    .custom-button {
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .custom-button:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<div class="container">
    <h1>Appointment System</h1>

    <!-- Calendar -->
    <div class="calendar-container">
        <label for="calendar">Select Date: </label>
        <input type="date" id="calendar" name="calendar">
    </div>
  
    <!-- Buttons -->
    <div class="appointment-buttons">
        @foreach($appointments as $appointment)
        <button class="custom-button appointment-button" data-id="{{$appointment->id}}">{{$appointment->schedule_start}} - {{ $appointment->schedule_end}}</button>
        @endforeach
    </div>
  
    <!-- Contact Form -->
    <div id="confirmationForm" style="display: none;">
        <h3>Confirmation Form</h3>
        <div id="confirmationDetails"></div>
        <button id="confirmButton" class="custom-button">Confirm</button>
        <button id="cancelButton" class="custom-button">Cancel</button>
    </div>

</div>

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
                $('.appointment-buttons').empty();
                response.forEach(function(appointment) {
                    var button = $('<button class="custom-button appointment-button" data-id="' + appointment.id + '">').text(appointment.schedule_start + ' - ' + appointment.candidate_name);
                    $('.appointment-buttons').append(button);
                });
                $('.appointment-buttons').show(); 
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

    $(document).on('click', '.appointment-button', function() {
    var dataId = $(this).data('id');
    var dataDetails = $(this).text();
    $('#confirmationDetails').html(dataDetails);
    $('#confirmationForm').show().data('id', dataId);
});

// Handle confirmation button click
$('#confirmButton').on('click', function() {
    var dataId = $('#confirmationForm').data('id');
    // Get CSRF token from the meta tag
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    // AJAX call to update data
    $.ajax({
        url: '/update-status/' + dataId,
        type: 'PUT',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {
            // Handle success response
            $('#confirmationForm').hide();
            // Assuming you want to update the button text
            $('.appointment-button[data-id="' + dataId + '"]').text('booked');
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(error);
        }
    });
});

$('#cancelButton').on('click', function() {
    $('#confirmationForm').hide();
});


    $('#cancelButton').on('click', function() {
        $('#confirmationForm').hide();
    });
});
</script>
</body>
</html>
