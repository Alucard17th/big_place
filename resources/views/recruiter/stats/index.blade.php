@extends('layouts.dashboard')
@push('styles')
<style>
.modal a.custom-close-modal {
    position: absolute;
    top: -12.5px;
    right: -12.5px;
    display: block;
    width: 30px;
    height: 30px;
    text-indent: -9999px;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center center;
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAAXNSR0IArs4c6QAAA3hJREFUaAXlm8+K00Acx7MiCIJH/yw+gA9g25O49SL4AO3Bp1jw5NvktC+wF88qevK4BU97EmzxUBCEolK/n5gp3W6TTJPfpNPNF37MNsl85/vN/DaTmU6PknC4K+pniqeKJ3k8UnkvDxXJzzy+q/yaxxeVHxW/FNHjgRSeKt4rFoplzaAuHHDBGR2eS9G54reirsmienDCTRt7xwsp+KAoEmt9nLaGitZxrBbPFNaGfPloGw2t4JVamSt8xYW6Dg1oCYo3Yv+rCGViV160oMkcd8SYKnYV1Nb1aEOjCe6L5ZOiLfF120EjWhuBu3YIZt1NQmujnk5F4MgOpURzLfAwOBSTmzp3fpDxuI/pabxpqOoz2r2HLAb0GMbZKlNV5/Hg9XJypguryA7lPF5KMdTZQzHjqxNPhWhzIuAruOl1eNqKEx1tSh5rfbxdw7mOxCq4qS68ZTjKS1YVvilu559vWvFHhh4rZrdyZ69Vmpgdj8fJbDZLJpNJ0uv1cnr/gjrUhQMuI+ANjyuwftQ0bbL6Erp0mM/ny8Fg4M3LtdRxgMtKl3jwmIHVxYXChFy94/Rmpa/pTbNUhstKV+4Rr8lLQ9KlUvJKLyG8yvQ2s9SBy1Jb7jV5a0yapfF6apaZLjLLcWtd4sNrmJUMHyM+1xibTjH82Zh01TNlhsrOhdKTe00uAzZQmN6+KW+sDa/JD2PSVQ873m29yf+1Q9VDzfEYlHi1G5LKBBWZbtEsHbFwb1oYDwr1ZiF/2bnCSg1OBE/pfr9/bWx26UxJL3ONPISOLKUvQza0LZUxSKyjpdTGa/vDEr25rddbMM0Q3O6Lx3rqFvU+x6UrRKQY7tyrZecmD9FODy8uLizTmilwNj0kraNcAJhOp5aGVwsAGD5VmJBrWWbJSgWT9zrzWepQF47RaGSiKfeGx6Szi3gzmX/HHbihwBser4B9UJYpFBNX4R6vTn3VQnez0SymnrHQMsRYGTr1dSk34ljRqS/EMd2pLQ8YBp3a1PLfcqCpo8gtHkZFHKkTX6fs3MY0blKnth66rKCnU0VRGu37ONrQaA4eZDFtWAu2fXj9zjFkxTBOo8F7t926gTp/83Kyzzcy2kZD6xiqxTYnHLRFm3vHiRSwNSjkz3hoIzo8lCKWUlg/YtGs7tObunDAZfpDLbfEI15zsEIY3U/x/gHHc/G1zltnAgAAAABJRU5ErkJggg==);
}

