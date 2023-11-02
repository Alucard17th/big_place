<div class="user-sidebar">
            <div class="sidebar-inner">
                <ul class="navigation">
                    <li class="{{ Str::contains(Request::url(), 'recruiter-dashboard') ? 'active' : '' }}">
                        <a href="/recruiter-dashboard"
                            class="d-flex justify-content-between align-items-center">
                            <span class="d-flex align-items-center"><i class="la la-home"></i> Tableau de bord</span>
                        </a>
                    </li>
                    <li class="{{ Str::contains(Request::url(), 'cv-theque') ? 'active' : '' }}">
                        <a href="/cv-theque"
                            class="d-flex justify-content-between align-items-center">
                            <span class="d-flex align-items-center"><i class="la la-envelope"></i> CVTHEQUE</span>
                        </a>
                    </li>
                    <li class="{{ Str::contains(Request::url(), 'mes-favoris') ? 'active' : '' }}">
                        <a href="/mes-favoris"
                            class="d-flex justify-content-between align-items-center">
                            <span class="d-flex align-items-center"><i class="la la-envelope"></i> Mes Favoris</span>
                        </a>
                    </li>
                    <li class="{{ Str::contains(Request::url(), 'mes-rendez-vous') ? 'active' : '' }}">
                        <a href="/mes-rendez-vous"
                            class="d-flex justify-content-between align-items-center">
                            <span class="d-flex align-items-center"><i class="la la-envelope"></i> Mes rendez-vous</span>
                        </a>
                    </li>
                    <li class="{{ Str::contains(Request::url(), 'mes-contacts') ? 'active' : '' }}">
                        <a href="/user/my-contact"
                            class="d-flex justify-content-between align-items-center">
                            <span class="d-flex align-items-center"><i class="la la-envelope"></i> Mes contacts</span>
                        </a>
                    </li>
                    <li class="{{ Str::contains(Request::url(), 'mes-taches') ? 'active' : '' }}">
                        <a href="/user/my-contact"
                            class="d-flex justify-content-between align-items-center">
                            <span class="d-flex align-items-center"><i class="la la-envelope"></i> Mes tâches</span>
                        </a>
                    </li>
                    <li class="{{ Str::contains(Request::url(), 'mes-evenements') ? 'active' : '' }}">
                        <a href="/user/my-contact"
                            class="d-flex justify-content-between align-items-center">
                            <span class="d-flex align-items-center"><i class="la la-envelope"></i> Mes évènements</span>
                        </a>
                    </li>
                    <li class="{{ Str::contains(Request::url(), 'mes-offres-emploi') ? 'active' : '' }}">
                        <a href="/user/my-contact"
                            class="d-flex justify-content-between align-items-center">
                            <span class="d-flex align-items-center"><i class="la la-envelope"></i> Mes offres d'emploi</span>
                        </a>
                    </li>
                    <li class="{{ Str::contains(Request::url(), 'mes-candidatures') ? 'active' : '' }}">
                        <a href="/user/my-contact"
                            class="d-flex justify-content-between align-items-center">
                            <span class="d-flex align-items-center"><i class="la la-envelope"></i> Mes candidature</span>
                        </a>
                    </li>
                    <li class="{{ Str::contains(Request::url(), 'ma-vitrine') ? 'active' : '' }}">
                        <a href="/ma-vitrine"
                            class="d-flex justify-content-between align-items-center">
                            <span class="d-flex align-items-center"><i class="la la-envelope"></i> Ma vitrine entreprise</span>
                        </a>
                    </li>
                    <li class="{{ Str::contains(Request::url(), 'mes-formations') ? 'active' : '' }}">
                        <a href="/user/my-contact"
                            class="d-flex justify-content-between align-items-center">
                            <span class="d-flex align-items-center"><i class="la la-envelope"></i> Mes formations proposées</span>
                        </a>
                    </li>
                    <li class="{{ Str::contains(Request::url(), 'mes-emails') ? 'active' : '' }}">
                        <a href="/user/my-contact"
                            class="d-flex justify-content-between align-items-center">
                            <span class="d-flex align-items-center"><i class="la la-envelope"></i> Mes emails</span>
                        </a>
                    </li>
                    <li class="{{ Str::contains(Request::url(), 'mes-documents') ? 'active' : '' }}">
                        <a href="/mes-documents"
                            class="d-flex justify-content-between align-items-center">
                            <span class="d-flex align-items-center"><i class="la la-envelope"></i> Mes documents</span>
                        </a>
                    </li>
                    <li class="{{ Str::contains(Request::url(), 'mes-factures') ? 'active' : '' }}">
                        <a href="/user/my-contact"
                            class="d-flex justify-content-between align-items-center">
                            <span class="d-flex align-items-center"><i class="la la-envelope"></i> Mes factures et contrats</span>
                        </a>
                    </li>
                    <li class="{{ Str::contains(Request::url(), 'mes-statistiques') ? 'active' : '' }}">
                        <a href="/user/my-contact"
                            class="d-flex justify-content-between align-items-center">
                            <span class="d-flex align-items-center"><i class="la la-envelope"></i> Mes statistiques</span>
                        </a>
                    </li>
                    <li class="{{ Str::contains(Request::url(), 'mon-compte-admin') ? 'active' : '' }}">
                        <a href="/user/my-contact"
                            class="d-flex justify-content-between align-items-center">
                            <span class="d-flex align-items-center"><i class="la la-envelope"></i> Mon compte administrateur</span>
                        </a>
                    </li>
                    <li class="{{ Str::contains(Request::url(), 'mon-mot-de-passe') ? 'active' : '' }}">
                        <a href="/user/profile/change-password"
                            class="d-flex justify-content-between align-items-center">
                            <span class="d-flex align-items-center"><i class="la la-lock"></i> Mot de passe</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="la la-sign-out"></i>Se déconnecter</a>
                    </li>
                </ul>
            </div>
        </div>