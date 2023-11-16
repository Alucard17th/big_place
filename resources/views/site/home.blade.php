@extends('layouts.app')

@section('content')
<div class="page-template-content page-accueil">
    <!-- Banner Section-->
    <section class="banner-section-two">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInUp">
                        <div class="title-box">
                            <h3>BIG PLACE La plateforme digitale de recrutement qui fait la différence !</h3>
                            <div class="text">Entreprise ? Demandez une démo</div>
                            <br><br>
                            <div><a href="https://calendly.com/d/yrm-vpz-66v/demonstration-solution-big-place?month=2023-06"
                                    target="_blank" class="theme-btn btn-style-one"><i class="fa fa-calendar-check-o"
                                        aria-hidden="true"></i> Programmer une
                                    démo </a></div>
                        </div>

                        <!-- Job Search Form 
                    <div class="job-search-form">
                        <form method="GET" action="https://bigplace.fr/job">
                            <div class="row">
                                <div class="form-group col-lg-5 col-md-12 col-sm-12">
                                    <span class="icon flaticon-search-1"></span>
                                    <input type="text" name="s" placeholder="Intitulé de l&#039;emploi...">
                                </div>
                                <!-- Form Group 
                                                                    -->
                        <!--  <div class="form-group col-lg-4 col-md-12 col-sm-12 location smart-search">
                                        <input type="text" class="smart-search-location parent_text form-control" placeholder="Toutes les villes" value="" data-onLoad="En chargement..."
                                               data-default="[{&quot;id&quot;:1,&quot;title&quot;:&quot; Lyon&quot;},{&quot;id&quot;:2,&quot;title&quot;:&quot; Paris&quot;},{&quot;id&quot;:3,&quot;title&quot;:&quot; London&quot;},{&quot;id&quot;:4,&quot;title&quot;:&quot; Miami&quot;},{&quot;id&quot;:5,&quot;title&quot;:&quot; Los Angeles&quot;},{&quot;id&quot;:6,&quot;title&quot;:&quot; New Jersey&quot;},{&quot;id&quot;:7,&quot;title&quot;:&quot; San Francisco&quot;},{&quot;id&quot;:8,&quot;title&quot;:&quot; Virginia&quot;}]">
                                        <input type="hidden" class="child_id" name="location" value="">
                                        <span class="icon flaticon-map-locator"></span>
                                    </div>
                                                                <!-- Form Group 
                                <!-- <div class="form-group col-lg-3 col-md-12 col-sm-12 text-right">
                                    <button type="submit" class="theme-btn btn-style-one"><span class="btn-title">Find Jobs</span></button>
                                </div>
                            </div>
                        </form>
                    </div>-->
                        <!-- Job Search Form -->

                        <div class="bottom-box">
                            <div class="count-employers">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="image-column col-lg-5 col-md-12">
                    <div class="image-box">
                        <figure class="main-image anm" data-wow-delay="1000ms" data-speed-x="2" data-speed-y="2">
                            <img src="{{ asset('plugins/images/banner-img-2.png') }}"
                                alt="banner image">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Section-->
    <div class=" p-0">
        <div class="auto-container">
            <div class="bravo-text text-box">

            </div>
        </div>
    </div>
    <div class=" p-0">
        <div class="auto-container">
            <div class="bravo-text text-box">

            </div>
        </div>
    </div>
    <!-- About Section -->
    <section class="about-section-two">
        <div class="auto-container">
            <div class="row">
                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                    <div class="inner-column wow fadeInRight">
                        <h2 class="about-title">
                            <font color="#FF8C00">Des fonctionnalités essentielles !</font>
                        </h2>
                        <div class="sec-content">
                            <p class="MsoNormal" style="text-align:justify;"><strong><span
                                        style="font-size:15pt;font-family:Helvetica, sans-serif;color:#004f5c;background:#FFFFFF;font-weight:normal;">Des
                                        fonctionnalités essentielles et un lieu d'échange unique permettant aux
                                        recruteurs et aux candidats de se retrouver au travers d'un espace
                                        simple, intuitif et complet.</span></strong><strong><span
                                        style="font-size:12pt;font-family:Helvetica, sans-serif;color:#004f5c;background:#FFFFFF;"><br></span></strong><strong><span
                                        style="font-size:15pt;font-family:Helvetica, sans-serif;color:#004f5c;background:#FFFFFF;font-weight:normal;">Un
                                        outil riche en fonctionnalités : rdv visio ou tchat, moteur de recherche
                                        intelligent avec système de matching, jobdatings, une gestion des
                                        candidatures simplifiée, des statistiques...</span></strong></p>
                        </div>
                        <a href="https://calendly.com/d/yrm-vpz-66v/demonstration-solution-big-place?month=2023-06"
                            target="_blank" class="theme-btn btn-style-one bg-blue"><span class="btn-title">Entreprises
                                ? demandez une démo gratuite !</span></a>
                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <figure class="image-box wow fadeInLeft">
                        <img src="{{ asset('plugins/images/des-fonctionnalites-essentielles-2.jpg') }}"
                            alt="about">
                    </figure>
                    <!-- Count Employers -->
                    <div class="applicants-list app-list-2 wow fadeInUp">
                        <img src="{{ asset('plugins/images/rechercher-un-candidat-3.jpg') }}"
                            class="img-option" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->
    <div class=" p-0">
        <div class="auto-container">
            <div class="bravo-text text-box">

            </div>
        </div>
    </div>
    <!-- About Section -->
    <section class="about-section about-style-1">
        <div class="auto-container">
            <div class="row">


                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12 order-2">
                    <figure class="image wow fadeInright">
                        <img src="{{ asset('plugins/images/un-espace-tout-en-un-big-place-3.jpg') }}"
                            alt="about image">
                    </figure>
                    <!-- Count Employers -->
                    <div class="count-employers wow fadeInUp">
                        <img src="{{ asset('plugins/images/rechercher-un-candidat-91.png') }}"
                            class="img-option" alt="img">
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12 ">
                    <div class="inner-column wow fadeInUp">
                        <h2 class="about-title">
                            <font color="#FF8C00">Un espace tout en un ...</font>
                        </h2>
                        <div class="sec-content">
                            <p class="MsoNormal" style="text-align:justify;"><strong><span
                                        style="font-size:15pt;font-family:Helvetica, sans-serif;color:#004f5c;background:#FFFFFF;font-weight:normal;">Centralisez
                                        toutes les informations utiles dans un seul et même endroit et gagnez du
                                        temps pour vos recrutements grâce à un tableau de bord regroupant toutes
                                        vos informations et documents utiles. Facilitez votre processus de
                                        recrutement grâce au système intégré de gestion des candidatures
                                        synthétisant toutes vos étapes de recrutement. </span></strong></p>
                        </div>
                        <a href="https://bigplace.fr/register-candidat" target="self"
                            class="theme-btn btn-style-two bg-blue"><span class="btn-title">Candidats ?
                                Inscrivez-vous gratuitement !</span></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End About Section -->
    <!-- About Section -->
    <section class="about-section-two">
        <div class="auto-container">
            <div class="row">
                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                    <div class="inner-column wow fadeInRight">
                        <h2 class="about-title">
                            <font color="#FF8C00">Un moteur de recherche puissant !</font>
                        </h2>
                        <div class="sec-content">
                            <p class="MsoNormal" style="text-align:justify;"><strong><span
                                        style="font-size:15pt;font-family:Helvetica, sans-serif;color:#004f5c;background:#FFFFFF;font-weight:normal;">Profitez
                                        d'un moteur de recherche puissant qui fait matcher les profils des
                                        candidats aux besoins des entreprises pour un meilleur recrutement !
                                        Gagnez du temps et laissez l'intelligence artificielle vous accompagner
                                        pour identifier les talents et les postes qui correspondent. Plusieurs
                                        critères pertinents sont exploités aux travers d'algorithmes puissants
                                        pour vous permettre de recruter efficacement et mettre votre énergie là
                                        ou se trouve votre vraie valeur ajoutée ! </span></strong></p>
                        </div>
                        <a href="/contact" target="self" class="theme-btn btn-style-one bg-blue"><span
                                class="btn-title">Vous recrutez ? Demandez plus d&#039;infos !</span></a>
                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <figure class="image-box wow fadeInLeft">
                        <img src="{{ asset('plugins/images/moteur-de-recherche-dv.jpg') }}"
                            alt="about">
                    </figure>
                    <!-- Count Employers -->
                    <div class="applicants-list app-list-2 wow fadeInUp">
                        <img src="{{ asset('plugins/images/rechercher-un-candidat-7.png') }}"
                            class="img-option" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->
    <div class=" p-0">
        <div class="auto-container">
            <div class="bravo-text text-box">

            </div>
        </div>
    </div>
    <style>
    .about-section-three {
        position: relative;
        padding: 50px 0;
        BACKGROUND-COLOR: #048B9A;
        MARGIN-BOTTOM: 50PX;
        margin-top: 50px;
    }

    .auto-container2 {
        position: static;
        max-width: 1310px;
        BACKGROUND-COLOR: #048B9A;
        padding: 30px 15px 15px;
        margin: 0 auto;
        width: 100%;
    }
    </style>
    <div class="about-section-three p-0">
        <div class="auto-container">
            <div class="fun-fact-section count-number">
                <div class="row">
                    <!--Column-->
                    <div class="counter-column col-lg-4 col-md-4 col-sm-12 wow fadeInUp">
                        <div class="count-box"><span class="count-text" data-speed="3000" data-stop="45">0</span>
                            entreprises</div>
                        <h4 class="counter-title"></h4>
                    </div>
                    <!--Column-->
                    <div class="counter-column col-lg-4 col-md-4 col-sm-12 wow fadeInUp">
                        <div class="count-box"><span class="count-text" data-speed="3000" data-stop="10500">0</span>
                            candidats</div>
                        <h4 class="counter-title"></h4>
                    </div>
                    <!--Column-->
                    <div class="counter-column col-lg-4 col-md-4 col-sm-12 wow fadeInUp">
                        <div class="count-box"><span class="count-text" data-speed="3000" data-stop="100">0</span>%
                            satisfaction</div>
                        <h4 class="counter-title"></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="steps-section pt-0">
        <div class="auto-container">
            <div class="row">
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <figure class="image"><img src="{{ asset('plugins/images/about-style-9.png') }}"
                                alt="">
                        </figure>
                        <!-- Count Employers -->
                        <div class="count-employers wow fadeInUp">
                        </div>
                    </div>
                </div>

                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInUp">
                        <div class="sec-title">
                            <h2 style="color: #ff8c00;">CANDIDATS, trouvez un emploi en 3 étapes</h2>
                            <center>
                                <div class="text">Rejoignez la communauté BIG PLACE et saisissez
                                    l&#039;opportunité de trouver l&#039;emploi de vos rêves !</div>
                            </center>
                            <ul class="steps-list">
                                <ul>
                                    <li><span class="count">1</span> Je m'inscris gratuitement en renseignant
                                        mes informations.</li>
                                    <li><span class="count">2</span> Afin d'avoir acc&egrave;s &agrave; toutes
                                        les fonctionnalit&eacute;s et d'&ecirc;tre visible par les recruteurs je
                                        t&eacute;l&eacute;charge mon CV.</li>
                                    <li><span class="count">3</span> Je profite pleinement de mon espace, je
                                        consulte les offres, postule et participe aux jobdatings !</li>
                                </ul>
                            </ul>
                            <p>
                                <center>
                                    <div class="btn-box">
                                        <a href="https://application.bigplace.fr/register-candidat"
                                            class="theme-btn btn-style-one"><span class="btn-title">Je
                                                m'inscris</span></a>
                                    </div>
                                </center>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="steps-section pt-0">
        <div class="auto-container">
            <div class="row">
                <div class="image-column col-lg-6 col-md-12 col-sm-12 order-2">
                    <div class="inner-column">
                        <figure class="image"><img
                                src="{{ asset('plugins/images/employeur-bigplace.png') }}" alt="">
                        </figure>
                        <!-- Count Employers -->
                        <div class="count-employers wow fadeInUp">
                        </div>
                    </div>
                </div>

                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column2 wow fadeInUp">
                        <div class="sec-title">
                            <h2 style="color: #ff8c00;">RECRUTEURS, trouvez vos talents en un clic !</h2>
                            <center>
                                <div class="text">Profitez de la solution de gestion des candidatures BIG PLACE
                                    pour recruter efficacement !</div>
                            </center>
                            <ul class="steps-list">
                                <ul class="list-style-one">
                                    <li><span class="count">1</span> Je renseigne les informations de mon
                                        entreprise.</li>
                                    <li><span class="count">2</span> Je choisis le plan qui me convient en
                                        fonction des besoins de l'entreprise ou je demande une
                                        d&eacute;monstration pour plus d'informations.</li>
                                    <li><span class="count">3&nbsp;</span>Je profite pleinement de l'outil et de
                                        toutes ses fonctionnalit&eacute;s, je poste des annonces et contacte les
                                        candidats !</li>
                                </ul>
                            </ul>

                            <p>
                                <center>
                                    <div class="btn-box">
                                        <a href="https://bigplace.fr/register-employeur"
                                            class="theme-btn btn-style-two bg-blue"><span class="btn-title">Je
                                                recrute !</span></a>
                                    </div>
                                </center>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- About Section 
