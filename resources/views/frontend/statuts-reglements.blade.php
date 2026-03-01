@extends('frontend.layout.master')
@section('title', 'Statuts & Règlements')

@section('main-content')

<section class="breadcrumb__area fix" data-background="assets/img/bg/breadcrumb-bg.png">
            <div class="breadcrumb__bg-shape"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6">
                        <div class="breadcrumb__content">
                            <h3 class="title">Statuts&Règlements</h3>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="breadcrumb-wrap">
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index.html">Accueil</a>
                                </span>
                                <span class="breadcrumb-separator">/</span>
                                <span property="itemListElement" typeof="ListItem">Statuts&Règlements</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
</section> <br>
<!--==============================
Breadcrumb Area
==============================-->
<section class="breadcrumb-area" data-background="{{ asset('assets/img/bg/breadcrumb-bg.png') }}">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2 class="title text-anim">Statuts & Règlements</h2>
            <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Accueil</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Statuts & Règlements
                    </li>
                </ol>
            </nav> -->
        </div>
    </div>
</section>

<!--==============================
Statuts & Reglements Section
==============================-->
<section class="about-area-2 pt-120 pb-120">
    <div class="container">
        <div class="row align-items-center gy-40">

            <!-- Texte -->
            <div class="col-lg-7">
                <div class="about-content">

                    <div class="section__title mb-30">
                        <span class="sub-title text-anim">FIRAPE</span>
                        <h2 class="title text-anim2">
                            Cadre juridique & réglementaire
                        </h2>
                    </div>

                    <p class="mb-20">
                        La <strong>Fédération Ivoirienne de Randonnée Pédestre et du Bien-être pour Tous (FIRAPE)</strong>
                        est régie par des statuts et règlements intérieurs qui définissent son organisation,
                        ses objectifs, ses organes de gestion ainsi que les droits et devoirs de ses membres.
                    </p>

                    <p class="mb-30">
                        Ces textes constituent la base juridique garantissant la transparence, la bonne
                        gouvernance et le fonctionnement harmonieux de la fédération au niveau national
                        et international.
                    </p>

                    <ul class="about-list list-wrap">
                        <li>
                            <i class="fas fa-check-circle"></i>
                            Statuts de la FIRAPE
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                             Règlement intérieur
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            Textes d’application
                        </li>
                        <li>
                            <i class="fas fa-check-circle"></i>
                            Conformité aux instances sportives
                        </li>
                    </ul>

                </div>
            </div>

            <!-- Bloc documents -->
            <div class="col-lg-5">
                <div class="service-card style-two">

                    <h4 class="box-title mb-20">
                        Documents officiels
                    </h4>

                    <div class="download-box mb-15">
                        <a href="#" class="btn w-100">
                            <i class="fas fa-file-pdf me-2"></i>
                            Télécharger les Statuts
                        </a>
                    </div>

                    <div class="download-box mb-15">
                        <a href="#" class="btn btn-two w-100">
                            <i class="fas fa-file-pdf me-2"></i>
                            Télécharger le Règlement intérieur
                        </a>
                    </div>

                    <div class="download-box">
                        <a href="#" class="btn btn-three w-100">
                            <i class="fas fa-file-archive me-2"></i>
                            Autres documents officiels
                        </a>
                    </div>

                    <p class="mt-20 small text-muted">
                        * Les documents sont disponibles en format PDF.
                    </p>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
