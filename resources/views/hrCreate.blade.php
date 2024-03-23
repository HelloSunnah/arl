@extends('master')
@section('content')
<body>
  <div class="hr">
  <form method="post" action="{{route('hr.create.post')}}">
    @csrf
    <center><h4>Add New Hr</h4></center>
  <div class="mb-3">
    <label for="" class="form-label">Name</label>
    <input type="text" name="name" class="form-control">
  </div> 
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" >
  </div>   
  <div class="mb-3">
    <label for="email" class="form-label">Phone</label>
    <input type="number" name="phone" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
<br>

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
     
    
    </tr>  @endforeach
  </tbody>
</table>
</body>


@endsection