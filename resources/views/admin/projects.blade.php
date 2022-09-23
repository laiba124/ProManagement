@extends('layout.master')
@section('content')
   @csrf
   @if(session()->has('message'))
   <div class="alert alert-danger">
     {{ session()->get('message') }}
   </div>
   @endif
   <table class="table">
     <thead class="thead-light">
       <tr>
         <th scope="col">Id</th>
         <th scope="col">Title</th>
         <!-- <th scope="col">Description</th> -->
         <th scope="col">Status</th>
         <th scope="col">Action</th>
         <th scope="col"><a id="btn" href="/adminDashboard/addProject" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Add Project</a></th>

       </tr>
     </thead>
     <tbody>
       @foreach ($projects as $key => $value)
       <tr>
         <td>{{$value['id']}}</td>
         <td>{{$value['title']}}</td>
         <!-- <td>{{$value['description']; }}</td> -->
         <td>{{$value['status']}}</td>
         <td>
          <div class="row">
         <a href="/adminDashboard/viewproject/{{$value['id']}}" class="btn btn-success btn-sm "><i class="fa fa-eye" aria-hidden="true"></i>
View Details</a>
         </td>
 </div>
       </tr>
       @endforeach
     </tbody>
   </table>
   @endsection