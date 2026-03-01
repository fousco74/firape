@extends('frontend.layout.master')
@section('title', 'Accueil')


@section('main-content')
    <!--==============================
    Hero Area
    ==============================-->
<section class="hero-wrapper hero-1">
    <div class="hero-slider1 overflow-hidden">
        <div
            class="tg-swiper__slider swiper-container"
            id="heroSlider1"
            data-swiper-options='{
                "effect": "fade",
                "slidesPerView": 1,
                "autoHeight": true,
                "loop": true,
                "pagination": {
                    "el": ".slider-pagination2",
                    "clickable": true
                }
            }'
        >
            <div class="swiper-wrapper">

                {{-- SLIDE 1 --}}
                <div class="swiper-slide" data-background="{{ asset('frontend/assets/img/hero/slide1.jpeg') }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="hero-style1">
                                    <div class="sub-title" data-ani="slideinup" data-ani-delay="0.1s">
                                        <span>Bienvenue</span> à la F.I.RA.PE
                                    </div>

                                    <h1 class="hero-title">
                                        <div class="title1" data-ani="slideinup" data-ani-delay="0.2s">
                                            Fédération Ivoirienne
                                        </div>
                                        <div class="title2" data-ani="slideinup" data-ani-delay="0.3s">
                                            de Randonnée Pédestre
                                        </div>
                                        <div class="title3" data-ani="slideinup" data-ani-delay="0.4s">
                                            et du Bien-être pour Tous
                                        </div>
                                    </h1>

                                    <div class="tg-button-wrap" data-ani="slideinup" data-ani-delay="0.5s">
                                        <a href="{{ route('main.about') }}" class="btn btn-three">
                                            <span class="btn-text" data-text="Qui sommes-nous"></span>
                                        </a>
                                        <a href="{{ route('main.contact') }}" class="btn btn-four">
                                            <span class="btn-text" data-text="Nous contacter"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SLIDE 2 --}}
                <div class="swiper-slide" data-background="{{ asset('frontend/assets/img/hero/slide5.jpeg') }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="hero-style1">
                                    <div class="sub-title" data-ani="slideinup" data-ani-delay="0.1s">
                                        <span>Randonnée</span> & Santé
                                    </div>

                                    <h1 class="hero-title">
                                        <div class="title1" data-ani="slideinup" data-ani-delay="0.2s">
                                            Activité Physique
                                        </div>
                                        <div class="title2" data-ani="slideinup" data-ani-delay="0.3s">
                                            Bien-être Mental
                                        </div>
                                        <div class="title3" data-ani="slideinup" data-ani-delay="0.4s">
                                            Cohésion Sociale
                                        </div>
                                    </h1>

                                    <div class="tg-button-wrap" data-ani="slideinup" data-ani-delay="0.5s">
                                        <a href="{{ route('main.index') }}" class="btn btn-three">
                                            <span class="btn-text" data-text="Nos activités"></span>
                                        </a>
                                        <a href="{{ route('main.contact') }}" class="btn btn-four">
                                            <span class="btn-text" data-text="Adhérer"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SLIDE 3 --}}
                <div class="swiper-slide" data-background="{{ asset('frontend/assets/img/hero/slide3.jpeg') }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="hero-style1">
                                    <div class="sub-title" data-ani="slideinup" data-ani-delay="0.1s">
                                        <span>F.I.RA.PE</span> Côte d’Ivoire
                                    </div>

                                    <h1 class="hero-title">
                                        <div class="title1" data-ani="slideinup" data-ani-delay="0.2s">
                                            Sport pour Tous
                                        </div>
                                        <div class="title2" data-ani="slideinup" data-ani-delay="0.3s">
                                            Nature & Engagement
                                        </div>
                                        <div class="title3" data-ani="slideinup" data-ani-delay="0.4s">
                                            Développement Durable
                                        </div>
                                    </h1>

                                    <div class="tg-button-wrap" data-ani="slideinup" data-ani-delay="0.5s">
                                        <a href="{{ route('main.about') }}" class="btn btn-three">
                                            <span class="btn-text" data-text="Notre mission"></span>
                                        </a>
                                        <a href="{{ route('main.contact') }}" class="btn btn-four">
                                            <span class="btn-text" data-text="Rejoindre la FIRAPE"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="slider-pagination2"></div>
        </div>
    </div>
</section>


