<!DOCTYPE html>
<html lang="fr" class="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('plugins/images/logo.png') }}" />

    <title>Big Place</title>
    <meta name="description"
        content="Outil de Suivi des Candidatures. Big Place est un logiciel spécialement conçu pour suivre facilement chaque étape des recrutements à un seul et même endroit." />

    <meta property="og:url" content="https://bigplace.fr/page/deja-inscrit" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Bigplace" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bigplace">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">
    <link rel="canonical" href="https://bigplace.fr/page/deja-inscrit" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Noto+Sans+JP:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <link href="{{ asset('plugins/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Stylesheets -->

    <link href="{{ asset('plugins/css/font.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/css/app.css?_ver=1.2.3') }}" rel="stylesheet">


    <script>
    var superio = {
        url: 'https://bigplace.fr',
        url_root: 'https://bigplace.fr',
        booking_decimals: 2,
        thousand_separator: '.',
        decimal_separator: ',',
        currency_position: 'right_space',
        currency_symbol: '€',
        currency_rate: '0.902807',
        date_format: 'DD/MM/YYYY',
        map_provider: 'gmap',
        map_gmap_key: '',
        routes: {
            login: 'https://bigplace.fr/login',
            register: '/register',
            checkout: 'https://bigplace.fr/booking/doCheckout',
            applyJob: 'https://bigplace.fr/job/apply-job'
        },
        module: {
            job: '',
        },
        currentUser: 0,
        isAdmin: 0,
        rtl: 0,
        markAsRead: 'https://bigplace.fr/user/markAsRead',
        markAllAsRead: 'https://bigplace.fr/user/markAllAsRead',
        loadNotify: 'https://bigplace.fr/user/notifications',
        pusher_api_key: '9b894690e7e854880031',
        pusher_cluster: 'eu',
    };
    var i18n = {
        warning: "Warning",
        success: "Success",
        applied: "Déjà postulé",
        chooseACv: "Choisir un CV",
    };
    var daterangepickerLocale = {
        "applyLabel": "Appliquer",
        "cancelLabel": "Annuler",
        "fromLabel": "Du",
        "toLabel": "au",
        "customRangeLabel": "Personnalisé",
        "weekLabel": "W",
        "first_day_of_week": 1,
        "daysOfWeek": [
            "Su",
            "Mo",
            "Tu",
            "We",
            "Th",
            "Fr",
            "Sa"
        ],
        "monthNames": [
            "Janvier",
            "Février",
            "Mars",
            "Avril",
            "Mai",
            "Juin",
            "Juillet",
            "Août",
            "Septembre",
            "Octobre",
            "Novembre",
            "Décembre"
        ],
    };
    </script>
    <!-- Styles -->
    <style>
    :root {
        --main-color: #ff8c00
    }
    </style>

    <!-- <link href="https://bigplace.fr/custom-css" rel="stylesheet"> -->
    <link href="{{ asset('plugins/css/custom-css.css') }}" rel="stylesheet">

    <script src="//code.tidio.co/tzkeoku6ogisroezu2amei6mcqnb3tjm.js" async></script>

    @stack('styles')
</head>

