<div class="user-sidebar">
    <div class="sidebar-inner">
        <ul class="navigation">
            <li class="{{ Str::contains(Request::url(), 'recruiter-dashboard') ? 'active' : '' }}">
                <a href="/recruiter-dashboard" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/dashboard.png')}}" alt=""> Tableau de
                        bord</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'cv-theque') ? 'active' : '' }}">
                <a href="/cv-theque" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/cvtheque.png')}}" alt=""> CVTHEQUE</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'mes-favoris') ? 'active' : '' }}">
                <a href="/mes-favoris" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/favorites.png')}}" alt=""> Mes
                        Favoris</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'historique') ? 'active' : '' }}">
                <a href="/historique" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/cvtheque.png')}}" alt=""> Mes dernières recherches
                    </span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'mes-mails') ? 'active' : '' }}">
                <a href="/mes-mails" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/emails.png')}}" alt=""> Mes emails</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'mes-rendez-vous') ? 'active' : '' }}">
                <a href="/mes-rendez-vous" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/rdvs.png')}}" alt=""> Mes rendez-vous</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'mon-calendrier') ? 'active' : '' }}">
                <a href="/mon-calendrier" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/calendar.png')}}" alt=""> Mon Calendrier</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'mes-taches') ? 'active' : '' }}">
                <a href="/mes-taches" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/tasks.png')}}" alt=""> Mes tâches</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'mes-evenements') ? 'active' : '' }}">
                <a href="/mes-evenements" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/events.png')}}" alt=""> Mes évènemements /
                        jobdatings</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'mes-formations') ? 'active' : '' }}">
                <a href="/mes-formations" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/formations.png')}}" alt="">Mes formations
                        proposées</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'mes-offres') ? 'active' : '' }}">
                <a href="/mes-offres" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/offers.png')}}" alt=""> Mes offres
                        d'emploi / Candidatures</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'mes-candidatures') ? 'active' : '' }}">
                <a href="" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/gestion-candidature.png')}}" alt=""> Gestion des
                        candidatures</span>
                </a>
            </li>
            @role('recruiter')
            <li class="{{ Str::contains(Request::url(), 'ma-vitrine') ? 'active' : '' }}">
                <a href="/ma-vitrine" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/vitrine.png')}}" alt="">Ma vitrine
                        entreprise</span>
                </a>
            </li>
            @endrole
            <li class="{{ Str::contains(Request::url(), 'mes-documents') ? 'active' : '' }}">
                <a href="/mes-documents" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/documents.png')}}" alt="">Mes
                        documents</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), '/mes-factures-et-contrats') ? 'active' : '' }}">
                <a href="/mes-factures-et-contrats" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/factures.png')}}" alt=""> Mes factures et
                        contrats</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), '/mes-stats') ? 'active' : '' }}">
                <a href="/mes-stats" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/stats.png')}}" alt=""> Mes
                        statistiques</span>
                </a>
            </li>
            @role('recruiter')
            <li class="{{ Str::contains(Request::url(), 'compte-administrateur') ? 'active' : '' }}">
                <a href="/compte-administrateur" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/account.png')}}" alt=""> Mon compte
                        administrateur</span>
                </a>
            </li>
            @endrole
            <!-- <li class="{{ Str::contains(Request::url(), 'mon-mot-de-passe') ? 'active' : '' }}">
                <a href="/user/profile/change-password" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><i class="la la-lock"></i> Mot de passe</span>
                </a>
            </li> -->
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                        class="la la-sign-out"></i>Se déconnecter</a>
            </li>
        </ul>
    </div>
</div>