<section class="about-section style-two">
    <div class="auto-container">
        <div class="row">
            <!-- Content Column 
            <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                <div class="inner-column wow fadeInLeft">
                    <div class="sec-title">
                        <h2>RECRUTEURS, trouvez vos talents en un clic !</h2>
                        <div class="text">Profitez de la solution de gestion des candidatures BIG PLACE pour recruter efficacement !</div>
                    </div>
                    <ul class="list-style-two">
                        <ul class="list-style-one">
<li><span class="count">1</span> Je renseigne les informations de mon entreprise.</li>
<li><span class="count">2</span> Je choisis le plan qui me convient en fonction des besoins de l'entreprise ou je demande une d&eacute;monstration pour plus d'informations.</li>
<li><span class="count">3&nbsp;</span>Je profite pleinement de l'outil et de toutes ses fonctionnalit&eacute;s, je poste des annonces et contacte les candidats !</li>
</ul>
                    </ul>
                    <a href="https://bigplace.fr/register-employeur" class="theme-btn btn-style-one lightbox-image">Je recrute !</a>
                </div>
            </div>

            <!-- Image Column 
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInRight">
                                            <figure class="image">
                            <img src="https://bigplace.fr/uploads/0000/1/2023/06/10/employeur-bigplace.png" alt="about">
                            <a href="https://bigplace.fr/register-employeur" class="play-btn lightbox-image" data-fancybox="images"><span class="flaticon-play-button-2 icon"></span></a>
                        </figure>
                                    </div>
            </div>
        </div>
        <!-- Fun Fact Section 
    </div>
