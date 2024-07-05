<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>
        Document</title>
</head>
<body class=" bg-light">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav
        ">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('admin.dashboard')}}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.leads.index')}}">Leads</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.projects.index')}}">Users</a>
            </li>
        </ul>

    </div>
    </div>

</nav>
<div class="container">
    <div class="row">
        <div class="col-12">

            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{  \Session::get('success') }}</li>
                    </ul>
                </div>
            @endif
            @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        @endforeach
            @endif

            @yield('content')
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</body>
</html>