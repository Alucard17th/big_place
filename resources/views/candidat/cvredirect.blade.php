@extends('layouts.dashboard')
@push('styles')
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<style>
#cv-modal{
    max-width: 750px !important;
}
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
#modal-btn{
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 20px;
    color: #FFFFFF;
}

.select2-selection--single {
    height: 35px !important;
    padding: 5px 18px 10px 10px !important;
}

.filepond--drop-label {
    border: 1px dashed #3f8db7;
    border-radius: 10px;
}

.filepond--drop-label>label {
    color: #3f8db7 !important;
}

#create-cv-form>h4 {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 36px;
    line-height: 41px;
    /* identical to box height, or 102% */
    color: #202124;
}

#create-cv-form>div>label,
#create-cv-form>div.row>div>div>label,
#create-cv-form>div>div>label {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 41px;
    color: #202124;
}

#create-cv-btn {
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

#upload-cv-btn {
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

.modal-header{
font-family: 'Jost';
font-style: normal;
font-weight: 700;
font-size: 40px;
line-height: 41px;
/* identical to box height, or 102% */
text-align: center;
color: #202124;
}

.modal-text{
font-family: 'Outfit';
font-style: normal;
font-weight: 400;
font-size: 20px;
line-height: 30px;
/* or 150% */
text-align: center;
letter-spacing: -0.284368px;
/* Neutral / Grey 7 */
color: #2D2F30;
}

#create-cv-form > div:nth-child(6) > div > div > span,
#create-cv-form > div:nth-child(5) > div:nth-child(1) > div > span{
    width: 100% !important;
}

