@extends('layout.master')
@section('content')
<style>
.containers {
  height: 200px;
  position: relative;
 }
.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
</style>
@if($project == $task->project_id)
<div class="container mt-5"><table class="table">
    <h5>Project #{{$project}} tasks</h5>
     <thead class="thead-light">
       <tr>
         <th scope="col">Id</th>
         <th scope="col">Title</th>
     <th scope="col">Description</th>  
         <th scope="col">Status</th>
          <!-- <th scope="col"><a id="btn" href="/adminDashboard/addProject" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Add Project</a></th> -->

       </tr>
     </thead>
     <tbody>
       @foreach ($tasks as $key => $value)
       <tr>
         <td>{{$value['id']}}</td>
         <td>{{$value['title']}}</td>
         <td>{{$value['description']}}</td>

          <td>{{$value['status']}}</td>
         <td>
          <div class="row">
          
         </td>
 </div>
       </tr>
       @endforeach
     </tbody>
   </table></div>

@else
 

<div class="containers mt-5">
  <div class="center">
  <h3 class="text-center mt-5">No Tasks To Show</h3>
<a href="/adminDashboard/projects"  id="btn" class="btn btn-sm btn-success mb-1">Back</a></td>
  </div>
</div>
@endif
@endsection