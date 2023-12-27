<header class="main-header normal header-shaddow">
    <!-- Main box -->
    <div class="main-box">
        <!--Nav Outer -->
        <div class="nav-outer">
            <div class="logo-box">
                <div class="logo">
                    <a href="https://bigplace.fr">
                        <img src="{{ asset('plugins/images/logo.png') }}" alt="Big Place">
                    </a>
                </div>
            </div>

            <nav class="nav main-menu">
                <ul class="navigation" id="navbar">
                    <li class=" depth-0"><a target="" href="/">Accueil</a></li>
                    <li class=" depth-0"><a target="" href="/a-propos">A propos</a></li>
                    @guest
                    <li class=" depth-0"><a target="" href="/register-employeur">Je recrute</a></li>
                    <li class=" depth-0"><a target="" href="/register-candidat">Je postule</a></li>
                    @endguest
                    <li class=" depth-0"><a target="" href="/parrainage">Parrainage</a>
                    </li>
                    <li class=" dropdown depth-0"><a target="" href="#">Informations <i
                                class="caret flaticon-down-arrow"></i></a>
                        <ul class="children-menu menu-dropdown">
                            <li class=" depth-1"><a target="" href="/faq">F.A.Q</a></li>
                            <li class=" depth-1"><a target="" href="/mag">Le
                                    mag</a></li>
                            <li class=" depth-1"><a target="" href="/support">Support
                                    client</a></li>
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
                        -->
            <!-- Login/Register -->
            <div class="btn-box">
                @auth
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
                        
                        @role('candidat')
                        <li class="menu-hr"><a href="/candidat-dashboard">Tableau de bord</a></li>
                        @else
                        <li class="menu-hr"><a href="/recruiter-dashboard">Tableau de bord</a></li>
                        @endrole

                        <li class="dropdown-divider"></li>
                        <!-- <li class="menu-hr"><a href="https://bigplace.fr/user/my-plan">Mes abonnements</a></li> -->
                        <!-- <li class="menu-hr"><a href="https://bigplace.fr/user/my-contact">Mes contacts</a></li> -->
                        <li class="menu-hr"><a href="https://bigplace.fr/user/profile/change-password">Changer le mot de
                                passe</a></li>

                        <li class="dropdown-divider"></li>
                        <li class="menu-hr">
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <font color="#0146A6"> Se déconnecter</font>
                            </a>
                        </li>
                    </ul>
                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                <!-- <a class="theme-btn btn-style-three" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form> -->
                @else
                <a href="#" class="theme-btn btn-style-three "><span class="bc-call-modal login">Connexion</span>/ <span
                        class="bc-call-modal signup">Inscription</span></a>
                @endauth
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

                <!-- Login/Register -->
                <div class="login-box">
                    <a href="#" class="bc-call-modal login"><span class="icon-user"></span></a>
                </div>

                <a href="#nav-mobile" class="mobile-nav-toggler"><span class="flaticon-menu-1"></span></a>
            </div>
        </div>
    </div>

    <!-- Mobile Nav -->
    <div id="nav-mobile"></div>
</header>