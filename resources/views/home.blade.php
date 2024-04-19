@extends('layouts.main')

@section('content')
    <div class="container-fluid p-5" id="home">
      <div class="row align-items-center my-lg-5">
        <div class="col-12">
          <div class="text-start fulltext-margin text-color">
            <h1 class="display-1 fw-bold">WELCOME</h1>
            <h1 class="display-1 fw-bold">TO ALATO</h1>
            <h2 class="lead display-5 my-2">AN ONLINE WORKOUT PROGRAM THAT SHOWS YOU THE BEST FITNESS EQUIPMENTS</h2>
            <a href="/equipments" class="btn btn-success mt-lg-1">GET STARTED NOW</a>
          </div>
        </div>
      </div>
    </div>
    <!-- SECTION 1 END -->

    <!-- CONTENT 1 -->
    <div class="bg-theme text-center justify-content-center align-items-center d-flex mt-lg-3">
        <h2 class="display-4 px-lg-5 fulltext-margin py-3">"IF YOU WANT TO BE STRONG, YOU MUST FIRST WILLING TO BE WEAK"</h2>
    </div>
    <!-- CONTENT 1 END -->


    <!-- SECTION 2 -->


      <section class="row full-height m-0" id="about">
        <!-- <div class="col-6 img-fluid float-start py-5" style="background-image: url('gambar2.jpg'); background-size: cover;">
          <img src="gambar2.jpg" class="img-fluid float-start">
        </div> -->
        <div class="col-6 d-flex align-items-center justify-content-center p-0">
          <img src="gambar2.jpg" alt="Image 2" class="img-fluid">
        </div>
        <div class="col-6 d-flex align-items-center flex-column text-color p-5 bg-theme2 justify-content-center">
          <div class="halftext-margin">
            <h3 class="display-6 fw-bold">ABOUT ALATO</h3>
            <h1 class="display-2 fw-bold mb-5">OUR STORY</h1>
            <p>​At Alato, we are passionate about fitness and helping people achieve their goals. We believe that the right fitness equipment can make all the difference in your workout. That's why we created Alato, an online workout program that shows you the best fitness equipment and how to use it.
            </p>
            <p>
              This is a great space to write about your team and their expertise. You can use this space to go into a little more detail about your company and your services.
            </p>
          </div>
        </div>
      </section>
    <!-- SECTION 2 END -->

    <!-- SECTION 3 -->
    <section class="container-fluid full-height text-color text-center position-relative p-5 d-flex align-items-center" style="background-image: url(gambar4.jpg); background-size: cover;" id="programs">
      <div class="container">
        <div>
          <h1 class="display-2 fw-bold mb-5 px-5 my-5 ">OUR WORKOUT PROGRAMS</h1>
          <p class="mb-5">​At Alato, we offer a variety of online workout programs to meet your fitness goals. Our programs are designed by certified trainers and can be done from the comfort of your own home. Whether you're looking to improve your cardio, build muscle, or lose weight, we have a program for you.</p>
        </div>
        <div class="mb-5">
          <ul class="d-flex p-5 me-auto mb-5 mb-lg-0 justify-content-between list-unstyled">
              <li class="position-relative ">
                <h1 class="position-absolute m-0 top-0 start-0 w-100 h-100 fw-bold display-1 d-flex align-items-center justify-content-center" style="color: #37b937; line-height: 1;">1</h1>
                <span class="position-relative" style="font-size: x-large;">
                  STRENGTH TRAINING
                </span>
              </li>
              <li class="position-relative ">
                <h1 class="position-absolute m-0 top-0 start-0 w-100 h-100 fw-bold display-1 d-flex align-items-center justify-content-center" style="color: #37b937; line-height: 1;">2</h1>
                <span class="position-relative" style="font-size: x-large;">
                  MUSCLE BUILDING
                </span>
              </li>
              <li class="position-relative ">
                <h1 class="position-absolute m-0 top-0 start-0 w-100 h-100 fw-bold display-1 d-flex align-items-center justify-content-center" style="color: #37b937; line-height: 1;">3</h1>
                <span class="position-relative" style="font-size: x-large;">
                  WEIGHT LOSS
                </span>
              </li>
          </ul>
        </div>
      </div>
    </section>
    <!-- SECTION 3 END -->

    <!-- SECTION 4 -->
    <section class="row full-height m-0 " id="faq">
      <div class="col-6 d-flex align-items-center justify-content-center p-0">
        <img src="gambar1.jpg" alt="Image 2" class="img-fluid">
      </div>
      <div class="col-6 d-flex align-items-center flex-column text-color p-5 bg-theme justify-content-center text-start">
        <div class="halftext-margin">
          <h1 class="text-center display-2 fw-bold mb-4">FAQ</h1>
          <ul class="">
            <li class="mb-5">
                <h2>What is Alato?</h2>
                <p>Alato is a fitness website which will help those of you who are confused and don't know what kind of equipment to use or don't know what kind of equipment can be used in exercising​</p>
            </li>
            <li class="mb-5">
                <h2>How do I choose equipment and get the right workout?</h2>
                <p>​Click "Get Started Now", select the equipments you have, then select the part of your body that you want to train. Then a list of appropriate workouts will appear​</p>
            </li>
            <li class="mb-5">
                <h2>How to create workout playlist?</h2>
                <p>Click workout playlist and then click the button "create playlist" then add the workout​</p>
            </li>
            <li class="mb-5">
                <h2>If i have more question, how can i call?</h2>
                <p>​Send an email to alato@gmail.com we will be ready to heal all your doubts​</p>
            </li>
        </ul>
        </div>
      </div>
    </section>

    <!-- SECTION 4 END -->

@endsection
