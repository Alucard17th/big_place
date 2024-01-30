@extends('layouts.dashboard')
@push('styles')
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
  integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
/>
<style>
.vitrine-logo {
    width:65px;
    height:65px;
}

.vitrine-photos {
    width: 100px;
    height: 100px;
}

.bg-custom-btn {
    position: absolute;
    bottom: 18%;
    left: 81%;
    background-color: #b1acac7a;
    /* Change to your desired background color */
    color: #fff;
    /* Change to your desired text color */
    padding: 6px 12px;
    border-radius: 5px;
    text-decoration: none;
    display: flex;
    align-items: center;
}

/* Make it responsive */
@media (max-width: 768px) {
    .bg-custom-btn {
        bottom: 4%;
        /* Adjust the bottom position for smaller screens */
        left: 50%;
        /* Adjust the left position for smaller screens */
        transform: translateX(-50%);
        /* Center the button horizontally */
        font-size: 14px;
        /* Adjust the font size for smaller screens */
        padding: 6px 10px;
        /* Adjust padding for smaller screens */
    }
}

.bg-custom-btn i {
    margin-right: 5px;
}

#vitrine-form>h4 {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 36px;
    line-height: 41px;
    /* identical to box height, or 102% */
    color: #202124;
}

#vitrine-form>div>label,
#vitrine-form>div.row>div>div>label,
#vitrine-form>div>div>label {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 41px;
    color: #202124;
}

#vitrine-btn {
    background: #0369A1 !important;
    border-radius: 50px !important;
    font-family: 'Jost' !important;
    font-style: normal !important;
    font-weight: 700 !important;
    font-size: 20px !important;
    line-height: 20px !important;
    color: #FFFFFF !important;
    padding: 20px 75px !important;
}

.info-text {
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    color: #2D3748;
}

.filepond--drop-label {
    /* Button/btn-basic */
    box-sizing: border-box;
    background: rgba(3, 105, 161, 0.05);
    border: 2.05px dashed #0369A1;
    border-radius: 13.7593px;
}

.filepond--drop-label label {
    font-family: 'Outfit';
    font-style: normal;
    font-weight: 500;
    font-size: 20px;
    line-height: 25px;
    color: #0369A1;
}

.filepond--drop-label i {
    color: #0369A1;
}

.tab-btn {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 500;
    font-size: 20px;
    color: #202124;
    border-bottom: 7px solid transparent;
    transition: all 0.3s ease;
}

#offers-btn.active {
    background-color: #f5f5f5;
    border-bottom: 7px solid #0369A1 !important;
}

#company-btn.active {
    background-color: #f5f5f5;
    border-bottom: 7px solid #0369A1 !important;
}

#news-btn.active {
    background-color: #f5f5f5;
    border-bottom: 7px solid #0369A1 !important;
}

#inbox-btn.active {
    background-color: #f5f5f5;
    border-bottom: 7px solid #0369A1 !important;
}

#sent-btn.active {
    background-color: #f5f5f5;
    border-bottom: 7px solid #0369A1 !important;
}

.text-bg-blue{
    color: #22218c !important;
    font-weight: 800 !important;
}
.badge-bg-orange{
    background-color: #ff8b00 !important;
}
nav > ul.pagination > li.page-item.active > span{
    background-color: #ff8b00 !important;
    border-color: #fff !important;
}

nav > ul.pagination > li > a{
    color: #ff8b00 !important;
}

