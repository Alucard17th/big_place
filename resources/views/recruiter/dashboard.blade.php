@extends('layouts.dashboard')
@push('styles')
<style>
.dashboard-big-img {
    width: 200px;
    height: 200px;
}

.dashboard-small-img {
    width: 150px;
    height: 150px;
}

.dashboard-link img {
    border-radius: 20px;
}

.dashboard-link:hover {
    transform: scale(1.1);
    /* Scale the button on hover */
    box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.3);
    border-radius: 20px;
}
</style>
@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Bonjour, {{auth()->user()->name}} !</h3>
            <div class="text">Simplifiez votre processus de recrutement et accélérez vos embauches</div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="ui-item ui-yellow">
                    <div class="left">
                        <i class="icon la la-comment-o"></i>
                    </div>
                    <div class="right">
                        <h4>0</h4>
                        <p>Total messages</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="ui-item ui-green">
                    <div class="left">
                        <i class="icon la la-bookmark-o"></i>
                    </div>
                    <div class="right">
                        <h4>0</h4>
                        <p>Total favoris</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6 d-flex justify-content-center align-items-center flex-column">
                <span class="mb-3">Calendrier</span>
                <a href="/mon-calendrier" class="dashboard-link">
                    <img class="img-fluid dashboard-big-img" src="{{asset('/plugins/images/dashboard/calendar.jpg')}}"
                        alt="">
                </a>
            </div>
            <div class="col-6 d-flex justify-content-center align-items-center flex-column">
                <span class="mb-3">Moteur de recherche</span>
                <a href="#" class="dashboard-link" id="search-btn">
                    <img class="img-fluid dashboard-big-img"
                        src="{{asset('/plugins/images/dashboard/search-engine.jpg')}}" alt="">
                </a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <span class="mb-3">Mes rendez-vous</span>
                <a href="/mes-rendez-vous" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img" src="{{asset('/plugins/images/dashboard/mes-rdvs.jpg')}}"
                        alt="">
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <span class="mb-3">Mes tâches</span>
                <a href="/mes-taches" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img"
                        src="{{asset('/plugins/images/dashboard/mes-taches.png')}}" alt="">
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <span class="mb-3">Mes évènements / Jobdatings</span>
                <a href="/mes-evenements" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img"
                        src="{{asset('/plugins/images/dashboard/mes-events.png')}}" alt="">
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <span class="mb-3">Mes offres d'emploi</span>
                <a href="/mes-offres" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img"
                        src="{{asset('/plugins/images/dashboard/mes-offres.jpg')}}" alt="">
                </a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <span class="mb-3">Mes candidatures</span>
                <a href="#" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img"
                        src="{{asset('/plugins/images/dashboard/mes-candidatures.jpg')}}" alt="">
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <span class="mb-3">Ma vitrine entreprise</span>
                <a href="/ma-vitrine" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img"
                        src="{{asset('/plugins/images/dashboard/ma-vitrine.png')}}" alt="">
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <span class="mb-3">Mes formations proposées</span>
                <a href="#" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img"
                        src="{{asset('/plugins/images/dashboard/mes-formations.png')}}" alt="">
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <span class="mb-3">Mes emails</span>
                <a href="#" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img"
                        src="{{asset('/plugins/images/dashboard/mes-emails.jpg')}}" alt="">
                </a>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <span class="mb-3">Mes documents</span>
                <a href="/mes-documents" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img" src="{{asset('/plugins/images/dashboard/mes-docs.jpg')}}"
                        alt="">
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <span class="mb-3">Mes factures et contrats</span>
                <a href="/mes-factures-et-contrats" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img"
                        src="{{asset('/plugins/images/dashboard/mes-factures-contrats.jpg')}}" alt="">
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <span class="mb-3">Mes statistiques</span>
                <a href="#" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img"
                        src="{{asset('/plugins/images/dashboard/mes-stats.png')}}" alt="">
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <span class="mb-3">Mes compte administrateur</span>
                <a href="#" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img"
                        src="{{asset('/plugins/images/dashboard/mon-compte.jpg')}}" alt="">
                </a>
            </div>
        </div>

        <!-- <div class="row">

                    <div class="col-lg-7">
                       
                        <div class="graph-widget ls-widget">
                            <div class="tabs-box">
                                <div class="widget-title">
                                    <h4>Nombre de vues de votre profil</h4>
                                    <div id="reportrange"
                                        style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;">
                                        <i class="fa fa-calendar"></i>&nbsp;
                                        <span></span> <i class="fa fa-caret-down"></i>
                                    </div>
                                </div>

                                <div class="widget-content">
                                    <canvas id="earning_chart"></canvas>
                                    <script>
                                    var views_chart_data = {
                                        "labels": ["23\/10\/2023", "24\/10\/2023", "25\/10\/2023", "26\/10\/2023"],
                                        "datasets": [{
                                            "label": "Views",
                                            "backgroundColor": "transparent",
                                            "borderColor": "#1967D2",
                                            "borderWidth": "1",
                                            "data": [0, 0, 0, 0],
                                            "pointRadius": 3,
                                            "pointHoverRadius": 3,
                                            "pointHitRadius": 10,
                                            "pointBackgroundColor": "#1967D2",
                                            "pointHoverBackgroundColor": "#1967D2",
                                            "pointBorderWidth": "2"
                                        }]
                                    };
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                       
                        <div class="notification-widget ls-widget">
                            <div class="widget-title">
                                <h4>Notifications</h4>
                            </div>
                            <div class="widget-content">
                                <ul class="notification-list">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
    </div>

    <div id="ex1" class="modal">
        <form method="get" class="" action="{{route('recruiter.cvtheque.search')}}">
            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-1">
                        <input type="text" name="metier_recherche" placeholder="métier/poste" value=""
                            class="form-control mb-2">
                    </div>
                    <div class="form-group mb-1">
                        <input type="text" name="ville_domiciliation" placeholder="ville" value=""
                            class="form-control mb-2">
                    </div>
                </div>

                <div class="col-6">

                    <div class="form-group mb-1">
                        <input type="text" name="annees_experience" placeholder="année d'exp." value=""
                            class="form-control mb-2">
                    </div>
                    <div class="form-group mb-1">
                        <input type="text" name="niveau_etudes" placeholder="niveau d'études" value=""
                            class="form-control mb-2">
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group mb-1">
                        <input type="text" name="pretentions_salariales" placeholder="niveau de salaire" value=""
                            class="form-control">
                    </div>
                    <div class="form-group mb-1">
                        <input type="text" name="valeur" placeholder="valeur" value="" class="form-control">
                    </div>
                </div>
            </div>
            <button type="submit" class="theme-btn btn-style-one my-3">Chercher</button>
        </form>
        <a href="#" id="close-modal">Fermer</a>
        <a href="#" class="custom-close-modal"></a>
    </div>

    <div id="calendar-modal" class="modal" style="height:100vh; width:100vw;">
        <div id='calendar-item'></div>
    </div>

</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchBtn = document.querySelector('#search-btn');
   

    searchBtn.addEventListener('click', function() {
        $("#ex1").modal({
            escapeClose: false,
            clickClose: true,
            showClose: false
        });
    })

    
})
</script>
@endpush