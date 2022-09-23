<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Document</title>
    <style>
    .body {

        background-image: url('https://img.freepik.com/premium-vector/abstract-technology-chip-processor-background-circuit-board-html-code-3d-illustration-blue-technology-background-vector_115579-1483.jpg?w=2000');
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
 </head>
 <body class="body">
    <section class="h-100 h-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card rounded-3">
                        <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo"> -->
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Task Update Form</h3>

                            <form action="/adminDashboard/updateTask" method="post" class="px-md-2">

                                @if(Session::get('message'))
                                <div class="alert alert-success">
                                    {{ Session::get('message') }}
                                </div>
                                @endif

                                @if(Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                                @endif

                                @csrf
                                <input type="hidden" name="id" value= "{{$task->id}}">
                                <input type="hidden" name="created_by" value= "{{$LoggedUserInfo['id']}}  {{ $LoggedUserInfo['name'] }}">

                                <div class="form-outline mb-2">
                                    <label class="form-label" for="form3Example1q">Task Title</label>
                                    <input type="text" name="title" id="form3Example1q" class="form-control" value="{{$task->title}}" />

                                </div>
                                <div class="form-outline mb-2">
                                    <label class="form-label" for="form3Example1q">Description</label>
                                    <textarea type="textarea" name="description" value="{{$task->description}}"id="form3Example1q" class="form-control" >{{$task->description}}</textarea>
 
                           
                                <div class="form-outline mb-2">
                                   <br><label>Status : </label>
                                    <select value="{{$task->status}}" required name="status" id="">
                                         <option value="Not Started">Not Started</option>
                                            <option value="In progress">In progress</option>
                                            <option value="Completed">Completed</option>
                                    </select>

                                </div>
 
                                    <div class="row">

                                    <div class="form-outline mb-2">
                                        <br> <label style="margin-left: 20px;">Project : </label>
                                        <select value="{{$task->project_id}}" required name="project" id="tasktype">
                                             @foreach ($project as $key => $value)
                                            <option value="{{$value['id']}}">{{$value['id']}}</option>
                                            @endforeach
                                        </select> <br><br>

                                    </div>
                                    <div class="form-outline mb-2">
                                        <br> <label style="margin-left: 20px;">Type : </label>
                                        <select value="{{$task->type}}" required name="type" id="tasktype">
                                             <option value="Bug">Bug</option>
                                            <option value="Testing">Testing</option>
                                            <option value="Failure">Failure</option>
                                        </select> <br><br>

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success mb-1">Update Task</button>
                                <a href="/adminDashboard/viewTask/{{$task->id}}" id="btn" class="btn btn-primary mb-1">Back</a></td>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





 </body></html> 