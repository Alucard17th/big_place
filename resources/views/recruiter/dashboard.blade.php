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

#icons > div > div > div > div > a{
    position: relative;
    bottom: 0px;
    display:flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    padding-top:30px;
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
    margin: 0 !important;
    width: 100% !important;
    height: 35px !important;
    padding: .330rem .70rem !important;
    font-weight: 400 !important;
    line-height: 1.5 !important;
    color: #495057 !important;
    background-color: #fff !important;
    background-clip: padding-box !important;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out !important;
    margin-bottom: .5rem!important !important;
    border: 1px solid #dae1e7 !important;
    border-radius: 3px !important;
    box-shadow: none !important;
    font-size: 14px !important;
}
.select2-selection--multiple{
    margin: 0 !important;
    width: 100% !important;
    height: 35px !important;
    /* padding: .3rem .70rem !important; */
    padding-top:2px;
    padding-left:6px;
    font-weight: 400 !important;
    line-height: 1.5 !important;
    color: #8f959b !important;
    background-color: #fff !important;
    background-clip: padding-box !important;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out !important;
    margin-bottom: .5rem!important !important;
    border: 1px solid #dae1e7 !important;
    border-radius: 3px !important;
    box-shadow: none !important;
    font-size: 14px !important;
}

#select2-metier_recherche-container{
    padding-left: 25px !important;
}
#ville_domiciliation{
    padding-left: 40px !important;
}
.select2-search__field{
    color:#8f959b !important;
}
.select2-selection__rendered{
    color:#8f959b !important;
    padding-left:18px;
}

/* .select2-selection--multiple {
    max-height: 35px !important;
    padding: 0px 18px 0px 10px !important;
    border: 1px solid #dae1e7 !important;
    border-radius: 3px;
    box-shadow: none;
    font-size: 14px;
} */

.card{
    height: 100% !important;
}
.chartjs-render-monitor{
    height: 300px !important;
}

#annees_experience{
    /* width:244.5px !important;
    height: 48px !important;
    border-radius: 8px;
    border: 1px solid #1C1C1E7A;
    padding : 7px 8px 5px 16px;  */
}

#search-btn{
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 20px;
}

.fc-col-header-cell-cushion{
    color:#000000 !important;
}
.fc-timegrid-slot-label-cushion {
    color:#000000 !important;
}

</style>
@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3 class="dashboard-title">Bonjour, <bold class="dashboard-user-name">{{auth()->user()->name}}</bold> !</h3>
            <div class="text dashboard-sub">Simplifiez votre processus de recrutement et accélérez vos embauches</div>
        </div>

        <div class="row">

        
            <div class="col-5 px-2">
                <div class="card">
                    <div class="card-body px-4">
                    <h4 class="text-dark dashboard-card-title mb-4">Moteur de recherche</h4>
                    <form method="get" class="" action="{{route('recruiter.cvtheque.search')}}">
                        <div class="row no-gutters">
                            <div class="col-12">
                                <div class="form-group mb-2">
                                    <img src="{{asset('/plugins/images/dashboard/icons/search.png')}}" alt="" 
                                    style="padding: 6px; min-width: 18px; position: absolute; z-index: 10;scale: 0.7;">
                                    <select name="metier_recherche" id="metier_recherche" class="form-control">
                                    <option value="" selected>Métier / Code Rome</option>
                                        @foreach($jobs as $job)
                                        <option value="{{$job->id}}">{{$job->id}} - {{$job->full_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <img src="{{asset('/plugins/images/dashboard/icons/location.png')}}" alt="" 
                                    style="padding: 6px; min-width: 24px; position: absolute;scale: 0.7;">
                                    <input type="text" name="ville_domiciliation" id="ville_domiciliation" value="" class="form-control mb-2" placeholder="Ville / Département">
                                </div>
                                <div class="form-group mb-2">
                                    <input type="text" name="pretentions_salariales" value="" class="form-control" placeholder="Pretentions salariales">
                                </div>
                            </div>

                            <div class="col-6 pr-1">
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

                            <div class="col-6 pl-1">
                                <div class="form-group mb-2">
                                    <select class="form-control" id="annees_experience" name="annees_experience">
                                        <option value="" selected>Niveau d'éxpérience</option>
                                        <option value="Débutant (0 – 2 ans)">Débutant (0 – 2 ans)</option>
                                        <option value="Intermédiaire (2 – 5 ans)">Intermédiaire (2 – 5 ans)</option>
                                        <option value="Confirmé (5 -10 ans)">Confirmé (5 -10 ans)</option>
                                        <option value="Sénior (+ 10 ans)">Sénior (+ 10 ans)</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="theme-btn btn-style-one my-2 w-100 rounded-pill py-3" id="search-btn">Chercher</button>
                    </form>
                    </div>
                </div>
            </div>

            <div class="col-7 px-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-dark dashboard-card-title">Nombre de vues de votre profil</h4>
                        <canvas id="myChart" class="px-2 pt-2"></canvas>
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
                            <a href="/mes-rendez-vous">
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
                            <a href="/mes-taches">
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
                            <a href="/mes-evenements">
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
                            <a href="/mes-offres">
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
                            <a href="/mes-candidatures">
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
                            <a href="/ma-vitrine">
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
                            <a href="/mes-formations">
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
                            <a href="/mes-mails">
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
                            <a href="/mes-documents">
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
                            <a href="/mes-factures-et-contrats">
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
                            <a href="/mes-stats">
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
                            <a href="/compte-administrateur">
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
    url: "{{ route('getUserRdvs') }}",
    type: 'GET',
    dataType: 'json',
    success: function(data) {
    console.log('RDVS fetched successfully', data);
        data.forEach(function(event) {
            rdvs.push({
                title: 'Rendez vous le : ' + event.date,
                start: event.date + 'T' + event.heure,
                backgroundColor: '#e7f6fd',
                borderColor: '#e7f6fd',
                textColor: '#0369A1',
                classNames: ['event-visio']
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
    height: '400px',
    width: '100%',
    initialView: 'timeGridWeek',
    initialDate: today,
    headerToolbar: {
      left: 'prev,today,next',
      right: '',
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
                    '#0049FC'
                ],
                borderWidth: 3
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, 0)",
                    }
                }],
                xAxes: [{
                    gridLines: {
                        color: "rgba(0, 0, 0, 0)",
                    }
                }]
            },
            plugins: {
                legend: {
                    labels: {
                        // This more specific font property overrides the global property
                        font: {
                            size: 6
                            }
                        }
                },
                plugins: {
                    title: {
                        display: true,
                        text: (ctx) => 'Point Style: ' + ctx.chart.data.datasets[0].pointStyle,
                    }
                }
            },
            layout: {
                padding: 10
            }
        }
    });
});
</script>
@endpush