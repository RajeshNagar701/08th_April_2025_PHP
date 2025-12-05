@extends('website.layout.structure')

@section('content')


<!-- Hero Start -->
<div class="container-fluid bg-light page-header py-5 mb-5">
    <div class="container text-center py-5">
        <h1 class="display-1 animated slideInLeft">Edit Profile</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center animated slideInLeft mb-0">
                <li class="breadcrumb-item"><a class="text-primary" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-primary" href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Hero End -->


<!-- Contact Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="text-center wow fadeIn" data-wow-delay="0.1s">
            <h1 class="font-dancing-script text-primary">Edit Profile</h1>
            <h1 class="mb-5">Edit Profile</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="wow fadeIn" data-wow-delay="0.3s">
                    <form action="{{url('/update_profile/'.$customer->id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="name" value="{{$customer->name}}" class="form-control" id="email" placeholder="Your Name">
                                    <label for="email">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="email" name="email" value="{{$customer->email}}" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <label for="password">Select Gender</label>
                                @php
                                $gender=$customer->gender;
                                @endphp
                                <div class="form-check">
                                    <input type="radio" <?php if($gender=="Male"){ echo "Checked";}?> class="form-check-input" id="radio1" name="gender" value="Male">Male
                                    <label class="form-check-label" for="radio1"></label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" <?php if($gender=="Female"){ echo "Checked";}?> class="form-check-input" id="radio2" name="gender" value="Female">Female
                                    <label class="form-check-label" for="radio2"></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="password">Select Hobby</label>
                                @php
                                $hobby=$customer->hobby;
                                $hobby_arr=explode(",",$hobby);
                                @endphp
                                <div class="form-check">
                                    <input type="checkbox" <?php if(in_array("Sports",$hobby_arr)){ echo "Checked";}?> class="form-check-input" id="radio1" name="hobby[]" value="Sports">Sports
                                    <label class="form-check-label" for="radio1"></label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" <?php if(in_array("Singing",$hobby_arr)){ echo "Checked";}?> class="form-check-input" id="radio2" name="hobby[]" value="Singing">Singing
                                    <label class="form-check-label" for="radio2"></label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" <?php if(in_array("Dancing",$hobby_arr)){ echo "Checked";}?> class="form-check-input" id="radio2" name="hobby[]" value="Dancing">Dancing
                                    <label class="form-check-label" for="radio2"></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="file" name="image" class="form-control" id="email" placeholder="Your Profile Pic">
                                    <label for="password">Profile Pic</label>
                                    <img class="mb-3" src="<?php echo url('upload/customers/'.$customer->image)?>" width="50px" alt="">
                </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="number" name="mobile" value="{{$customer->mobile}}" class="form-control" id="email" placeholder="Your Mobile Number">
                                    <label for="password">Mobile Number</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button name="submit" class="btn btn-primary w-100 py-3 ms-0" type="submit">Save</button>
                            </div>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection