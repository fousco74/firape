@extends('frontend.layout.master')
@section('title', 'Photothèque')

@section('main-content')

<section class="breadcrumb__area fix" data-background="assets/img/bg/breadcrumb-bg.png">
            <div class="breadcrumb__bg-shape"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6">
                        <div class="breadcrumb__content">
                            <h3 class="title">Photothèque</h3>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="breadcrumb-wrap">
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index.html">Accueil</a>
                                </span>
                                <span class="breadcrumb-separator">/</span>
                                <span property="itemListElement" typeof="ListItem">Photothèque</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
</section> <br>

<section class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h4 class="title text-anim">Retour en images sur les moments marquants de la FIRAPE.</h4>
        </div>
    </div>
</section>

<section class="pt-120 pb-120">
    <div class="container">
        <div class="row gy-30">

            @php
                $photos = glob(public_path('frontend/assets/img/service/imgfir/*.{jpg,jpeg,png,JPG,JPEG,PNG}'), GLOB_BRACE);
            @endphp

            @foreach ($photos as $photo)
                <div class="col-lg-4 col-md-6">
                    <div class="project-card">
                        <div class="project-thumb image-anim">
                            <img src="{{ asset('frontend/assets/img/service/imgfir/'.basename($photo)) }}" alt="">
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section> 

@endsection
