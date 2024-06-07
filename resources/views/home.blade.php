@extends('layouts.main')

@section('content')
    <section class="container-fluid my-5 mx-0 h-section" id="home">
        <div class="bg-home m-0 p-0"></div>
      <div class="container text-light d-flex flex-column align-items-start justify-content-center align-content-center h-section px-5">

            <h1 class="display-1 fw-bold w-100 d-flex flex-wrap" >WELCOME TO ALATO</h1>
            <h5 class="lead fs-5 w-100">AN ONLINE WORKOUT PROGRAM THAT SHOWS YOU THE BEST FITNESS EQUIPMENTS</h5>
            <a href="/equipments" class="btn btn-success text-black mt-2 px-3 btn-hover" style="background-color: #37b937;">GET STARTED NOW</a>

      </div>
    </section>
    <!-- SECTION 1 END -->

    <!-- CONTENT 1 -->
    <div class="container-fluid bg-theme text-light text-center d-flex justify-content-center align-items-center w-100">
        <div class="container px-2 px-lg-5 py-3 w-100">
        <h2 class="display-lg-4 display-sm-5 display-6">"IF YOU WANT TO BE STRONG, YOU MUST FIRST WILLING TO BE WEAK"</h2>
    </div>
    </div>
    <!-- CONTENT 1 END -->


    <!-- SECTION 2 -->


    <section class="container-fluid bg-thememain m-0 vh-100" id="about">
        <div class="row h-100 row-cols-1 row-cols-lg-2">
          <div class="col bg-story d-flex align-items-center justify-content-center p-0 h-lg-100 ">
          </div>
          <div class="col d-flex align-items-center flex-column text-color justify-content-center m-0  h-lg-100">
            <div class="container px-5 px-lg-5 m-0">
              <h1 class="display-lg-2 fs-1 fw-bold">ABOUT ALATO</h1>
              <h3 class="display-lg-4 fs-2 fw-bold mb-3">OUR STORY</h3>
              <p class="fs-5 fs-lg-2">At Alato, we are passionate about fitness and helping people achieve their goals. We believe that the right fitness equipment can make all the difference in your workout. That's why we created Alato, an online workout program that shows you the best fitness equipment and how to use it.</p>
              <p class="fs-5 fs-lg-2">This is a great space to write about your team and their expertise. You can use this space to go into a little more detail about your company and your services.</p>
            </div>
          </div>
        </div>
      </section>
    <!-- SECTION 2 END -->

    <!-- SECTION 3 -->
    <section class="container-fluid full-height text-color text-center d-flex flex-column align-items-center justify-content-center p-5" id="programs">
        {{-- <div class="bg-programs"></div> --}}
        <div class="container">
            <div class="mb-5">
                <h1 class="display-2 fw-bold mb-5 my-5">OUR WORKOUT PROGRAMS</h1>
                <p class="mb-5">At Alato, we offer a variety of online workout programs to meet your fitness goals. Our programs are designed by certified trainers and can be done from the comfort of your own home. Whether you're looking to improve your cardio, build muscle, or lose weight, we have a program for you.</p>
            </div>
            <div class="row mb-5">
                <div class="col-lg-4 col-6 mb-4 mb-lg-0 d-flex flex-column align-items-center justify-content-center mb-5 mb-lg-0">
                    <h1 class="display-1 fw-bold" style="color: #37b937; line-height: 1; font-size: 5rem;">1</h1>
                    <span class="fs-6 fs-lg-2">STRENGTH TRAINING</span>
                </div>
                <div class="col-lg-4 col-6 mb-4 mb-lg-0 d-flex flex-column align-items-center justify-content-center mb-5 mb-lg-0">
                    <h1 class="display-1 fw-bold" style="color: #37b937; line-height: 1; font-size: 5rem;">2</h1>
                    <span class="fs-6 fs-lg-2">MUSCLE BUILDING</span>
                </div>
                <div class="col-lg-4 col-12 mb-4 mb-lg-0 d-flex flex-column align-items-center justify-content-center mb-5 mb-lg-0">
                    <h1 class="display-1 fw-bold" style="color: #37b937; line-height: 1; font-size: 5rem;">3</h1>
                    <span class="fs-6 fs-lg-2">KNOWLEDGE</span>
                </div>
            </div>
        </div>
    </section>
    <!-- SECTION 3 END -->

    <!-- SECTION 4 -->
    <section class="container-fluid bg-thememain m-0" id="faq">
        <div class="row h-100">
            <div class="col-lg-6 bg-workout d-none d-lg-flex align-items-center justify-content-center p-0" style="min-height: 100vh;">
            </div>
            <div class="col-12 col-lg-6 d-flex flex-column text-color justify-content-center align-items-center m-0" style="min-height: 100vh;">
            <div class="container px-5 py-5 px-lg-3 m-0 text-center">
              <h1 class="display-lg-4 fs-2 fw-bold mb-3">FAQ</h1>
              <ul class="list-unstyled min-vh-50 px-1 px-lg-3">
                <li class="mb-5">
                  <h2>What is Alato?</h2>
                  <p class="fs-7 fs-lg-5 px-0 px-lg-5"><i>Alato is a fitness website which will help those of you who are confused and don't know what kind of equipment to use or don't know what kind of equipment can be used in exercising</i></p>
                </li>
                <li class="mb-5">
                  <h2>How do I choose equipment and get the right workout?</h2>
                  <p class="fs-7 fs-lg-5 px-0 px-lg-5"><i>​Click "Get Started Now" in this page, then select the equipments you have, after that select the part of your body that you want to train. and Then a list of appropriate workouts will appear</i>​</p>
                </li>
                <li class="mb-5">
                  <h2>How to rate workout?</h2>
                  <p class="fs-7 fs-lg-5 px-0 px-lg-5"><i>Choose the workout you want to rate then click "Rate This Workout" Button</i>​</p>
                </li>
                <li class="mb-5">
                  <h2>How to create workout playlist?</h2>
                  <p class="fs-7 fs-lg-5 px-0 px-lg-5"><i>Click workout playlist and then click the button "create playlist" then add the workout</i>​</p>
                </li>
                <li class="">
                  <h2>If i have more question, how can i call?</h2>
                  <p class="fs-7 fs-lg-5 px-0 px-lg-5"><i>​Send an email to alato@gmail.com we will be ready to answer all your doubts</i>​</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>

    <div class="container-fluid bg-theme text-light text-center d-flex justify-content-center align-items-center w-100">
        <div class="container px-2 px-lg-5 py-3 w-100">
        <h2 class="display-lg-4 display-sm-5 display-6">"WITH THE RIGHT KNOWLEDGE WE BECOME THE BEST WE CAN BE"</h2>
    </div>
    </div>


    <!-- SECTION 4 END -->

@endsection
