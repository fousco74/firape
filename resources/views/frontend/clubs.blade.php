@extends('frontend.layout.master')
@section('title', 'Club')

@section('main-content')

<!--==============================
Breadcrumb Area
==============================-->
<section class="breadcrumb__area fix" data-background="{{ asset('frontend/assets/img/bg/breadcrumb-bg.png') }}">
            <div class="breadcrumb__bg-shape"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6">
                        <div class="breadcrumb__content">
                            <h3 class="title">Secteurs</h3>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="breadcrumb-wrap">
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index.html">Accueil</a>
                                </span>
                                <span class="breadcrumb-separator">/</span>
                                <span property="itemListElement" typeof="ListItem">Secteurs</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
</section> <br>

<!--==============================
Team Section (Clubs)
==============================-->
<section class="team-area-1 pt-120 pb-120  section-radius position-relative">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section__title text-center mb-50">
                    <span class="sub-title text-anim">FIRAPE</span>
                    <h2 class="title text-anim2">Clubs Affiliés</h2>
                </div>
            </div>
        </div>

        <div class="row gy-30 justify-content-center">

            <!-- Club 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="box-img image-anim">
                        <a href="#" class="thumb">
                            <img src="{{ asset('frontend/assets/img/team/team-1-1.jpg') }}" alt="Club Abidjan Rando">
                        </a>
                    </div>
                    <div class="team-card-details text-center">
                        <h4 class="box-title">Club Abidjan Rando</h4>
                        <span class="box-text">Abidjan</span>
                    </div>
                </div>
            </div>

            <!-- Club 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="box-img image-anim">
                        <a href="#" class="thumb">
                            <img src="{{ asset('frontend/assets/img/team/team-1-2.jpg') }}" alt="Club Bouaké Marche">
                        </a>
                    </div>
                    <div class="team-card-details text-center">
                        <h4 class="box-title">Club Bouaké Marche</h4>
                        <span class="box-text">Bouaké</span>
                    </div>
                </div>
            </div>

            <!-- Club 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="box-img image-anim">
                        <a href="#" class="thumb">
                            <img src="{{ asset('frontend/assets/img/team/team-1-3.jpg') }}" alt="Club Yamoussoukro Randonnée">
                        </a>
                    </div>
                    <div class="team-card-details text-center">
                        <h4 class="box-title">Club Yamoussoukro Randonnée</h4>
                        <span class="box-text">Yamoussoukro</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section> <br>

@endsection
