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

#select2-job_title-container{
    padding-left: 25px !important;
}
#location_city{
    padding-left: 38px !important;
}
.select2-search__field{
    color:#8f959b !important;
}
.select2-selection__rendered{
    color:#8f959b !important;
    padding-left:18px;
}

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
            <div class="col-5 px-2">
                <div class="card">
                    <div class="card-body px-4">
                    <h4 class="text-dark dashboard-card-title mb-4">Moteur de recherche</h4>
                    <form method="get" class="" action="{{route('candidat.offers.search')}}">
                        <div class="row no-gutters">
                            <div class="col-12">
                                <div class="form-group mb-2">
                                    <img src="{{asset('/plugins/images/dashboard/icons/search.png')}}" alt="" 
                                    style="padding: 6px; min-width: 18px; position: absolute; z-index: 10;scale: 0.7;">
                                    <select name="job_title" id="job_title" class="form-control">
                                        <option value="" selected value="">Titre de l'offre</option>
                                        @foreach($jobs as $job)
                                        <option value="{{$job->id}}">{{$job->id}} - {{$job->full_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2">
                                    <img src="{{asset('/plugins/images/dashboard/icons/location.png')}}" alt="" 
                                    style="padding: 6px; min-width: 24px; position: absolute;scale: 0.7;">
                                    <input type="text" name="location_city" id="location_city" value="" class="form-control mb-2" placeholder="Ville / Département">
                                </div>
                                <div class="form-group mb-2">
                                    <input type="text" name="brut_salary" value="" class="form-control" placeholder="Pretentions salariales">
                                </div>
                            </div>

                            <div class="col-6 pr-1">
                                <div class="form-group mb-2">
                                    <select name="education_level" id="education_level" class="form-control">
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
                                    <input type="number" name="experience_level" id="experience_level"  value="" class="form-control mb-2" placeholder="Années d'expérience">
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
                        <canvas id="myChart" ></canvas>
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
    $("#job_title").select2({});
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