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
    <label for="" class="form-label">Candidate Name</label>
    <input type="text" name="candidate_name"  class="form-control" >
  </div>   <div class="mb-3">
    <label for="" class="form-label">Candidate Country</label>
    <input type="text" name="candidate_country" class="form-control" >
  </div>   
  <div class="mb-3">
    <label for="" class="form-label">Schedule Date</label>
    <input type="date" name="schedule_date" required class="form-control" >
  </div>  <div class="mb-3">
    <label for="" class="form-label">Session Time Start</label>
    <input type="time" name="schedule_start" required class="form-control" >
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
      @if(Auth()->user()->user_type=='admin')
      <th scope="col">Hr Name</th>
      @endif
      <th scope="col">Candidate name</th>
      <th scope="col">Candidate Country</th>
      <th scope="col">Session Date</th>
      <th scope="col">Session Time</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($appointment as $hr)
    <tr>
    @if(Auth()->user()->user_type=='admin')
    <td>{{$hr->hr_id}}</td>
      @endif
    <td>{{$hr->candidate_name}}</td>
    <td>{{$hr->candidate_country}}</td>
    <td>{{$hr->schedule_date}}</td>
    <td>{{$hr->schedule_start}}</td>
    @if($hr->status==0)
    <td><span class="badge text-bg-primary">Not Booked</span>
</td>
    
 @else
 <td><span class="badge text-bg-success"> Booked</span>
</td>
@endif
<td>
<a href="" class="badge text-bg-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</a> 
<a href="" class="badge text-bg-danger" >Delete</a> 
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
      <form method="post" action="{{route('appointment.edit.post',$hr->id)}}">
    @csrf
    <center><h4></h4></center>
   
  <div class="mb-3">
    <label for="" class="form-label">Candidate Name</label>
    <input type="text" name="candidate_name"  class="form-control" >
  </div>   <div class="mb-3">
    <label for="" class="form-label">Candidate Country</label>
    <input type="text" name="candidate_country" class="form-control" >
  </div>   
  <div class="mb-3">
    <label for="" class="form-label">Schedule Date</label>
    <input type="date" name="schedule_date" required class="form-control" >
  </div>  <div class="mb-3">
    <label for="" class="form-label">Session Time Start</label>
    <input type="time" name="schedule_start" required class="form-control" >
  </div>  <div class="mb-3">
    <label for="" class="form-label">Session Time End</label>
    <input type="time" name="schedule_end" class="form-control" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
   
    </div>
  </div>
</div>
</td>
    </tr> 
     @endforeach
  </tbody>
</table>
</body>


@endsection