.font-min{
    font-size: 13px;
}
</style>
@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center justify-content-center">
                <h3>Ma vitrine entreprise</h3>
            </div>
            <div class="d-flex align-items-center">
                <a href="{{ route('recruiter.dashboard') }}" class="bg-back-btn mr-2">
                    <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                    Retour
                </a>
            </div>
        </div>
        <div class="row text-right">
            <div class="col-md-12">
                <button id="edit-profile">
                    <i class="las la-user-edit mr-1" style="font-size: 30px;"></i>
                    <span id="edit-profile-span">Modifier</span>
                </button>
            </div>
        </div>
        <div class="row" id="editor-container" style="display:none">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box p-4">
                        <h3 class="text-dark">Fiche entreprise</h3>
                        <div class="widget-content">
                            <form action="{{ route('recruiter.update.vitrine') }}" method="POST"
                                enctype="multipart/form-data" id="vitrine-form">
                                @csrf
                                <div class="row">
                                    <div class="col-12 align-items-center justify-content-center py-4">
                                        @if(!isset($entreprise) || $entreprise->cover == '')
                                        <img src="https://placehold.co/900X313" alt="" style="border-radius: 15px">
                                        @else
                                        <div
                                            style="background-image: url({{ 'storage'.$entreprise->cover }});border-radius: 15px; width: 900px; height: 300px;background-repeat: no-repeat;background-size: cover;">
                                        </div>
                                        <!-- <img src="{{ 'storage'.$entreprise->cover }}" alt="" style="border-radius: 15px; width: 900px; height: 200px"> -->
                                        @endif
                                        <a href="" class="bg-custom-btn" type="button" id="change-cover">
                                            <i class="las la-sync mr-2"></i>
                                            Changer
                                        </a>
                                        <input type="file" class="d-none" name="cover" id="cover">
                                    </div>

                                    <div class="col-12">
                                        <div class="row align-items-center pt-4 pb-5">
                                            <div class="col-2">
                                                @if(!isset($entreprise->logo) || $entreprise->logo == '')
                                                <img src="https://placehold.co/150X150" alt=""
                                                    style="border-radius: 15px">
                                                @else
                                                <img class="img-fluid vitrine-logo"
                                                    src="{{isset($entreprise) ? 'storage'.$entreprise->logo : '' }}"
                                                    alt="logo">
                                                @endif

                                            </div>
                                            <div class="col-10">
                                                <div>
                                                    <a href="" id="change-logo" type="button"
                                                        class="bg-btn-three border-0">
                                                        <!-- Détails -->
                                                        <i class="las la-sync"></i>
                                                        Changer
                                                    </a>
                                                    <a href="" id="delete-logo" type="button"
                                                        class="bg-btn-four border-0">
                                                        <!-- Détails -->
                                                        <i class="las la-trash"></i>
                                                        Supprimer
                                                    </a>
                                                </div>
                                                <div class="pt-1 pb-3">
                                                    <span class="text-dark info-text">Taille recommandée: Largeur 300px
                                                        X Hauteur
                                                        300px</span>
                                                </div>
                                                <input type="file" class="" name="logo" id="logo">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="nom_entreprise">Nom Entreprise</label>
                                            <input type="text" class="form-control" name="nom_entreprise"
                                                id="nom_entreprise"
                                                value="{{ isset($entreprise) ? $entreprise->nom_entreprise : ''}}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="siege_social">Lieu du Siège Social</label>
                                            <input type="text" class="form-control" name="siege_social"
                                                id="siege_social"
                                                value="{{ isset($entreprise) ? $entreprise->siege_social : ''}}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="date_creation">Date de Création</label>
                                            <input type="date" class="form-control" name="date_creation"
                                                id="date_creation"
                                                value="{{ isset($entreprise) ? $entreprise->date_creation : ''}}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="sector">Secteur d'activité</label>
                                            <input type="text" class="form-control" name="sector"
                                                id="sector"
                                                value="{{ isset($entreprise) ? $entreprise->sector : ''}}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="valeurs_fortes">Valeurs Fortes</label>
                                            <input type="text" class="form-control" name="valeurs_fortes"
                                                id="valeurs_fortes"
                                                value="{{ isset($entreprise) ? $entreprise->valeurs_fortes : ''}}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="nombre_implementations">Nombre
                                                d'Implantations</label>
                                            <input type="text" class="form-control" name="nombre_implementations"
                                                id="nombre_implementations"
                                                value="{{ isset($entreprise) ? $entreprise->nombre_implementations : ''}}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="effectif">Effectif</label>
                                            <input type="text" class="form-control" name="effectif" id="effectif"
                                                value="{{ isset($entreprise) ? $entreprise->effectif : ''}}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="fondateurs">Fondateurs</label>
                                            <!-- <input type="text" class="form-control" name="fondateurs" id="fondateurs"
                                                value="{{ isset($entreprise) ? $entreprise->fondateurs : ''}}"> -->
                                            <select id='diacritics' name='fondateurs[]' class='' multiple>
                                                @if(isset($entreprise->fondateurs))
                                                @foreach (json_decode($entreprise->fondateurs, true) as $fondateur)
                                                    <option value="{{ $fondateur }}" selected>{{ $fondateur }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="chiffre_affaire">Chiffre d'Affaires</label>
                                            <input type="text" class="form-control" name="chiffre_affaire"
                                                id="chiffre_affaire"
                                                value="{{ isset($entreprise) ? $entreprise->chiffre_affaire : ''}}">
                                        </div>
                                    </div>

                                    <div class="col-6 my-4">
                                        <label class="text-dark" for="photos_locaux">Photos des locaux et
                                            bureaux</label>
                                        <input type="file" class="" name="photos_locaux[]" id="photos_locaux" multiple>

                                    </div>

                                    <div class="col-6 my-4">
                                        <label class="text-dark" for="video">Vidéo</label>
                                        <input type="file" name="video[]" id="video" acceptedFileTypes={['video/*']} multiple>
                                        <!-- <video width="320" height="240" controls
                                            src="{{ isset($entreprise) ? 'storage/'. $entreprise->video : '' }}"> -->
                                    </div>


                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"
                                                id="vitrine-btn">Enregistrer</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="preview-container">
            <div class="col-lg-12">
                <div class="">
                    <div class="tabs-box p-4">
                        <div class="row align-items-center justify-content-center">
                            @if(!isset($entreprise) || $entreprise->cover == '')
                            <img src="https://placehold.co/900X313" alt="" style="border-radius: 15px">
                            @else
                            <div
                                style="background-image: url({{ 'storage'.$entreprise->cover }});border-radius: 15px; width: 900px; height: 300px;background-repeat: no-repeat;background-size: cover;">
                            </div>
                            <!-- <img src="{{ 'storage'.$entreprise->cover }}" alt="" style="border-radius: 15px; width: 900px; height: 200px"> -->
                            @endif

                            <div class="row w-100 px-5">
                                <div class="row w-100 align-items-center justify-content-center">
                                    <div class="col-3">
                                        @if(!isset($entreprise->logo) || $entreprise->logo == '')
                                        <img src="https://placehold.co/150X150" alt="" style="border-radius: 15px">
                                        @else
                                        <img class="img-fluid vitrine-logo"
                                            src="{{isset($entreprise) ? 'storage'.$entreprise->logo : '' }}" alt="logo">
                                        @endif
                                    </div>

                                    <div class="col-3">
                                        <button class="tab-btn active" id="offers-btn">Nos Offres</button>
                                    </div>
                                    <div class="col-3">
                                        <button class="tab-btn" id="company-btn">Notre entreprise</button>
                                    </div>
                                    <div class="col-3">
                                        <button class="tab-btn" id="news-btn">Nos actualités</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row p-5" id="offers-container-header">
                                <h4 class="text-dark">
                                    <span style="color:#ff8c00;" class="mr-1">
                                        {{$entreprise ? $entreprise->user->offers->count() : 0}}
                                    </span>Offres disponibles</h4>
                            </div>
                        </div>

                        <div class="row justify-content-center align-items-center px-3" id="offers-container">
                            @php
                            use Carbon\Carbon;
                            @endphp
                            @if(isset($offers) && count($offers) > 0)
                                @foreach($offers as $offer)
                                <div class="col-4 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body p-2">
                                            <div class="row">
                                                <div class="col-4">
                                                    @if(!isset($entreprise->logo) || $entreprise->logo == '')
                                                    <img src="https://placehold.co/150X150" alt=""
                                                        style="border-radius: 15px">
                                                    @else
                                                    <img class="img-fluid vitrine-logo"
                                                        src="{{isset($entreprise) ? 'storage'.$entreprise->logo : '' }}"
                                                        alt="logo">
                                                    @endif
                                                </div>
                                                <div class="col-8">
                                                    <div class="">
                                                        <a href="{{route('recruiter.show.vitrine.offer', $offer->id)}}" class="text-bg-blue">
                                                        <h5> {{ $offer->job_title }}</h5>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="text-bg-blue font-min">
                                                        <img width="15" height="15" src="https://img.icons8.com/ios/50/marker--v1.png" alt="marker--v1"/>
                                                        {{$offer->location_city}}
                                                    </div>
                                                    <div class="text-bg-blue font-min">
                                                        <img width="15" height="15" src="https://img.icons8.com/dotty/80/time.png" alt="time"/>
                                                        {{ \Carbon\Carbon::parse($offer->created_at)->formatLocalized('%d-%m-%Y') }}
                                                    </div>
                                                    <div class="badges">
                                                        <span class="badge badge-bg-orange text-white">{{$offer->contract_type}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                

                                <div class="col-12 d-flex justify-content-center">
                                {{ $offers->links() }}
                                </div>
                            @endif
                        </div>


                        @if(isset($entreprise))
                        <div class="row justify-content-left align-items-left px-3" style="display:none"
                            id="company-container">
                            <div class="col-12 mt-2 mb-1">
                                <h4 class="text-dark">{{ $entreprise->nom_entreprise }}</h4>
                                <p class="text-dark">{{ $entreprise->domiciliation }}, {{ $entreprise->siege_social }}</p>
                                <ul class="list-unstyled text-dark">
                                    <li>Date de création : {{ $entreprise->date_creation }}</li>
                                    <!-- <li>{{ $entreprise->domiciliation }}</li> -->
                                    <li>Valeurs fortes : {{ $entreprise->valeurs_fortes }}</li>
                                    <li>Nombre d'implantations : {{ $entreprise->nombre_implementations }}</li>
                                    <li>Fondateurs : {{ $entreprise->fondateurs }}</li>
                                    <li>Chiffre d'affaires : {{ $entreprise->chiffre_affaire }}</li>
                                </ul>
                            </div>
                            <div class="col-12 py-2 mt-5">
                                <button type="button" class="btn active" id="inbox-btn">Images</button>
                                <button type="button" class="btn" id="sent-btn">Vidéos</button>
                            </div>

                            @if(isset($entreprise->photos_locaux) && count(json_decode($entreprise->photos_locaux)) > 0)
                            <div class="images-container">
                                <div class="row">
                                    @foreach(json_decode($entreprise->photos_locaux) as $key => $photo)
                                    <div class="col-3">
                                        <img src="{{ asset('storage/'.$photo) }}" alt="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            @if(isset($entreprise->video) && count(json_decode($entreprise->video)) > 0)
                            <div class="video-container" style="display: none">
                                <div class="row">
                                    @foreach(json_decode($entreprise->video) as $key => $video)
                                        <div class="col-6">
                                            <video width="320" height="240" controls 
                                            src="{{ isset($entreprise) ? asset('storage/'. $video) : '' }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="row justify-content-left align-items-left px-3" style="display:none"
                            id="news-container">
                            <div class="col-12 mt-5" id="table-formations">
                                <div class="d-flex my-4">
                                    <h3>Mes formations proposées</h3>
                                </div>
                                <div class="table-outer">
                                    <table class="table table-sm table-bordered" id="data-table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Nom du poste</th>
                                                <th>Nombre de jours de formation</th>
                                                <th>Période de formation</th>
                                                <th>CDI à l'embauche</th>
                                                <th>Compétences acquises</th>
                                                <th>Postes Ouverts</th>
                                                <th>Nombre d'inscrits</th>
                                                <th>Lieu</th>
                                                <th>Statut</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($entreprise->user->formations as $formation)
                                            @php
                                            $startDate = \Carbon\Carbon::parse($formation->start_date);
                                            $endDate = \Carbon\Carbon::parse($formation->end_date);
                                            $durationInDays = $startDate->diffInDays($endDate);
                                            @endphp
                                            <tr>
                                                <td>{{$formation->job_title}}</td>
                                                <td>{{$durationInDays}}</td>
                                                <td>{{ \Carbon\Carbon::parse($formation->start_date)->formatLocalized('%d-%m-%Y') }}
                                                    au
                                                    {{ \Carbon\Carbon::parse($formation->end_date)->formatLocalized('%d-%m-%Y') }}
                                                </td>
                                                <td>
                                                    @if($formation->cdi_at_hiring == 1)
                                                    Oui
                                                    @else
                                                    Non
                                                    @endif
                                                </td>
                                                <td>{{$formation->skills_acquired}}</td>
                                                <td>{{$formation->open_positions}}</td>
                                                <td>{{$formation->participants->count()}}</td>
                                                <td>{{$formation->work_location}}</td>
                                                <td>
                                                    @if($formation->status == 'Active')
                                                    <span class="badge badge-success">Active</span>
                                                    @elseif($formation->status == 'Suspendue')
                                                    <span class="badge badge-warning">Suspendue</span>
                                                    @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-12 mt-5" id="table-jobdatings">
                                <div class="d-flex my-4">
                                    <h3>Mes évènemements / jobdatings</h3>
                                </div>
                                <div class="table-outer">
                                    <table class="table table-sm table-bordered" id="data-table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Organisateur</th>
                                                <th>Poste</th>
                                                <th>N° Max de Participants</th>
                                                <th>Participants Inscrits</th>
                                                <th>Adresse</th>
                                                <th>Entrée gratuite</th>
                                                <th>Date - Heure</th>
                                                <th>Statut</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($entreprise->user->events as $event)
                                            <tr>
                                                <td class="text-left">{{$event->organizer_name}}</td>
                                                <td class="text-left">{{$event->job_position}}</td>
                                                <td class="text-left">{{$event->participants_count}}</td>
                                                <td class="text-left">{{$event->participants->count()}}</td>
                                                <td class="text-left">{{$event->event_address}}</td>
                                                <td class="text-left">
                                                    @if($event->free_entry == 1)
                                                    Oui
                                                    @else
                                                    Non
                                                    @endif
                                                </td>
                                                <td class="text-left">
                                                    {{ \Carbon\Carbon::parse($event->event_date . ' ' . $event->event_hour)->formatLocalized('%d-%m-%Y à %H:%M') }}
                                                </td>
                                                <td class="text-left">{{$event->statut}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="ls-pagination">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@php
if( isset($entreprise) ){
$images = json_decode($entreprise->photos_locaux, true);
$video = $entreprise->video;
$logo = $entreprise->logo;
$cover = $entreprise->cover;
}else{
$images = [];
$video = [];
$logo = [];
$cover = [];
}
@endphp

@endsection

@push('scripts')
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
  integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
  crossorigin="anonymous"
  referrerpolicy="no-referrer"
></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const photos_locaux = document.querySelector('#photos_locaux');
    const logo = document.querySelector('#logo');
    const video = document.querySelector('#video');
    const cover = document.querySelector('#cover');
    const changeLogoBtn = document.querySelector('#change-logo');
    const deleteLogoBtn = document.querySelector('#delete-logo');
    const changeCoverBtn = document.querySelector('#change-cover');

    const images = @json($images);
    const logoUrl = @json($logo);
    const coverUrl = @json($cover);
    const videoUrl = @json($video);
    const newArray = images ? images.map(str => str.replace('public', 'storage')) : [];

    FilePond.registerPlugin(FilePondPluginFileValidateSize);
    FilePond.setOptions({
        server: {
            url: "{{ config('filepond.server.url') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ @csrf_token() }}",
            }
        }
    });

    const pond_cover = FilePond.create(cover, {
        files: coverUrl ? 'storage' + coverUrl : null,
        labelIdle: 'Glissez vos fichiers ici ou <span class="filepond--label-action">Parcourir</span>',
    });

    const pond_logo = FilePond.create(logo, {
        files: logoUrl ? 'storage' + logoUrl : null,
        labelIdle: 'Glissez vos fichiers ici ou <span class="filepond--label-action">Parcourir</span>',
    });

    changeCoverBtn.addEventListener('click', (event) => {
        event.preventDefault();
        pond_cover.browse();
    })

    changeLogoBtn.addEventListener('click', (event) => {
        event.preventDefault();
        pond_logo.browse();
    })

    deleteLogoBtn.addEventListener('click', (event) => {
        event.preventDefault();
        pond_logo.removeFile();
    })

    const pond_photos = FilePond.create(photos_locaux, {
        files: newArray ? newArray.map(url => ({
            source: 'storage' + url
        })) : null,
        labelIdle: '<i class="las la-image"></i>Ajouter des images',
    });

    const pond_video = FilePond.create(video, {
        maxFileSize: '100MB',
        chunkUploads: true,
        files: videoUrl ? 'storage' + videoUrl : null,
        labelIdle: '<i class="las la-video"></i>Ajouter une vidéo',
    });
    pond_video.on('processfile', (error, file) => {
        if (error) {
            console.error('FilePond error:', error);
            // Log the detailed error message from the server response
            if (error.body && error.body.errors) {
                console.error('Validation errors:', error.body.errors);
            }
        }
    });
})
</script>

