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
        <h5> Task #{{$task->id}} </h5>                                  
         <a href="/adminDashboard/tasks" id="backbtn" class="btn btn-sm btn-dark ml-5">Back</a>
          </div>


        </div>
        <div class="card-body">

            <h5 class="card-title"> {{$task->title}}</h5>
            <p class="card-text"> {{$task->description}}</p>
            <h6>Project #{{$task->project_id}}</h6>
            <p>Project Title: {{$project_title}} </p>  

            <p class="card-text"> Status: {{$task->status}}</p>
            <p class="card-text"> Created by: {{$created_by}} at  {{ \Carbon\Carbon::parse($task->created_at)->format('d/m/y h:i:s A')}}</p>

            <p class="card-text">
                <!-- Created at {{ \Carbon\Carbon::parse($task->created_at)->format('d/m/y h:i:s A')}}</p> -->
            <div class="text-right">
            <a href="/adminDashboard/comments/{{$task->id}}" class="btn btn-sm btn-success"><i class="fa fa-comment" aria-hidden="true"></i>
                    Comments</a>
                    <a href="/adminDashboard/time/{{$task->id}}" class="btn btn-sm btn-info"><i class="fa fa-list" aria-hidden="true"></i>
                    Assign Task</a>
                <a href="/adminDashboard/editTask/{{$task->id}}" class="btn btn-sm btn-info"><i class="fa fa-pencil" aria-hidden="true"></i>
                    Edit Task</a>
                <a href="/adminDashboard/viewTaskMembers/{{$task->id}}" class="btn btn-info   btn-sm btn-sm "><i class="fa fa-eye" aria-hidden="true"></i>
                    View Members</a>

                <a href="/adminDashboard/deleteTask/{{$task->id}}" class="btn btn-sm  btn-danger text-center"><i class="fa fa-trash" aria-hidden="true"></i>
                    Delete Task</a>
            </div>
        </div>
                            
            </div>
        </div> 
        <div class="container">
 
        @yield('contents')

        </div>
@endsection