<!-- ABOUT SECTION -->
<section class="about-area-1 pt-120 pb-120 overflow-hidden">
    <div class="container">
        <div class="about-wrap1">
            <div class="row gx-100 gy-5 flex-row-reverse align-items-center">
                
                <!-- IMAGE -->
                <div class="col-xl-6">
                    <div class="about-thumb1-1">
                        <div class="img1">
                            <div class="thumb image-anim">
                                <img src="{{ asset('frontend/assets/img/service/IMG-20260201-WA0051.jpg') }}" alt="FIRAPE">
                            </div>
                        </div>
                        <div class="about-experience-wrap movingX">
                            <h3 class="counter-title">
                                <span class="counter-number">10</span>+
                            </h3>
                            <span class="counter-text">Années d’existence</span>
                        </div>
                    </div>
                </div>

                <!-- TEXTE -->
                <div class="col-xl-6">
                    <div class="section__title">
                        <span class="sub-title text-anim">
                            À propos de la F.I.RA.PE
                        </span>
                        <h2 class="title text-anim2">
                            Promouvoir la randonnée pédestre et le bien-être pour tous en Côte d’Ivoire
                        </h2>
                    </div>

                    <p class="mt-30 mb-30">
                        La Fédération Ivoirienne de Randonnée Pédestre et de Bien-être pour Tous (F.I.RA.PE) œuvre depuis 2015
                        à la promotion, l’organisation et au développement de la pratique du sport pour tous, à travers
                        la randonnée pédestre et les activités de bien-être sur l’ensemble du territoire ivoirien.
                    </p>

                    <!-- CARD 1 -->
                    <div class="about-grid-card">
                        <div class="box-icon">
                            <!-- SVG conservé -->
                            <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                <circle cx="12" cy="12" r="6" stroke="currentColor" stroke-width="2"/>
                                <circle cx="12" cy="12" r="2" fill="currentColor"/>
                            </svg>

                        </div>
                        <div class="card-details">
                            <h4 class="box-title">Mission & Vision</h4>
                            <p class="box-text">
                                Favoriser la pratique du sport pour tous, renforcer la cohésion sociale
                                et contribuer au bien-être physique et mental des populations.
                            </p>
                        </div>
                    </div>

                    <!-- CARD 2 -->
                    <div class="about-grid-card">
                        <div class="box-icon">
                            <!-- SVG conservé -->
                            <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="5" r="2" fill="currentColor"/>
                                <circle cx="5" cy="19" r="2" fill="currentColor"/>
                                <circle cx="19" cy="19" r="2" fill="currentColor"/>

                                <line x1="12" y1="7" x2="5" y2="17" stroke="currentColor" stroke-width="2"/>
                                <line x1="12" y1="7" x2="19" y2="17" stroke="currentColor" stroke-width="2"/>
                                <line x1="5" y1="19" x2="19" y2="19" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </div>
                        <div class="card-details">
                            <h4 class="box-title">Organisation nationale</h4>
                            <p class="box-text">
                                La F.I.RA.PE regroupe des ligues, clubs et associations affiliées,
                                et représente officiellement la randonnée pédestre au niveau national
                                et international.
                            </p>
                        </div>
                    </div>

                    <!-- BOUTON -->
                    <div class="tg-button-wrap mt-50">
                        <a href="{{ route('main.about') }}" class="btn">
                            <span class="btn-text" data-text="Découvrir la fédération"></span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<!-- ACTIVITIES SECTION -->
