@extends('layout.master')
@section('content')

 @if(session()->has('fail'))
   <div class="alert alert-danger">
     {{ session()->get('fail') }}
   </div>
   @endif
   @if(session()->has('pass'))
   <div class="alert alert-success">
     {{ session()->get('pass') }}
   </div>
   @endif
  
<div class="container">
  <div class="row">
<h5>Task Members:</h5> 
</div>
<table class="table">
  <thead class="">
    <tr>   
       <th scope="col">Member Names</th>
      <th scope="col" rowspan="2" >Status</th>
    <th scope="col"><a id="btn" href="/adminDashboard/viewTask/{{$task->id}}" class="btn btn-sm btn-dark">Back</a></th>
 </th>
    </tr>
  </thead>
  <tbody>
  @foreach($task->users as $user)
<tr> 
<td>{{$user->name }}</td>
<td>{{$user->status }}</td>
  </tr>
@endforeach  
 </tbody>
</table>
</div>
 
<style>
  .container{
    padding-top: 40px;
     width: 80%;
  }
 
</style>
 
 
 @endsection
  