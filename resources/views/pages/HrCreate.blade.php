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
    <form method="post" action="{{route('hr.create.post')}}">
    @csrf
    <div class="row mb-5">
        <label class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <div class="input-group mb-3">
            <input type="text" class="form-control"  required placeholder="Name" name="name">
          </div>
        </div>
      </div>
      <div class="row mb-5">
        <label class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <div class="input-group mb-3">
            <input type="email" class="form-control" required placeholder="Email" name="email">
          </div>
        </div>
      </div>   
      <div class="row mb-5">
        <label class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
          <div class="input-group mb-3">
            <input type="number" class="form-control"  required placeholder="Phone" name="phone">
          </div>
        </div>
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
      <th scope="col">Hr Email</th>
      <th scope="col">Hr Phone</th>
    </tr>
  </thead>
  <tbody>
    @foreach($hrs as $hr)
    <tr>
    <td>{{$hr->name}}</td>
    <td>{{$hr->email}}</td>
    <td>{{$hr->phone}}</td>
     
    
    </tr> 
     @endforeach
  </tbody>
</table>
</body>


@endsection