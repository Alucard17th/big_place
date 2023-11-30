@extends('layouts.dashboard')
@push('styles')
<style>
.dashboard-big-img {
    width: 200px;
    height: 200px;
}

.dashboard-small-img {
    width: 100%;
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

.select2-container {
    width: 100% !important;
}

.select2-search__field {
    padding-left: 5px;
}

.select2-selection--single {
    height: 35px !important;
    padding: 0px 18px 0px 10px !important;
}

.select2-selection--multiple {
    max-height: 35px !important;
    padding: 0px 18px 0px 10px !important;
    border: 1px solid #dae1e7 !important;
    border-radius: 3px;
    box-shadow: none;
    font-size: 14px;
}

.card{
    height: 100% !important;
}
.chartjs-render-monitor{
    height: 300px !important;
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

            <div class="col-8 px-2">
                <div class="card">
                    <div class="card-body">
                        <canvas id="myChart" ></canvas>
                    </div>
                </div>
            </div>

            <div class="col-4 px-2">
                <div class="card">
                    <div class="card-body">
                    <form method="get" class="" action="{{route('recruiter.cvtheque.search')}}">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-2">
                                    <select name="metier_recherche" id="metier_recherche" class="form-control">
                                        @foreach($jobs as $job)
                                            <option value="{{$job->id}}">{{$job->id}} - {{$job->full_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="text" name="ville_domiciliation" value="" class="form-control mb-2" placeholder="Ville / Département">
                                </div>
                                <div class="form-group mb-2">
                                    <input type="text" name="pretentions_salariales" value="" class="form-control" placeholder="Pretentions salariales">
                                </div>
                                <div class="form-group mb-2">
                                    <select name="valeur[]" id="values_select" class="form-control" multiple>
                                        <option value="Le respect">Le respect</option>
                                        <option value="L'adaptabilité">L'adaptabilité</option>
                                        <option value="la considération">la considération</option>
                                        <option value="l'altruisme">l'altruisme</option>
                                        <option value="l'assertivité">l'assertivité</option>
                                        <option value="l'entraide">l'entraide</option>
                                        <option value="la solidarité">la solidarité</option>
                                        <option value="l'écoute">l'écoute</option>
                                        <option value="la bienveillance">la bienveillance</option>
                                        <option value="l'empathie">l'empathie</option>
                                        <option value="la créativité">la créativité</option>
                                        <option value="la justice">la justice</option>
                                        <option value="la tolérance">la tolérance</option>
                                        <option value="l'équité">l'équité</option>
                                        <option value="l'honnêteté">l'honnêteté</option>
                                        <option value="la responsabilité">la responsabilité</option>
                                        <option value="la loyauté">la loyauté</option>
                                        <option value="la détermination">la détermination</option>
                                        <option value="la persévérance">la persévérance</option>
                                        <option value="la rigueur">la rigueur</option>
                                        <option value="la générosité">la générosité</option>
                                        <option value="la stabilité">la stabilité</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group mb-2">
                                    <select name="niveau_etudes" id="niveau_etudes" class="form-control">
                                        <option value="" selected>Niveau d'études</option>
                                        <option value="CAP / BEP">CAP / BEP</option>
                                        <option value="Bac">Bac</option>
                                        <option value="Bac + 2">Bac + 2</option>
                                        <option value="Bac + 4">Bac + 4</option>
                                        <option value="Bac + 5 et plus">Bac + 5 et plus</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group mb-2">
                                    <input type="number" name="annees_experience" value="" class="form-control mb-2" placeholder="Années d'expérience">
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="theme-btn btn-style-one my-2">Chercher</button>
                    </form>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <h4 class="text-dark mb-3">Calendrier</h4>
                        <div id='calendar-item'></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="icons" id="icons">
            <div class="row mt-5">
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="candidat/mes-rendez-vous">
                                <img class="img-fluid dashboard-small-img" src="{{asset('/plugins/images/dashboard/mes-rdvs.png')}}"
                                    alt="">
                            </a>
                            <span class="pt-4 mb-3 text-dark">Mes rendez-vous</span>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="candidat/mes-taches">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/mes-taches.png')}}" alt="">
                                <span class="pt-4 mb-3 text-dark">Mes tâches</span>
                                </a>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="candidat/mes-evenements">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/mes-events.png')}}" alt="">
                                <span class="pt-4 mb-3 text-dark">Mes évènemements / jobdatings</span>
                                </a>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="candidat/mes-offres">
                                <img class="img-fluid dashboard-small-img"
                            src="{{asset('/plugins/images/dashboard/mes-offres.png')}}" alt="">
                                <span class="pt-4 mb-3 text-dark">Mes offres d'emploi</span>
                        </a>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="candidat/mes-candidatures">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/mes-candidatures.png')}}" alt="">
                                <span class="pt-4 mb-3 text-dark">Mes candidatures</span>
                                </a>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="candidat/ma-vitrine">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/ma-vitrine.png')}}" alt="">
                                <span class="pt-4 mb-3 text-dark">Ma vitrine entreprise</span>
                                </a>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="candidat#">
                                <img class="img-fluid dashboard-small-img"
                            src="{{asset('/plugins/images/dashboard/mes-formations.png')}}" alt="">
                                <span class="pt-4 mb-3 text-dark">Mes formations proposées</span>
                        </a>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="candidat#">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/mes-emails.png')}}" alt="">
                                <span class="pt-4 mb-3 text-dark">Mes emails</span>
                                </a>
                        </div>
                    </div>
                   
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="candidat/mes-documents">
                                <img class="img-fluid dashboard-small-img" src="{{asset('/plugins/images/dashboard/mes-docs.png')}}"
                                    alt="">
                                <span class="pt-4 mb-3 text-dark">Mes documents</span>
                                </a>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="candidat/mes-factures-et-contrats">
                                <img class="img-fluid dashboard-small-img"
                                src="{{asset('/plugins/images/dashboard/mes-factures-contrats.png')}}" alt="">
                                <span class="pt-4 mb-3 text-dark">Mes factures et contrats</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="candidat#">
                                <img class="img-fluid dashboard-small-img"
                                src="{{asset('/plugins/images/dashboard/mes-stats.png')}}" alt="">
                                <span class="pt-4 mb-3 text-dark">Mes statistiques</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                    <div class="card dashboard-link">
                        <div class="card-body text-center">
                            <a href="candidat#">
                                <img class="img-fluid dashboard-small-img"
                                    src="{{asset('/plugins/images/dashboard/mon-compte.png')}}" alt="">
                                <span class="pt-4 mb-3 text-dark">Mes compte administrateur</span>
                                </a>
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
    });
    $("#niveau_etudes").select2({});
    $("#metier_recherche").select2({});
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
    url: "{{ route('getCandidatRdvs') }}",
    type: 'GET',
    dataType: 'json',
    success: function(data) {
    console.log('RDVS fetched successfully', data);
        data.forEach(function(event) {
            rdvs.push({
                title: 'Rendez vous le : ' + event.date,
                start: event.date + 'T' + event.heure,
                backgroundColor: 'pink',
                borderColor: 'pink',
            });
        })
    },
    error: function() {
      console.log('Error fetching events');
    }
  })

  await $.ajax({
    url: "{{ route('getCandidatEvents') }}",
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
    url: "{{ route('getCandidatFormations') }}",
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
    height: '400px',
    initialView: 'timeGridWeek',
    initialDate: today,
    headerToolbar: {
      left: 'prev,today,next',
      right: 'title',
      center: 'timeGridDay,timeGridWeek' 
    },
    events : rdvs,
    locale: initialLocaleCode,
    eventClick: function(info) {
        alert('Event: ' + info.event.title);
        alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
        alert('View: ' + info.view.type);
    },
    slotLabelFormat: {
        hour: 'numeric',
        minute: '2-digit',
        omitZeroMinute: false,
        hour12: false // Change to true if you want 12-hour format
    }
  });

  calendar.render();

    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: '# of Votes',
                data: [2, 9, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(245, 247, 252, 1)'
                ],
                borderColor: [
                    'rgba(12, 145, 253, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
});
</script>
@endpush