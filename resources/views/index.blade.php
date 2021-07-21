<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ $user->name }} - {{ $user->work_title }} Portfolio </title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="{{ asset('assets/fonts/ionicons.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="#">Oscar Rafael Torres</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navbarNav"><span class="visually-hidden">Toggle navigation</span><span
                  class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home-section">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects-section">Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="#cv-section">CV</a></li>
                    <li class="nav-item"><a class="nav-link" href="mailto:{{ $user->email }}">Email me: {{ $user->email }}</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="page lanidng-page">
        <section class="portfolio-block block-intro border-bottom" id="home-section">
            <div class="container">
                <div class="avatar" style="background-image:url(&quot;{{ $user->image_url }}&quot;);"></div>
                <div class="about-me">
                    {!! $user->self_summary !!}
                    <a class="btn btn-outline-primary" role="button" href="mailto:{{ $user->email }}">Email me</a>
                </div>
            </div>
        </section>

        <section class="portfolio-block projects-cards border-bottom" id="projects-section">
            <div class="container">
                <div class="heading">
                    <h2>Projects ({{ count($projects) }})</h2>
                </div>
                @foreach ($projects->chunk(4) as $chunk)
                <div class="row">
                    @foreach ($chunk as $project)
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0">
                            @php
                              $url_ = '#';
                              if(!$project->attrEmpty('long_description')) {
                                $url_ = route('project-details', ['id'=>$project->id]);
                              }
                            @endphp
                            <a href="{{ $url_ }}">
                                <img class="card-img-top scale-on-hover" src="{{ $project->image_url }}" alt="Card Image">
                            </a>
                            <div class="card-body">
                                <h6>
                                  <a href="#">{{ $project->title }}</a>
                                </h6>
                                {!! $project->short_description !!}
                                @if(!$project->attrEmpty('long_description'))
                                <button type="button" data-link-to="{{ route('project-details', ['id'=>$project->id]) }}" class="btn btn-outline-primary">Details</button>
                                @endif
                                @if(!$project->attrEmpty('github_url'))
                                <button type="button" data-link-to="{{ $project->github_url }}" class="btn btn-outline-dark custom-btn-hover"><i class="icon ion-social-github"></i> Github</button>
                                @endif
                                @if(!$project->attrEmpty('hosted_at_url'))
                                <button type="button" data-link-to="{{  $project->hosted_at_url }}" class="btn btn-outline-success"><i class="icon ion-link"></i> URL</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </section>

        <section class="portfolio-block cv" id="cv-section" style="padding-top:100px">
            <div class="container">
                <div class="work-experience group">
                    <div class="heading">
                        <h2 class="text-center">Work Experience</h2>
                    </div>
                    @foreach ($work_experiences as $we)
                    <div class="item">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>{{ $we->work_title }}</h3>
                                <h4 class="organization">{{ $we->company_name }}</h4>
                            </div>
                            <div class="col-md-6"><span class="period">{{ $we->start_date->format('F Y') }} - {{ $we->end_date->format('F Y') }}</span></div>
                        </div>
                        <p class="text-muted">{!! $we->short_description !!}</p>
                    </div>
                    @endforeach
                </div>


                <div class="education group">
                    <div class="heading">
                        <h2 class="text-center">Education</h2>
                    </div>
                    @foreach ($education as $ed)
                    <div class="item">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>{{ $ed->degree_title }}</h3>
                                <h4 class="organization">{{ $ed->institution_name }}</h4>
                            </div>
                            <div class="col-6"><span class="period">{{ $ed->start_date->format('F Y') }} - {{ $ed->end_date->format('F Y') }}</span></div>
                        </div>
                        <p class="text-muted">{!! $ed->short_description !!}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="portfolio-block" id="skills-section" style="padding-top:100px">
            <div class="container">
                <div class="work-experience group">
                    <div class="heading">
                        <h2 class="text-center mb-4">Skills</h2>
                        <div class="row">
                            @php $row_num = 12/count($skills_arr);
                                 if($row_num < 4) {
                                   $row_num = 4; // 4 is min, dont want too small col
                                 }
                            @endphp
                            @foreach ($skills_arr as $skill_name => $skills)
                              <div class="col-md-{{ $row_num }}">
                                  <div class="skills portfolio-info-card">
                                      <h2>{{ $skill_name }}</h2>
                                      @foreach ($skills as $skill)
                                        <h3>{{ $skill->name }}</h3>
                                        <div class="progress">
                                            <div class="progress-bar" aria-valuenow="{{ $skill->progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $skill->progress }}%;"><span class="visually-hidden">{{ $skill->progress }}%</span></div>
                                        </div>
                                      @endforeach

                                  </div>
                              </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="group">

                </div>
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
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.min.js') }}"></script>
</body>

</html>
