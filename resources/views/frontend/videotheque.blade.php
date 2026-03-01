@extends('frontend.layout.master')
@section('title', 'Vidéothèque')

@section('main-content')

<section class="breadcrumb__area fix" data-background="assets/img/bg/breadcrumb-bg.png">
            <div class="breadcrumb__bg-shape"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6">
                        <div class="breadcrumb__content">
                            <h3 class="title">Vidéothèque</h3>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="breadcrumb-wrap">
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index.html">Accueil</a>
                                </span>
                                <span class="breadcrumb-separator">/</span>
                                <span property="itemListElement" typeof="ListItem">Vidéothèque</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
</section> <br>

<section class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h4 class="title text-anim">Plongez au cœur de nos actions grâce à nos contenus vidéo.</h4>
        </div>
    </div>
</section>

<section class="pt-120 pb-120">
    <div class="container">
        <div class="row gy-30">

            <div class="col-lg-4 col-md-6">
                <div class ="video-card">
                    <iframe width="100%" height="250"
                        src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                        frameborder="0" allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class ="video-card">
                    <iframe width="100%" height="250"
                        src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                        frameborder="0" allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class ="video-card">
                    <iframe width="100%" height="250"
                        src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                        frameborder="0" allowfullscreen>
                    </iframe>
                </div>
            </div>

            <!-- duplicable plus tard via backend -->

        </div> <br>
        <div class="row gy-30">

            <div class="col-lg-4 col-md-6">
                <div class="video-card">
                    <iframe width="100%" height="250"
                        src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                        frameborder="0" allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="video-card">
                    <iframe width="100%" height="250"
                        src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                        frameborder="0" allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="video-card">
                    <iframe width="100%" height="250"
                        src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                        frameborder="0" allowfullscreen>
                    </iframe>
                </div>
            </div>

            <!-- duplicable plus tard via backend -->

        </div>
    </div>
</section>

@endsection
