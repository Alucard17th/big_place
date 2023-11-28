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
                        <canvas id="myChart" width="400" height="400"></canvas>
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
                    <h4>Calendrier</h4>
                        <div id='calendar-item'></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <a href="/mes-rendez-vous" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img" src="{{asset('/plugins/images/dashboard/mes-rdvs.png')}}"
                        alt="">
                </a>
                <span class="mb-3">Mes rendez-vous</span>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <a href="/mes-taches" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img"
                        src="{{asset('/plugins/images/dashboard/mes-taches.png')}}" alt="">
                </a>
                <span class="mb-3">Mes tâches</span>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <a href="/mes-evenements" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img"
                        src="{{asset('/plugins/images/dashboard/mes-events.png')}}" alt="">
                </a>
                <span class="mb-3">Mes évènemements / jobdatings</span>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <a href="/mes-offres" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img"
                        src="{{asset('/plugins/images/dashboard/mes-offres.png')}}" alt="">
                </a>
                <span class="mb-3">Mes offres d'emploi</span>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <a href="/mes-candidatures" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img"
                        src="{{asset('/plugins/images/dashboard/mes-candidatures.png')}}" alt="">
                </a>
                <span class="mb-3">Mes candidatures</span>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <a href="/ma-vitrine" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img"
                        src="{{asset('/plugins/images/dashboard/ma-vitrine.png')}}" alt="">
                </a>
                <span class="mb-3">Ma vitrine entreprise</span>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <a href="#" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img"
                        src="{{asset('/plugins/images/dashboard/mes-formations.png')}}" alt="">
                </a>
                <span class="mb-3">Mes formations proposées</span>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <a href="#" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img"
                        src="{{asset('/plugins/images/dashboard/mes-emails.png')}}" alt="">
                </a>
                <span class="mb-3">Mes emails</span>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <a href="/mes-documents" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img" src="{{asset('/plugins/images/dashboard/mes-docs.png')}}"
                        alt="">
                </a>
                <span class="mb-3">Mes documents</span>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <a href="/mes-factures-et-contrats" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img"
                        src="{{asset('/plugins/images/dashboard/mes-factures-contrats.png')}}" alt="">
                </a>
                <span class="mb-3">Mes factures et contrats</span>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <a href="#" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img"
                        src="{{asset('/plugins/images/dashboard/mes-stats.png')}}" alt="">
                </a>
                <span class="mb-3">Mes statistiques</span>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center flex-column">
                <a href="#" class="dashboard-link">
                    <img class="img-fluid dashboard-small-img"
                        src="{{asset('/plugins/images/dashboard/mon-compte.png')}}" alt="">
                </a>
                <span class="mb-3">Mes compte administrateur</span>
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

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridWeek',
    initialDate: '2023-09-07',
    headerToolbar: {
      left: 'prev,today,next',
      right: 'title',
      center: 'dayGridDay,dayGridWeek' 
    },
    events : rdvs,
    lang: 'ar',
    eventClick: function(info) {
        alert('Event: ' + info.event.title);
        alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
        alert('View: ' + info.view.type);
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