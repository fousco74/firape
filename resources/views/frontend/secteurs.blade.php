@extends('frontend.layout.master')
@section('title', 'Secteurs')

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
</section> <br> <br>

<!--==============================
Secteurs
==============================-->
<section class="service-area-1 pt-120 pb-120 position-relative">
    <div class="service-bg1-1"></div>

    <div class="container">
        <div class="row gy-30 justify-content-center">

            <!-- FOOTBALL -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card"> 
                    <div class="box-content">
                        <div class="box-icon">
                            <i class="fas fa-futbol"></i>
                        </div>
                        <h3 class="box-title">Football</h3>
                        <p class="box-text">
                            Organisation et structuration des clubs, ligues et compétitions
                            nationales et internationales.
                        </p>
                    </div>
                    <div class="box-img image-anim">
                        <img src="{{ asset('frontend/assets/img/service/IMG-20260201-WA0050.jpg') }}" alt="Football">
                    </div>
                </div>
            </div>

            <!-- BASKETBALL -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="box-content">
                        <div class="box-icon">
                            <i class="fas fa-basketball-ball"></i>
                        </div>
                        <h3 class="box-title">Basketball</h3>
                        <p class="box-text">
                            Promotion, formation et encadrement des acteurs du basketball
                            à travers des actions fédératrices.
                        </p>
                    </div>
                    <div class="box-img image-anim">
                        <img src="{{ asset('frontend/assets/img/service/service-img-1-2.jpg') }}" alt="Basketball">
                    </div>
                </div>
            </div>

            <!-- ATHLÉTISME -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="box-content">
                        <div class="box-icon">
                            <i class="fas fa-running"></i>
                        </div>
                        <h3 class="box-title">Athlétisme</h3>
                        <p class="box-text">
                            Détection des talents, formation et organisation d’événements
                            sportifs liés aux disciplines athlétiques.
                        </p>
                    </div>
                    <div class="box-img image-anim">
                        <img src="{{ asset('frontend/assets/img/service/service-img-1-3.jpg') }}" alt="Athlétisme">
                    </div>
                </div>
            </div>

            <!-- VOLLEYBALL -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="box-content">
                        <div class="box-icon">
                            <i class="fas fa-volleyball-ball"></i>
                        </div>
                        <h3 class="box-title">Volleyball</h3>
                        <p class="box-text">
                            Développement de la pratique du volleyball et structuration
                            des compétitions locales et régionales.
                        </p>
                    </div>
                    <div class="box-img image-anim">
                        <img src="{{ asset('frontend/assets/img/service/service-img-1-4.jpg') }}" alt="Volleyball">
                    </div>
                </div>
            </div>

            <!-- SPORTS INDIVIDUELS -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="box-content">
                        <div class="box-icon">
                            <i class="fas fa-table-tennis"></i>
                        </div>
                        <h3 class="box-title">Sports individuels</h3>
                        <p class="box-text">
                            Tennis, arts martiaux et disciplines favorisant la performance
                            individuelle et la rigueur sportive.
                        </p>
                    </div>
                    <div class="box-img image-anim">
                        <img src="{{ asset('frontend/assets/img/service/service-img-1-5.jpg') }}" alt="Sports individuels">
                    </div>
                </div>
            </div>

            <!-- SPORT POUR TOUS -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="box-content">
                        <div class="box-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="box-title">Sport pour tous</h3>
                        <p class="box-text">
                            Inclusion sociale, santé et bien-être à travers la pratique
                            sportive accessible à toutes les couches sociales.
                        </p>
                    </div>
                    <div class="box-img image-anim">
                        <img src="{{ asset('frontend/assets/img/service/service-img-1-6.jpg') }}" alt="Sport pour tous">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section> <br> <br>

@endsection

