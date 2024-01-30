@extends('layouts.dashboard')
@push('styles')
<style>
    .offer-desc p {
        white-space: pre-wrap;
        word-wrap: break-word;
        margin-bottom: 0 !important;
        margin-top: 3px !important;
        font-size: 16px;
        color: #000 !important;
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
                            <a href="{{$routeName}}" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <div class="widget-content">
                            <div class="container">
                                <div class="row my-4">
                                    <a class="theme-btn btn-style-one bg-btn text-white"
                                        id="open-apply-modal">Je Postule</a>
                                    <a href="{{route('candidat.vitrine.show', $offer->user_id)}}"
                                        class="bg-btn-three bg-btn ml-3"
                                        style="padding-left:25px !important;padding-right:25px !important;">Consulter
                                        la vitrine de l'entreprise</a>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
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
                                            @if ($offer->work_schedule != null && $offer->work_schedule != '[]')
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

                                        <h5 class="h6 mb-3">Descriptif du poste :
                                            <div class="offer-desc text-dark mt-2">
                                                {!! $offer->description !!}
                                            </div>
                                            <!-- @if ($offer->post_tasks != null)
                                                @foreach (json_decode($offer->post_tasks) as $task)
                                                <span class="text-muted">{{ $task }}</span>@if(!$loop->last)<span class="text-muted">,</span>@endif
                                                @endforeach
                                            @else
                                            <span class="text-muted">-</span>
                                            @endif -->
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

    <div id="ex1" class="modal">
        <form action="{{ route('candidat.candidature.store') }}" method="POST" id="apply-form">
            @csrf
            <div class="form-tags d-none">
                <input type="hidden" name="entreprise_owner_id" value="{{$offer->user_id}}">
                <input type="hidden" name="title" value="{{$offer->job_title}}">
                <input type="hidden" name="offer_id" value="{{$offer->id}}">
            </div>
            <h4 class="text-dark mb-3">Postuler </h4>

            <div class="row">
                <h4 class="offre-title col-12">
                    {{$offer->job_title}}</h4>
                <div class="offre-status col-12">Status de l'offre :
                    {{$offer->status}}</div>
                <div class="offre-end-date col-12">Date de limitation de candidature :
                    {{$offer->unpublish_date}}</div>
            </div>

            <div class="row my-4">
                <h4 class="offre-title col-12">Mes informations </h4>
                <div class="col-12 offre-desc">
                    Nom : {{auth()->user()->name}}
                </div>
                <div class="col-12 offre-desc">
                    Email : {{auth()->user()->email}}
                </div>
                <div class="col-12 offre-desc">
                    Date de naissance : {{auth()->user()->birth_date}}
                </div>
                <div class="col-12 offre-desc">
                    Mon CV : 
                    <a href="{{asset('storage'.auth()->user()->curriculum[0]->cv)}}" class="" target="_blank">
                    <i class="las la-eye"></i>
                        Voir
                    </a>
                </div>
            </div>

            <div class="form-group">
                <button class="theme-btn btn-style-one" type="submit" id="apply-btn">Postuler</button>
            </div>
        </form>

        <a href="#" class="custom-close-modal"></a>
    </div>

</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {

    $('#open-apply-modal').click(function() {
        // Send the data 
        $("#ex1").modal({
            escapeClose: false,
            clickClose: true,
            showClose: false
        });
    })

    $('#close-modal, .custom-close-modal').click(function() {
        console.log('Modal Should Be Closed');
        $.modal.close();
    });
});
</script>
@endpush