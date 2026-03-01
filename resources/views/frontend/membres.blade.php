@extends('frontend.layout.master')
@section('title', 'Membres')

@section('main-content')

<section class="breadcrumb__area fix" data-background="assets/img/bg/breadcrumb-bg.png">
            <div class="breadcrumb__bg-shape"></div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6">
                            <div class="breadcrumb__content">
                                <h3 class="title">Nos Membres</h3>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="breadcrumb-wrap">
                                <nav class="breadcrumb">
                                    <span property="itemListElement" typeof="ListItem">
                                        <a href="index.html">Accueil</a>
                                    </span>
                                    <span class="breadcrumb-separator">/</span>
                                    <span property="itemListElement" typeof="ListItem">Membres</span>
                                </nav>
                            </div>
                        </div>
                </div>
            </div>
</section>

    <!-- Breadcrumb / Hero -->
<section class="breadcrumb-area" data-background="{{ asset('frontend/assets/img/bg/breadcrumb-bg.jpg') }}">
    <!-- <div class="container">
        <div class="breadcrumb-content">
            <h2 class="title">Membres</h2>
            <ul>
                <li><a href="{{ route('index') }}">Accueil</a></li>
                <li>Membres</li>
            </ul>
        </div>
    </div> -->
</section> <br> <br> <br>


<!-- Team Area -->
<section class="team-area-1 pt-120 pb-120 gray-bg section-radius position-relative">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section__title text-center mb-50">
                    <span class="sub-title text-anim">FIRAPE</span>
                    <h2 class="title text-white text-anim2">Nos Membres</h2>
                </div>
            </div>
        </div>

        <div class="row gy-30 justify-content-center">

            {{-- Carte Membre --}}
            <div class="col-lg-4 col-md-6">
                <div class="team-card">     
                    <div class="box-img image-anim">
                        <img src="{{ asset('frontend/assets/img/team/team-1-1.jpg') }}" alt="Présidente">
                    </div>
                    <div class="team-card-details text-center">
                        <h4 class="box-title">Mme [Nom]</h4>
                        <span class="box-text">Présidente</span>
                    </div>
                </div>
            </div>  

            {{-- Carte Membre --}}
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="box-img image-anim">
                        <img src="{{ asset('frontend/assets/img/team/team-1-2.jpg') }}" alt="Vice-Président">
                    </div>
                    <div class="team-card-details text-center">
                        <h4 class="box-title">M. [Nom]</h4>
                        <span class="box-text">Vice-Président</span>
                    </div>
                </div>
            </div>

            {{-- Carte Membre --}}
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="box-img image-anim">
                        <img src="{{ asset('frontend/assets/img/team/team-1-3.jpg') }}" alt="Secrétaire Général">
                    </div>
                    <div class="team-card-details text-center">
                        <h4 class="box-title">M. [Nom]</h4>
                        <span class="box-text">Secrétaire Général</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section> <br> <br>

@endsection
