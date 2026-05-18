<!DOCTYPE html>
<html lang="en">

<head>
    <title>Applicant</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:void(0)">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('applicant.vacancy.index') }}">Home</a>
                    </li>
                    @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('applicant.job_application.index') }}">My Applications</a>
                    </li>
                    @endif
                    @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('applicant.auth.logout') }}">Logout ({{ Auth::user()->name }})</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('applicant.auth.login') }}">Login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        @yield('content')
    </div>

</body>

</html>