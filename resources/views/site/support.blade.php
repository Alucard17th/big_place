@extends('layouts.app')

@section('content')
<div class="page-template-content page-support-client">
    <section class="page-title " style="background-color: ">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Joindre notre équipe</h1>
                <ul class="page-breadcrumb">
                    <li><a href="https://bigplace.fr">Accueil</a></li>
                    <li>Contact</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- App Section -->
    <section class="app-section app-download-block">
        <div class="auto-container">
            <div class="row">
                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <figure class="image wow fadeInLeft">
                        <img src="https://bigplace.fr/uploads/0000/1/2023/06/02/design-sans-titre-12.jpg" alt="app">
                    </figure>
                </div>

                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column wow fadeInRight">
                        <div class="sec-title">
                            <span class="sub-title">SUPPORT CLIENT BIG PLACE</span>
                            <h2>Besoin d'assistance ?</h2>
                            <div class="text">Contactez notre équipe via le Tchat ou via le formulaire de
                                contact en cliquant sur l'un des choix ci-dessous :<br>
                                <br>
                            </div>
                        </div>
                        <div class="download-btn">

                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="https://chatting.page/supportclientbigplace" target="_blank"><img
                                    src="https://bigplace.fr/uploads/0000/22/2023/06/08/chatbot.png" alt="button 1"></a>
                            <a href="https://ticket.bigplace.fr/"><img
                                    src="https://bigplace.fr/uploads/0000/22/2023/06/08/icone-formulaire-de-contact.png"
                                    alt="button 1"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End App Section -->
    <section class="process-section pt-0">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Un accompagnement technique</h2>
                <div class="text">Comment se déroule le processus d&#039;assistance chez BIG PLACE ?</div>
            </div>

            <div class="row wow fadeInUp">
                <div class="process-block col-lg-4 col-md-6 col-sm-12">
                    <div class="icon-box"><img
                            src="https://bigplace.fr/uploads/0000/22/2023/06/08/formulaire-de-contact-2.png"
                            alt="1. Je renseigne le formulaire de contact en expliquant la problématique"></div>
                    <h4>1. Je renseigne le formulaire de contact en expliquant la problématique</h4>
                </div>
                <div class="process-block col-lg-4 col-md-6 col-sm-12">
                    <div class="icon-box"><img src="https://bigplace.fr/uploads/0000/22/2023/06/08/validaton-email.png"
                            alt="2. Je reçois une validation de prise en charge par email avec un numéro de ticket">
                    </div>
                    <h4>2. Je reçois une validation de prise en charge par email avec un numéro de ticket</h4>
                </div>
                <div class="process-block col-lg-4 col-md-6 col-sm-12">
                    <div class="icon-box"><img src="https://bigplace.fr/uploads/0000/22/2023/06/08/phone-operator.png"
                            alt="3. Je suis recontacté(e) par un technicien pour répondre à mes questions">
                    </div>
                    <h4>3. Je suis recontacté(e) par un technicien pour répondre à mes questions</h4>
                </div>
            </div>
        </div>
    </section>
    <div class=" p-0">
        <div class="auto-container">
            <div class="bravo-text text-box">
                <p><br><br></p>
            </div>
        </div>
    </div>
    <div class="newsletter-form wow fadeInUp style-eight">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Souscrire à notre Newsletter</h2>
                <div class="text">Soyez informé(e) des offres, bon plans et actualités du moment !</div>
            </div>
            <form method="post" action="https://bigplace.fr/newsletter/subscribe" class="bravo-subscribe-form">
                <input type="hidden" name="_token" value="oAUhh7dRGQbFVk4mPcawOdRptX4i8ljQY43bJ0xC">
                <div class="form-group">
                    <div class="form-mess"></div>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="email" value="" placeholder="Votre email" required>
                    <button type="submit" id="subscribe-newslatters" class="theme-btn btn-style-one">Souscrire
                        <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection