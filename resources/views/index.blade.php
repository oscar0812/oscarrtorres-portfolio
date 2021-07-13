@extends('layouts.app')
@section('content')
<main class="page lanidng-page">
    <section class="portfolio-block block-intro border-bottom" id="home-section">
        <div class="container">
            <div class="avatar" style="background-image:url(&quot;{{ $user->image_url }}&quot;);"></div>
            <div class="about-me">
                {!! $user->self_summary !!}
                <a class="btn btn-outline-primary" role="button" href="{{ route('hire-me') }}">Hire me</a>
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
                        <a href="#">
                            <img class="card-img-top scale-on-hover" src="{{ $project->image_url }}" alt="Card Image">
                        </a>
                        <div class="card-body">
                            <h6>
                              <a href="#">{{ $project->title }}</a>
                            </h6>
                            {!! $project->short_description !!}
                            <button type="button" class="btn btn-outline-primary">Details</button>
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
                        <div class="col-md-6"><span class="period">{{ $we->start_date->format('M d, Y') }} - {{ $we->end_date->format('M d, Y') }}</span></div>
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
                        <div class="col-6"><span class="period">{{ $ed->start_date->format('M d, Y') }} - {{ $ed->end_date->format('M d, Y') }}</span></div>
                    </div>
                    <p class="text-muted">{{ $ed->short_description }}</p>
                </div>
                @endforeach

            </div>
            <div class="group">
                <div class="row">
                    <div class="col-md-12">
                        <div class="skills portfolio-info-card">
                            <h2>Skills</h2>
                            @foreach ($skills as $skill)
                              <h3>{{ $skill->name }}</h3>
                              <div class="progress">
                                  <div class="progress-bar" aria-valuenow="{{ $skill->progress }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $skill->progress }}%;"><span class="visually-hidden">{{ $skill->progress }}%</span></div>
                              </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection
