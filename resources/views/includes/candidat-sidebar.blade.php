<div class="user-sidebar">
    <div class="sidebar-inner">
        
        <ul class="navigation @if(empty(auth()->user()->curriculum)) deactivated @endif">
            <li class="{{ Str::contains(Request::url(), 'candidat-dashboard') ? 'active' : '' }}">
                <a href="/candidat-dashboard" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/dashboard.png')}}" alt=""> Tableau De
                        Bord</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'candidat-offers') ? 'active' : '' }}">
                <a href="/candidat-offers" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/cvtheque.png')}}" alt=""> Les Offres D'emploi</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'candidat-favoris') ? 'active' : '' }}">
                <a href="/candidat-favoris" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/favorites.png')}}" alt=""> Mes
                        Favoris</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'candidat-history') ? 'active' : '' }}">
                <a href="/candidat-history" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/search.png')}}" alt=""> Mes Dernières
                        Recherches</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'candidat-emails') ? 'active' : '' }}">
                <a href="/candidat-emails" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/emails.png')}}" alt=""> Mes Emails</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'candidat-rdvs') ? 'active' : '' }}">
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
            <li class="{{ Str::contains(Request::url(), 'candidat-formation') ? 'active' : '' }}">
                <a href="/candidat-formation" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/formations.png')}}" alt=""> Les Formations
                            Proposées
                    </span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'candidat-candidatures') ? 'active' : '' }}">
                <a href="/candidat-candidatures" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/candidatures.png')}}" alt=""> Mes
                        Candidatures</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'candidat-cvredirect') ? 'active' : '' }}">
                <a href="/candidat-cvredirect" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/cvtheque.png')}}" alt=""> Ma Fiche
                        Candidat</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'candidat-documents') ? 'active' : '' }}">
                <a href="/candidat-documents" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/documents.png')}}" alt=""> Mes
                        documents</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'candidat-stats') ? 'active' : '' }}">
                <a href="/candidat-stats" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/stats.png')}}" alt=""> Mes
                        Statistiques</span>
                </a>
            </li>
            <li class="{{ Str::contains(Request::url(), 'candidat-account') ? 'active' : '' }}">
                <a href="/candidat-account" class="d-flex justify-content-between align-items-center">
                    <span class="d-flex align-items-center"><img class="mr-3"
                            src="{{asset('/plugins/images/recruiter-sidebar/account.png')}}" alt=""> Mon Compte
                        </span>
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