<section class="service-area-1 pt-120 pb-120 position-relative">
    <div class="service-bg1-1"></div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section__title text-center mb-50">
                    <span class="sub-title text-anim">Nos activités</span>
                    <h2 class="title text-white text-anim2">
                        Promotion du sport, du bien-être et de la cohésion sociale
                    </h2>
                </div>
            </div>
        </div>

    <div class="row gy-30 justify-content-center">

            <!-- ACTIVITÉ 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="box-content">
                        <div class="box-icon">
                            <!-- SVG conservé -->
                            <svg width="62" height="60" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <!-- Tête -->
                                <circle cx="12" cy="4" r="2" fill="currentColor"/>

                                <!-- Corps -->
                                <path d="M12 6 L12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>

                                <!-- Bras -->
                                <path d="M12 8 L9 11" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M12 8 L15 10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>

                                <!-- Jambes -->
                                <path d="M12 12 L9 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M12 12 L15 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>

                                <!-- Bâton de marche -->
                                <path d="M16 9 L16 20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>

                        </div>

                        <h3 class="box-title">
                            Randonnée pédestre
                        </h3>

                        <p class="box-text">
                            Organisation de randonnées encadrées visant l’amélioration de la santé physique,
                            la découverte de la nature et le renforcement des liens sociaux.
                        </p>
                    </div>

                    <div class="box-img image-anim">
                        <img src="{{ asset('frontend/assets/img/service/service-img.jpeg') }}" alt="Randonnée pédestre">
                    </div>
                </div>
            </div>

            <!-- ACTIVITÉ 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="box-content">
                        <div class="box-icon">
                            <!-- SVG conservé -->
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">

                                <!-- Tête -->
                                <circle cx="12" cy="4" r="2" fill="currentColor"/>

                                <!-- Corps -->
                                <path d="M12 6 L12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>

                                <!-- Bras ouverts (accessibilité / inclusion) -->
                                <path d="M12 8 L6 10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M12 8 L18 10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>

                                <!-- Jambes -->
                                <path d="M12 12 L9 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M12 12 L15 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>

                                <!-- Cœur (santé / bien-être) -->
                                <path d="M12 16
                                        C10.5 14.5 8 13.5 8 11.5
                                        C8 10 9.2 9 10.5 9
                                        C11.3 9 12 9.5 12 9.5
                                        C12 9.5 12.7 9 13.5 9
                                        C14.8 9 16 10 16 11.5
                                        C16 13.5 13.5 14.5 12 16Z"
                                    fill="currentColor"/>
                            </svg>

                        </div>

                        <h3 class="box-title">
                            Bien-être et sport pour tous
                        </h3>

                        <p class="box-text">
                            Activités accessibles à tous favorisant l’équilibre mental,
                            la prévention sanitaire et l’adoption d’un mode de vie sain.
                        </p>
                    </div>

                    <div class="box-img image-anim">
                        <img src="{{ asset('frontend/assets/img/service/sport-pour-tous.jpeg') }}" alt="Bien-être">
                    </div>
                </div>
            </div>

            <!-- ACTIVITÉ 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="service-card">
                    <div class="box-content">
                        <div class="box-icon">
                            <!-- SVG conservé -->
                            <svg width="66" height="60" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">

                                <!-- Coupe / trophée -->
                                <path d="M6 4H18V7
                                        C18 10.5 15.5 13 12 13
                                        C8.5 13 6 10.5 6 7V4Z"
                                    stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>

                                <!-- Poignées du trophée -->
                                <path d="M6 6H4C4 9 6 11 8 11"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M18 6H20C20 9 18 11 16 11"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"/>

                                <!-- Socle -->
                                <path d="M10 13V16H14V13"
                                    stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                                <path d="M8 18H16"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"/>

                                <!-- Étoile (compétition / excellence) -->
                                <path d="M12 8
                                        L13 10
                                        L15 10.5
                                        L13.5 12
                                        L14 14
                                        L12 13
                                        L10 14
                                        L10.5 12
                                        L9 10.5
                                        L11 10Z"
                                    fill="currentColor"/>
                            </svg>

            </div>

                        <h3 class="box-title">
                            Événements & compétitions
                        </h3>

                        <p class="box-text">
                            Pilotage de marches et événements sportifs mondiaux avec nos ligues partenaires.
                        </p>
                    </div>

                    <div class="box-img image-anim">
                        <img src="{{ asset('frontend/assets/img/service/event-compet.jpg') }}" alt="Événements FIRAPE">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- STATS SECTION -->
<!-- STATS SECTION -->
<section class="counter-area pt-120 pb-90">
    <div class="container">
        <div class="row text-center">

            <div class="col-lg-3 col-md-6">
                <div class="counter-item">
                    <h2>2015</h2>
                    <p>Année de création de la F.I.RA.PE</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="counter-item">
                    <h2>+20</h2>
                    <p>Pays membres de la CARP</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="counter-item">
                    <h2>Afrique</h2>
                    <p>Présence continentale</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="counter-item">
                    <h2>Sport</h2>
                    <p>Bien-être pour tous</p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- CTA SECTION -->
<section class="cta-area pt-120 pb-120 black-bg text-center">
    <div class="container">
        <h2 class="title text-white mb-30">
            Rejoignez la F.I.RA.PE et participez à la promotion du sport pour tous
        </h2>
        <a href="{{ route('main.contact') }}" class="btn btn-two">
            <span class="btn-text" data-text="Nous rejoindre"></span>
        </a>
    </div>
</section>
    <!--======== / Blog Section ========-->

@endsection