.stat-card {
    height: 100% !important;
}
</style>
@endpush
@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="upper-title-box d-flex justify-content-between align-items-center p-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <h3>Statistiques</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('recruiter.dashboard') }}" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <div class="widget-content">
                            <!-- TABLE VIEW -->
                            <div class="row mb-5">
                                <div class="col-4">
                                    <div class="card stat-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Rendez-vous effectués</h5>
                                            <p class="card-text">{{$doneRdvs}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="card stat-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Rendez-vous en attente</h5>
                                            <p class="card-text">{{$pendingRdvs}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="card stat-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Rendez-vous annulés</h5>
                                            <p class="card-text">{{$refusedRdvs}}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="col-3">
                                    <div class="card stat-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Offres d’emploi par métier</h5>
                                            <p class="card-text">
                                                @foreach($offresByMetier as $key => $value)
                                                {{$key}} : {{$value}}
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                </div> -->

                                <!-- <div class="col-3">
                                    <div class="card stat-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Durée moyenne d’embauche</h5>
                                            <p class="card-text">{{$moyenneDureeRecrutement}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3 mt-3">
                                    <div class="card stat-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Durée de souscription du pack:::</h5>
                                            <p class="card-text">{{$dureeSusbcription}}</p>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TABLE VIEW -->
                <div class="row mb-5">
                    <div class="col-6">
                        <div class="ls-widget">
                            <div class="tabs-box">
                                <div class="widget-content">
                                    <h3 class="pt-3">Nombre d'offres publiées</h3>
                                    <div class="actions row">
                                        <div class="col-12 text-center">
                                            <button>Jours</button>
                                            <button class="d-none">Mois</button>
                                        </div>
                                    </div>
                                    <canvas id="offres-chart" class="" width="600" height="500"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                

                    <div class="col-6">
                        <div class="ls-widget">
                            <div class="tabs-box">
                                <div class="widget-content">
                                    <h3 class="pt-3">Nombre de candidatures</h3>
                                    <div class="actions row">
                                        <div class="col-12 text-center">
                                            <button>Jours</button>
                                            <button class="d-none">Mois</button>
                                        </div>
                                    </div>
                                    <canvas id="candidatures-chart" class="" width="600" height="500"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="ls-widget">
                            <div class="tabs-box">
                                <div class="widget-content">
                                    <h3 class="pt-3">Rendez-vous</h3>
                                    <div class="actions row">
                                        <div class="col-12 text-center">
                                            <button>Jours</button>
                                            <button class="d-none">Mois</button>
                                        </div>
                                    </div>
                                    <canvas id="rdvs-chart" class="" width="600" height="500"></canvas>
                                </div>
                            </div>
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
$(document).ready(function() {
    var ctx = document.getElementById("rdvs-chart").getContext('2d');
    var ctx2 = document.getElementById("offres-chart").getContext('2d');
    var ctx3 = document.getElementById("candidatures-chart").getContext('2d');
    const rdvsEffectue = @json($doneRdvs);
    const rdvsCancelled = @json($refusedRdvs);
    const rdvsPending = @json($pendingRdvs);

    let offersByDay = @json($offersByDay);
    let offersByMonth = @json($offersByMonth);

    let candidaturesByDay = @json($candidaturesByDay);
    let candidaturesByMonth = @json($candidaturesByMonth);

    console.log('rdvs', offersByDay);
    console.log('rdvs', offersByMonth);

    var labels = Object.keys(candidaturesByDay);
    var data = Object.values(candidaturesByDay);
    var myChartCandidatures = new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Candidatures',
                data: data,
                backgroundColor: '#0049FC', 
                borderColor: '#0049FC',
                hoverOffset: 4
            }]
        },
        options: {
            legend: {
                display: true
            },
            scales: {
                
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

    labels = Object.keys(offersByDay);
    data = Object.values(offersByDay);
    var myChartOffers = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Offres',
                data: data,
                backgroundColor: '#0049FC', 
                borderColor: '#0049FC',
                hoverOffset: 4
            }]
        },
        options: {
            legend: {
                display: true
            },
            scales: {
                
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

    var myChartRdvs = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Rdv effectué", "Rdv annulé", "Rdv en attente"],
            datasets: [{
                label: 'My First Dataset',
                data: [rdvsEffectue, rdvsCancelled, rdvsPending],
                backgroundColor: [
                    '#0049FC',
                    'rgb(255, 99, 132)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        },
        options: {
            legend: {
                display: true
            },
            scales: {
                
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

    
})
</script>
@endpush