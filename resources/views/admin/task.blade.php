 
@extends('layout.taskcomment')
@section('contents')
<div class="card-text">
                <form action="/adminDashboard/assignTask/{{$task->id}}">
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
                    Assign Task</button>

 
                </form>
            </div>
 
 @endsection