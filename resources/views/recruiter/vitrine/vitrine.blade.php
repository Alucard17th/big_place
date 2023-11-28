@extends('layouts.dashboard')
@push('styles')
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<style>
.vitrine-logo {
    width: 100px;
    height: 100px;
}

.vitrine-photos {
    width: 100px;
    height: 100px;
}

.bg-custom-btn {
    position: absolute;
    bottom: 18%;
    left: 81%;
    background-color: #b1acac7a; /* Change to your desired background color */
    color: #fff; /* Change to your desired text color */
    padding: 6px 12px;
    border-radius: 5px;
    text-decoration: none;
    display: flex;
    align-items: center;
}

/* Make it responsive */
@media (max-width: 768px) {
    .bg-custom-btn {
        bottom: 4%; /* Adjust the bottom position for smaller screens */
        left: 50%; /* Adjust the left position for smaller screens */
        transform: translateX(-50%); /* Center the button horizontally */
        font-size: 14px; /* Adjust the font size for smaller screens */
        padding: 6px 10px; /* Adjust padding for smaller screens */
    }
}

.bg-custom-btn i {
    margin-right: 5px;
}

</style>
@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center justify-content-center">
                <a href="{{ route('recruiter.dashboard') }}" class="theme-btn-one btn-one mr-2">
                    <i class="las la-arrow-left" style="font-size:38px"></i>
                </a>
                <h3>Ma vitrine entreprise</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box p-3">
                        <h3 class="text-dark">Fiche entreprise</h3>
                        <div class="widget-content">
                            <form action="">
                                <div class="row">
                                    <div class="col-12 align-items-center justify-content-center py-4">
                                        <img src="https://placehold.co/900X200" alt="" style="border-radius: 15px">
                                        <a href="" class="bg-custom-btn">
                                            <i class="las la-sync mr-2"></i>
                                            Changer
                                        </a>
                                    </div>

                                    <div class="col-12">
                                        <div class="row align-items-center pt-4 pb-5">
                                            <div class="col-2">
                                                <img class="img-fluid vitrine-logo"
                                                    src="{{ url(str_replace('public', 'storage', $entreprise->logo)) }}"
                                                    alt="">
                                                    
                                            </div>
                                            <div class="col-10">
                                                <div>
                                                    <a href="" type="button" class="bg-btn-three">
                                                        <!-- Détails -->
                                                        <i class="las la-edit"></i>
                                                        Changer
                                                    </a>
                                                    <a href="" type="button" class="bg-btn-four">
                                                        <!-- Détails -->
                                                        <i class="las la-trash"></i>
                                                        Supprimer
                                                    </a>
                                                </div>
                                                <div class="py-3">
                                                    <span class="text-dark">Taille recommandée: Largeur 300px X Hauteur
                                                        300px</span>
                                                </div>
                                                <input type="file" class="form-control d-none" name="logo" id="logo">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="nom_entreprise">Nom Entreprise</label>
                                            <input type="text" class="form-control" name="nom_entreprise"
                                                id="nom_entreprise" value="{{ $entreprise->nom_entreprise }}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="siege_social">Lieu du Siège Social</label>
                                            <input type="text" class="form-control" name="siege_social"
                                                id="siege_social" value="{{ $entreprise->siege_social }}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="date_creation">Date de Création</label>
                                            <input type="date" class="form-control" name="date_creation"
                                                id="date_creation" value="{{ $entreprise->date_creation }}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="siege_social">Lieu du Siège Social</label>
                                            <input type="text" class="form-control" name="siege_social"
                                                id="siege_social" value="{{ $entreprise->siege_social }}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="valeurs_fortes">Valeurs Fortes</label>
                                            <input type="text" class="form-control" name="valeurs_fortes"
                                                id="valeurs_fortes" value="{{ $entreprise->valeurs_fortes }}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="nombre_implementations">Nombre
                                                d'Implantations</label>
                                            <input type="text" class="form-control" name="nombre_implementations"
                                                id="nombre_implementations"
                                                value="{{ $entreprise->nombre_implementations }}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="effectif">Effectif</label>
                                            <input type="text" class="form-control" name="effectif" id="effectif"
                                                value="{{ $entreprise->effectif }}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="fondateurs">Fondateurs</label>
                                            <input type="text" class="form-control" name="fondateurs" id="fondateurs"
                                                value="{{ $entreprise->fondateurs }}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="chiffre_affaire">Chiffre d'Affaire</label>
                                            <input type="text" class="form-control" name="chiffre_affaire"
                                                id="chiffre_affaire" value="{{ $entreprise->chiffre_affaire }}">
                                        </div>
                                    </div>

                                    <div class="col-12 my-4">
                                        <label class="text-dark" for="photos_locaux">Photos des locaux et
                                            bureaux</label>
                                        <input type="file" class="" name="photos_locaux[]"
                                            id="photos_locaux" multiple>
                                        <!-- @foreach (json_decode($entreprise->photos_locaux, true) ?? [] as $photo)
                                        <img class="img-fluid vitrine-photos"
                                            src="{{ url(str_replace('public', 'storage', $photo)) }}" alt="">
                                        @endforeach -->
                                    </div>

                                    <div class="col-12 my-4">
                                        <label class="text-dark" for="logo">Vidéo</label>
                                        <input type="file" class="" name="video" id="video">
                                        <!-- <video width="320" height="240" controls
                                            src="{{ url(str_replace('public', 'storage', $entreprise->video)) }}"> -->
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@php
    $images = json_decode($entreprise->photos_locaux, true);
    $video = $entreprise->video;
@endphp
@endsection

@push('scripts')

<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script>
$(document).ready(function() {
    const photos_locaux = document.querySelector('#photos_locaux');
    const video = document.querySelector('#video');
    const images = @json($images);
    const videoUrl = @json($video);
    const newArray = images.map(str => str.replace('public', 'storage'));
    console.log(images);
    console.log(newArray);

    const pond_photos = FilePond.create(photos_locaux,{
        files: newArray.map(url => ({ source: url })),
        labelIdle: 'Glissez vos fichiers ici ou <span class="filepond--label-action">Parcourir</span>',

    });

    const pond_video = FilePond.create(video,{
        files: videoUrl.replace('public', 'storage'),
        labelIdle: 'Glissez votre fichier ici ou <span class="filepond--label-action">Parcourir</span>',
    });



})
</script>
@endpush