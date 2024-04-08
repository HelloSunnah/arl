@extends('master')
@section('content')

<body>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <center>
                        <h5 class="card-title">Give Permission To</h5>
                    </center>

                    <a href="" style="position: fixed;  right: 320px; transform: translateY(-50%);"
                        class="btn btn-success" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Add New User</a>

                    <!-- Advanced Form Elements -->
                    <form method="POST" action="{{ route('payment.permission.post') }}">
                        @csrf
                        <div class="form-group">
                            <label>User:</label>
                            <select class="form-control" name="permission" id="">
                                @foreach($user as $users)
                                <option value="{{$users->id}}">{{$users->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" style="margin-top: 10px;" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <center>
                        <h5 class="card-title">Permission List</h5>
                    </center>
                    <!-- Advanced Form Elements -->
                    <table class="table">
                        <thead>

                            <tr>
                                <th scope="col">User Name</th>
                                <th scope="col">User Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permission as $key=>$permit)

                            <tr>
                                <td scope="col">{{$permit->name}}</td>
                                <td scope="col">{{$permit->email}}</td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{$key}}">
                                        Remove Permission
                                    </button>

                                </td>
                                <div class="modal fade" id="exampleModal{{$key}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Remove Permission
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are You Sure to Remove Him Form Permission

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a href="{{route('payment.permission.remove',$permit->id)}}"
                                                    class="btn btn-primary">Submit</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
    <!-- Modal -->


</body>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <center style="float: right;">Add NEW USER</center>
            <center>
                <p style="color:red;">User Password is:123456789</p>
            </center>
            <div class="modal-body">

                <form method="POST" action="{{ route('user.create') }}">
                    @csrf
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div id="form-container">
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                    </div>
                    <button type="submit" style="margin-top: 5px;" class="btn btn-success">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>
</div>

@endsection