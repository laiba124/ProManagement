@extends('layout.master')
@section('content')

 
<div class="container">
  <div class="row">
<h5>{{$user->name}}'s Assigned Projects:</h5> 
</div>
<table class="table">
  <thead class="">
    <tr>   
       <th scope="col">Project Title</th>
      <th scope="col" rowspan="2" >Description</th>
      <th scope="col"><a id="btn" href="/adminDashboard/users" class="btn btn-sm btn-dark">    
Back</a></th>
 </th>
    </tr>
  </thead>
  <tbody>
  @foreach($user->projects as $project)
<tr>
<td>{{$project->title }}</td>
<td>{{$project->description }}</td>

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