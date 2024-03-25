@extends('master')
@section('content')
<body>
<div class="row">
<div class="col-2"></div>
<div class="col-8">
<div class="card">
  <div class="card-body">
    <center>
    <h5 class="card-title">Make  Appointment</h5>
    </center>
    <!-- Advanced Form Elements -->
    <form method="post" action="{{route('appointment.create.post')}}">
    @csrf
    <center><h4></h4></center>
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
  </div>   <div class="mb-3">
    <label for="" class="form-label">Candidate Country</label>
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
  </div>
</div>
</div>
<div class="col-2"></div>
</div>


<div class="div"></div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Hr Name</th>
      <th scope="col">Candidate name</th>
      <th scope="col">Candidate Country</th>
      <th scope="col">Session Date</th>
      <th scope="col">Session Time</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach($appointment as $hr)
    <tr>
    <td>{{$hr->hr_name}}</td>
    <td>{{$hr->candidate_name}}</td>
    <td>{{$hr->candidate_country}}</td>
    <td>{{$hr->schedule_date}}</td>
    <td>{{$hr->schedule_start}}</td>
    <td>{{$hr->status}}</td>
     
    
    </tr> 
     @endforeach
  </tbody>
</table>
</body>


@endsection