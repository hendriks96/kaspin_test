@extends('home.resume')

@section('content')

<!-- Page Content-->
<div class="container-fluid p-0">
    <!-- About-->
    <section class="resume-section" id="about">
        <div class="resume-section-content">
            <h1 class="mb-0">
                Hendrik Setiawan
            </h1>
            <div class="subheading mb-5">
                Maliran Village · Ponggok, Blitar · 085706243452 ·
                <a href="mailto:name@email.com">hendrik.setiawan150696@gmail.com</a>
            </div>
            <p class="lead mb-5">I am experienced in programming such as mobile and web as back end engineer. I am use flutter framework to develop cross platform mobile and laravel framework to develop back end.</p>
            <div class="social-icons">
                <a class="social-icon" href="#!"><i class="fab fa-linkedin-in"></i></a>
                <a class="social-icon" href="#!"><i class="fab fa-github"></i></a>
                <a class="social-icon" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="social-icon" href="#!"><i class="fab fa-facebook-f"></i></a>
            </div>
        </div>
    </section>
    <hr class="m-0" />
    <!-- Experience-->
    <section class="resume-section" id="experience">
        <div class="resume-section-content">
            <h2 class="mb-5">Experience</h2>
            <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                <div class="flex-grow-1">
                    <h3 class="mb-0">Web Developer</h3>
                    <div class="subheading mb-3">PT Citra Menara Travelindo (Travelpedi)</div>
                    <p>In this startup company iam develop and maintain backend service and backoffice using laravel framework. i am also develop and maintain android application using java or kotlin.</p>
                </div>
                <div class="flex-shrink-0"><span class="text-primary">September 2019 - June 2020</span></div>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                <div class="flex-grow-1">
                    <h3 class="mb-0">Mobile Programmer</h3>
                    <div class="subheading mb-3">Morning Glory Enterprise</div>
                    <p>In this company iam develop cross platform mobile application in ios and android using flutter framework. i am also supporting analytic team to give design recommendation for application</p>
                </div>
                <div class="flex-shrink-0"><span class="text-primary">July 2020 - Oktober 2021</span></div>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                <div class="flex-grow-1">
                    <h3 class="mb-0">Freelance Programmer</h3>
                    <div class="subheading mb-3">Yureka Teknologi Cipta</div>
                    <p>In this company my job is develop and maintain cross platform mobile application in ios and android using flutter framework.</p>
                </div>
                <div class="flex-shrink-0"><span class="text-primary">Oktober 2021 - Present</span></div>
            </div>
            
        </div>
    </section>
    <hr class="m-0" />
    <!-- Education-->
    <section class="resume-section" id="education">
        <div class="resume-section-content">
            <h2 class="mb-5">Education</h2>
            <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                <div class="flex-grow-1">
                    <h3 class="mb-0">University Maarif Hasyim Latif</h3>
                    <div class="subheading mb-3">Bachelor of Degree</div>
                    <div>Computer Science - Software Development Track</div>
                    
                </div>
                <div class="flex-shrink-0"><span class="text-primary">July 2015 - September 2019</span></div>
            </div>
        </div>
    </section>
    <hr class="m-0" />
    <!-- Skills-->
    <section class="resume-section" id="skills">
        <div class="resume-section-content">
            <h2 class="mb-5">Skills</h2>
            <div class="subheading mb-3">Programming Languages & Tools</div>
            <ul class="fa-ul mb-0">
                <li>
                    <span class="fa-li"><i class="fas fa-check"></i></span>
                    Java / Kotlin
                </li>
                <li>
                    <span class="fa-li"><i class="fas fa-check"></i></span>
                   Dart
                </li>
                <li>
                    <span class="fa-li"><i class="fas fa-check"></i></span>
                    JavaScript
                </li>
                <li>
                    <span class="fa-li"><i class="fas fa-check"></i></span>
                    PHP
                </li>
                <li>
                    <span class="fa-li"><i class="fas fa-check"></i></span>
                    Flutter
                </li>
                <li>
                    <span class="fa-li"><i class="fas fa-check"></i></span>
                    Laravel
                </li>
                <li>
                    <span class="fa-li"><i class="fas fa-check"></i></span>
                    Node.js
                </li>
            </ul>
        </div>
    </section>
    <hr class="m-0" />
    <!-- Interests-->
    <section class="resume-section" id="interests">
        <div class="resume-section-content">
            <h2 class="mb-5">Interests</h2>
            <p>Apart from being a software developer, I enjoy most of my time being outdoors. I like hiking in the mountain. Play badminton with my friend. Playing futsal in every friday. Hangout and many more.</p>
            <p class="mb-0">When forced indoors, I follow a number of comedy genre movies and television shows, and I spend a large amount of my free time exploring the latest technology advancements in the mobile and backend development world.</p>
        </div>
    </section>
    <hr class="m-0" />
    
</div>
    
@endsection
