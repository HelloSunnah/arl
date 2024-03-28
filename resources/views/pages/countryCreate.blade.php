
@extends('master')
@section('content')
<body>
<div class="row">
<div class="col-2"></div>
<div class="col-8">
<div class="card">
  <div class="card-body">
    <center>
    <h5 class="card-title">Add New Hr</h5>
    </center>
    <!-- Advanced Form Elements -->
    <form method="post" action="{{route('country.create.post')}}">
    @csrf
    <div class="row mb-5">
        <label class="col-sm-2 col-form-label">Country Name</label>
        <div class="col-sm-10">
          <div class="input-group mb-3">
            <input type="text" class="form-control"  required placeholder="country name" name="country_name">
          </div>
        </div>
      </div>
      <div class="row mb-5">
        <label class="col-sm-2 col-form-label">Time Difference Hour</label>
        <div class="col-sm-10">
          <div class="input-group mb-3">
            <input type="number" class="form-control" required placeholder="Time Difference" name="time_difference">
          </div>
        </div>
      </div>   
      <div class="row mb-5">
        <label class="col-sm-2 col-form-label">Difference Type</label>
        <div class="col-sm-10">
          <div class="input-group mb-3">
            <select name="type_difference" id="" class="form-control">

            <option value="ahead">Ahead</option>
            <option value="before">before</option>
            </select>
          </div>
        </div>
      </div>
       <div class="row mb-5">
       <span style="color:red">if you want to add 5 hour with Bangladesh time, please select Ahead</span>       
       <span style="color:red">if you want to remove 5 hour From Bangladesh time, please select Before</span>       
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
      <th scope="col">Country Name</th>
      <th scope="col">Time Difference</th>
      <th scope="col">Different Type</th>
    </tr>
  </thead>
  <tbody>

  </tbody>
</table>
</body>
@endsection