 
@extends('layout.master')
@section('content')

<div class="">
  <div class="row content">

    <br>
    <div class="container">
      <div class="col-sm-12">
        <div class="well">
          <div>     
 
          </div>




          <h3>Hi {{ $LoggedUserInfo['name'] }}!!</h3>
        
          <h4>ProManagement</h4>
          <p>Our app serves as a platform to facilitate good collaboration among the project stakeholders.It can be used to plan, organize, and allocate resources for managing projects. It helps teams collaborate and keep track of the project’s progress while clearly defining tasks and responsibilities. It lets project managers control costs and time and allows smooth collaboration between stakeholders.</p>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="well">
              <h4>Total Users</h4>
              <p>{{$users}}</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="well">
              <h4>Total Projects</h4>
              <p>{{$projects}}</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="well">
              <h4>Total Tasks</h4>
              <p>{{$tasks}}</p>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>



</div>


<style>
  /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
  .row.content {
    height: 550px
  }

  /* 
 .container-fluid{
      display: flex;
    align-self:   text-center;
 } */

  .well {
    background-color: #f1f1f1;
    margin-top: 40px;
    padding: 60px;
    width: 100%;

  }

  /* On small screens, set height to 'auto' for the grid */
  @media screen and (max-width: 767px) {
    .row.content {
      height: auto;
    }
  }
</style>
@endsection

  