</section>
<!-- End About Section -->
    <section class="call-to-action-two"
        style="background-image: url({{ asset('plugins/images/banner-layout-9.jpg') }}) !important;">
        <div class="auto-container">
            <div class="sec-title light text-center">
                <h2>Profitez d&#039;une expérience unique et inscrivez-vous gratuitement !</h2>
                <div class="text">De nombreuses entreprises et candidats nous font déjà confiance ! Alors
                    pourquoi pas vous ?</div>
            </div>

            <div class="btn-box">
                <a href="https://bigplace.fr/register-candidat" class="theme-btn btn-style-one">Je postule !</a>
                <a href="https://bigplace.fr/register-employeur" class="theme-btn btn-style-two">Je recrute
                    !</a>
            </div>
        </div>
    </section>
    <div class=" p-0">
        <div class="auto-container">
            <div class="bravo-text text-box">
                <h1 style="text-align:center;"><strong>Ils nous font confiance !</strong></h1>
            </div>
        </div>
    </div>
    <div class="list-brands  clients-section ">
        <div class="sponsors-outer">
            <!--Sponsors Carousel-->
            <ul class="sponsors-carousel owl-carousel owl-theme" data-items="7">
                <li class="slide-item">
                    <figure class="image-box">
                        <img class="img-fluid d-inline-block w-auto"
                            src="{{ asset('plugins/images/distritel.jpg') }}" alt="DISTRITEL">
                    </figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box">
                        <img class="img-fluid d-inline-block w-auto"
                            src="{{ asset('plugins/images/tryptic.jpg') }}" alt="TRYPTIC">
                    </figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box">
                        <img class="img-fluid d-inline-block w-auto"
                            src="{{ asset('plugins/images/18201.jpg') }}" alt="SUITE1820">
                    </figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box">
                        <img class="img-fluid d-inline-block w-auto"
                            src="{{ asset('plugins/images/crea.jpg') }}" alt="EasyDrop">
                    </figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box">
                        <img class="img-fluid d-inline-block w-auto"
                            src="{{ asset('plugins/images/expertsoft.jpg') }}" alt="Expersoft">
                    </figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box">
                        <a href="MVF Solutions"> <img class="img-fluid d-inline-block w-auto"
                                src="{{ asset('plugins/images/mvf1.png') }}" alt="">
                        </a>
                    </figure>
                </li>
                <li class="slide-item">
                    <figure class="image-box">
                        <img class="img-fluid d-inline-block w-auto"
                            src="{{ asset('plugins/images/tonton.jpg') }}" alt="Tonton J&#039;achète">
                    </figure>
                </li>
            </ul>
        </div>
    </div>
    <section class="jobseeker-section">
        <div class="outer-box">
            <div class="image-column">
                <figure class="image"><img src="{{ asset('plugins/images/place-de-recrutement.jpg') }}"
                        alt="">
                </figure>
            </div>
            <div class="content-column">
                <div class="inner-column wow fadeInUp">
                    <div class="sec-title">
                        <h1 style="color: #ff8c00;">Entreprises</h1>
                        <br>
                        <div class="text">
                            <p style="text-align: justify;">Profitez d&#039;un outil digital puissant et trouvez
                                vos talents efficacement ! Bénéficiez d&#039;une solution complète sans
                                engagement vous permettant de poster vos annonces sur plusieurs jobboards, de
                                suivre vos candidatures de manière simplifiée grâce au tableau de bord intuitif,
                                de profiter d&#039;une vitrine entreprise pour valoriser votre image de marque,
                                d&#039;utiliser notre moteur de recherche puissant faisant matcher les
                                candidatures selon vos besoins et de plein d&#039;autres fonctionnalités qui
                                vous attendent ! </p>
                        </div>
                        <br><a href="https://bigplace.fr/register-employeur" class="theme-btn btn-style-two ">Je
                            recrute !</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial-section style-two alternate"
        style="background-image: url({{ asset('plugins/images/testimonials-9.png') }});">
        <div class="auto-container">
            <div class="sec-title text-center light">
                <h2>Nos clients parlent de nous.</h2>
                <div class="text">Découvrez les témoignages de nos clients qui partagent leur expérience. Comme
                    eux ! rejoignez notre communauté de clients satisfaits.</div>
            </div>
            <div class="carousel-outer wow fadeInUp">
                <div class="testimonial-carousel-three owl-carousel owl-theme default-dots light">
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <h4 class="title">Un outil qui m&#039;a permis de recruter rapidement !</h4>
                            <div class="text">Le logiciel en ligne propose des fonctionnalités très pratiques
                                qui m&#039;ont permis de sélectionner plus rapidement et efficacement les
                                candidats ; je gagne du temps dans mon process de recrutement et c&#039;est ce
                                que je recherchais ! Bravo à Big place je recommande ! </div>
                            <div class="info-box">
                                <div class="thumb"><img
                                        src="{{ asset('plugins/images/18201-150.jpg') }}"
                                        alt="Khadija F."></div>
                                <h4 class="name">Khadija F.</h4>
                                <span class="designation">Fondatrice Suite 1820</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <h4 class="title">Une solution intuitive et une recherche simplifiée</h4>
                            <div class="text">La plateforme propose un outil exhaustif qui m&#039;a permis de
                                gérer mes candidatures facilement au travers d&#039;un tableau de bord assez
                                riche, je peux entrer en contact direct avec les postulants en leur proposant
                                des rendez-vous et faire évoluer les candidatures selon une organisation
                                simplifiée, je m&#039;y retrouve et c&#039;est plus clair pour moi ! Je
                                recommande vraiment la formule Big Place sans hésiter, gain de temps assuré !!!

                            </div>
                            <div class="info-box">
                                <div class="thumb"><img
                                        src="{{ asset('plugins/images/distritel-150.jpg') }}"
                                        alt="Franck D."></div>
                                <h4 class="name">Franck D.</h4>
                                <span class="designation">Responsable RH Distritel</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <h4 class="title"> Une plateforme qui facilite la communication avec les candidats
                            </h4>
                            <div class="text">J&#039;ai utilisé cette plateforme pour trouver de nouveaux
                                talents pour mon entreprise et je dois dire que j&#039;ai été impressionné par
                                ses fonctionnalités et sa convivialité. Pas besoin de formation pour
                                l&#039;utiliser.

                            </div>
                            <div class="info-box">
                                <div class="thumb"><img src="{{ asset('plugins/images/mvf.jpg') }}"
                                        alt="Pierre M."></div>
                                <h4 class="name">Pierre M.</h4>
                                <span class="designation">Responsable opérationnel</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="recruiter-section">
        <div class="outer-box">
            <div class="image-column">
                <figure class="image">
                    <img src="{{ asset('plugins/images/visio-recrutement.jpg') }}" alt="">
                </figure>
            </div>
            <div class="content-column">
                <div class="inner-column wow fadeInUp">
                    <div class="sec-title">
                        <h1 style="color: #ff8c00;">Candidats</h1>
                        <br>
                        <div class="text">
                            <p style="text-align: justify;">Rejoignez la communauté BIG PLACE et trouvez le job
                                qui vous correspond ! Gagnez du temps et utilisez notre solution gratuite vous
                                permettant d&#039;être visible par tous les recruteurs, de consulter les
                                informations sur les entreprises, de postuler et rentrer en contact directement
                                avec les recruteurs ! Soyez au fait des évènements et participez aux jobdatings
                                pour être sûr de ne rater aucune opportunité ! Enfin notre moteur de recherche
                                intelligent vous permet de faire matcher votre CV avec les postes qui vous
                                correspondent, alors n&#039;attendez plus et inscrivez-vous gratuitement !</p>
                        </div>
                        <br> <a href="https://bigplace.fr/register-candidat" class="theme-btn btn-style-one">Je
                            postule !</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial-section-two">
        <div class="container-fluid">
            <div class="testimonial-left"><img src="{{ asset('plugins/images/testimonial-left.png') }}"
                    alt=""></div>
            <div class="testimonial-right"><img src="{{ asset('plugins/images/testimonial-right.png') }}"
                    alt=""></div>
            <!-- Sec Title -->
            <div class="sec-title text-center">
                <h2>Rejoignez la communauté des &quot;Big placeurs&quot;</h2>
                <div class="text">Rejoignez les milliers de candidats et faites partie de la communauté BIG
                    PLACE pour trouver l&#039;emploi qui vous va !</div>
            </div>

            <div class="carousel-outer">
                <div class="testimonial-carousel owl-carousel owl-theme">
                    <div class="testimonial-block-two">
                        <div class="inner-box">
                            <div class="thumb"><img src="" alt="Nadège G."></div>
                            <h4 class="title">Secrétaire polyvalente</h4>
                            <div class="text">recherche CDI</div>
                            <div class="info-box">
                                <h4 class="name">Nadège G.</h4>
                                <span class="designation"></span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-block-two">
                        <div class="inner-box">
                            <div class="thumb"><img src="" alt="Laurent F."></div>
                            <h4 class="title">Responsable ADV</h4>
                            <div class="text">recherche CDI</div>
                            <div class="info-box">
                                <h4 class="name">Laurent F.</h4>
                                <span class="designation"></span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-block-two">
                        <div class="inner-box">
                            <div class="thumb"><img src="" alt="Anouar O."></div>
                            <h4 class="title">Ingénieur agronome</h4>
                            <div class="text">recherche CDI</div>
                            <div class="info-box">
                                <h4 class="name">Anouar O.</h4>
                                <span class="designation"></span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-block-two">
                        <div class="inner-box">
                            <div class="thumb"><img src="" alt="Melissa D."></div>
                            <h4 class="title">Opératrice de saisie</h4>
                            <div class="text">recherche CDD</div>
                            <div class="info-box">
                                <h4 class="name">Melissa D.</h4>
                                <span class="designation"></span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-block-two">
                        <div class="inner-box">
                            <div class="thumb"><img src="" alt="Mathias N."></div>
                            <h4 class="title">Commercial B to B</h4>
                            <div class="text">recherche CDI</div>
                            <div class="info-box">
                                <h4 class="name">Mathias N.</h4>
                                <span class="designation"></span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-block-two">
                        <div class="inner-box">
                            <div class="thumb"><img src="" alt="Maxime C."></div>
                            <h4 class="title">Conducteur VL</h4>
                            <div class="text">recherche CDI</div>
                            <div class="info-box">
                                <h4 class="name">Maxime C.</h4>
                                <span class="designation"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- News Section Two -->
    <section class="news-section-two">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Le mag de l&#039;emploi</h2>
                <div class="text">Restez informés des dernières actualités du monde de l&#039;emploi !</div>
            </div>

            <div class="row wow fadeInUp">
                <!-- News Block -->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <a href="https://bigplace.fr/news/gerer-son-stress">
                                <figure class="image">
                                    <img class=' lazy' data-src=https://bigplace.fr/uploads/demo/news/news-6.jpg
                                        alt='Gérer son stress quand on recherche un emploi'>
                                </figure>
                            </a>
                        </div>
                        <div class="lower-content">
                            <ul class="post-meta">
                                <li>21/06/2023</li>
                            </ul>
                            <h3><a href="https://bigplace.fr/news/gerer-son-stress">Gérer son stress quand on
                                    recherche un emploi</a></h3>
                        </div>
                    </div>
                </div>
                <!-- News Block -->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <a href="https://bigplace.fr/news/quelles-industries-dominent-le-monde-du-travail">
                                <figure class="image">
                                    <img class=' lazy' data-src=https://bigplace.fr/uploads/demo/news/news-5.jpg
                                        alt='Quelles Industries et métiers dominent le Marché du Travail ?'>
                                </figure>
                            </a>
                        </div>
                        <div class="lower-content">
                            <ul class="post-meta">
                                <li>21/06/2023</li>
                            </ul>
                            <h3><a href="https://bigplace.fr/news/quelles-industries-dominent-le-monde-du-travail">Quelles
                                    Industries et métiers dominent le Marché du Travail ?</a></h3>
                        </div>
                    </div>
                </div>
                <!-- News Block -->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <a
                                href="https://bigplace.fr/news/les-meilleures-pratiques-pour-ameliorer-le-processus-de-recrutement">
                                <figure class="image">
                                    <img class=' lazy' data-src=https://bigplace.fr/uploads/demo/news/news-4.jpg
                                        alt='Les meilleures pratiques pour améliorer le processus de recrutement'>
                                </figure>
                            </a>
                        </div>
                        <div class="lower-content">
                            <ul class="post-meta">
                                <li>21/06/2023</li>
                            </ul>
                            <h3><a
                                    href="https://bigplace.fr/news/les-meilleures-pratiques-pour-ameliorer-le-processus-de-recrutement">Les
                                    meilleures pratiques pour améliorer le processus de recrutement</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End News Section -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Compte créé.</h5>
                </div>
                <div class="modal-body">
                    <p>Votre compte a été créé avec succès.</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    // when doc is ready using js 
    $(document).ready(function() {
        // do something
        // check if the url got ?param1=user_register_success
        var urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('param1')) {
            $('#myModal').modal('show');
        }
    });

</script>
@endpush