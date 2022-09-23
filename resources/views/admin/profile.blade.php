<!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <link href=" https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css
" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
     <title>Profile</title>
 </head>

 <body>
    @csrf
     <div class="page-content page-container" id="page-content">
         <div class="padding">
             <div class="row container d-flex justify-content-center">
                 <div class="col-xl-6 col-md-12">
 

<div class="card">
    <div class="img">
  <img class="img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCoS1h0huK1B606Qb4j_hHmwGH8wPmvKLSKQ&usqp=CAU" alt="profile picture" style="width:50%">
    </div><h1>{{$user_records->name}}</h1> 
 <div class="card">
   <p class=" ">Email:  {{$user_records->email}}</p> 
  <p class=" ">Status:  {{$user_records->status}}</p>
  <p class=" ">Role  :  {{$user_records->role}}</p>
  </div>
   <a href="#"><i class="fa fa-dribbble"></i></a>
  <a href="#"><i class="fa fa-twitter"></i></a>
  <a href="#"><i class="fa fa-linkedin"></i></a>
  <a href="#"><i class="fa fa-facebook"></i></a>
  <p><a id="btn" class="btn btn-dark btn-sm" href="/adminDashboard/users">Back</a></p> 
    </tr>
</div>
 </body>

 </html>
 <style>
     .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  padding: 30px;
}
.img{
    display: flex;
    justify-content: center;
 
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
.card{
    text-align:left;

}

 </style>