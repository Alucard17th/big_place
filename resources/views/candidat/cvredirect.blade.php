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
    width: unset !important;
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
                    <span id="edit-profile-span">Modifier</span>
                </button>
            </div>
        </div>

        <div class="row" id="preview-container">
            <div class="container">
                <div class="card p-5 h-100">
                    <div class="row">
                        <!-- <div class="col-md-4">
                            <img src="path/to/candidate_photo.jpg" class="img-fluid rounded-circle mb-3" alt="Candidate Photo">
                        </div> -->
                        <div class="col-md-12">
                            <h1 class="mb-3">{{$curriculum->nom}} {{$curriculum->prenom}}</h1>
                            <h4 class="mb-3">Métier: {{$curriculum->metier_recherche}}</h4>
                            <p class="mb-5 text-dark">Ville: {{$curriculum->ville_domiciliation}}</p>

                            <hr>

                            <h5>Expérience</h5>
                            <ul class="list-unstyled">
                                <li>Nombre d'années d'expérience: {{$curriculum->annees_experience}} années</li>
                                <li>Niveau: {{$curriculum->niveau}}</li>
                            </ul>

                            <h5>Formation</h5>
                            <ul class="list-unstyled">
                                <li>Niveau d'études: {{$curriculum->niveau_etudes}}</li>
                                </ul>

                            <h5>Prétentions salariales</h5>
                            <div>{{$curriculum->pretentions_salariales}}</div>

                            <hr>

                            <h5>CV</h5>
                            <a href="{{asset('storage' . $curriculum->cv)}}" class="btn btn-primary" download>Télécharger</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-3" id="editor-container" style="display:none">
            <div class="col-12">
                <div class="card" style="height:fit-content;">
                    <div class="card-body">
                        <form action="{{ route('candidat.cv.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h4 class="text-dark mb-3">Télécharger CV</h4>
                            <input type="file" name="cv" id="cv" class="py-3">

                            @if(!empty($curriculum))
                            <button type="submit" class="btn btn-primary mt-3" id="upload-cv-btn">Enregistrer</button>
                            @else
                            Vous devez d'abord remplir le formulaire ci-dessus.
                            @endif
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
                                        <input type="text" class="form-control" id="metier" name="metier_recherche"
                                            value="{{isset($curriculum->metier_recherche) ? $curriculum->metier_recherche : ''}}"
                                            required>
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
                                        <input type="number" class="form-control" id="experience"
                                            value="{{isset($curriculum->annees_experience) ? $curriculum->annees_experience : ''}}"
                                            name="annees_experience" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <!-- Niveau -->
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="niveau" class="form-label text-dark">Niveau</label>
                                        <select class="w-100" id="niveau" name="niveau" required>
                                            <option value="debutant" @if(isset($curriculum->niveau) &&
                                                $curriculum->niveau == 'debutant') selected @endif>Débutant</option>
                                            <option value="intermediaire" @if(isset($curriculum->niveau) &&
                                                $curriculum->niveau == 'intermediaire') selected @endif>Intermédiaire
                                            </option>
                                            <option value="confirme" @if(isset($curriculum->niveau) &&
                                                $curriculum->niveau == 'confirme') selected @endif>Confirmé</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">

                                    <!-- Niveau d'études -->
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="etudes" class="form-label text-dark">Niveau d'études</label>
                                        <select class="" id="etudes" name="niveau_etudes" required>
                                            <option value="bac" @if(isset($curriculum->niveau_etudes) &&
                                                $curriculum->niveau_etudes == 'bac') selected @endif>Bac</option>
                                            <option value="licence" @if(isset($curriculum->niveau_etudes) &&
                                                $curriculum->niveau_etudes == 'licence') selected @endif>Licence
                                            </option>
                                            <option value="master" @if(isset($curriculum->niveau_etudes) &&
                                                $curriculum->niveau_etudes == 'master') selected @endif>Master</option>
                                            <option value="doctorat" @if(isset($curriculum->niveau_etudes) &&
                                                $curriculum->niveau_etudes == 'doctorat') selected @endif>Doctorat
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <!-- Les valeurs -->
                                    <div class="mb-3">
                                        <label for="valeurs" class="form-label text-dark">Les valeurs</label>
                                        <!-- <textarea class="form-control" id="valeurs" name="valeurs" rows="3"
                                            required></textarea> -->
                                        <select name="valeurs[]" id="values_select" class="form-control w-100" multiple>
                                            <option value="respect" @if(isset($curriculum->valeurs) && in_array('Le
                                                respect', json_decode($curriculum->valeurs))) selected @endif>Le respect
                                            </option>
                                            <option value="adaptabilite" @if(isset($curriculum->valeurs) &&
                                                in_array('L\'adaptabilité', json_decode($curriculum->valeurs))) selected
                                                @endif>L'adaptabilité</option>
                                            <option value="consideration" @if(isset($curriculum->valeurs) &&
                                                in_array('la considération', json_decode($curriculum->valeurs)))
                                                selected @endif>la considération</option>
                                            <option value="altruisme" @if(isset($curriculum->valeurs) &&
                                                in_array('l\'altruisme', json_decode($curriculum->valeurs))) selected
                                                @endif>l'altruisme</option>
                                            <option value="assertivite" @if(isset($curriculum->valeurs) &&
                                                in_array('l\'assertivité', json_decode($curriculum->valeurs))) selected
                                                @endif>l'assertivité</option>
                                            <option value="entraide" @if(isset($curriculum->valeurs) &&
                                                in_array('l\'entraide', json_decode($curriculum->valeurs))) selected
                                                @endif>l'entraide</option>
                                            <option value="solidarite" @if(isset($curriculum->valeurs) &&
                                                in_array('la solidarité', json_decode($curriculum->valeurs))) selected
                                                @endif>la solidarité</option>
                                            <option value="ecoute" @if(isset($curriculum->valeurs) &&
                                                in_array('l\'écoute', json_decode($curriculum->valeurs))) selected
                                                @endif>l'écoute</option>
                                            <option value="bienveillance" @if(isset($curriculum->valeurs) &&
                                                in_array('la bienveillance', json_decode($curriculum->valeurs)))
                                                selected @endif>la bienveillance</option>
                                            <option value="empathie" @if(isset($curriculum->valeurs) &&
                                                in_array('l\'empathie', json_decode($curriculum->valeurs))) selected
                                                @endif>l'empathie</option>
                                            <option value="creativite" @if(isset($curriculum->valeurs) &&
                                                in_array('la créativité', json_decode($curriculum->valeurs))) selected
                                                @endif>la créativité</option>
                                            <option value="justice" @if(isset($curriculum->valeurs) && in_array('la
                                                justice', json_decode($curriculum->valeurs))) selected @endif>la justice
                                            </option>
                                            <option value="tolerance" @if(isset($curriculum->valeurs) && in_array('la
                                                tolérance', json_decode($curriculum->valeurs))) selected @endif>la
                                                tolérance</option>
                                            <option value="equite" @if(isset($curriculum->valeurs) &&
                                                in_array('l\'équité', json_decode($curriculum->valeurs))) selected
                                                @endif>l'équité</option>
                                            <option value="honnetete" @if(isset($curriculum->valeurs) &&
                                                in_array('l\'honnêteté', json_decode($curriculum->valeurs))) selected
                                                @endif>l'honnêteté</option>
                                            <option value="responsabilite" @if(isset($curriculum->valeurs) &&
                                                in_array('la responsabler', json_decode($curriculum->valeurs))) selected
                                                @endif>la responsabilité</option>
                                            <option value="loyaute" @if(isset($curriculum->valeurs) && in_array('la
                                                loyauté', json_decode($curriculum->valeurs))) selected @endif>la loyauté
                                            </option>
                                            <option value="determination" @if(isset($curriculum->valeurs) &&
                                                in_array('la détermination', json_decode($curriculum->valeurs)))
                                                selected @endif>la détermination</option>
                                            <option value="perseverance" @if(isset($curriculum->valeurs) &&
                                                in_array('la persévérance', json_decode($curriculum->valeurs))) selected
                                                @endif>la persévérance</option>
                                            <option value="rigueur" @if(isset($curriculum->valeurs) && in_array('la
                                                rigueur', json_decode($curriculum->valeurs))) selected @endif>la rigueur
                                            </option>
                                            <option value="generosite" @if(isset($curriculum->valeurs) &&
                                                in_array('la générosité', json_decode($curriculum->valeurs))) selected
                                                @endif>la générosité</option>
                                            <option value="stabilite" @if(isset($curriculum->valeurs) && in_array('la
                                                stabilité', json_decode($curriculum->valeurs))) selected @endif>la
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
        files: cv ? 'storage' + cv : null,
        labelIdle: '<img class="mr-3" src="http://127.0.0.1:8000/plugins/images/candidat/cv-upload.png" alt="">+ Ajouter document',
    });

    $("#niveau").select2({
        placeholder: "Valeurs",
    });
    $("#etudes").select2({
        placeholder: "Valeurs",
    });
    $("#values_select").select2({
        placeholder: "Valeurs",
    });

    $('#edit-profile').click(function() {
        $('#preview-container').toggle()
        $('#editor-container').toggle()
        var currentText = $('#edit-profile-span').text();
        var newText = currentText === "Aperçu" ? "Modifier" : "Aperçu";
        $('#edit-profile-span').text(newText);
    })

})
</script>
@endpush