@extends('layouts.main')

@section('content')
    <section class="container-fluid p-5 my-5" id="home">
        <div class="bg-home "></div>
      <div class="row align-items-center my-lg-5">
        <div class="col-12 my-5">
          <div class="text-start fulltext-margin text-color">
            <h1 class="display-1 fw-bold w-100 d-flex flex-wrap" >WELCOME TO ALATO</h1>
            <h2 class="lead display-6 my-2 w-75">AN ONLINE WORKOUT PROGRAM THAT SHOWS YOU THE BEST FITNESS EQUIPMENTS</h2>
            <a href="/equipments" class="btn btn-success text-black mt-lg-2 px-3 btn-hover" style="background-color: #37b937;">GET STARTED NOW</a>
          </div>
        </div>
      </div>
    </section>
    <!-- SECTION 1 END -->

    <!-- CONTENT 1 -->
    <div class="bg-theme text-light text-center justify-content-center align-items-center d-flex">
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
        <div class="col-6 d-flex align-items-center flex-column text-color p-5 bg-thememain justify-content-center">
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
    <section class="container-fluid full-height text-color text-center position-relative p-5 d-flex align-items-center "  id="programs">
        <div class="bg-programs"></div>
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
                  KNOWLEDGE
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
        <img src="home_wallpaper.jpg" alt="Image 2" class="img-fluid">
      </div>
      <div class="col-6 d-flex align-items-center flex-column text-light p-5 bg-thememain justify-content-center text-center">
        <div class="container px-5">
          <h1 class="text-center display-2 fw-bold mb-5">FAQ</h1>
          <ul class="list-unstyled px-5">
            <li class="mb-5 ">
                <h2><i>What is Alato?</i></h2>
                <p><i>Alato is a fitness website which will help those of you who are confused and don't know what kind of equipment to use or don't know what kind of equipment can be used in exercising</i>​</p>
            </li>
            <li class="mb-5">
                <h2><i>How do I choose equipment and get the right workout?</i></h2>
                <p><i>​Click "Get Started Now" in this page, then select the equipments you have, after that select the part of your body that you want to train. and Then a list of appropriate workouts will appear</i>​</p>
            </li>
            <li class="mb-5">
                <h2><i>How to rate workout?</i></h2>
                <p><i>Choose the workout you want to rate then click "Rate This Workout" Button</i>​</p>
            </li>
            <li class="mb-5">
                <h2><i>How to create workout playlist?</i></h2>
                <p><i>Click workout playlist and then click the button "create playlist" then add the workout</i>​</p>
            </li>
            <li class="mb-5">
                <h2><i>If i have more question, how can i call?</i></h2>
                <p><i>​Send an email to alato@gmail.com we will be ready to answer all your doubts</i>​</p>
            </li>
        </ul>
        </div>
      </div>
    </section>

    <div class="bg-theme text-center text-light d-flex justify-content-center align-items-center ">
        <h2 class="display-4 px-lg-5 fulltext-margin py-3">"WITH THE RIGHT KNOWLEDGE WE BECOME THE BEST WE CAN BE"</h2>
    </div>

    <!-- SECTION 4 END -->

@endsection
