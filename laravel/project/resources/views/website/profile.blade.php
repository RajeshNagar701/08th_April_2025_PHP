@extends('website.layout.structure')

@section('content')


    <!-- Hero Start -->
    <div class="container-fluid bg-light page-header py-5 mb-5">
        <div class="container text-center py-5">
            <h1 class="display-1 animated slideInLeft">Profile </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center animated slideInLeft mb-0">
                    <li class="breadcrumb-item"><a class="text-primary" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-primary" href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Hero End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.2s">
                    <img class="img-fluid mb-3" src="<?php echo url('upload/customers/'.$customer->image)?>" width="100%" alt="">
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="font-dancing-script text-primary">My Profile</h1>
                    <h1 class="mb-5">Name : {{$customer->name}}</h1>
                    <h3 class="mb-5">Email : {{$customer->email}}</h3>
                    <h3 class="mb-5">Gennder : {{$customer->gender}}</h3>
                    <h3 class="mb-5">Hobby : {{$customer->hobby}}</h3>
                    <h3 class="mb-5">Mobile : {{$customer->mobile}}</h3>
              
                    <a class="btn btn-primary text-uppercase px-5 py-3" href="/edit_profile/{{$customer->id}}">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

@endsection