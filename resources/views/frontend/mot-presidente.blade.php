@extends('frontend.layout.master')
@section('title', 'Mot de la Présidente')

@section('main-content')


<section class="breadcrumb__area fix" data-background="assets/img/bg/breadcrumb-bg.png">
            <div class="breadcrumb__bg-shape"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6">
                        <div class="breadcrumb__content">
                            <h3 class="title">Qui sommes nous ?</h3>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="breadcrumb-wrap">
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index.html">Accueil</a>
                                </span>
                                <span class="breadcrumb-separator">/</span>
                                <span property="itemListElement" typeof="ListItem">Mot Présidente</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
</section>

    <!-- MOT DE LA PRESIDENTE -->
<section class="about-area-2 pt-120 pb-120">
    <div class="container">
        <div class="row align-items-center gy-40"  >

            <!-- TEXTE -->
            <div class="col-lg-7">
                <div class="about-content text-anim">
                    <span class="sub-title">Message institutionnel</span>
                    <h2 class="title mb-20">
                        Mot de la Présidente
                    </h2>

                    <p class="mb-15">
                        Chers partenaires, chers membres,
                    </p>

                    <p class="mb-15">
                        C’est avec un immense honneur et un profond sens des responsabilités que je m’adresse à vous
                        en ma qualité de Présidente de la <strong>Fédération Ivoirienne de Rugby à Petite Échelle (FIRAPE)</strong>.
                    </p>

                    <p class="mb-15">
                        Depuis sa création, la FIRAPE s’est engagée à promouvoir le développement du rugby à petite échelle
                        comme un puissant levier d’inclusion sociale, de cohésion communautaire et d’épanouissement de la jeunesse.
                        Notre vision repose sur des valeurs fondamentales : le respect, la solidarité, l’engagement et l’excellence.
                    </p>  

                    <p class="mb-15">
                        À travers nos actions, nos partenariats et l’implication constante de nos membres,
                        nous œuvrons pour faire du sport un outil de transformation durable au service des populations.
                    </p>

                    <p class="mb-30">
                        Je tiens à remercier l’ensemble des acteurs qui contribuent chaque jour à la vitalité de notre fédération.
                        Ensemble, continuons à bâtir un avenir où le sport est accessible à tous et porteur d’espoir.
                    </p>

                    <p class="fw-bold">
                        Mme ESSAN MARIE-LAURE<br>
                        <span class="text-theme">Présidente de la FIRAPE</span>
                    </p>
                    
                </div>
            </div>

            <!-- PHOTO -->
            <div class="col-lg-5">
                <div class="about-thumb image-anim text-center">
                    <img
                        src="{{ asset('frontend/assets/img/service/presi-img-1.jpg') }}"
                        alt="Présidente FIRAPE"
                        class="img-fluid rounded"
                    >
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
