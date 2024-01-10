@extends('layouts.dashboard')
@push('styles')
<style>
.dashboard-big-img {
    width: 200px;
    height: 200px;
}

.dashboard-small-img {
    /* width: 100%; */
    /* height: 150px; */

}

#icons>div>div>div>div>a {
    position: relative;
    bottom: 0px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding-top: 30px;
}

.dashboard-link {
    width: 19vw !important;
}

.dashboard-link img {
    border-radius: 20px;
}

.dashboard-link:hover {
    /* transform: scale(1.1); */
    /* Scale the button on hover */
    box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.3);
    border-radius: 20px;
}

.select2-container {
    width: 100% !important;
}

.select2-search__field {
    padding-left: 5px;
}

.select2-selection--single {
    margin: 0 !important;
    width: 100% !important;
    height: 35px !important;
    padding: .330rem .70rem !important;
    font-weight: 400 !important;
    line-height: 1.5 !important;
    color: #495057 !important;
    background-color: #fff !important;
    background-clip: padding-box !important;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out !important;
    margin-bottom: .5rem !important !important;
    border: 1px solid #dae1e7 !important;
    border-radius: 3px !important;
    box-shadow: none !important;
    font-size: 14px !important;
}

.select2-selection--multiple {
    margin: 0 !important;
    width: 100% !important;
    height: 100% !important;
    /* padding: .3rem .70rem !important; */
    padding-top: 2px;
    padding-left: 6px;
    font-weight: 400 !important;
    line-height: 1.5 !important;
    color: #000 !important;
    background-color: #fff !important;
    background-clip: padding-box !important;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out !important;
    margin-bottom: .5rem !important !important;
    border: 1px solid #dae1e7 !important;
    border-radius: 3px !important;
    box-shadow: none !important;
    font-size: 14px !important;
}



#select2-metier_recherche-container {
    padding-left: 25px !important;
}

#ville_domiciliation {
    color: #000 !important;
    padding-left: 37px !important;
}

#ville_domiciliation::placeholder,
#pretentions_salariales::placeholder,
#annees_experience::placeholder,
#niveau_etudes::placeholder,
#valeurs::placeholder,
#metier_recherche::placeholder {
    color: #000 !important;
    font-size: 16px !important;
    /* Choose your desired color */
}

.select2-search__field {
    color: #000 !important;
}

.select2-selection__rendered {
    color: #000 !important;
    padding-left: 18px;
    font-size: 16px !important;
}

.card {
    height: 100% !important;
}

.chartjs-render-monitor {
    height: 300px !important;
}

#search-btn {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 20px;
}

.fc-col-header-cell-cushion {
    color: #000000 !important;
}

.fc-timegrid-slot-label-cushion {
    color: #000000 !important;
}

.card-footer {
    padding: 10px 15px !important;
    text-align: center;
}

/* SCROLLBAR - START - */
/* width */
.fc-scroller::-webkit-scrollbar {
     width: 10px;
 }
 /* Track */
.fc-scroller::-webkit-scrollbar-track {
     border-radius: 0px;
 }
/* Handle */
.fc-scroller::-webkit-scrollbar-thumb {
     background: #ff8b00; 
 }
/* Handle on hover */
.fc-scroller::-webkit-scrollbar-thumb:hover {
     background: #ff8b00; 
 }
/* Firefox Integration */
.fc-scroller{
     scrollbar-color: #ff8b00 #fff;
 }
 /* SCROLLBAR - END - */
