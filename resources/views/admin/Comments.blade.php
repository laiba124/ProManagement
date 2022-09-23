@extends('layout.taskcomment')
@section('contents')
@if(session()->has('message'))
<div class="alert alert-success">
  {{ session()->get('message') }}
</div>
@endif
@if(session()->has('msg'))
<div class="alert alert-danger">
  {{ session()->get('msg') }}
</div>
@endif
<section style="background-color: light grey;">
  <div class="">
    <h4 class="mb-0">Comments</h4>
    <div class="row py-4 d-flex justify-content-center">
      <div class="col-md-12 col-lg-16">@foreach($task->comments as $comment)
        <div class="card text-dark"> 
          <div class="card-body "> 
            <p class="fw-light mb-4 "></p>   

            <div class="d-flex flex-start">
              <img class="rounded-circle ml-4 shadow-1-strong me-2" src="https://i.pinimg.com/474x/65/25/a0/6525a08f1df98a2e3a545fe2ace4be47.jpg" alt="avatar" width="60" height="60" />
              <div>                
                <h6 class="fw-bold ml-5 mb-1">{{$comment->name}}</h6>
                <p class="mb-0 ml-5">
                  {{$comment->Comment}}
                </p>
                <div class="d-flex align-items-center py-3 ml-3 mb-3">
                  <!-- <a href="#" class=" ml-3"><i class="fa fa-pencil ms-2"></i>Edit</a> -->
                  <a href="/adminDashboard/deleteComment/{{$comment->id}}" class="link ml-2"><i class="fa fa-trash ms-2"></i> Delete Comment</a>
              <!-- <hr/>  <hr class="my-0" style="height: 1px;" /> -->
              <hr/>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <hr class="my-0" style="height: 1px;" /><br> -->


<form action="/adminDashboard/addComment/{{$task->id}}" method="post" class="px-md-2">
  @csrf
  @foreach($task->users as $user)
  @if($LoggedUserInfo->name == $user->name)
  <input type="hidden" name="name" value="{{$LoggedUserInfo->name}}">
  <input type="hidden" name="email" value="{{$LoggedUserInfo->email}}">
  <input type="hidden" name="userid" value="{{$LoggedUserInfo->id}}">
  <div class="form-outline mb-2">
    <input type="textarea" name="comment" placeholder="Add Your Comment" value="" id="form3Example1q" class="form-control">
    </input>
  </div>
  <button type="submit" class="btn btn-success btn-sm mb-1 my-3">Add Comment</button>

</form>@endif @endforeach


@endsection