#create-cv-form > div:nth-child(3) > div:nth-child(2) > div > span{
    width: 100% !important;
}
.select2-selection__placeholder{
    color: #000 !important;
    font-weight: 300 !important;
}
</style>
@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <!-- <div class="upper-title-box">
            <h3>Bonjour, {{auth()->user()->name}} !</h3>
            <div class="text">Vous devez remplir votre profil pour accéder à votre compte.</div>
        </div> -->

        <div class="upper-title-box d-flex justify-content-between align-items-center p-3">
            <div class="d-flex align-items-center justify-content-center">
                <h3>Bonjour, {{auth()->user()->name}} !</h3>
            </div>
            <div class="d-flex align-items-center">
                <a href="{{ route('candidat.dashboard') }}" class="bg-back-btn mr-2">
                    <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                    Retour
                </a>
            </div>
        </div>
        <div class="row text-right">
            <div class="col-md-12">
                <button id="edit-profile">
                    <i class="las la-user-edit mr-1" style="font-size: 30px;"></i> 
                    <span id="edit-profile-span" style="font-size: 30px;font-width: 700;">Modifier</span>
                </button>
            </div>
        </div>

        @if(!empty($curriculum))
        <div class="row" id="preview-container">
            <div class="container">
                <div class="card p-5 h-100">
                    <div class="row">
                        <!-- <div class="col-md-4">
                            <img src="path/to/candidate_photo.jpg" class="img-fluid rounded-circle mb-3" alt="Candidate Photo">
                        </div> -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-12 text-center mb-5 pb-5 pt-2"><h2>Fiche Candidat</h2></div>
                                <div class="col-4 text-center">
                                    <img src="{{ asset(str_replace('public', 'storage', $curriculum->user->avatar)) }}" alt=""
                                    style="width: 200px; height: 200px;border-radius: 50%;">
                                </div>

                                <div class="col-8">
                                    <h4 class="mb-3">{{$curriculum->nom}} {{$curriculum->prenom}}</h4>
                                    <ul class="list-unstyled">
                                        <li class="text-dark">{{$curriculum->address}} {{$curriculum->ville_domiciliation}}</li>
                                        <li class="text-dark">Email : {{$curriculum->user->email}}</li>
                                        <li class="text-dark">{{\Carbon\Carbon::parse($curriculum->user->birth_date)->diffInYears(\Carbon\Carbon::now())}} ans</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="text-center">
                                        <h4 class="mb-3">{{$curriculum->metier_recherche}}</h4>
                                    </div>
                                   
                                    <ul class="list-unstyled">
                                        <li>Niveau: {{$curriculum->niveau}}</li>
                                        <li>Nombre d'années d'expérience: {{$curriculum->annees_experience}} années</li>
                                        <li>Niveau d'études: {{$curriculum->niveau_etudes}}</li>
                                        <li>Prétentions salariales: {{$curriculum->pretentions_salariales}}</li>
                                        <li>Valeurs: 
                                            @php 
                                            $valeursArray = json_decode($curriculum->valeurs, true);
                                            echo implode(', ', $valeursArray);
                                            @endphp
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    <h5>CV</h5>
                                    @if(!empty($curriculum) && $curriculum->cv != null && $curriculum->cv != '') 
                                    <a href="{{asset('storage' . $curriculum->cv)}}" class="btn bg-btn-five mt-3" download>Télécharger</a>
                                    @else
                                    Aucun CV disponible.
                                    @endif
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        <div class="row mt-3" id="editor-container" style="@if(!empty($curriculum))display:none; @endif">
            <div class="col-12">
                <div class="card" style="height:fit-content;">
                    <div class="card-body">
                        <form action="{{ route('candidat.cv.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h4 class="text-dark mb-3">Télécharger CV</h4>
                            <input type="file" name="cv" id="cv" class="py-3">
                            <button type="submit" class="btn btn-primary mt-3" id="upload-cv-btn">Enregistrer</button>
                            <!-- @if(!empty($curriculum)) -->
                            <!-- @else -->
                            <!-- Vous devez d'abord remplir le formulaire ci-dessus. -->
                            <!-- @endif -->
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="card" style="height:fit-content;">
                    <div class="card-body">
                        <h4 class="text-dark mb-4">Ma fiche</h4>
                        <form action="{{ route('candidat.curriculum.store') }}" method="POST"
                            enctype="multipart/form-data" id="create-cv-form">
                            @csrf

                            <div class="row">
                                <div class="col-6">
                                    <!-- Nom -->
                                    <div class="mb-3">
                                        <label for="nom" class="form-label text-dark">Nom</label>
                                        <input type="text" class="form-control" id="nom" name="nom"
                                            value="{{isset($curriculum->nom) ? $curriculum->nom : ''}}" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <!-- Prénom -->
                                    <div class="mb-3">
                                        <label for="prenom" class="form-label text-dark">Prénom</label>
                                        <input type="text" class="form-control" id="prenom" name="prenom"
                                            value="{{isset($curriculum->prenom) ? $curriculum->prenom : ''}}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <!-- Ville de domiciliation -->
                                    <div class="mb-3">
                                        <label for="ville" class="form-label text-dark">Ville de domiciliation</label>
                                        <input type="text" class="form-control" id="ville" name="ville_domiciliation"
                                            value="{{isset($curriculum->ville_domiciliation) ? $curriculum->ville_domiciliation : ''}}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <!-- Métier recherché -->
                                    <div class="mb-3">
                                        <label for="metier" class="form-label text-dark">Métier recherché</label>
                                        <select name="metier_recherche" id="metier_recherche" class="form-control w-100">
                                            <option value="{{isset($curriculum->metier_recherche) ? $curriculum->metier_recherche : ''}}" selected>{{isset($curriculum->metier_recherche) ? $curriculum->metier_recherche : ''}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <!-- Prétentions salariales -->
                                    <div class="mb-3">
                                        <label for="pretentions" class="form-label text-dark">Prétentions
                                            salariales</label>
                                        <input type="text" class="form-control" id="pretentions"
                                            value="{{isset($curriculum->pretentions_salariales) ? $curriculum->pretentions_salariales : ''}}"
                                            name="pretentions_salariales" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <!-- Nombre d'années d'expérience -->
                                    <div class="mb-3">
                                        <label for="experience" class="form-label text-dark">Nombre d'années
                                            d'expérience</label>
                                        <select class="form-control" id="annees_experience" name="annees_experience" required>
                                            <option value=""  selected>Année d'expérience</option>
                                            <option value="Débutant (0 – 2 ans)" @if(isset($curriculum) && $curriculum->annees_experience == 'Débutant (0 – 2 ans)') selected @endif>Débutant (0 – 2 ans)</option>
                                            <option value="Intermédiaire (2 – 5 ans)" @if(isset($curriculum) && $curriculum->annees_experience == 'Intermédiaire (2 – 5 ans)') selected @endif>Intermédiaire (2 – 5 ans)</option>
                                            <option value="Confirmé (5 -10 ans)" @if(isset($curriculum) && $curriculum->annees_experience == 'Confirmé (5 -10 ans)') selected @endif>Confirmé (5 -10 ans)</option>
                                            <option value="Sénior (+ 10 ans)" @if(isset($curriculum) && $curriculum->annees_experience == 'Sénior (+ 10 ans)') selected @endif>Sénior (+ 10 ans)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <!-- Niveau -->
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="niveau" class="form-label text-dark">Niveau</label>
                                        <select class="w-100" id="niveau" name="niveau" required>
                                            <option value="Débutant" @if(isset($curriculum->niveau) &&
                                                $curriculum->niveau == 'Débutant') selected @endif>Débutant</option>
                                            <option value="Intermédiaire" @if(isset($curriculum->niveau) &&
                                                $curriculum->niveau == 'Intermédiaire') selected @endif>Intermédiaire
                                            </option>
                                            <option value="Confirmé" @if(isset($curriculum->niveau) &&
                                                $curriculum->niveau == 'Confirmé') selected @endif>Confirmé</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">

                                    <!-- Niveau d'études -->
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="etudes" class="form-label text-dark">Niveau d'études</label>
                                        <select name="niveau_etudes" id="niveau_etudes" class="form-control" >
                                            <option value=""  selected>Niveau d'études</option>
                                            <option value="CAP/BEP" @if(isset($curriculum) && $curriculum->niveau_etudes == 'CAP / BEP') selected @endif>CAP / BEP</option>
                                            <option value="Bac" @if(isset($curriculum) && $curriculum->niveau_etudes == 'Bac') selected @endif>Bac</option>
                                            <option value="Bac+2" @if(isset($curriculum) && $curriculum->niveau_etudes == 'Bac+2') selected @endif>Bac + 2</option>
                                            <option value="Bac+4" @if(isset($curriculum) && $curriculum->niveau_etudes == 'Bac+4') selected @endif>Bac + 4</option>
                                            <option value="Bac+5 et plus" @if(isset($curriculum) && $curriculum->niveau_etudes == 'Bac+5') selected @endif>Bac + 5 et plus</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <!-- Les valeurs -->
                                    <div class="mb-3">
                                        <label for="valeurs" class="form-label text-dark">Les valeurs</label>
                                        <select name="valeurs[]" id="values_select" class="form-control" multiple>
                                            <option value="respect" @if(isset($curriculum->valeurs) && in_array('respect', json_decode($curriculum->valeurs))) selected @endif>Le respect
                                            </option>
                                            <option value="adaptabilite" @if(isset($curriculum->valeurs) &&
                                                in_array('adaptabilite', json_decode($curriculum->valeurs))) selected
                                                @endif>L'adaptabilité</option>
                                            <option value="consideration" @if(isset($curriculum->valeurs) &&
                                                in_array('consideration', json_decode($curriculum->valeurs)))
                                                selected @endif>la considération</option>
                                            <option value="altruisme" @if(isset($curriculum->valeurs) &&
                                                in_array('altruisme', json_decode($curriculum->valeurs))) selected
                                                @endif>l'altruisme</option>
                                            <option value="assertivite" @if(isset($curriculum->valeurs) &&
                                                in_array('assertivite', json_decode($curriculum->valeurs))) selected
                                                @endif>l'assertivité</option>
                                            <option value="entraide" @if(isset($curriculum->valeurs) &&
                                                in_array('entraide', json_decode($curriculum->valeurs))) selected
                                                @endif>l'entraide</option>
                                            <option value="solidarite" @if(isset($curriculum->valeurs) &&
                                                in_array('solidarite', json_decode($curriculum->valeurs))) selected
                                                @endif>la solidarité</option>
                                            <option value="ecoute" @if(isset($curriculum->valeurs) &&
                                                in_array('ecoute', json_decode($curriculum->valeurs))) selected
                                                @endif>l'écoute</option>
                                            <option value="bienveillance" @if(isset($curriculum->valeurs) &&
                                                in_array('bienveillance', json_decode($curriculum->valeurs)))
                                                selected @endif>la bienveillance</option>
                                            <option value="empathie" @if(isset($curriculum->valeurs) &&
                                                in_array('empathie', json_decode($curriculum->valeurs))) selected
                                                @endif>l'empathie</option>
                                            <option value="creativite" @if(isset($curriculum->valeurs) &&
                                                in_array('creativite', json_decode($curriculum->valeurs))) selected
                                                @endif>la créativité</option>
                                            <option value="justice" @if(isset($curriculum->valeurs) && in_array('justice', json_decode($curriculum->valeurs))) selected @endif>la justice
                                            </option>
                                            <option value="tolerance" @if(isset($curriculum->valeurs) && in_array('tolerance', json_decode($curriculum->valeurs))) selected @endif>la
                                                tolérance</option>
                                            <option value="equite" @if(isset($curriculum->valeurs) &&
                                                in_array('equite', json_decode($curriculum->valeurs))) selected
                                                @endif>l'équité</option>
                                            <option value="honnetete" @if(isset($curriculum->valeurs) &&
                                                in_array('honnetete', json_decode($curriculum->valeurs))) selected
                                                @endif>l'honnêteté</option>
                                            <option value="responsabilite" @if(isset($curriculum->valeurs) &&
                                                in_array('responsabilite', json_decode($curriculum->valeurs))) selected
                                                @endif>la responsabilité</option>
                                            <option value="loyaute" @if(isset($curriculum->valeurs) && in_array('loyaute', json_decode($curriculum->valeurs))) selected @endif>la loyauté
                                            </option>
                                            <option value="determination" @if(isset($curriculum->valeurs) &&
                                                in_array('determination', json_decode($curriculum->valeurs)))
                                                selected @endif>la détermination</option>
                                            <option value="perseverance" @if(isset($curriculum->valeurs) &&
                                                in_array('perseverance', json_decode($curriculum->valeurs))) selected
                                                @endif>la persévérance</option>
                                            <option value="rigueur" @if(isset($curriculum->valeurs) && in_array('rigueur', json_decode($curriculum->valeurs))) selected @endif>la rigueur
                                            </option>
                                            <option value="generosite" @if(isset($curriculum->valeurs) &&
                                                in_array('generosite', json_decode($curriculum->valeurs))) selected
                                                @endif>la générosité</option>
                                            <option value="stabilite" @if(isset($curriculum->valeurs) && in_array('stabilite', json_decode($curriculum->valeurs))) selected @endif>la
                                                stabilité</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" id="create-cv-btn">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div id="cv-modal" class="modal text-dark p-5">
        <div class="row align-items-center justify-content-center">
            <h2 class="modal-header">Bienvenu sur BigPlace 👋</h2>
            <p class="text-dark modal-text">En fournissant des détails complets et précis, vous augmentez significativement vos chances d'être remarqué
                par les recruteurs. Ces informations aideront à adapter les opportunités qui vous seront présentées et à
                simplifier le processus de candidature.</p>
            <button class="btn-style-one rounded-pill py-3 px-4 custom-close-modal" id="modal-btn">Compléter ma Fiche de Candidature</button>
        </div>
       
        <a href="#" id="close-modal">Fermer</a>
        <a href="#" class="custom-close-modal"></a>
    </div>
</div>

@php
if( isset($curriculum) ){
    $cv = $curriculum->cv;
}else{
    $cv = [];
}
@endphp
@endsection
@push('scripts')
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const candidatCv = document.querySelector('#cv');
    const cv = @json($cv);
    console.log('Mon Cv : ', cv);
    console.log(cv);
    if (Array.isArray(cv) && cv.length <= 0) {
        $("#cv-modal").modal({
            escapeClose: false,
            clickClose: true,
            showClose: false
        });
    }

    $('#close-modal, .custom-close-modal').click(function() {
        console.log('Modal Should Be Closed');
        $.modal.close();
    });

    FilePond.registerPlugin(FilePondPluginFileValidateSize);
    FilePond.setOptions({
        server: {
            url: "{{ config('filepond.server.url') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ @csrf_token() }}",
            }
        }
    });

    const pond_cv = FilePond.create(candidatCv, {
        files: cv != null && cv.length > 0 ? 'storage' + cv : null,
        labelIdle: '<img class="mr-3" src="http://127.0.0.1:8000/plugins/images/candidat/cv-upload.png" alt="">+ Ajouter document',
    });

    $("#niveau").select2({
        placeholder: "Valeurs",
    });
    $("#etudes").select2({
        placeholder: "Valeurs",
    });
    $("#values_select").select2({
        placeholder: "Vos valeurs",
        width: '100%',
        maximumSelectionLength: 5,
        language: {
            maximumSelected: function(e) {
                return "Vous ne pouvez sélectionner que jusqu'à 5 valeurs.";
                // Replace this string with your custom error message
            }
        }
    });

    $('#edit-profile').click(function() {
        $('#preview-container').toggle()
        $('#editor-container').toggle()
        var currentText = $('#edit-profile-span').text();
        var newText = currentText === "Aperçu" ? "Modifier" : "Aperçu";
        $('#edit-profile-span').text(newText);
    })

    $("#metier_recherche").select2({
        placeholder: "Code ROME",
        minimumInputLength: 2,
        language: {
            inputTooShort: function() {
                return 'Veuillez entrer au moins 2 caractères.';
            },
            noResults: function() {
                return 'Aucun metier correspondant.';
            },
            searching: function() {
                return 'Chargement...';
            }
        },
        ajax: {
            url: '/candidat-profile/jobs/search',
            dataType: 'json',
            data: function (params) {
                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        },
    });

})
</script>
@endpush