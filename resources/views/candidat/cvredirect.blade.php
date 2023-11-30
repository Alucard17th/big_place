@extends('layouts.dashboard')
@push('styles')
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<style>
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
</style>
@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Bonjour, {{auth()->user()->name}} !</h3>
            <div class="text">Vous devez remplir votre profil pour accéder à votre compte.</div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card" style="height:fit-content;">
                    <div class="card-body">
                        <form action="{{ route('candidat.cv.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h4 class="text-dark mb-3">Télécharger CV</h4>
                            <input type="file" name="cv" id="cv" class="py-3">
                            <button type="submit" class="btn btn-primary mt-3">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="card" style="height:fit-content;">
                    <div class="card-body">
                        <h4 class="text-dark mb-4">Ma fiche</h4>
                        <form action="{{ route('candidat.curriculum.store') }}" method="POST"
                            enctype="multipart/form-data">
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
                                           value="{{isset($curriculum->ville_domiciliation) ? $curriculum->ville_domiciliation : ''}}" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <!-- Métier recherché -->
                                    <div class="mb-3">
                                        <label for="metier" class="form-label text-dark">Métier recherché</label>
                                        <input type="text" class="form-control" id="metier" name="metier_recherche"
                                           value="{{isset($curriculum->metier_recherche) ? $curriculum->metier_recherche : ''}}" required>
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
                                           value="{{isset($curriculum->pretentions_salariales) ? $curriculum->pretentions_salariales : ''}}" name="pretentions_salariales" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <!-- Nombre d'années d'expérience -->
                                    <div class="mb-3">
                                        <label for="experience" class="form-label text-dark">Nombre d'années
                                            d'expérience</label>
                                        <input type="number" class="form-control" id="experience"
                                           value="{{isset($curriculum->annees_experience) ? $curriculum->annees_experience : ''}}" name="annees_experience" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <!-- Niveau -->
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="niveau" class="form-label text-dark">Niveau</label>
                                        <select class="w-100" id="niveau" name="niveau" required>
                                            <option value="debutant" @if(isset($curriculum->niveau) && $curriculum->niveau == 'debutant') selected @endif>Débutant</option>
                                            <option value="intermediaire" @if(isset($curriculum->niveau) && $curriculum->niveau == 'intermediaire') selected @endif>Intermédiaire</option>
                                            <option value="confirme" @if(isset($curriculum->niveau) && $curriculum->niveau == 'confirme') selected @endif>Confirmé</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">

                                    <!-- Niveau d'études -->
                                    <div class="mb-3 d-flex flex-column">
                                        <label for="etudes" class="form-label text-dark">Niveau d'études</label>
                                        <select class="" id="etudes" name="niveau_etudes" required>
                                            <option value="bac" @if(isset($curriculum->niveau_etudes) && $curriculum->niveau_etudes == 'bac') selected @endif>Bac</option>
                                            <option value="licence" @if(isset($curriculum->niveau_etudes) && $curriculum->niveau_etudes == 'licence') selected @endif>Licence</option>
                                            <option value="master" @if(isset($curriculum->niveau_etudes) && $curriculum->niveau_etudes == 'master') selected @endif>Master</option>
                                            <option value="doctorat" @if(isset($curriculum->niveau_etudes) && $curriculum->niveau_etudes == 'doctorat') selected @endif>Doctorat</option>
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
                                        <select name="valeurs[]" id="values_select" class="form-control" multiple>
                                            <option value="Le respect" @if(isset($curriculum->valeurs) && in_array('Le respect', json_decode($curriculum->valeurs))) selected @endif>Le respect</option>
                                            <option value="L'adaptabilité" @if(isset($curriculum->valeurs) && in_array('L\'adaptabilité', json_decode($curriculum->valeurs))) selected @endif>L'adaptabilité</option>
                                            <option value="la considération" @if(isset($curriculum->valeurs) && in_array('la considération', json_decode($curriculum->valeurs))) selected @endif>la considération</option>
                                            <option value="l'altruisme" @if(isset($curriculum->valeurs) && in_array('l\'altruisme', json_decode($curriculum->valeurs))) selected @endif>l'altruisme</option>
                                            <option value="l'assertivité" @if(isset($curriculum->valeurs) && in_array('l\'assertivité', json_decode($curriculum->valeurs))) selected @endif>l'assertivité</option>
                                            <option value="l'entraide" @if(isset($curriculum->valeurs) && in_array('l\'entraide', json_decode($curriculum->valeurs))) selected @endif>l'entraide</option>
                                            <option value="la solidarité" @if(isset($curriculum->valeurs) && in_array('la solidarité', json_decode($curriculum->valeurs))) selected @endif>la solidarité</option>
                                            <option value="l'écoute" @if(isset($curriculum->valeurs) && in_array('l\'écoute', json_decode($curriculum->valeurs))) selected @endif>l'écoute</option>
                                            <option value="la bienveillance" @if(isset($curriculum->valeurs) && in_array('la bienveillance', json_decode($curriculum->valeurs))) selected @endif>la bienveillance</option>
                                            <option value="l'empathie" @if(isset($curriculum->valeurs) && in_array('l\'empathie', json_decode($curriculum->valeurs))) selected @endif>l'empathie</option>
                                            <option value="la créativité" @if(isset($curriculum->valeurs) && in_array('la créativité', json_decode($curriculum->valeurs))) selected @endif>la créativité</option>
                                            <option value="la justice" @if(isset($curriculum->valeurs) && in_array('la justice', json_decode($curriculum->valeurs))) selected @endif>la justice</option>
                                            <option value="la tolérance" @if(isset($curriculum->valeurs) && in_array('la tolérance', json_decode($curriculum->valeurs))) selected @endif>la tolérance</option>
                                            <option value="l'équité" @if(isset($curriculum->valeurs) && in_array('l\'équité', json_decode($curriculum->valeurs))) selected @endif>l'équité</option>
                                            <option value="l'honnêteté" @if(isset($curriculum->valeurs) && in_array('l\'honnêteté', json_decode($curriculum->valeurs))) selected @endif>l'honnêteté</option>
                                            <option value="la responsabilité" @if(isset($curriculum->valeurs) && in_array('la responsabler', json_decode($curriculum->valeurs))) selected @endif>la responsabilité</option>
                                            <option value="la loyauté" @if(isset($curriculum->valeurs) && in_array('la loyauté', json_decode($curriculum->valeurs))) selected @endif>la loyauté</option>
                                            <option value="la détermination" @if(isset($curriculum->valeurs) && in_array('la détermination', json_decode($curriculum->valeurs))) selected @endif>la détermination</option>
                                            <option value="la persévérance" @if(isset($curriculum->valeurs) && in_array('la persévérance', json_decode($curriculum->valeurs))) selected @endif>la persévérance</option>
                                            <option value="la rigueur" @if(isset($curriculum->valeurs) && in_array('la rigueur', json_decode($curriculum->valeurs))) selected @endif>la rigueur</option>
                                            <option value="la générosité" @if(isset($curriculum->valeurs) && in_array('la générosité', json_decode($curriculum->valeurs))) selected @endif>la générosité</option>
                                            <option value="la stabilité" @if(isset($curriculum->valeurs) && in_array('la stabilité', json_decode($curriculum->valeurs))) selected @endif>la stabilité</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

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
        files:'storage' + cv,
        labelIdle: '+ Ajouter document',
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

})
</script>
@endpush