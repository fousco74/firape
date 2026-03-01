@extends('frontend.layout.master')
@section('title', '')

@section('main-content')

<section class="breadcrumb__area fix" data-background="assets/img/bg/breadcrumb-bg.png">
            <div class="breadcrumb__bg-shape"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6">
                        <div class="breadcrumb__content">
                            <h3 class="title">Évènements</h3>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="breadcrumb-wrap">
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index.html">Accueil</a>
                                </span>
                                <span class="breadcrumb-separator">/</span>
                                <span property="itemListElement" typeof="ListItem">Évènements</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div> 

</section> <br> <br> <br>

<!--==============================
ÉVÈNEMENTS (design secteurs)
==============================-->

<section class="service-area-1 pt-120 pb-120  position-relative">
    <div class="service-bg1-1"></div>

    <div class="container ">
        <div class="row gy-30 justify-content-center">

            <!-- ÉVÈNEMENT 1 -->
            <div class="col-lg-4 col-md-6 ">
                <div class="service-card ">
                    <div class="box-content">
                        <div class="box-icon">
                            <i class="fas fa-hiking"></i>
                        </div>
                        <h3 class="box-title">
                            Randonnée pédestre nationale
                        </h3>
                        <p class="box-text">
                            Organisation d’une randonnée pédestre ouverte à tous,
                            visant le bien-être, la santé et la cohésion sociale.
                        </p> <br>
                        <span class="text-muted">
                            <i class="far fa-calendar-alt"> </i> 12 Mars 2025
                        </span>
                    </div>
                    <div class="box-img image-anim">
                        <img src="{{ asset('frontend/assets/img/service/IMG-20260201-WA0022.jpg') }}" alt="Randonnée pédestre">
                    </div>
                </div>
            </div>

            <!-- ÉVÈNEMENT 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="box-content">
                        <div class="box-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <h3 class="box-title">
                            Formation des encadreurs sportifs
                        </h3>
                        <p class="box-text">
                            Session de formation dédiée aux encadreurs et animateurs
                            de randonnée pédestre.
                        </p> <br>
                        <span class="text-muted">
                            <i class="far fa-calendar-alt"></i> 05 Avril 2025
                        </span >
                    </div>
                    <div class="box-img image-anim">
                        <img src="{{ asset('frontend/assets/img/service/IMG-20260201-WA0022.jpg') }}" alt="Formation encadreurs">
                    </div>
                </div>
            </div>

            <!-- ÉVÈNEMENT 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="box-content">
                        <div class="box-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3 class="box-title">
                            Rencontre des fédérations africaines
                        </h3>
                        <p class="box-text">
                            Échanges entre les pays membres de la CARP pour
                            renforcer la coopération sportive.
                        </p> <br>
                        <span class="text-muted">
                            <i class="far fa-calendar-alt"></i> 20 Mai 2025
                        </span>
                    </div>
                    <div class="box-img image-anim">
                        <img src="{{ asset('frontend/assets/img/service/IMG-20260201-WA0022.jpg') }}" alt="Rencontre CARP">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