</style>
@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3 class="dashboard-title">Bonjour, <bold class="dashboard-user-name">{{auth()->user()->name}}</bold> !
            </h3>
            <div class="text dashboard-sub">Simplifiez votre processus de recrutement et accélérez vos embauches</div>
        </div>

        <div class="row">
            <div class="col-9 px-2">
                <div class="card">
                    <div class="card-body px-4">
                        <h4 class="text-dark dashboard-card-title mb-4">Moteur de recherche</h4>
                        <form method="get" class="" action="{{route('recruiter.cvtheque.search')}}">
                            <div class="row no-gutters">
                                <div class="col-12">
                                    <div class="form-group mb-2">
                                        <img src="{{asset('/plugins/images/dashboard/icons/search.png')}}" alt=""
                                            style="padding: 6px; min-width: 18px; position: absolute; z-index: 10;scale: 0.7;">
                                        <select name="metier_recherche" id="metier_recherche" class="form-control"
                                            required>
                                            <option value="" selected>Métier / Code Rome</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <img src="{{asset('/plugins/images/dashboard/icons/location.png')}}" alt=""
                                            style="padding: 6px; min-width: 24px; position: absolute;scale: 0.7;">
                                        <input type="text" name="ville_domiciliation" id="ville_domiciliation" value=""
                                            class="form-control mb-2" placeholder="Ville / Département" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="text" name="pretentions_salariales" id="pretentions_salariales"
                                            value="" class="form-control" placeholder="Pretentions salariales (ke)"
                                            required>
                                    </div>
                                </div>

                                <div class="col-6 pr-1">
                                    <div class="form-group mb-2">
                                        <select name="niveau_etudes" id="niveau_etudes" class="form-control" required>
                                            <option value="" selected>Niveau d'études</option>
                                            <option value="CAP / BEP">CAP / BEP</option>
                                            <option value="Bac">Bac</option>
                                            <option value="Bac + 2">Bac + 2</option>
                                            <option value="Bac + 4">Bac + 4</option>
                                            <option value="Bac + 5 et plus">Bac + 5 et plus</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6 pl-1">
                                    <div class="form-group mb-2">
                                        <select class="form-control" id="annees_experience" name="annees_experience"
                                            required>
                                            <option value="" selected>Niveau d'éxpérience</option>
                                            <option value="Débutant (0 – 2 ans)">Débutant (0 – 2 ans)</option>
                                            <option value="Intermédiaire (2 – 5 ans)">Intermédiaire (2 – 5 ans)</option>
                                            <option value="Confirmé (5 -10 ans)">Confirmé (5 -10 ans)</option>
                                            <option value="Sénior (+ 10 ans)">Sénior (+ 10 ans)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 pl-0">
                                    <div class="form-group mb-2">
                                        <select class="form-control" id="values_select" name="valeurs[]" multiple
                                            required>
                                            <option value="respect">Le respect</option>
                                            <option value="adaptabilite">L’adaptabilité</option>
                                            <option value="consideration">La considération</option>
                                            <option value="altruisme">L’altruisme</option>
                                            <option value="assertivite">L’assertivité</option>
                                            <option value="entraide">L'entraide</option>
                                            <option value="solidarite">La solidarité</option>
                                            <option value="ecoute">L'écoute</option>
                                            <option value="bienveillance">La bienveillance</option>
                                            <option value="empathie">L'empathie</option>
                                            <option value="creativite">La créativité</option>
                                            <option value="justice">La justice</option>
                                            <option value="tolerance">La tolérance</option>
                                            <option value="equite">L’équité</option>
                                            <option value="honnetete">L’honnêteté</option>
                                            <option value="responsabilite">La responsabilité</option>
                                            <option value="loyaute">La loyauté</option>
                                            <option value="determination">La détermination</option>
                                            <option value="perseverance">La persévérance</option>
                                            <option value="rigueur">La rigueur</option>
                                            <option value="generosite">La générosité</option>
                                            <option value="stabilite">La stabilité</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="theme-btn btn-style-one my-2 w-100 rounded-pill py-3"
                                id="search-btn">Chercher</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-3 px-2">
                <div class="card">
                    <div class="card-body px-2">
                        <h4 class="text-dark dashboard-card-title d-inline mb-4">Nombre de vues de la vitrine</h4>
                        <div class="row w-100">

                            <div class="col-12 pr-0 my-3">
                                <h2 class="text-center">Jour</h2>
                                <div id="jour-carousel" class="carousel slide">
                                <div class="carousel-inner">
                                    @foreach($vuesByDay as $index => $value)
                                    <div class="carousel-item @if($index == 0) active @endif" style="padding-left:30px!important">
                                        {{$value['date']}} - {{$value['count']}} vues
                                    </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev text-dark" type="button" data-target="#jour-carousel" data-slide="prev">
                                   <
                                </button>
                                <button class="carousel-control-next text-dark" type="button" data-target="#jour-carousel" data-slide="next">
                                    >
                                </button>
                                </div>
                            </div>

                            <div class="col-12 pr-0 my-3">
                                <h2 class="text-center">Semaine</h2>
                                <div id="week-carousel" class="carousel slide">
                                <div class="carousel-inner">
                                    @foreach($vuesByWeek as $index => $value)
                                    <div class="carousel-item @if($index == 0) active @endif" style="padding-left:30px!important">
                                        {{$value['week']}} - {{$value['count']}} vues
                                    </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev text-dark" type="button" data-target="#week-carousel" data-slide="prev">
                                    <
                                </button>
                                <button class="carousel-control-next text-dark" type="button" data-target="#week-carousel" data-slide="next">
                                    >
                                </button>
                                </div>
                            </div>

                            <div class="col-12 pr-0 my-3">
                                <h2 class="text-center">Mois</h2>
                                <div id="mois-carousel" class="carousel slide">
                                <div class="carousel-inner">
                                    @foreach($vuesByMonth as $index => $value)
                                    <div class="carousel-item @if($index == 0) active @endif" style="padding-left:30px!important">
                                        {{$value['month']}} - {{$value['count']}} vues
                                    </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev text-dark" type="button" data-target="#mois-carousel" data-slide="prev">
                                    <
                                </button>
                                <button class="carousel-control-next text-dark" type="button" data-target="#mois-carousel" data-slide="next">
                                   >
                                </button>
                                </div>
                            </div>
                        </div>
                        <!-- <canvas id="myChart" class="px-2 pt-2"></canvas> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-dark dashboard-card-title">Calendrier</h4>
                        <div id='calendar-item' class="mt-5"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="icons" id="icons">
            <div class="row mt-5 gx-0 gy-0">
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="/cv-theque">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/mes-emails.png')}}" alt="">

                            </a>
                        </div>
                        <div class="card-footer text-muted">
                            <span class="text-dark">CVThèque</span>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="/mes-favoris">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/mes-emails.png')}}" alt="">

                            </a>
                        </div>
                        <div class="card-footer text-muted">
                            <span class="text-dark">Mes Favoris</span>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="/historique">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/mes-emails.png')}}" alt="">

                            </a>
                        </div>
                        <div class="card-footer text-muted">
                            <span class="text-dark">Mes dernières recherches</span>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="/mes-mails">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/mes-emails.png')}}" alt="">

                            </a>
                        </div>
                        <div class="card-footer text-muted">
                            <span class="text-dark">Mes emails</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5 gx-0 gy-0">
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="/mes-rendez-vous">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/mes-rdvs.png')}}" alt="">
                            </a>
                        </div>
                        <div class="card-footer text-muted">
                            <span class="text-dark">Mes rendez-vous</span>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="/mon-calendrier">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/mes-rdvs.png')}}" alt="">
                            </a>
                        </div>
                        <div class="card-footer text-muted">
                            <span class="text-dark">Mon Calendrier</span>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="/mes-taches">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/mes-taches.png')}}" alt="">
                            </a>
                        </div>
                        <div class="card-footer text-muted">
                            <span class="text-dark">Mes tâches</span>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="/mes-evenements">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/mes-events.png')}}" alt="">
                            </a>
                        </div>
                        <div class="card-footer text-muted">
                            <span class="text-dark">Mes évènemements / jobdatings</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="/mes-formations">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/mes-formations.png')}}" alt="">
                            </a>
                        </div>
                        <div class="card-footer text-muted">
                            <span class="text-dark">Mes formations proposées</span>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="/mes-offres">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/mes-offres.png')}}" alt="">
                            </a>
                        </div>
                        <div class="card-footer text-muted">
                            <span class="text-dark">Mes offres d'emploi</span>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="/mes-candidatures">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/mes-candidatures.png')}}" alt="">

                            </a>
                        </div>
                        <div class="card-footer text-muted">
                            <span class="text-dark">Mes candidatures</span>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="/ma-vitrine">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/ma-vitrine.png')}}" alt="">
                            </a>
                        </div>
                        <div class="card-footer text-muted">
                            <span class="text-dark">Ma vitrine entreprise</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="/mes-documents">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/mes-docs.png')}}" alt="">
                            </a>
                        </div>
                        <div class="card-footer text-muted">
                            <span class="text-dark">Mes documents</span>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="/mes-factures-et-contrats">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/mes-factures-contrats.png')}}" alt="">
                            </a>
                        </div>
                        <div class="card-footer text-muted">
                            <span class="text-dark">Mes factures et contrats</span>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="/mes-stats">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/mes-stats.png')}}" alt="">
                            </a>
                        </div>
                        <div class="card-footer text-muted">
                            <span class="text-dark">Mes statistiques</span>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="/compte-administrateur">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/mon-compte.png')}}" alt="">
                            </a>
                        </div>
                        <div class="card-footer text-muted">
                            <span class="text-dark">Mon compte administrateur</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    $("#values_select").select2({
        placeholder: "Valeurs attendues",
        maximumSelectionLength: 5,
        language: {
            maximumSelected: function(e) {
                return "Vous ne pouvez sélectionner que jusqu'à 5 valeurs.";
                // Replace this string with your custom error message
            }
        }
    });
    $("#niveau_etudes").select2({});
    $("#annees_experience").select2({});
    $("#metier_recherche").select2({
        // font size 

    });
       
    var currentPage = 1;
    var isFetching = false; // Flag to track request status

    async function getJsonJobs() {
        await $.ajax({
            url: "/recruiter-dashboard/jobs?page=" + currentPage,
            dataType: "json",
            success: function(data) {
                // Populate the Select2 dropdown with the received data
                // var options = data.items.map(function(job) {
                //     return new Option(job.full_name, job.id, false, false);
                // });
                var options = data.items.filter(function(job) {
                    return job.full_name !== null; // Filter out jobs with null full_name
                }).map(function(job) {
                    return new Option(job.full_name, job.id, false, false);
                });

                $('#metier_recherche').append(options).trigger("change");
                isFetching = false;
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                isFetching = false;
            }
        });
    }

    async function refreshJsonJobs() {
        await $.ajax({
            url: "/recruiter-dashboard/jobs?page=" + currentPage,
            dataType: "json",
            success: function(data) {
                // Populate the Select2 dropdown with the received data
                // var options = data.items.map(function(job) {
                //     return new Option(job.full_name, job.id, false, false);
                // });
                var options = data.items.filter(function(job) {
                    return job.full_name !== null; // Filter out jobs with null full_name
                }).map(function(job) {
                    return new Option(job.full_name, job.id, false, false);
                });

                const scrollTop = $('.select2-results__options').scrollTop();
                $('#metier_recherche').append(options).trigger("change");

                $('#metier_recherche').select2('close');
                $('#metier_recherche').select2('open');
                $('.select2-results__options').scrollTop(scrollTop + 1);

                console.log(scrollTop);

                isFetching = false;
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                isFetching = false;
            }
        });
    }

    getJsonJobs();

    $('#metier_recherche').on('select2:open', function() {
        const resultsContainer = $('.select2-results__options');
        resultsContainer.on('scroll', function() {
            // This function will be called whenever the user scrolls the options list
            console.log("scroll");
            const scrollTop = $(this).scrollTop();
            const scrollHeight = $(this).prop('scrollHeight');
            const clientHeight = $(this).innerHeight();
            // Check if the user has scrolled near the bottom:
            if (scrollTop + clientHeight >= scrollHeight - 50 && !isFetching) {
                // Trigger infinite scrolling or other actions as needed
                console.log('Near the bottom!');
                currentPage++;
                isFetching = true;
                refreshJsonJobs();
            }
        });
    });

    $('.select2-search__field').on('change', function() {
            const searchTerm = $(this).val(); // Get the current search term
            console.log("User typed:", searchTerm);
    });

})
</script>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.9.1/lang-all.js"></script>
<script src="{{asset('plugins/js/locales-all.global.min.js')}}"></script>
<script>
document.addEventListener('DOMContentLoaded', async function() {
    var calendarEl = document.getElementById('calendar-item');
    let rdvs = [];
    // fetch events from a laravel route using ajax
    await $.ajax({
        url: "{{ route('getUserRdvs') }}",
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log('RDVS fetched successfully', data);
            data.forEach(function(event) {
                let rdvType = event.is_type_presentiel ? 'Présentiel' : 'Distanciel';
                let candidatId = event.candidat_it
                console.log('ID Du Candidat est : ' + candidatId);
                rdvs.push({
                    title: 'Rendez vous le : ' + event.date,
                    start: event.date + 'T' + event.heure,
                    backgroundColor: '#e7f6fd',
                    borderColor: '#e7f6fd',
                    textColor: '#0369A1',
                    classNames: ['event-visio'],
                    extendedProps: {
                        description: 'Type : ' + rdvType,
                        candidat_id: candidatId
                    }
                });
            })
        },
        error: function() {
            console.log('Error fetching events');
        }
    })

    await $.ajax({
        url: "{{ route('getUserEvents') }}",
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log('EVENTS fetched successfully', data);
            data.forEach(function(event) {
                rdvs.push({
                    title: 'Evènement le : ' + event.event_date,
                    start: event.event_date + 'T' + event.event_hour,
                    backgroundColor: 'red',
                    borderColor: 'red',
                });
            })
        },
        error: function() {
            console.log('Error fetching events');
        }
    })

    await $.ajax({
        url: "{{ route('getUserFormations') }}",
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log('Formations fetched successfully', data);
            data.forEach(function(event) {
                rdvs.push({
                    title: 'Formation le : ' + event.start_date,
                    start: event.start_date,
                    backgroundColor: 'green',
                    borderColor: 'green',
                });
            })
        },
        error: function() {
            console.log('Error fetching events');
        }
    })

    var today = new Date(); // Get current date
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    var initialLocaleCode = 'fr';
    var calendar = new FullCalendar.Calendar(calendarEl, {
        height: '600px',
        width: '100%',
        // slotMinTime: "06:00:00",
        // slotMaxTime: "00:00:00",
        initialView: 'timeGridWeek',
        initialDate: today,
        headerToolbar: {
            left: 'prev,today,next',
            right: 'title',
            center: 'timeGridDay,timeGridWeek'
        },
        events: rdvs,
        locale: initialLocaleCode,
        eventClick: function(info) {
            alert('Event: ' + info.event.title);
            alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
            alert('View: ' + info.view.type);
        },
        eventMouseEnter: async function(info) {
            var tooltip = document.getElementById('custom-tooltip');

            if (!tooltip) {
                tooltip = document.createElement('div');
                tooltip.id = 'custom-tooltip';
                document.body.appendChild(tooltip);
            }

            if (info.event.extendedProps.candidat_id != null) {
                await $.ajax({
                    url: "/getUserById" + '/' + info.event.extendedProps.candidat_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        console.log('Candidat fetched successfully', data.avatar);
                        const imgString =
                            `<img src="${data.avatar.replace('public', 'storage')}" width="50" height="50" style="border-radius: 50%;">`;

                        tooltip.innerHTML += imgString + '  ' + data.name + '<br>' +
                            'Email : ' + data.email + '<br>' +
                            info.event.title + '<br>' +
                            info.event.extendedProps.description;
                    },
                    error: function() {
                        console.log('Error fetching User');
                    }
                })
            } else {
                tooltip.innerHTML += info.event.title + '<br>' +
                    info.event.extendedProps.description;
            }

            tooltip.style.display = 'block';
            tooltip.style.position = 'absolute';
            tooltip.style.zIndex = 9;

            var x = info.jsEvent.pageX;
            var y = info.jsEvent.pageY;

            tooltip.style.left = x + 'px';
            tooltip.style.top = y + 'px';
        },
        eventMouseLeave: function(info) {
            $(this).css('z-index', 8);
            $('#custom-tooltip').remove();
        },
        titleFormat: {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        },
        slotLabelFormat: {
            hour: 'numeric',
            minute: '2-digit',
            omitZeroMinute: false,
            hour12: false // Change to true if you want 12-hour format
        },
        // title: function (info) {
        //   return info.date.getFullYear().toString();
        // }
    });

    calendar.render();


});
</script>
@endpush