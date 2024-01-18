@extends('layouts.dashboard')
@push('styles')
<style>
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
    height: 35px !important;
    /* padding: .3rem .70rem !important; */
    padding-top: 2px;
    padding-left: 6px;
    font-weight: 400 !important;
    line-height: 1.5 !important;
    color: #8f959b !important;
    background-color: #fff !important;
    background-clip: padding-box !important;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out !important;
    margin-bottom: .5rem !important !important;
    border: 1px solid #dae1e7 !important;
    border-radius: 3px !important;
    box-shadow: none !important;
    font-size: 14px !important;
}

#edit-offer-form>h4 {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 36px;
    line-height: 41px;
    /* identical to box height, or 102% */
    color: #202124;
}

#edit-offer-form>div>label,
#edit-offer-form>div.row>div>div>label {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 41px;
    color: #202124;
}

#edit-offer-btn {
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

        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="upper-title-box d-flex justify-content-between align-items-center p-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <h3>Mon offre d'emploi - Détails</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="/ma-vitrine" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <div class="widget-content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 offset-md-1">
                                        <h2 class="h5 mb-3">Nom du projet ou de la campagne : <span
                                                class="text-muted">{{ $offer->project_campaign_name }}</span></h2>

                                        <h5 class="h6 mb-3">Intitulé du poste : <span
                                                class="text-muted">{{ $offer->job_title }}</span></h5>

                                        <h5 class="h6 mb-3">Date de démarrage souhaitée : <span
                                                class="text-muted">{{ \Carbon\Carbon::parse($offer->start_date)->format('d-m-Y') }}</span></h5>
                                       
                                        <p class="small mb-3">
                                            <h5 class="h5 font-weight-bold">Lieu du poste</h5>
                                            <span class="fw-bold">Ville :</span> {{ $offer->location_city }}<br>
                                            <span class="fw-bold">Code postal :</span>
                                            {{ $offer->location_postal_code }}<br>
                                            <span class="fw-bold">Adresse :</span> {{ $offer->location_address }}
                                        </p>

                                        <h5 class="h5 font-weight-bold">Détails</h5>
                                        <h5 class="h6 mb-3">Type de contrat : <span
                                                class="text-muted">{{ $offer->contract_type }}</span></h5>

                                        <h5 class="h6 mb-3">Horaires de travail :
                                            @if ($offer->work_schedule != "null")
                                                @foreach (json_decode($offer->work_schedule) as $schedule)
                                                    <span class="text-muted">{{ $schedule }}</span>@if(!$loop->last)<span class="text-muted">,</span>@endif
                                                @endforeach
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </h5>
                                                

                                        <h5 class="h6 mb-3">Nombre d'heures par semaine : <span
                                                class="text-muted">{{ $offer->weekly_hours }}</span></h5>

                                        <h5 class="h6 mb-3">Niveau d'expérience requis : <span
                                                class="text-muted">{{ $offer->experience_level }}</span></h5>

                                        <h5 class="h6 mb-3">Langues souhaitées :
                                            @if ($offer->desired_languages != null)
                                                @foreach (json_decode($offer->desired_languages) as $language)
                                                <span class="text-muted">{{ $language }}</span>@if(!$loop->last)<span class="text-muted">,</span>@endif
                                                @endforeach
                                            @else
                                            <span class="text-muted">-</span>
                                            @endif
                                        </h5>   

                                        <h5 class="h6 mb-3">Niveau d'études requis : <span
                                                class="text-muted">{{ $offer->education_level }}</span></h5>

                                        <h5 class="h6 mb-3">Salaire brut : <span
                                                class="text-muted">{{ $offer->brut_salary }}</span></h5>

                                        <h5 class="h6 mb-3">Secteur d'activité : <span
                                                class="text-muted">{{ $offer->industry_sector }}</span></h5>
                                        
                                        <h5 class="h6 mb-3">Avantages : <span
                                            class="text-muted">{{ $offer->benefits }}</span></h5>

                                        <h5 class="h6 mb-3">Tâches à effectuer :
                                            @if ($offer->post_tasks != null)
                                                @foreach (json_decode($offer->post_tasks) as $task)
                                                <span class="text-muted">{{ $task }}</span>@if(!$loop->last)<span class="text-muted">,</span>@endif
                                                @endforeach
                                            @else
                                            <span class="text-muted">-</span>
                                            @endif
                                        </h5>   

                                        <h5 class="h6 mb-3">Canaux de diffusions :
                                            @if ($offer->selected_jobboards != null)
                                                @foreach (json_decode($offer->selected_jobboards) as $jobboars)
                                                <span class="text-muted">{{ ucfirst(str_replace('_', ' ', $jobboars)) }}</span>@if(!$loop->last)<span class="text-muted">,</span>@endif
                                                @endforeach
                                            @else
                                            <span class="text-muted">-</span>
                                            @endif
                                        </h5>   
                                        
                                    </div>
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

@endpush