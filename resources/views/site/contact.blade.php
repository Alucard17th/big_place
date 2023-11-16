@extends('layouts.app')

@section('content')
<div id="bravo_content-wrapper">
    <div class="bravo-contact-block">
        <div class="iframe_map map-section">
            <iframe src="https://application.bigplace.fr/public/images/professionnels.jpg" name="idFrame" id="idFrame"
                width="100%" height="500" allowtransparency="true">Votre naviguateur ne peut pas
                afficher ce cadre.</iframe>
        </div>

        <div class="contact-section">
            <div class="auto-container">
                <div class="upper-box">
                    <div class="row">
                        <div class="contact-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <span class="icon"><img
                                        src="https://bigplace.fr/uploads/0000/22/2023/06/08/placeholder-64px.png"
                                        alt="Nous situer"></span>
                                <h3 class="specialcontact">Nous situer</h3>
                                <h4>8 bis rue Abel,
                                    75012 Paris</h4>
                            </div>
                        </div>
                        <div class="contact-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <span class="icon"><img
                                        src="https://bigplace.fr/uploads/0000/22/2023/06/08/telephone-call-64px.png"
                                        alt="Nous appeler"></span>
                                <h3 class="specialcontact">Nous appeler</h3>
                                <h4><a href="tel:+33612378777" class="phone">06.12.37.87.77</a></h4>
                            </div>
                        </div>
                        <div class="contact-block col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <span class="icon"><img
                                        src="https://bigplace.fr/uploads/0000/22/2023/06/08/email-64px.png"
                                        alt="Nous écrire"></span>
                                <h3 class="specialcontact">Nous écrire</h3>
                                <h4><a href="mailto:contact@bigplace.fr">contact@bigplace.fr</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="auto-container">
                    <div class="content-box">
                        <div class="job-search-form2 wow fadeInUp">


                            <div class="contact-form default-form">
                                <!-- <h3>Transmettre une demande</h3>-->
                                <center>
                                    <p style="font-size: 36px" color="#fff">
                                        <font color="#fff">Transmettre une demande</font>
                                    </p></span>
                                    <form method="post" action="https://bigplace.fr/contact/store"
                                        class="bravo-contact-block-form">
                                        <input type="hidden" name="_token"
                                            value="oAUhh7dRGQbFVk4mPcawOdRptX4i8ljQY43bJ0xC">
                                        <div style="display: none;">
                                            <input type="hidden" name="g-recaptcha-response" value="">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <div class="response"></div>
                                            </div>

                                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                                <label>Votre nom</label>
                                                <input type="text" name="name" class="username" placeholder="Votre nom*"
                                                    required>
                                            </div>

                                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                                <label>Nom de l'entreprise</label>
                                                <input type="text" name="name" class="username" placeholder="Entreprise"
                                                    required>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <label>Votre E-mail</label>
                                                <input type="email" name="email" class="email"
                                                    placeholder="Votre E-mail*" required>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <label>Sujet</label>
                                                <input type="text" name="subject" class="subject" placeholder="Sujet *"
                                                    required>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                <label>Votre message</label>
                                                <div class="js-form-message">
                                                    <div class="input-group">
                                                        <textarea name="message" placeholder="Écrivez votre message..."
                                                            required=""></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group m-0">
                                                <button type="submit" class="theme-btn btn-style-one">
                                                    Envoyer le message
                                                    <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                                </button>
                                            </div>
                                            <div class="col-sm-12 mt-3">
                                                <div class="form-mess"></div>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- bloc annonce pour recruteurs -->
        <div class="call-to-action style-two">
            <div class="auto-container">
                <div class="outer-box">
                    <div class="content-column">
                        <div class="sec-title">
                            <h2>Vous souhaitez recruter ?</h2>
                            <div class="text">Face aux logiciels de recrutement génériques qui s’adressent à
                                tout le monde, <br>Big Place apporte une réponse spécifique pour chaque
                                recruteur.</div>
                            <a href="/register-employeur" class="theme-btn btn-style-one bg-blue"><span
                                    class="btn-title">Je recrute maintenant !</span></a>
                        </div>
                    </div>

                    <div class="image-column"
                        style="background-image: url(https://bigplace.fr/uploads/0000/1/2023/06/08/cv.png);">
                    </div>
                </div>
            </div>
            <br><br>
            <!-- bloc annonce pour candidats -->
            <div class="call-to-action style-two">
                <div class="auto-container">
                    <div class="outer-box">
                        <div class="content-column">
                            <div class="sec-title">
                                <h2 style="color:#0367d9">Vous souhaitez postuler ?</h2>
                                <div class="text">Face aux nombreuses plateformes de recherche d'emploi qui
                                    s'adressent à tous <br>les candidats, Big Place offre une réponse
                                    personnalisée à chaque chercheur d'emploi.</div>
                                <a href="https://bigplace.fr/register-candidat"
                                    class="theme-btn btn-style-two bg-blue"><span class="btn-title">Je postule
                                        ici !</span></a>
                            </div>
                        </div>

                        <div class="image-column"
                            style="background-image: url('https://bigplace.fr/uploads/0000/1/2023/06/09/candidats.png');">
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer style-two ">
        <div class="auto-container">
            <!--Widgets Section-->
            <div class="widgets-section wow fadeInUp">
                <div class="row">
                    <div class="big-column col-xl-4 col-lg-3 col-md-12">
                        <div class="footer-column about-widget">
                            <div class="logo">
                                <a href="https://bigplace.fr">
                                    <img src="{{ asset('plugins/images/logo.png') }}" alt="logo footer">
                                </a>
                            </div>
                            <p class="phone-num"><span>Contactez-nous</span><a href="tel:+33612378777"> Tél. :
                                    06 12 37 87 77</a></p>
                            <p class="address">8 bis rue Abel, 75012 Paris<br>
                                <a href="mailto:contact@bigplace.fr" class="email"> Email :
                                    contact@bigplace.fr</a>
                            </p>
                        </div>
                    </div>
                    <div class="big-column col-xl-8 col-lg-9 col-md-12">
                        <div class="row">
                            <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
                                    <h4 class="widget-title">A propos</h4>
                                    <div class="widget-content">
                                        <ul class="list">
                                            <li><a href="https://bigplace.fr/page/a-propos">Notre mission</a>
                                            </li>


                                            <li><a href="https://bigplace.fr/page/actualites">Le Mag</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
                                    <h4 class="widget-title">Entreprises</h4>
                                    <div class="widget-content">
                                        <ul class="list">
                                            <li><a href="https://bigplace.fr/register-employeur">Inscription</a>
                                            </li>
                                            <li><a href="https://bigplace.fr/login">Connexion</a></li>
                                            <li><a href="https://bigplace.fr/page/parrainage">Parrainage</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
                                    <h4 class="widget-title">Candidats</h4>
                                    <div class="widget-content">
                                        <ul class="list">
                                            <li><a href="https://bigplace.fr/register-candidat">Inscription</a>
                                            </li>
                                            <li><a href="https://bigplace.fr/login">Connexion</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
                                    <h4 class="widget-title">Informations</h4>
                                    <div class="widget-content">
                                        <ul class="list">

                                            <li><a href="https://bigplace.fr/public/page/termes-and-conditions">Conditions
                                                    générales</a></li>
                                            <li><a href="https://bigplace.fr/public/page/politique-cookies">Politique
                                                    de cookies</a></li>
                                            <li><a href="https://bigplace.fr/public/page/rgpd">RGPD</a></li>
                                            <li><a href="/page/plan-du-site">Plan du site</a></li>
                                            <li><a href="https://bigplace.fr/page/faq">FAQ</a></li>
                                            <li><a href="https://bigplace.fr/page/support-client">Support
                                                    client</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="newsletter-form wow fadeInUp style-eight animated"
            style="visibility: visible; animation-name: fadeInUp;">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <h2>S'inscrire à la Newsletter</h2>
                    <div class="text">Recevez toutes les actualités du monde de l'emploi<br> et restez
                        informé(e)s</div>
                </div>
                <form method="post" action="https://application.bigplace.fr/newsletter/subscribe"
                    class="bravo-subscribe-form">
                    <input type="hidden" name="_token" value="hWAN7zDNEv4DQBcLMq2gXRIWwB8CsmUe5vNAqNss">
                    <div class="form-group">
                        <div class="form-mess"></div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="email" value="" placeholder="Votre email" required="">
                        <button type="submit" id="subscribe-newslatters" class="theme-btn btn-style-one">S'inscrire
                            <span class="spinner-grow spinner-grow-sm icon-loading" role="status"
                                aria-hidden="true"></span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
        <!--Bottom-->
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="outer-box">



                    <div class="copyright-text">
                        <h5>© 2023 <a href="/public/page/termes-and-conditions">BigPlace</a>. Tous droits
                            réservés</h5>
                    </div>
                    <div class="social-links">
                        <a href="https://www.instagram.com/bigplace.fr/" target="_blank" rel="noreferrer noopener"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/bigplace/" target="_blank" rel="noreferrer noopener"><i
                                class="fab fa-linkedin-in"></i></a>
                        <a href="https://www.facebook.com/Bigplace.fr" target="_blank" rel="noreferrer noopener"><i
                                class="fab fa-facebook-f"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll To Top -->
        <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span>
        </div>
    </footer>
    <!-- End Main Footer -->

    <div class="model bc-model" id="login">
        <!-- Login modal -->
        <div id="login-modal">
            <!-- Login Form -->
            <div class="login-form default-form">
                <div class="form-inner">
                    <h3>Connectez-vous sur Big Place</h3>

                    <!--Login Form-->
                    <form method="post" class="bravo-form-login" action="https://bigplace.fr/login">
                        <input type="hidden" name="redirect" value="">
                        <input type="hidden" name="_token" value="oAUhh7dRGQbFVk4mPcawOdRptX4i8ljQY43bJ0xC">
                        <div class="form-group">
                            <label>Adresse e-mail</label>
                            <input type="text" name="email" placeholder="Adresse e-mail" required>
                            <span class="invalid-feedback error error-email"></span>
                        </div>

                        <div class="form-group">
                            <label>Mot de passe</label>
                            <input type="password" name="password" value="" placeholder="Mot de passe">
                            <span class="invalid-feedback error error-password"></span>
                        </div>

                        <div class="form-group">
                            <div class="field-outer">
                                <div class="input-group checkboxes square">
                                    <input type="checkbox" name="remember" value="1" id="remember">
                                    <label for="remember" class="remember"><span class="custom-checkbox"></span>
                                        Se souvenir de moi</label>
                                </div>
                                <a href="https://bigplace.fr/password/reset" class="pwd">Mot de passe oublié
                                    ?</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="theme-btn btn-style-one" type="submit" name="log-in">Connexion
                                <span class="spinner-grow spinner-grow-sm icon-loading" role="status"
                                    aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="bottom-box">
                            <div class="text">Vous n&#039;avez pas de compte ? <a href="https://bigplace.fr/register"
                                    class="bc-call-modal signup">Inscrivez-vous</a></div>
                        </div>

                    </form>
                </div>
            </div>
            <!--End Login Form -->
        </div>
        <!-- End Login Module -->
    </div>

    <div class="modal fade login" id="register">
        <div id="login-modal">
            <div class="login-form default-form">
                <div class="form-inner">
                    <div class="form-inner">
                        <h3>
                            <center><strong>
                                    <font color="#ff8c00">Créez un compte sur Big Place</font>
                                </strong></center>
                        </h3>
                        <form class="form bravo-form-register" method="post">
                            <input type="hidden" name="_token" value="oAUhh7dRGQbFVk4mPcawOdRptX4i8ljQY43bJ0xC">
                            <style>
                            .bravo-form-register input.checked:checked+.theme-btn {
                                background-color: #1967D2;
                                color: #FFF;
                            }
                            </style>
                            <script>
                            function test() {
                                document.getElementById("company-name").style.display = "inline";
                                document.getElementById("company-name").style.visibility = "visible";
                            }

                            function teste() {
                                document.getElementById("company-name").style.display = "inline";
                                document.getElementById("company-name").style.visibility = "hidden";
                            }
                            </script>
                            <form method="post" action="#">
                                <div class="form-group">
                                    <div class="btn-box row">
                                        <div class="col-lg-6 col-md-12">
                                            <input class="checked" type="radio" name="type" id="checkbox1"
                                                value="candidate" onclick="teste();" checked />
                                            <label for="checkbox1" class="theme-btn btn-style-one"><i
                                                    class="la la-user"></i> Candidat</label>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <input class="checked" type="radio" name="type" id="checkbox2"
                                                value="employer" onclick="test();" />
                                            <label for="checkbox2" class="theme-btn btn-style-one"><i
                                                    class="la la-briefcase"></i> Employeur</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" id="company-name" style="display: none; visibility: hidden">
                                    <label>Nom de l&#039;entreprise</label>
                                    <input type="text" name="company" placeholder="Nom de l&#039;entreprise" required>
                                    <span class="invalid-feedback error error-company_name"></span><br>
                                </div>

                                <div class="row form-group">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Prénom</label>
                                            <input type="text" class="form-control" name="first_name" autocomplete="off"
                                                placeholder="Prénom">
                                            <i class="input-icon field-icon icofont-waiter-alt"></i>
                                            <span class="invalid-feedback error error-first_name"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input type="text" class="form-control" name="last_name" autocomplete="off"
                                                placeholder="Nom">
                                            <i class="input-icon field-icon icofont-waiter-alt"></i>
                                            <span class="invalid-feedback error error-last_name"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Adresse e-mail</label>
                                    <input type="email" name="email" placeholder="Adresse e-mail" required>
                                    <span class="invalid-feedback error error-email"></span>
                                </div>

                                <div class="form-group">
                                    <label>Numéro de téléphone</label>
                                    <input type="text" name="phone" placeholder="Numéro de téléphone" required>
                                    <span class="invalid-feedback error error-phone"></span>
                                </div>

                                <div class="form-group">
                                    <label>Mot de passe</label>
                                    <input id="password-field" type="password" name="password" value=""
                                        placeholder="Mot de passe">
                                    <span class="invalid-feedback error error-password"></span>
                                </div>
                                <div class="form-group">
                                    <label>Répétez votre mot de passe</label>
                                    <input id="re-password-field" type="password" name="password_confirmation" value=""
                                        placeholder="Répétez votre mot de passe">
                                    <span class="invalid-feedback error error-password_confirmation"></span>
                                </div>


                                <div class="form-group">
                                    <button class="theme-btn btn-style-one " type="submit" name="Register">Inscription
                                        <span class="spinner-grow spinner-grow-sm icon-loading" role="status"
                                            aria-hidden="true"></span>
                                    </button>
                                </div>
                            </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection