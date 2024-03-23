<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<style>
html, body {
  align-items: center;
  background: #f2f4f8;
  border: 0;
  display: flex;
  font-family: Helvetica, Arial, sans-serif;
  font-size: 16px;
  height: 100%;
  justify-content: center;
  margin: 0;
  padding: 0;
}

form {
  background: white;
  width: 400px;
  display: flex;
  flex-direction: column;
  padding: 1rem;
  position: relative;
  overflow: hidden;
}


</style>
    <title>Appointment create</title>
</head>
@include('sweetalert::alert')

<body>
  <form method="post" action="{{route('appointment.create.post')}}">
    @csrf
    <center><h4>Make Schedule</h4></center>
  <div class="mb-3">
    <label for="" class="form-label">Name</label>
    <select class="form-control" name="hr_id" id="">
      @foreach($hrs as $hr)
      <option value="{{$hr->id}}">{{$hr->name}}</option>
      @endforeach
    </select>
  </div> 
  <div class="mb-3">
    <label for="" class="form-label">Candidate Name</label>
    <input type="text" name="candidate_name" class="form-control" >
  </div>   
  <div class="mb-3">
    <label for="" class="form-label">Schedule Date</label>
    <input type="date" name="schedule_date" class="form-control" >
  </div>  <div class="mb-3">
    <label for="" class="form-label">Session Time Start</label>
    <input type="time" name="schedule_start" class="form-control" >
  </div>  <div class="mb-3">
    <label for="" class="form-label">Session Time End</label>
    <input type="time" name="schedule_end" class="form-control" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

</body>
</html>
