<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Oscar Rafael Torres - Software Engineer Portfolio</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="#">Oscar Rafael Torres</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navbarNav"><span class="visually-hidden">Toggle navigation</span><span
                  class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('projects') }}">Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('cv') }}">CV</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('hire-me') }}">Hire me</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="page-footer">
        <div class="container">
            <div class="social-icons">
              <a href="https://github.com/oscar0812"><i class="icon ion-social-github"></i></a>
              <a href="https://www.linkedin.com/in/oscartorres01/"><i class="icon ion-social-linkedin"></i></a>
              <a href="mailto:oscar0812torres@gmail.com"><i class="icon ion-email"></i></a></div>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
