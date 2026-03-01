@extends('frontend.layout.master')
@section('title', 'Documents')

@section('main-content')

<section class="breadcrumb__area fix" data-background="assets/img/bg/breadcrumb-bg.png">
            <div class="breadcrumb__bg-shape"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6">
                        <div class="breadcrumb__content">
                            <h3 class="title">Documents</h3>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="breadcrumb-wrap">
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index.html">Accueil</a>
                                </span>
                                <span class="breadcrumb-separator">/</span>
                                <span property="itemListElement" typeof="ListItem">Documents</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
</section> <br>  

<!--==============================
Breadcrumb Area
==============================-->
<section class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2 class="title text-anim">Documents Officiels</h2>
            <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="{{ route('index') }}">Accueil</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Documents
                    </li>
                </ol>
            </nav> -->
        </div>
    </div>
</section>

<!--==============================
Documents Section
==============================-->
<section class="pricing-area pt-120 pb-120">
    <div class="container">

        <!-- Section Title -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section__title text-center mb-60">
                    <span class="sub-title text-anim">FIRAPE</span>
                    <h2 class="title text-anim2">Nos Documents Institutionnels</h2>
                    <p class="mt-20">
                        Retrouvez ici l’ensemble des documents officiels de la Fédération,
                        disponibles en téléchargement.
                    </p>
                </div>
            </div>
        </div>

        <!-- Documents Grid -->
        <div class="row gy-30 justify-content-center">

            <!-- Document 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card text-center">
                    <div class="pricing-header">
                        <h4 class="pricing-title">Statuts de la FIRAPE</h4>
                    </div>
                    <div class="pricing-body">
                        <p>
                            Document officiel définissant l’organisation, les missions
                            et le fonctionnement de la Fédération.
                        </p>
                    </div>
                    <div class="pricing-footer">
                        <a href="#" class="btn btn-three">
                            <span class="btn-text" data-text="Télécharger"></span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Document 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card text-center">
                    <div class="pricing-header">
                        <h4 class="pricing-title">Règlement Intérieur</h4>
                    </div>
                    <div class="pricing-body">
                        <p>
                            Règles internes encadrant la vie associative et les obligations
                            des membres.
                        </p>
                    </div>
                    <div class="pricing-footer">
                        <a href="#" class="btn btn-three">
                            <span class="btn-text" data-text="Télécharger"></span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Document 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card text-center">
                    <div class="pricing-header">
                        <h4 class="pricing-title">Charte Éthique</h4>
                    </div>
                    <div class="pricing-body">
                        <p>
                            Engagements moraux et valeurs défendues par la FIRAPE
                            et ses membres.
                        </p>
                    </div>
                    <div class="pricing-footer">
                        <a href="#" class="btn btn-three">
                            <span class="btn-text" data-text="Télécharger"></span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Document 4 -->
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card text-center">
                    <div class="pricing-header">
                        <h4 class="pricing-title">Rapports d’Activités</h4>
                    </div>
                    <div class="pricing-body">
                        <p>
                            Synthèse annuelle des activités, projets et actions
                            menées par la Fédération.
                        </p>
                    </div>
                    <div class="pricing-footer">
                        <a href="#" class="btn btn-three">
                            <span class="btn-text" data-text="Télécharger"></span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
