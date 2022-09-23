@extends('layout.master')
@section('content')


@csrf
@if(session()->has('message'))
<div class="alert alert-success">
  {{ session()->get('message') }}
</div>
@endif
@if(session()->has('pass'))
<div class="alert alert-danger">
  {{ session()->get('pass') }}
</div>
@endif
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
       <th scope="col">Status</th>
       <th scope="col">Action</th>
      <th scope="col"><a id="btn" class="btn btn-dark btn-sm" href="/adminDashboard/addTask"><i class="fa fa-plus" aria-hidden="true"></i> Add Task</a></th>

    </tr>
  </thead>
  <tbody>
    @foreach ($tasks as $key => $value)
    <tr>
      <td>{{$value['id']}}</td>
      <td>{{$value['title']}}</td> 
      <td>{{$value['status']}}</td>
       <td>

        <a href="/adminDashboard/viewTask/{{$value['id']}}" id="btn" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
          View Details</a>&nbsp;
 
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection