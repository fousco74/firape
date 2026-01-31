@extends('frontend.layout.master')
@section('title', 'Contact')

@section('main-content')
    
    <!-- main-area -->
    <main>

        <!--==============================
        Breadcrumb Area
        ==============================-->
        <section class="breadcrumb__area fix" data-background="{{ asset('assets/img/bg/breadcrumb-bg.png') }}">
            <div class="breadcrumb__bg-shape"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6">
                        <div class="breadcrumb__content">
                            <h3 class="title">Contactez-nous</h3>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="breadcrumb-wrap">
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index.html">Accueil</a>
                                </span>
                                <span class="breadcrumb-separator">/</span>
                                <span property="itemListElement" typeof="ListItem">Contactez-nous</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!--==============================
        Contact Area
        ==============================-->
        <section class="contact-page-area overflow-hidden pt-120">
            <div class="container">
                <div class="contact-wrap2 pt-120 pb-120 smoke5-bg text-center">
                    <div class="row justify-content-end">
                        <div class="col-xl-12">
                            <div class="contact-form-wrap2">
                                <div class="section__title mb-30">
                                    <span class="sub-title">Formulaire de contact</span>
                                    <h2 class="title">Besoin d'aide?</h2>
                                </div>
                                <form action="mail.php" method="POST" class="contact__form ajax-contact">
                                    <div class="row gy-4">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control style-white" name="name" id="name" placeholder="Votre Nom">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control style-white" name="email" id="email" placeholder="Votre Email">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control style-white" name="objet" id="objet" placeholder="Objet">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea name="message" placeholder="Votre Message" id="contactForm" class="form-control style-white"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn mt-30">
                                        <span class="btn-text" data-text="Envoyer"></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--======== / Contact Section ========-->

        <!-- contact-map -->
        <div class="contact-map-area pt-120 pb-120">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48409.69813174607!2d-74.05163325136718!3d40.68264649999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25bae694479a3%3A0xb9949385da52e69e!2sBarclays%20Center!5e0!3m2!1sen!2sbd!4v1684309529719!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="container">
                <div class="contact-info-wrap">
                    <div class="contact-info-thumb">
                        <img src="{{ asset('assets/img/others/contact-page1-1.jpg') }}" alt="img">
                    </div>
                    <ul class="list-wrap">
                        <li>
                            <div class="contact-info-card">
                                <div class="contact-info-icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="media-body">
                                    <p>Call Us 24/7</p>
                                    <h4>+584 (25) 21453</h4>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="contact-info-card">
                                <div class="contact-info-icon">
                                    <i class="fas fa-envelope-open-text"></i>
                                </div>
                                <div class="media-body">
                                    <p>Make a Quote</p>
                                    <h4>info@help-valom.com</h4>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="contact-info-card">
                                <div class="contact-info-icon">
                                    <i class="fas fa-map-marked-alt"></i>
                                </div>
                                <div class="media-body">
                                    <p>Service Station</p>
                                    <h4>25 Hilton Street, Aus.</h4>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- contact-map-end -->

    </main>
    <!-- main-area-end -->

@endsection