<script>
$(document).ready(function() {
    let offersBtn = $('#offers-btn');
    let companyBtn = $('#company-btn');
    let newsBtn = $('#news-btn');

    let offersContainer = $('#offers-container');
    let offersContainerHeader = $('#offers-container-header');
    let companyContainer = $('#company-container');
    let newsContainer = $('#news-container');

    $("#diacritics").selectize({
        delimiter: ",",
        persist: false,
        maxItems: null,
        create: function (input) {
            return {
            value: input,
            text: input,
            };
        }
    });

    offersBtn.on('click', function() {
        offersBtn.addClass('active');
        companyBtn.removeClass('active');
        newsBtn.removeClass('active');

        offersContainer.show();
        offersContainerHeader.show();
        companyContainer.hide();
        newsContainer.hide();
    })

    companyBtn.on('click', function() {
        offersBtn.removeClass('active');
        companyBtn.addClass('active');
        newsBtn.removeClass('active');

        offersContainer.hide();
        offersContainerHeader.hide();
        companyContainer.show();
        newsContainer.hide();
    })

    newsBtn.on('click', function() {
        offersBtn.removeClass('active');
        companyBtn.removeClass('active');
        newsBtn.addClass('active');

        offersContainer.hide();
        offersContainerHeader.hide();
        companyContainer.hide();
        newsContainer.show();
    })

    $('#edit-profile').click(function() {
        $('#preview-container').toggle()
        $('#editor-container').toggle()
        var currentText = $('#edit-profile-span').text();
        var newText = currentText === "Modifier" ? "Aperçu" : "Modifier";
        $('#edit-profile-span').text(newText);
    })

    $('#inbox-btn').on('click', function() {
        $('.images-container').show();
        $('.video-container').hide();
        // add active class to the clicked button
        $(this).addClass('active');
        $('#sent-btn').removeClass('active');
    })

    $('#sent-btn').on('click', function() {
        $('.images-container').hide();
        $('.video-container').show();
        // add active class to the clicked button
        $(this).addClass('active');
        // remove active class from inbox button
        $('#inbox-btn').removeClass('active');
    })
})
</script>
@endpush