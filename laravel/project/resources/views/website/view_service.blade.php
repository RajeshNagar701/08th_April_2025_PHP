@extends('website.layout.structure')

@section('content')


<!-- Hero Start -->
<div class="container-fluid bg-light page-header py-5 mb-5">
    <div class="container text-center py-5">
        <h1 class="display-1 animated slideInLeft">Service</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center animated slideInLeft mb-0">
                <li class="breadcrumb-item"><a class="text-primary" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-primary" href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Service</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Hero End -->


<!-- Service Start -->
<div class="container-fluid service py-5">
    <div class="container">
        <div class="text-center wow fadeIn" data-wow-delay="0.1s">
            <h1 class="font-dancing-script text-primary">Our All Services</h1>
            <h1 class="mb-5">Explore Our all Services</h1>
        </div>

        <div class="row g-4 g-md-0 text-center">
            @foreach($service as $data)
            <div class="col-md-6 col-lg-4">
                <div class="service-item h-100 p-4 border-bottom border-end wow fadeIn" data-wow-delay="0.1s">
                    <img  src="<?php echo url('upload/services/' . $data->ser_img) ?>" style="width:100%;height:250px">
                    <h3 class="mb-3">
                        {{$data->ser_name}}
                    </h3>

                    <a class="btn btn-sm btn-primary text-uppercase" href="/details_service/{{$data->id}}">View Services <i
                            class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            @endforeach
            <a class="btn btn-sm btn-primary text-uppercase" href="/service">back <i
                            class="bi bi-arrow-right"></i></a>

        </div>
    </div>
</div>
<!-- Service End -->


<!-- Testimonial Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center wow fadeIn" data-wow-delay="0.2s">
            <h1 class="font-dancing-script text-primary">Testimonial</h1>
            <h1 class="mb-5">What Clients Say!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay="0.3s">
            <div class="text-center bg-light p-4">
                <i class="fa fa-quote-left fa-3x mb-3"></i>
                <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat
                    ipsum et lorem et sit.</p>
                <img class="img-fluid mx-auto border p-1 mb-3" src="<?php echo url('website/img/testimonial-1.jpg') ?>" alt="">
                <h4 class="mb-1">Client Name</h4>
                <span>Profession</span>
            </div>
            <div class="text-center bg-light p-4">
                <i class="fa fa-quote-left fa-3x mb-3"></i>
                <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat
                    ipsum et lorem et sit.</p>
                <img class="img-fluid mx-auto border p-1 mb-3" src="<?php echo url('website/img/testimonial-2.jpg') ?>" alt="">
                <h4 class="mb-1">Client Name</h4>
                <span>Profession</span>
            </div>
            <div class="text-center bg-light p-4">
                <i class="fa fa-quote-left fa-3x mb-3"></i>
                <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat
                    ipsum et lorem et sit.</p>
                <img class="img-fluid mx-auto border p-1 mb-3" src="<?php echo url('website/img/testimonial-3.jpg') ?>" alt="">
                <h4 class="mb-1">Client Name</h4>
                <span>Profession</span>
            </div>
            <div class="text-center bg-light p-4">
                <i class="fa fa-quote-left fa-3x mb-3"></i>
                <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat
                    ipsum et lorem et sit.</p>
                <img class="img-fluid mx-auto border p-1 mb-3" src="<?php echo url('website/img/testimonial-4.jpg') ?>" alt="">
                <h4 class="mb-1">Client Name</h4>
                <span>Profession</span>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->
@endsection