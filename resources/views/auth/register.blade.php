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
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>

                            <form action="{{ route('auth.save') }}" method="post" class="px-md-2">

                                @if(Session::get('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                                @endif

                                @if(Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                                @endif

                                @csrf

                                <div class="form-outline mb-2">
                                    <label class="form-label" for="form3Example1q">Name</label>
                                    <input type="text" name="name" id="form3Example1q" class="form-control" value="{{ old('name') }}"/>
                                    <span class="text-danger">@error('name'){{ $message }} @enderror</span>

                                </div>

                                <div class="form-outline mb-2">
                                    <label class="form-label" for="form3Example1q">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}"id="form3Example1q" class="form-control" />
                                    <span class="text-danger">@error('email'){{ $message }} @enderror</span>

                                </div>
                                <div class="form-outline mb-2">
                                    <label class="form-label" for="form3Example1q">Password</label>
                                    <input type="password" name="password" id="form3Example1q" class="form-control" />
                                </div>
                                <div class="row">
                                    <div class="form-outline mb-2">
                                        <br><br> <label style="margin-left: 20px;">Status : </label>
                                        <select required name="status" id="status">
                                            <option value="" selected disabled hidden>--Select--</option>

                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                            <option value="blocked">Blocked</option>
                                            <option value="admin">Admin</option>
                                        </select> <br><br>
                                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="form-outline mb-2">
                                        <br><br> <label>Role: </label>
                                        <select required name="role" id="role">
                                            <option value="" selected disabled hidden>--Select--</option>
                                            <option value="admin">Admin</option>
                                            <option value="developer">Developer</option>
                                            <option value="manager">Manager</option>
                                            <option value="customer">Customer</option>
                                        </select> <br><br>
                                    </div>
                                </div>
                                <button  type="submit" class="btn btn-success mb-1">Register</button>
                                &nbsp;   <a href="/adminDashboard/users"  id="btn" class="btn btn-primary mb-1">Back</a></td>

                            </form>
 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!--    
<div class="container">
   <div class="row" style="margin-top:45px">
      <div class="col-md-4 col-md-offset-4">
           <h4>Register | Custom Auth</h4><hr>
           <form action="{{ route('auth.save') }}" method="post">

           @if(Session::get('success'))
             <div class="alert alert-success">
                {{ Session::get('success') }}
             </div>
           @endif

           @if(Session::get('fail'))
             <div class="alert alert-danger">
                {{ Session::get('fail') }}
             </div>
           @endif

           @csrf
           <div class="form-group">
                 <label>Name</label>
                 <input type="text" class="form-control" name="name" placeholder="Enter full name" value="{{ old('name') }}">
                 <span class="text-danger">@error('name'){{ $message }} @enderror</span>
              </div>
              <div class="form-group">
                 <label>Email</label>
                 <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                 <span class="text-danger">@error('email'){{ $message }} @enderror</span>
              </div>
              <div class="form-group">
                 <label>Password</label>
                 <input type="password" class="form-control" name="password" placeholder="Enter password">
                 <span class="text-danger">@error('password'){{ $message }} @enderror</span>
              </div>
              <button type="submit" class="btn btn-block btn-primary">Sign Up</button>
              <br>
              <a href="{{ route('auth.login') }}">I already have an account, sign in</a>
           </form>
      </div>
   </div>
</div> -->

</body>

</html>