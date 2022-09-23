@extends('layout.master')
@section('content')


@csrf
@if(session()->has('message'))
<div class="alert alert-success">
  {{ session()->get('message') }}
</div>
@endif
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Status</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
      <th scope="col"><a id="btn" href="/auth/register" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Add User</a></th>
      <th scope="col"><a type ="hidden"id="btn" class="hidden btn  btn-sm" href="/auth/register">Info</a></th>
     </tr>
   </thead>
  <tbody>
    @foreach ($user_records as $key => $value)
    <tr>
      <td>{{$value['id']}}</td>
      <td>{{$value['name']}}</td>
      <td>{{$value['email']}}</td>

      <td>{{$value['status']}}</td>


      <td>{{$value['role']}}</td>
      <td>

        <a href="view/{{$value['id']}}" id="btn" class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
          View</a>&nbsp;


        <a href="edit/{{$value['id']}}" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i>
          Edit</a>&nbsp;
        <a href="delete/{{$value['id']}}" id="btn" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
        <a href="show/{{$value['id']}}" class="btn btn-info btn-sm"><i class="fa fa-file-text" aria-hidden="true"></i>
          Show assignments</a>&nbsp;
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection