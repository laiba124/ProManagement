@extends('layout.master')
@section('content')
<div class="container py-5">

    @if(session()->has('pass'))
    <div class="alert alert-success">
        {{ session()->get('pass') }}
    </div>
    @endif
    @if(session()->has('fail'))
    <div class="alert alert-danger">
        {{ session()->get('fail') }}
    </div>
    @endif

    <div class="card ">
        <div class="card-header ">
        <div class="row">       
        <h5> Project #{{$projects->id}} </h5>                                  
         <a href="/adminDashboard/tasks" id="backbtn" class="btn btn-sm btn-dark ml-5">Back</a>
          </div>


        </div>
      
        <div class="card-body">

            <h5 class="card-title"> {{$projects->title}}</h5>
            <p class="card-text"> {{$projects->description}}</p>
            <p class="card-text"> Status: {{$projects->status}}</p>

            <p class="card-text">
                Created at {{ \Carbon\Carbon::parse($projects->created_at)->format('d/m/y h:i:s A')}}</p>
            <div class="text-right">
            <!-- <a href="/adminDashboard/tasks/{{$projects->id}}/{{ $LoggedUserInfo['id'] }}" class="btn btn-sm btn-info"><i class="fa fa-plus" aria-hidden="true"></i>
                    Add Task</a>   -->
                    <!-- <a href="/adminDashboard/viewProjectTask/{{$projects->id}}" class="btn btn-sm  btn-info text-center"><i class="fa fa-list" aria-hidden="true"></i>
                    View Tasks</a> -->
                    <a href="/adminDashboard/updateProject/{{$projects->id}}" class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i>
                    Edit Project</a>
                <a href="/adminDashboard/viewMembers/{{$projects->id}}/" class="btn btn-info   btn-sm btn-sm "><i class="fa fa-eye" aria-hidden="true"></i>
                    View Members</a>

                <a href="/adminDashboard/deleteProject/{{$projects->id}}" class="btn btn-sm  btn-danger text-center"><i class="fa fa-trash" aria-hidden="true"></i>
                    Delete Project</a>
            </div>
            <div class="card-text">
                <form action="/adminDashboard/assignProject/{{$projects->id}}">
                    <table class="table">
                        <thead class="">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Role</th>
                                <th scope="col">Assign</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users_records as $key => $value)
                            @if($value['status']!="Blocked")

                            <tr>
                                <td>{{$value['id']}}</td>
                                <td>{{$value['name']}}</td>
                                <td>{{$value['email']; }}</td>
                                <td>{{$value['status'];}}</td>
                                <td>{{$value['role']; }}</td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                    <input class="form-check-input" type="checkbox" id="check1" name="selected_users[]" value="{{$value['id']}}">
                                </td>

                                @endif @endforeach
            </div>
            </table>
            <div class="text-center">
                <button type="submit" class="btn btn-success mb-1"><i class="fa fa-tick" aria-hidden="true"></i>
                    Assign Project</button>

                <!-- <a href="" type="submit" class="btn btn-sm btn-primary">Assign Project</a> -->

                </form>
            </div>
        </div>

    </div>
</div>
</div>
@endsection