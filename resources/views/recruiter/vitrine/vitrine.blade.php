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

#vitrine-form > h4{
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 36px;
    line-height: 41px;
    /* identical to box height, or 102% */
    color: #202124;
}
#vitrine-form > div > label, #vitrine-form > div.row > div > div > label, #vitrine-form > div > div > label{
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 41px;
    color: #202124;
}
#vitrine-btn{
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

.info-text{
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    color: #2D3748;
}

.filepond--drop-label{
    /* Button/btn-basic */
    box-sizing: border-box;
    background: rgba(3, 105, 161, 0.05);
    border: 2.05px dashed #0369A1;
    border-radius: 13.7593px;
}
.filepond--drop-label label{
    font-family: 'Outfit';
    font-style: normal;
    font-weight: 500;
    font-size: 20px;
    line-height: 25px;
    color: #0369A1;
}
.filepond--drop-label i{
    color: #0369A1;
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
        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box p-4">
                        <h3 class="text-dark">Fiche entreprise</h3>
                        <div class="widget-content">
                            <form action="{{ route('recruiter.update.vitrine') }}" method="POST" enctype="multipart/form-data" 
                                id="vitrine-form">
                                @csrf
                                <div class="row">
                                    <div class="col-12 align-items-center justify-content-center py-4">
                                        @if(!isset($entreprise))
                                        <img src="https://placehold.co/900X313" alt="" style="border-radius: 15px">
                                        @else
                                        <img src="{{ 'storage'.$entreprise->cover }}" alt="" style="border-radius: 15px; width: 900px; height: 200px">
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
                                                <img class="img-fluid vitrine-logo"
                                                    src="{{isset($entreprise) ? 'storage'.$entreprise->logo : '' }}"
                                                    alt="logo">
                                            </div>
                                            <div class="col-10">
                                                <div>
                                                    <a href="" id="change-logo" type="button" class="bg-btn-three border-0">
                                                        <!-- Détails -->
                                                        <i class="las la-sync"></i>
                                                        Changer
                                                    </a>
                                                    <a href="" id="delete-logo" type="button" class="bg-btn-four border-0">
                                                        <!-- Détails -->
                                                        <i class="las la-trash"></i>
                                                        Supprimer
                                                    </a>
                                                </div>
                                                <div class="pt-1 pb-3">
                                                    <span class="text-dark info-text">Taille recommandée: Largeur 300px X Hauteur
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
                                                id="nom_entreprise" value="{{ isset($entreprise) ? $entreprise->nom_entreprise : ''}}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="siege_social">Lieu du Siège Social</label>
                                            <input type="text" class="form-control" name="siege_social"
                                                id="siege_social" value="{{ isset($entreprise) ? $entreprise->siege_social : ''}}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="date_creation">Date de Création</label>
                                            <input type="date" class="form-control" name="date_creation"
                                                id="date_creation" value="{{ isset($entreprise) ? $entreprise->date_creation : ''}}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="siege_social">Lieu du Siège Social</label>
                                            <input type="text" class="form-control" name="siege_social"
                                                id="siege_social" value="{{ isset($entreprise) ? $entreprise->siege_social : ''}}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="valeurs_fortes">Valeurs Fortes</label>
                                            <input type="text" class="form-control" name="valeurs_fortes"
                                                id="valeurs_fortes" value="{{ isset($entreprise) ? $entreprise->valeurs_fortes : ''}}">
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
                                            <input type="text" class="form-control" name="fondateurs" id="fondateurs"
                                                value="{{ isset($entreprise) ? $entreprise->fondateurs : ''}}">
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="chiffre_affaire">Chiffre d'Affaire</label>
                                            <input type="text" class="form-control" name="chiffre_affaire"
                                                id="chiffre_affaire" value="{{ isset($entreprise) ? $entreprise->chiffre_affaire : ''}}">
                                        </div>
                                    </div>

                                    <div class="col-12 my-4">
                                        <label class="text-dark" for="photos_locaux">Photos des locaux et
                                            bureaux</label>
                                        <input type="file" class="" name="photos_locaux[]"
                                            id="photos_locaux" multiple>
                                       
                                    </div>

                                    <div class="col-12 my-4">
                                        <label class="text-dark" for="video">Vidéo</label>
                                        <input type="file" name="video" id="video" acceptedFileTypes={['video/*']}>
                                        <!-- <video width="320" height="240" controls
                                            src="{{ isset($entreprise) ? 'storage/'. $entreprise->video : '' }}"> -->
                                    </div>


                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" id="vitrine-btn">Enregistrer</button>
                                        </div>
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
    const newArray =  images ? images.map(str => str.replace('public', 'storage')) : [];

    
    FilePond.registerPlugin(FilePondPluginFileValidateSize);
    FilePond.setOptions({
        server: {
            url: "{{ config('filepond.server.url') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ @csrf_token() }}",
            }
        }
    });

    const pond_cover = FilePond.create(cover,{
        files:'storage' + coverUrl,
        labelIdle: 'Glissez vos fichiers ici ou <span class="filepond--label-action">Parcourir</span>',
    });

    const pond_logo = FilePond.create(logo,{
        files:'storage' + logoUrl,
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

    const pond_photos = FilePond.create(photos_locaux,{
        files: newArray.map(url => ({ source: 'storage' + url })),
        labelIdle: '<i class="las la-image"></i>Ajouter des images',
    });

    const pond_video = FilePond.create(video,{
        maxFileSize: '100MB',
        chunkUploads: true,
        files:'storage' + videoUrl,
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
@endpush