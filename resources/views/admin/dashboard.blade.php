<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Dashboard</title>
</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ProManagement</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/adminDashboard/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/adminDashboard/users">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/adminDashboard/projects">Projects</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/auth/logout">Logout</a>
        </li>
       </ul>
    </div>
  </div>
</nav>
 <h2>Welcome {{ $LoggedUserInfo['name'] }}</h2>
 <h2>Welcome {{ $LoggedUserInfo['name'] }}</h2>

 </body>
</html>