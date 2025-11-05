@extends('website.layout.structure')

@section('content')


    <!-- Hero Start -->
    <div class="container-fluid bg-light page-header py-5">
        <div class="container text-center py-5">
            <h1 class="display-1 animated slideInLeft">Blog</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center animated slideInLeft mb-0">
                    <li class="breadcrumb-item"><a class="text-primary" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-primary" href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Blog Start -->
    <div class="container-fluid blog p-0">
        <div class="row g-0">
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="h-100 d-flex flex-column justify-content-center bg-primary py-5 px-4">
                    <p class="mb-2"><i class="fa fa-calendar-alt text-dark me-1"></i>Jan 01, 2045 | <i
                            class="fa fa-folder-open text-dark me-1"></i>Hair Salon</p>
                    <h3 class="mb-3">How to Extend The Life of Your Haircolor</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eget libero lobortis, auctor
                        nisi quis, aliquet nunc. Nam dapibus interdum lacus.</p>
                    <a class="btn btn-dark align-self-start text-uppercase" href="">Read More <i
                            class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                <div class="h-100">
                    <img class="img-fluid w-100 h-100" src="<?php echo url('website/img/blog-1.jpg')?>" alt="" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                <div class="h-100 d-flex flex-column justify-content-center bg-primary py-5 px-4">
                    <p class="mb-2"><i class="fa fa-calendar-alt text-dark me-1"></i>Jan 01, 2045 | <i
                            class="fa fa-folder-open text-dark me-1"></i>Hair Salon</p>
                    <h3 class="mb-3">Hottest Hairstyles and Haircuts in 2045</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eget libero lobortis, auctor
                        nisi quis, aliquet nunc. Nam dapibus interdum lacus.</p>
                    <a class="btn btn-dark align-self-start text-uppercase" href="">Read More <i
                            class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                <div class="h-100">
                    <img class="img-fluid w-100 h-100" src="<?php echo url('website/img/blog-2.jpg')?>" alt="" style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection