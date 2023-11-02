@extends('layouts.dashboard')
@push('styles')

@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Ma Vitrine Entreprise</h3>
            <div class="text">Simplifiez votre processus de recrutement et accélérez vos embauches</div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box">


                        <div class="widget-content">
                            <form action="" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $entreprise->id }}">

                                <div class="form-group">
                                    <label for="nom_entreprise">Nom Entreprise</label>
                                    <input type="text" class="form-control" name="nom_entreprise" id="nom_entreprise"
                                        value="{{ $entreprise->nom_entreprise }}">
                                </div>

                                <div class="form-group">
                                    <label for="date_creation">Date de Création</label>
                                    <input type="text" class="form-control" name="date_creation" id="date_creation"
                                        value="{{ $entreprise->date_creation }}">
                                </div>

                                <div class="form-group">
                                    <label for="domiciliation">Domiciliation</label>
                                    <input type="text" class="form-control" name="domiciliation" id="domiciliation"
                                        value="{{ $entreprise->domiciliation }}">
                                </div>

                                <div class="form-group">
                                    <label for="siege_social">Lieu du Siège Social</label>
                                    <input type="text" class="form-control" name="siege_social" id="siege_social"
                                        value="{{ $entreprise->siege_social }}">
                                </div>

                                <div class="form-group">
                                    <label for="valeurs_fortes">Valeurs Fortes</label>
                                    <input type="text" class="form-control" name="valeurs_fortes" id="valeurs_fortes"
                                        value="{{ $entreprise->valeurs_fortes }}">
                                </div>

                                <div class="form-group">
                                    <label for="nombre_implementations">Nombre d'Implantations</label>
                                    <input type="text" class="form-control" name="nombre_implementations"
                                        id="nombre_implementations" value="{{ $entreprise->nombre_implementations }}">
                                </div>

                                <div class="form-group">
                                    <label for="effectif">Effectif</label>
                                    <input type="text" class="form-control" name="effectif" id="effectif"
                                        value="{{ $entreprise->effectif }}">
                                </div>

                                <div class="form-group">
                                    <label for="fondateurs">Fondateurs</label>
                                    <input type="text" class="form-control" name="fondateurs" id="fondateurs"
                                        value="{{ $entreprise->fondateurs }}">
                                </div>

                                <div class="form-group">
                                    <label for="chiffre_affaire">Chiffre d'Affaire</label>
                                    <input type="text" class="form-control" name="chiffre_affaire" id="chiffre_affaire"
                                        value="{{ $entreprise->chiffre_affaire }}">
                                </div>

                                <div class="form-group">
                                    <label for="photos_locaux">Photos Locaux</label>
                                    <input type="file" class="form-control" name="photos_locaux[]" id="photos_locaux"
                                        multiple>
                                </div>

                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" class="form-control" name="logo" id="logo">
                                </div>

                                <div class="form-group">
                                    <button class="theme-btn btn-style-one" type="submit">Enregistrer</button>
                                </div>
                            </form>

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