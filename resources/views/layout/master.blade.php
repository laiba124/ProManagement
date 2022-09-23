 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/brands.min.css">




    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i class="fa fa-home" aria-hidden="true"></i>
ProManagement</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/adminDashboard/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/adminDashboard/users">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/adminDashboard/projects">Projects</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="/adminDashboard/tasks">Tasks</a>
        </li> 
        <div class="test">
        <li class="nav-item float-end">
          <a class="nav-link" href="/auth/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>
Logout</a>
        </li></div>
       </ul>
    </div>
  </div>
</nav> 
<div class="">

@yield('content')


</div>
 </body>
 </html>
    
    
    
    <style>

.test{
  position: absolute;
  right: 5px;
  width: 200px;
  height: 120px;
  }
  #backbtn
  {
    position: absolute;
  right: 10px;

  }




    </style>
    
    