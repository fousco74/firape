<header>
    <div id="header-fixed-height" {{ ($menu && $menu =='accueil') ? 'class="header-fixed-height-two"':'' }}></div>
    <div class="tg-header__top tg-header__top-two {{ ($menu && $menu =='accueil') ? 'd-lg-block d-none':'' }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <ul class="tg-header__top-info left-side list-wrap justify-content-xl-start justify-content-center">
                        <li>
                            Fédération Ivoirienne de Randonnée Pédestre et du Bien-être pour tous
                        </li>
                    </ul>
                </div>
                <div class="col-xl-6 col-md-4 d-xl-block d-none">
                    <ul class="tg-header__top-right list-wrap">
                        <li class="tg-header__top-social">
                            <ul class="list-wrap">
                                <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f me-2"></i>Facebook</a></li>
                                <li>
                                    <a href="www.x.com/@firape2015" class="d-flex align-items-center" target="_blank">
                                        <svg class="d-block me-2" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.33192 5.92804L13.5438 0H12.3087L7.78328 5.14724L4.16883 0H0L5.46575 7.78353L0 14H1.2351L6.01407 8.56431L9.83119 14H14L8.33192 5.92804ZM6.64027 7.85211L6.08648 7.07704L1.68013 0.909771H3.57718L7.13316 5.88696L7.68694 6.66202L12.3093 13.1316H10.4123L6.64027 7.85211Z" fill="currentColor" />
                                        </svg> Twitter
                                    </a>
                                </li>
                                <li><a href="https://ci.linkedin.com/in/firape2015" target="_blank"><i class="fab fa-linkedin-in me-2"></i>Linkedin</a></li>
                                <li><a href="https://ci.linkedin.com/in/firape2015" target="_blank"><i class="fab fa-instagram me-2"></i>Instagram</a></li>
                                <li><a href="https://www.tiktok.com/@firape2015" target="_blank"><i class="fab fa-tiktok me-2"></i>Tik Tok</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @if ($menu && $menu =='accueil')
    <div class="tg-header__middle d-lg-block d-none">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tgmenu__wrap">
                        <nav class="tgmenu__nav">
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('public/frontend/assets/img/firape/firape.png') }}" alt="Logo" style="width: 70px;"></a>
                            </div>
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('public/frontend/assets/img/firape/carp.png') }}" alt="Logo" style="width: 70px; margin-left: 10px;"></a>
                            </div>
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('public/frontend/assets/img/firape/federation1.png') }}" alt="Logo" style="width: 70px; margin-left: 10px;"></a>
                            </div>
                            <div class="info-card-wrap">
                                <div class="info-card">
                                    <div class="info-card_icon">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div class="info-card_content">
                                        <p class="info-card_text">N° Tel: (+225) 27 21 54 44 03 </p>
                                        <a href="tel:+12013802737" class="info-card_link">(+225) 07 07 61 61 33 </a>
                                    </div>
                                </div>
                                <div class="info-card">
                                    <div class="info-card_icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="info-card_content">
                                        <p class="info-card_text">Email</p>
                                        <a href="mailto:firape2015@gmail.com" class="info-card_link">firape2015@gmail.com</a>
                                    </div>
                                </div>
                                <div class="info-card">
                                    <div class="info-card_icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="info-card_content">
                                        <p class="info-card_text">Situation Géo</p>
                                        <p class="info-card_link">Koumassi Prodomo Rushes - lot 727A </p>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


    @include('frontend/layout.menu')

</header>