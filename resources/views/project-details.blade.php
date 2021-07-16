<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ $user->name }} - {{ $user->work_title }} Portfolio </title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="{{ asset('assets/fonts/ionicons.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="{{ route('home') }}">Oscar Rafael Torres</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navbarNav"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#background">Background</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#contribution">My Contribution</a></li>
                    <li class="nav-item"><a class="nav-link" href="#result">Result</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page projects-page">
      <section class="portfolio-block block-intro pb-2 border-bottom">
            <div class="container">
                <div class="avatar" style="background-image:url(&quot;{{ asset($project->image_url) }}&quot;);"></div>
                <div class="about-me">
                    <h2>{{ $project->title }}</h2>
                </div>
            </div>
        </section>
        <section class="portfolio-block projects-cards pt-4 pb-3">
          <div class="container">
            {!! $project->long_description !!}
          </div>
        </section>
    </main>
    <footer class="page-footer">
        <div class="container">
            <p>Portfolio - {{ $user->name }}</p>
            <div class="social-icons">
              <a href="{{ $user->github_url }}"><i class="icon ion-social-github"></i></a>
              <a href="{{ $user->linkedin_url }}"><i class="icon ion-social-linkedin"></i></a>
              <a href="mailto:{{ $user->email }}"><i class="icon ion-email"></i></a></div>
        </div>
    </footer>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>

</body>

</html>