<body data-anm=".anm" class="frontend-page page   ">

    <div class="bravo_wrap page-wrapper">
        <!-- Preloader -->

        <!-- Header Span -->
        <span class="header-span"></span>
        <!-- Main Header-->
        @include('includes.header')
        <!--End Main Header -->

        @yield('content')

        <!-- Main Footer -->
        @include('includes.footer')
        <!-- End Main Footer -->

        <div class="model bc-model" id="login">
            <!-- Login modal -->
            <div id="login-modal">
                <!-- Login Form -->
                <div class="login-form default-form">
                    <div class="form-inner">
                        <h3>Connectez-vous sur Big Place</h3>

                        <!--Login Form-->
                        <form method="post" class="bravo-form-login" action="/login">
                            <input type="hidden" name="redirect" value="">
                            @csrf
                            <div class="form-group">
                                <label>Adresse e-mail</label>
                                <input type="text" name="email" placeholder="Adresse e-mail" required>
                                
                            </div>

                            <div class="form-group">
                                <label>Mot de passe</label>
                                <input type="password" name="password" value="" placeholder="Mot de passe">
                            </div>

                            <div class="form-group">
                                <div class="field-outer">
                                    <div class="input-group checkboxes square">
                                        <input type="checkbox" name="remember" value="1" id="remember">
                                        <label for="remember" class="remember"><span class="custom-checkbox"></span> Se
                                            souvenir de moi</label>
                                    </div>
                                    <a href="/password/reset" class="pwd">Mot de passe oublié ?</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="invalid-feedback error error-email"></span>
                                <span class="invalid-feedback error error-password"></span>
                            </div>

                            <div class="form-group">
                                <button class="theme-btn btn-style-one" type="submit" name="log-in">Connexion
                                    <span class="spinner-grow spinner-grow-sm icon-loading" role="status"
                                        aria-hidden="true"></span>
                                </button>
                            </div>

                            <div class="bottom-box">
                                <div class="text">Vous n&#039;avez pas de compte ? <a
                                        href="/register"
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
                                <input type="hidden" name="_token" value="BPs5sUCbAnYJQtx3ixxnF9Ede4G44J2Yu2cghu4D">
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

                                function gotoUrl(url) {
                                    window.location.href = url
                                }
                                </script>
                                <form method="post" action="#">
                                    <div class="form-group">
                                        <div class="btn-box row">
                                            <div class="col-lg-6 col-md-12">
                                                <input class="checked" type="radio" name="type" id="checkbox1"
                                                    value="candidate" onclick="gotoUrl('/register-candidat');" checked />
                                                <label for="checkbox1" class="theme-btn btn-style-one d-flex align-items-center justify-content-center wrap px-5">
                                                    <i class="la la-user" style="padding-bottom: 12px;"></i> 
                                                    Candidat
                                                </label>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <input class="checked" type="radio" name="type" id="checkbox2"
                                                    value="employer" onclick="gotoUrl('/register-employeur');" />
                                                <label for="checkbox2" class="theme-btn btn-style-one d-flex align-items-center justify-content-center wrap px-5">
                                                    <i class="la la-briefcase" style="padding-bottom: 12px;"></i>
                                                    Employeur
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group" id="company-name" style="display: none; visibility: hidden">
                                        <label>Nom de l&#039;entreprise</label>
                                        <input type="text" name="company" placeholder="Nom de l&#039;entreprise"
                                            required>
                                        <span class="invalid-feedback error error-company_name"></span><br>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Prénom</label>
                                                <input type="text" class="form-control" name="first_name"
                                                    autocomplete="off" placeholder="Prénom">
                                                <i class="input-icon field-icon icofont-waiter-alt"></i>
                                                <span class="invalid-feedback error error-first_name"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input type="text" class="form-control" name="last_name"
                                                    autocomplete="off" placeholder="Nom">
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
                                        <input id="re-password-field" type="password" name="password_confirmation"
                                            value="" placeholder="Répétez votre mot de passe">
                                        <span class="invalid-feedback error error-password_confirmation"></span>
                                    </div>

                                    <div class="form-group">
                                        <button class="theme-btn btn-style-one " type="submit"
                                            name="Register">Inscription
                                            <span class="spinner-grow spinner-grow-sm icon-loading" role="status"
                                                aria-hidden="true"></span>
                                        </button>
                                    </div> -->

                                </form>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bc-alert-popup">
            <div class="message-box warning"></div>
        </div>

        <!-- <link rel="stylesheet" href="https://bigplace.fr/libs/flags/css/flag-icon.min.css"> -->
        <link rel="stylesheet" href="{{ asset('plugins/css/flags/css/flag-icon.min.css') }}">
        <!-- <script src="https://bigplace.fr/libs/lazy-load/intersection-observer.js"></script> -->
        <script src="{{ asset('plugins/js/libs/lazy-load/intersection-observer.js') }}"></script>
        <!-- <script async src="https://bigplace.fr/libs/lazy-load/lazyload.min.js"></script> -->
        <script src="{{ asset('plugins/js/libs/lazy-load/lazyload.min.js') }}"></script>
        <script>
        // Set the options to make LazyLoad self-initialize
        window.lazyLoadOptions = {
            elements_selector: ".lazy",
            // ... more custom settings?
        };

        // Listen to the initialization event and get the instance of LazyLoad
        window.addEventListener('LazyLoad::Initialized', function(event) {
            window.lazyLoadInstance = event.detail.instance;
        }, false);
        </script>

        <script src="{{ asset('plugins/js/libs/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('plugins/js/libs/jquery-migrate/jquery-migrate.min.js') }}"></script>
        <script src="{{ asset('plugins/js/libs/header.js') }}"></script>
        <script>
        $(document).on('ready', function() {
            $.superioHeader.init($('#header'));
        });
        </script>

        <script src="{{ asset('plugins/js/libs/lodash.min.js') }}"></script>
        <script src="{{ asset('plugins/js/libs/vue/vue.min.js') }}"></script>
        <script src="{{ asset('plugins/js/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('plugins/js/libs/bootbox/bootbox.min.js') }}"></script>
        <script src="{{ asset('plugins/js/libs/tinymce/js/tinymce/tinymce.min.js') }}"></script>


        <!-- <script src="https://bigplace.fr/js/functions.js?_ver=1.2.3"></script> -->
        <script src="{{ asset('plugins/js/functions.js') }}"></script>

        <script src="{{ asset('plugins/js/popper.min.js') }}"></script>
        <script src="{{ asset('plugins/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('plugins/js/chosen.min.js') }}"></script>

        <script src="{{ asset('plugins/js/libs/select2/js/select2.min.js') }}"></script>

        <script src="{{ asset('plugins/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('plugins/js/jquery.fancybox.js') }}"></script>
        <script src="{{ asset('plugins/js/jquery.modal.min.js') }}"></script>
        <script src="{{ asset('plugins/js/mmenu.polyfills.js') }}"></script>
        <script src="{{ asset('plugins/js/mmenu.js') }}"></script>
        <script src="{{ asset('plugins/js/appear.js') }}"></script>
        <script src="{{ asset('plugins/js/anm.min.js') }}"></script>
        <script src="{{ asset('plugins/js/owl.js') }}"></script>
        <script src="{{ asset('plugins/js/wow.js') }}"></script>
        <script src="{{ asset('plugins/js/script.js?_ver=1.2.3') }}"></script>

        <script src="{{ asset('plugins/js/libs/pusher.min.js') }}"></script>
        <script src="{{ asset('plugins/js/home.js?_ver=1.2.3') }}"></script>


    </div>
    <script>
    jQuery(document).ready(function($) {
        setTimeout(function() {
            $(".trans--grow").addClass("grow");
        }, 275);
    });
    </script>

    @stack('scripts')


</body>

</html>