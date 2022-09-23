<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Login</title>
    <style>
        .body {
            background-image: url('https://img.freepik.com/premium-vector/abstract-technology-chip-processor-background-circuit-board-html-code-3d-illustration-blue-technology-background-vector_115579-1483.jpg?w=2000');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body class="body">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    <div class="container py-5 h-100" style="margin-top: 40px">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-header">Admin Login</div>
                    <div class="card-body p-6">
                        <div class="form-outline mb-4">
                            <form action="{{ route('auth.check') }}" method="post">
                                @csrf
                                @if(Session::get('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div> @endif
                                @if(session()->has('blocked'))
                                <div class="alert alert-danger">
                                    {{ session()->get('blocked') }}
                                </div>
                                @endif
                                @if(Session::get('message'))
                                <div class="alert alert-danger">
                                    {{ Session::get('message') }}
                                </div> @endif
                                @if(Session::get('error'))
                                <div class="alert alert-success">
                                    {{ Session::get('error') }}
                                </div> @endif
                                <label class="form-label" for="typeEmailX-2">Email</label>
                                <input name="email" type="email" id="typeEmailX-2" class="form-control form-control" value="{{ old('email') }}" />
                                <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="typePasswordX-2">Password</label>
                            <input name="password" type="password" id="typePasswordX-2" class="form-control form-control" />
                            <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                        </div>
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>