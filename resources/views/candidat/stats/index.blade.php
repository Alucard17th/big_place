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
.offer-day, .offer-week, .offer-month, .candidature-day, .candidature-week, .candidature-month, .rdv-day, .rdv-month {
    border-radius: 10.9204px !important;
    font-family: 'Inter' !important;
    font-style: normal !important;
    font-weight: 500 !important;
    font-size: 14px !important;
    line-height: 20px !important;
    margin-left: 10px !important;
    margin: 0px;
    overflow: visible;
    text-transform: none;
    display: inline-block;
    padding: 0.4em 0.65em;
    text-align: center;
    user-select: none;
    vertical-align: middle;
    cursor: pointer;
    flex: 1 1 auto;
    position: relative;
    z-index: 1;
    border: 0px;
}
.offer-day.active, .offer-month.active, .offer-week.active,
.candidature-day.active, .candidature-month.active, .candidature-week.active,
.rdv-day.active, .rdv-month.active {
    background-color: #302EA7 !important;
    color: #FFFFFF !important;
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
                            <a href="{{ route('candidat.dashboard') }}" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <div class="widget-content">
                            <div class="col-12">
                                <form method="GET" action="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="start_date">Groupé par:</label>
                                        <select class="form-control" id="group_by" name="group_by">
                                            <option value="day" @if(request()->get('group_by') == 'day') selected @endif>Jour</option>
                                            <option value="week" @if(request()->get('group_by') == 'week') selected @endif>Semaine</option>
                                            <option value="month" @if(request()->get('group_by') == 'month') selected @endif>Mois</option>
                                        </select>
                                    </div>
                                    
                                    <div class="filter-by-day" style="{{ request()->get('group_by') == 'day' || request()->get('group_by') == null ? '' : 'display:none' }}">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="start_date">Début:</label>
                                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ request()->get('start_date') }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="end_date">Fin:</label>
                                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ request()->get('end_date') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="filter-by-week" style="{{ request()->get('group_by') == 'week' ? '' : 'display:none' }}">
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label for="week_start">Début:</label>
                                                <input type="week" class="form-control" id="week_start" name="week_start" value="{{ request()->get('week_start') }}">
                                                
                                            </div>

                                            <div class="col-6">
                                                <label for="week_end">Fin:</label>
                                                <input type="week" class="form-control" id="week_end" name="week_end" value="{{ request()->get('week_end') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="filter-by-month" style="{{ request()->get('group_by') == 'month' ? '' : 'display:none' }}">
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label for="month_start">Début:</label>
                                                <input type="month" class="form-control" id="month_start" name="month_start" value="{{ request()->get('month_start') }}">
                                            </div>

                                            <div class="col-6">
                                                <label for="month_end">Fin:</label>
                                                <input type="month" class="form-control" id="month_end" name="month_end" value="{{ request()->get('month_end') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="theme-btn btn-style-one bg-btn">Filtrer</button>
                                    <a href="{{route('recruiter.stats')}}" type="button" class="theme-btn btn-style-one bg-btn"
                                    style="background-color: rgba(255, 140, 0, 0.1) !important;
                                    color: #ff8c00 !important; border: 1px solid #ff8c00 !important">Réinitialiser</a>
                                </form>
                            </div>
                            <!-- TABLE VIEW -->
                            
                        </div>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-4">
                        <div class="card stat-card">
                            <div class="card-body">
                                <h5 class="card-title">Rendez-vous effectués</h5>
                                <h6 class="text-success text-center mt-4">{{ $doneRdvs }}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card stat-card">
                            <div class="card-body">
                                <h5 class="card-title">Rendez-vous en attente</h5>
                                <h6 class="text-warning text-center mt-4">{{ $pendingRdvs }}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="card stat-card">
                            <div class="card-body">
                                <h5 class="card-title">Rendez-vous annulés</h5>
                                <h6 class="text-danger text-center mt-4">{{ $refusedRdvs }}</h6>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <!-- TABLE VIEW -->
                <div class="row mb-5">
                    <div class="col-6">
                        <div class="ls-widget h-100">
                            <div class="tabs-box">
                                <div class="widget-content">
                                    <h3 class="py-4">Répartition des rendez-vous</h3>
                                    <div id="rdvs-chart" class="" width="600" height="500"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="ls-widget h-100">
                            <div class="tabs-box">
                                <div class="widget-content">
                                    <h3 class="py-4">Répartition des candidatures</h3>
                                    <div id="candidatures-pie-chart" class="" width="600" height="500"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 mt-3">
                        <div class="ls-widget">
                            <div class="tabs-box">
                                <div class="widget-content">
                                    <h3 class="py-4">Nombre de candidatures envoyées</h3>
                                    <div id="chart-candidatures"> </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 mt-3">
                        <div class="ls-widget">
                            <div class="tabs-box">
                                <div class="widget-content">
                                    <h3 class="py-4">Réponses aux candidatures envoyées</h3>
                                    <div id="chart-offers"> </div>
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
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
$(document).ready(function() {
    $('#group_by').change(function () {
        // Hide all divs initially
        $('.filter-by-day, .filter-by-week, .filter-by-month').hide();

        // Show the selected div
        var selectedOption = $(this).val();
        $('.filter-by-' + selectedOption).show();
    });
})
</script> 
<script>
// when document is ready
$(document).ready(function() {
    let candidaturesByDay = @json($candidaturesByDay);
    let candidaturesByMonth = @json($candidaturesByMonth);
    labels = Object.keys(candidaturesByDay);
    data = Object.values(candidaturesByDay);
    var candidaturesOptions = {
        height: 450,
        chart: {
            type: 'bar'
        },
        colors: ['#22218c'],
        series: [{
            name: 'Candidatures',
            data: data
        }],
        xaxis: {
            categories: labels
        }
    }
    var candidaturesChart = new ApexCharts(document.querySelector("#chart-candidatures"), candidaturesOptions);
    candidaturesChart.render();

    const rdvsEffectue = @json($doneRdvs);
    const rdvsCancelled = @json($refusedRdvs);
    const rdvsPending = @json($pendingRdvs);

    var optionsPieChart = {
          series: [rdvsEffectue, rdvsCancelled, rdvsPending],
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: ["Rdv effectué", "Rdv annulé", "Rdv en attente"],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

    var Piechart = new ApexCharts(document.querySelector("#rdvs-chart"), optionsPieChart);
    Piechart.render();

    // CANDIDATURES PIE CHART
    const candidaturesEffectue = @json($doneCandidatures);
    const candidaturesCancelled = @json($refusedCandidatures);
    const candidaturesPending = @json($pendingCandidatures);

    var optionsCandidaturesPieChart = {
          series: [candidaturesEffectue, candidaturesCancelled, candidaturesPending],
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: ["Candidature envoyée", "Candidature refusée", "Candidature en attente"],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

    var Piechart = new ApexCharts(document.querySelector("#candidatures-pie-chart"), optionsCandidaturesPieChart);
    Piechart.render();
});
</script>
@endpush