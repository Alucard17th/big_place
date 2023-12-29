<!DOCTYPE html>
<html lang="fr" class="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="aVo9Gw6vkpD9fX3OmfuBxxfZwLM1t7RGudMqypcr">
    <link rel="icon" type="image/png" href="{{ asset('plugins/images/logo.png') }}" />

    <title>Tableau de bord - Big Place</title>
    <meta name="description"
        content="Outil de Suivi des Candidatures. Big Place est un logiciel spécialement conçu pour suivre facilement chaque étape des recrutements à un seul et même endroit." />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Noto+Sans+JP:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <!-- <link rel="stylesheet" type="text/css" href="https://bigplace.fr/libs/daterange/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="https://bigplace.fr/libs/select2/css/select2.min.css">
    <link href="https://bigplace.fr/libs/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="https://bigplace.fr/libs/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="https://bigplace.fr/dist/frontend/css/notification.css" rel="newest stylesheet"> -->

    <!-- Stylesheets -->
    <link href="{{ asset('plugins/css/font.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/css/app.css?_ver=1.2.3') }}" rel="stylesheet">
   
    <!-- <link href="https://bigplace.fr/dist/frontend/module/user/css/user.css" rel="stylesheet"> -->

    <script>
    var superio = {
        url: 'http://127.0.0.1:8000',
        url_root: 'http://127.0.0.1:8000',
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
            login: 'http://127.0.0.1:8000/login',
            register: 'http://127.0.0.1:8000/register',
            checkout: 'http://127.0.0.1:8000/booking/doCheckout',
            applyJob: 'http://127.0.0.1:8000/job/apply-job'
        },
        module: {
            job: '',
        },
        currentUser: 75,
        isAdmin: 0,
        rtl: 0,
        markAsRead: 'http://127.0.0.1:8000/user/markAsRead',
        markAllAsRead: 'http://127.0.0.1:8000/user/markAllAsRead',
        loadNotify: 'http://127.0.0.1:8000/user/notifications',
        pusher_api_key: '9b894690e7e854880031',
        pusher_cluster: 'eu',
    };
    var i18n = {
        warning: "Warning",
        success: "Success",
        applied: "Déjà postulé",
        chooseACv: "Choisir un CV",
        confirm_delete: "Vous souhaitez supprimer ?",
        default_cv_del: "Ce CV est par défaut, vous ne pouvez le supprimer",
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

    <link href="{{ asset('plugins/css/custom-css.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/css/owl.carousel.css') }}" rel="stylesheet">

    <script src="//code.tidio.co/tzkeoku6ogisroezu2amei6mcqnb3tjm.js" async></script>

    <link href="https://cdn.datatables.net/v/bs4/dt-1.13.8/datatables.min.css" rel="stylesheet">
    
    @stack('styles')

</head>

<body data-anm=".anm" class="frontend-page user_wrap">
    <div class="page-wrapper dashboard mm-page mm-slideout bravo_wrap">
        <!-- Preloader -->
        <!-- Header Span -->
        <span class="header-span"></span>
        <!-- Main Header-->
        <header class="main-header normal header-shaddow fixed-header" style="position: fixed;">
            <!-- Main box -->
            <div class="main-box">
                <!--Nav Outer -->
                <div class="nav-outer">
                    <div class="logo-box">
                        <div class="logo">
                            <a href="/">
                                <img src="{{ asset('plugins/images/logo.png') }}" alt="Big Place">
                            </a>
                        </div>
                    </div>

                    <nav class="nav main-menu">
                        <ul class="navigation" id="navbar">
                            <li class=" depth-0"><a target="" href="/">Accueil</a></li>
                            <li class=" depth-0"><a target="" href="/a-propos">A propos</a></li>
                            <li class=" depth-0"><a target="" href="/parrainage">Parrainage</a>
                            </li>
                            <li class=" dropdown depth-0"><a target="" href="#">Informations <i
                                        class="caret flaticon-down-arrow"></i></a>
                                <ul class="children-menu menu-dropdown">
                                    <li class=" depth-1"><a target="" href="/faq">F.A.Q</a></li>
                                    <li class=" depth-1"><a target="" href="/mag">Le
                                            mag</a></li>
                                    <li class=" depth-1"><a target=""
                                            href="/support">Support client</a></li>
                                </ul>
                            </li>
                            <li class=" depth-0"><a target="" href="/contact">Contact </a></li>
                        </ul>
                    </nav>
                    <!-- Main Menu End-->
                </div>

                <div class="outer-box">
                    <ul class="multi-lang">
                    </ul>
                    <!--
                            <a href="https://bigplace.fr/user/bookmark" class="menu-btn wishlist-button">
                                            <span class="count wishlist_count text-center">0</span>
                                        <span class="icon la la-bookmark-o"></span>
                </a>
                        -->
                    <div class="dropdown-notifications dropdown p-0">
                        <a href="#" data-bs-toggle="dropdown" class="menu-btn notify-button">
                            <span class="count wishlist_count text-center">0</span>
                            <i class="icon la la-bell"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <div class="dropdown-toolbar">
                                <h3 class="dropdown-toolbar-title fs-16 mb-0">Notifications (<span
                                        class="notify-count">0</span>)</h3>
                                <div class="dropdown-toolbar-actions">
                                    <a href="#" class="markAllAsRead fs-14">Tout marquer comme lu</a>
                                </div>
                            </div>
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action">
                                    <span class="fs-14">Aucune notification pour le moment</span>
                                </a>
                            </div>
                            <div class="dropdown-footer">
                                <a class="btn btn-primary" href="https://bigplace.fr/user/notifications">Voir plus</a>
                            </div>
                        </ul>
                    </div>
                    <!-- Login/Register -->
                    <div class="btn-box">
                        <div class="login-item dropmenu-right dropdown show">
                            <a href="#" class="is_login dropdown-toggle" id="dropdownMenuUser" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <!-- <img class="avatar" src="https://bigplace.fr/images/avatar.png" alt="{{auth()->user()->name}}"> -->
                                <div class="menu-hr d-flex align-items-end justify-content-right flex-column">
                                    <span class="bord-name">Tableau de bord</span>
                                    <span class="full-name">{{auth()->user()->name}}</span>
                                </div>
                                <i class="flaticon-down-arrow"></i>
                            </a>
                            <ul class="dropdown-menu text-left" aria-labelledby="dropdownMenuUser">
                                <li class="menu-hr"><a href="https://bigplace.fr/user/dashboard">Tableau de bord</a>
                                </li>

                                <li class="dropdown-divider"></li>
                                <li class="menu-hr"><a href="/compte-administrateur#change-password">Changer
                                        le mot de passe</a></li>

                                <li class="dropdown-divider"></li>
                                <li class="menu-hr">
                                    <a href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <font color="#0146A6"> Se déconnecter</font>
                                    </a>
                                </li>
                            </ul>
                            <form id="logout-form" action="/logout" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Header -->
            <div class="mobile-header">
                <div class="logo">
                    <a href="https://bigplace.fr">
                        <img src="{{ asset('plugins/images/logo.png') }}" alt="Big Place">
                    </a>
                </div>

                <!--Nav Box-->
                <div class="nav-outer clearfix">

                    <div class="outer-box">

                        <div class="dropdown-notifications dropdown p-0">
                            <a href="#" data-bs-toggle="dropdown" class="menu-btn notify-button">
                                <span class="count wishlist_count text-center">0</span>
                                <i class="icon la la-bell"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <div class="dropdown-toolbar">
                                    <h3 class="dropdown-toolbar-title fs-16 mb-0">Notifications (<span
                                            class="notify-count">0</span>)</h3>
                                    <div class="dropdown-toolbar-actions">
                                        <a href="#" class="markAllAsRead fs-14">Tout marquer comme lu</a>
                                    </div>
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <span class="fs-14">Aucune notification pour le moment</span>
                                    </a>
                                </div>
                                <div class="dropdown-footer">
                                    <a class="btn btn-primary" href="https://bigplace.fr/user/notifications">Voir
                                        plus</a>
                                </div>
                            </ul>
                        </div>
                        <!-- Login/Register -->
                        <div class="login-box">

                            <a href="#" class="is_login dropdown-toggle" id="dropdownMenuUser" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img class="avatar" src="https://bigplace.fr/images/avatar.png" alt="Blaze Juarez">
                            </a>
                            <ul class="dropdown-menu text-left" aria-labelledby="dropdownMenuUser">
                                <li class="menu-hr"><a href="https://bigplace.fr/user/dashboard">Tableau de bord</a>
                                </li>

                                <li class="dropdown-divider"></li>
                                <li class="menu-hr"><a href="https://bigplace.fr/user/my-plan">Mes abonnements</a></li>
                                <li class="menu-hr"><a href="https://bigplace.fr/user/my-contact">Mes contacts</a></li>
                                <li class="menu-hr"><a href="https://bigplace.fr/user/profile/change-password">Changer
                                        le mot de passe</a></li>

                                <li class="dropdown-divider"></li>
                                <li class="menu-hr">
                                    <a href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <font color="#0146A6"> Se déconnecter</font>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <a href="#nav-mobile" class="mobile-nav-toggler"><span class="flaticon-menu-1"></span></a>
                    </div>
                </div>
            </div>

            <!-- Mobile Nav -->
            <div id="nav-mobile"></div>
        </header>
        <!--End Main Header -->


        <!-- Sidebar Backdrop -->
        <div class="sidebar-backdrop"></div>

        @yield('content')

        <div class="copyright-text">
            <p>
            <h5>© 2023 <a href="/public/page/termes-and-conditions">BigPlace</a>. Tous droits réservés</h5>
            </p>
        </div>
        
        @role('candidat')
            @include('includes.candidat-sidebar')
        @else
            @include('includes.recruiter-sidebar')
        @endrole

       
        <link rel="stylesheet" href="{{ asset('plugins/css/flags/css/flag-icon.min.css') }}">

        <script src="{{ asset('plugins/js/libs/lazy-load/intersection-observer.js') }}"></script>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <script src="{{ asset('plugins/js/libs/jquery-migrate/jquery-migrate.min.js') }}"></script>
        <script src="{{ asset('plugins/js/libs/header.js') }}"></script>


        <script>
        $(document).on('ready', function() {
            $.superioHeader.init($('#header'));
        });
        </script>
        <script src="{{ asset('plugins/js/libs/vue/vue.min.js') }}"></script>
        <script src="{{ asset('plugins/js/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('plugins/js/libs/bootbox/bootbox.min.js') }}"></script>
        <script src="{{ asset('plugins/js/libs/tinymce/js/tinymce/tinymce.min.js') }}"></script>

        <script src="{{ asset('plugins/js/browser.js?_ver=1.2.3') }}"></script>
        <script src="{{ asset('plugins/js/libs/lodash.min.js') }}"></script>
        <script src="{{ asset('plugins/js/popper.min.js') }}"></script>
        <script src="{{ asset('plugins/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('plugins/js/chosen.min.js') }}"></script>

        <script src="{{ asset('plugins/js/libs/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('plugins/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('plugins/js/jquery.fancybox.js') }}"></script>
        <script src="{{ asset('plugins/js/mmenu.polyfills.js') }}"></script>

        <script src="{{ asset('plugins/js/mmenu.js') }}"></script>
        <script src="{{ asset('plugins/js/appear.js') }}"></script>
        <script src="{{ asset('plugins/js/anm.min.js') }}"></script>
        <script src="{{ asset('plugins/js/owl.js') }}"></script>
        <script src="{{ asset('plugins/js/wow.js') }}"></script>
        <script src="{{ asset('plugins/js/script.js') }}?_ver=1.2.3"></script>

        <script src="{{ asset('plugins/js/libs/pusher.min.js') }}"></script>
        <script src="{{ asset('plugins/js/home.js') }}?_ver=1.2.3"></script>

        <script src="{{ asset('plugins/js/libs/chart_js/Chart.min.js') }}"></script>
        <script src="{{ asset('plugins/js/libs/daterange/moment.min.js') }}"></script>
        <script src="{{ asset('plugins/js/libs/daterange/daterangepicker.min.js') }}?_ver=2.2"></script>

        <script>
        // var ctx = document.getElementById('earning_chart').getContext('2d');

        // window.myMixedChart = new Chart(ctx, {
        //     type: 'line',
        //     data: views_chart_data,
        //     options: {
        //         layout: {
        //             padding: 10,
        //         },

        //         legend: {
        //             display: false
        //         },
        //         title: {
        //             display: false
        //         },

        //         scales: {
        //             yAxes: [{
        //                 scaleLabel: {
        //                     display: false
        //                 },
        //                 gridLines: {
        //                     borderDash: [6, 10],
        //                     color: "#d8d8d8",
        //                     lineWidth: 1,
        //                 },
        //                 ticks: {
        //                     beginAtZero: true,
        //                 }
        //             }],
        //             xAxes: [{
        //                 scaleLabel: {
        //                     display: false
        //                 },
        //                 gridLines: {
        //                     display: false
        //                 },
        //             }],
        //         },

        //         tooltips: {
        //             backgroundColor: '#333',
        //             titleFontSize: 13,
        //             titleFontColor: '#fff',
        //             bodyFontColor: '#fff',
        //             bodyFontSize: 13,
        //             displayColors: false,
        //             xPadding: 10,
        //             yPadding: 10,
        //             intersect: false
        //         }
        //     }
        // });

        var start = moment().startOf('week');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('D MMMM, YYYY') + ' - ' + end.format('D MMMM, YYYY'));
        }
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            "alwaysShowCalendars": true,
            "opens": "left",
            "showDropdowns": true,
            ranges: {
                'Aujourd hui': [moment(), moment()],
                'Hier': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '7 derniers jours': [moment().subtract(6, 'days'), moment()],
                '30 derniers jours': [moment().subtract(29, 'days'), moment()],
                'Ce mois': [moment().startOf('month'), moment().endOf('month')],
                'Ce mois': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                    'month')],
                'Cette année': [moment().startOf('year'), moment().endOf('year')],
                'Cette semaine': [moment().startOf('week'), end]
            }
        }, cb).on('apply.daterangepicker', function(ev, picker) {
            // Reload Earning JS
            $.ajax({
                url: 'https://bigplace.fr/admin/reloadChart',
                data: {
                    chart: 'views',
                    from: picker.startDate.format('MM-YYYY-DD'),
                    to: picker.endDate.format('MM-YYYY-DD'),
                },
                dataType: 'json',
                type: 'post',
                success: function(res) {
                    if (res.status) {
                        window.myMixedChart.data = res.data;
                        window.myMixedChart.update();
                    }
                }
            })
        });
        cb(start, end);
        </script>
        <script>
        $('.has-children >a').click(function() {
            $(this).parent().find('>.children').slideToggle('fast');
        })
        </script>

    </div>
    <script>
    jQuery(document).ready(function($) {
        setTimeout(function() {
            $(".trans--grow").addClass("grow");
        }, 275);
    });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>

    @stack('scripts')
    @include('sweetalert::alert')

</body>

</html>