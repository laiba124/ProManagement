<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<style>
    .body {

        background-image: url('https://img.freepik.com/premium-vector/abstract-technology-chip-processor-background-circuit-board-html-code-3d-illustration-blue-technology-background-vector_115579-1483.jpg?w=2000');
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>

<body class="body">
    <section class="h-100 h-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card rounded-3">
                        <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo"> -->
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Project Update Form</h3>

                            <form action="/adminDashboard/updatingProject" method="post" class="px-md-2">
                            <input type="hidden" name="id" value= "{{$projects->id}}">

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

                                <div class="form-outline mb-2">
                                    <label class="form-label" for="form3Example1q">Title</label>
                                    <input type="text" name="title" id="form3Example1q" class="form-control" value="{{$projects->title}}"/>
 
                                </div>

                                <div class="form-outline mb-2">
                                    <label class="form-label" for="form3Example1q">Description</label>
                                    <textarea type="textarea" name="description" value="" id="form3Example1q" class="form-control" >{{$projects->description}}</textarea></>
 
                           
                                <div class="row">
                                    <div class="form-outline mb-2">
                                        <br><br> <label style="margin-left: 20px;">Status : </label>
                                        <select value="{{$projects->status}}" required name="status" id="status">
 
                                            <option value="Not Started">Not Started</option>
                                            <option value="In progress">In progress</option>
                                            <option value="Completed">Completed</option>
                                         </select> <br><br>
                                      
                                </div></div>
                                <button  type="submit" class="btn btn-success mb-1">Update Project</button>
                                 <a href="/adminDashboard/viewproject/{{$projects->id}}"  id="btn" class="btn btn-primary mb-1">Back</a></td>

                            </form>
 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 

      
</body>

</html>