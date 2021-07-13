@extends('layouts.app')

@section('content')
<main class="page projects-page">
    <section class="portfolio-block projects-cards">
        <div class="container">
            <div class="heading">
                <h2>Recent Work</h2>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0"><a href="#"><img class="card-img-top scale-on-hover" src="assets/img/nature/image1.jpg" alt="Card Image"></a>
                        <div class="card-body">
                            <h6><a href="#">Lorem Ipsum</a></h6>
                            <p class="text-muted card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna.</p>
                            <button type="button" class="btn btn-outline-primary">Full Details</button>
                            <button type="button" data-link-to="#" class="btn btn-outline-dark custom-btn-hover"><i class="icon ion-social-github"></i> Github</button>
                            <button type="button" data-link-to="https://google.com" class="btn btn-outline-success"><i class="icon ion-link"></i> Link</button>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0"><a href="#"><img class="card-img-top scale-on-hover" src="assets/img/nature/image2.jpg" alt="Card Image"></a>
                        <div class="card-body">
                            <h6><a href="#">Lorem Ipsum</a></h6>
                            <p class="text-muted card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0"><a href="#"><img class="card-img-top scale-on-hover" src="assets/img/nature/image3.jpg" alt="Card Image"></a>
                        <div class="card-body">
                            <h6><a href="#">Lorem Ipsum</a></h6>
                            <p class="text-muted card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0"><a href="#"><img class="card-img-top scale-on-hover" src="assets/img/nature/image4.jpg" alt="Card Image"></a>
                        <div class="card-body">
                            <h6><a href="#">Lorem Ipsum</a></h6>
                            <p class="text-muted card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0"><a href="#"><img class="card-img-top scale-on-hover" src="assets/img/nature/image5.jpg" alt="Card Image"></a>
                        <div class="card-body">
                            <h6><a href="#">Lorem Ipsum</a></h6>
                            <p class="text-muted card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0"><a href="#"><img class="card-img-top scale-on-hover" src="assets/img/nature/image6.jpg" alt="Card Image"></a>
                        <div class="card-body">
                            <h6><a href="#">Lorem Ipsum</a></h6>
                            <p class="text-muted card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
