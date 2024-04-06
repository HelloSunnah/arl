@extends('master')
@section('content')
<body>
<div class="row">
<div class="col-2"></div>
<div class="col-8">
<div class="card">
  <div class="card-body">
    <center>
    <h5 class="card-title">Add New Payment Request</h5>
    </center>
    <!-- Advanced Form Elements -->
    <form method="POST" action="{{ route('payment.request.post') }}">
    @csrf
    <div class="form-group">
        <label>Signature:</label>
        <input type="text" name="signature" class="form-control" required>
    </div>
    <div id="form-container">
        <div class="form-group">
            <label>Description:</label>
            <input type="text" name="descriptions[]" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Amount:</label>
            <input type="number" name="amounts[]" class="form-control" step="0.01" required>
        </div>
    </div>
    <button type="button"  class="btn btn-primary" id="add-form">Add Form</button>
    <button type="submit"  class="btn btn-success">Submit</button>
</form>
  </div>
</div>
</div>
<div class="col-2"></div>
</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- Include jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Custom JavaScript -->
<script>
    document.getElementById('add-form').addEventListener('click', function() {
        var container = document.getElementById('form-container');
        var newForm = document.createElement('div');
        newForm.innerHTML = `
            <div class="form-group">
                <label>Description:</label>
                <input type="text"  name="descriptions[]" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Amount:</label>
                <input type="number" name="amounts[]" class="form-control" step="0.01" required>
            </div>
            <div class="col-auto">
                        <button type="button" class="btn btn-danger delete-form">Delete</button>
                    </div>
        `;
        container.appendChild(newForm);
    });  

    $(document).on('click', '.delete-form', function() {
            $(this).closest('.form-group').remove();
        });

</script>
@endsection