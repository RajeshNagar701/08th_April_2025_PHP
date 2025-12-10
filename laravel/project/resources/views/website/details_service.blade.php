@extends('website.layout.structure')

@section('content')


    <!-- Hero Start -->
    <div class="container-fluid bg-light page-header py-5">
        <div class="container text-center py-5">
            <h1 class="display-1 animated slideInLeft">Service Details</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center animated slideInLeft mb-0">
                    <li class="breadcrumb-item"><a class="text-primary" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-primary" href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Service Details</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Blog Start -->
    <div class="container-fluid blog p-0">
        <div class="row g-0">
            <div class="col-md-4 offset-md-2 col-lg-4 offset-lg-2 wow fadeIn" data-wow-delay="0.1s">
                <div class="h-100 d-flex flex-column justify-content-center bg-primary py-5 px-4">
                    <h2 class="mb-3">{{$service->cate_name}}</h2>
                    <h3 class="mb-3">{{$service->ser_name}}</h3>
                    <p>{{$service->ser_description}}</p>
                     <h3 class="mb-3"><del>₹{{$service->main_price}}</del></h3>
                      <h3 class="mb-3">₹{{$service->dis_price}}</h3>
                    
                    <a class="btn btn-dark align-self-start text-uppercase" href="">Book Appoinment <i
                            class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="h-100">
                    <img class="img-fluid w-100 h-100" src="<?php echo url('upload/services/' . $service->ser_img) ?>" alt="" style="object-fit: cover;">
                </div>
            </div>
            
        </div>
    </div>
    <!-- Blog End -->
@endsection