<div class="user-sidebar">
    <div class="sidebar-inner">
        
        <ul class="navigation @if(empty(auth()->user()->curriculum)) deactivated @endif">
            <li class="{{ Str::contains(Request::url(), 'recruiter-dashboard') ? 'active' : '' }}">
                <a href="/recruiter-dashboard" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/dashboard.png')}}" alt=""> Tableau De
                        Bord</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'cv-theque') ? 'active' : '' }}">
                <a href="/cv-theque" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/cvtheque.png')}}" alt=""> Offre D'emploi</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'candidat-cvredirect') ? 'active' : '' }}">
                <a href="/candidat-cvredirect" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/cvtheque.png')}}" alt=""> Ma Fiche
                        Candidat</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'mes-rendez-vous') ? 'active' : '' }}">
                <a href="/candidat-rdvs" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/rdvs.png')}}" alt=""> Mes Rendez-Vous</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'candidat-tasks') ? 'active' : '' }}">
                <a href="/candidat-tasks" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/tasks.png')}}" alt=""> Mes Tâches</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'candidat-events') ? 'active' : '' }}">
                <a href="/candidat-events" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/events.png')}}" alt=""> Mes évènemements /
                        jobdatings</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'candidat-favoris') ? 'active' : '' }}">
                <a href="/candidat-favoris" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/favorites.png')}}" alt=""> Mes
                        Favoris</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'candidat-candidatures') ? 'active' : '' }}">
                <a href="/candidat-candidatures" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/candidatures.png')}}" alt=""> Mes
                        Candidatures</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'mes-formations') ? 'active' : '' }}">
                <a href="/mes-formations" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/formations.png')}}" alt=""> Les Formations
                    </span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'mes-mails') ? 'active' : '' }}">
                <a href="/mes-mails" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/emails.png')}}" alt=""> Mes Emails</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'mes-documents') ? 'active' : '' }}">
                <a href="/mes-documents" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/documents.png')}}" alt=""> Mes
                        documents</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'mes-statistiques') ? 'active' : '' }}">
                <a href="/mes-stats" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/stats.png')}}" alt=""> Mes
                        Statistiques</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'compte-administrateur') ? 'active' : '' }}">
                <a href="/compte-administrateur" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/account.png')}}" alt=""> Mon Compte
                        Administrateur</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'historique') ? 'active' : '' }}">
                <a href="/historique" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/cvtheque.png')}}" alt=""> Mes Dernières
                        Recherches</span>
                </a>
            </li>



            <!-- <li class="{{ Str::contains(Request::url(), 'mon-calendrier') ? 'active' : '' }}">
                <a href="/mon-calendrier" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/tasks.png')}}" alt=""> Mon Calendrier</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'mes-offres') ? 'active' : '' }}">
                <a href="/mes-offres" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/offers.png')}}" alt=""> Mes offres
                        d'emploi</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'mes-factures') ? 'active' : '' }}">
                <a href="/mes-factures-et-contrats" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/factures.png')}}" alt=""> Mes factures et
                        contrats</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'mon-mot-de-passe') ? 'active' : '' }}">
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