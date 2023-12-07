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

.table-outer {
    overflow-x: hidden !important;
}
</style>
@endpush
@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box d-flex justify-content-between align-items-center">

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="upper-title-box d-flex justify-content-between align-items-center p-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <h3>Mon compte administateur</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('recruiter.dashboard') }}" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <!-- SEARCH FORM -->
                        <div class="widget-title d-flex justify-content-between">
                            <div class="chosen-outer">
                                <h3 class="text-dark">Informations de l'entreprise</h3>
                            </div>
                            <a href="" class="theme-btn-one btn-one ml-4" id="toggle-1"><i class="las la-angle-down"
                                    style="font-size:24px;color:#000;"></i></a>
                        </div>
                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content" id="toggleElement-1">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <div class="col-12">
                                    <div class="row align-items-center pt-4 pb-5">
                                        <div class="col-2">
                                            <img class="img-fluid vitrine-logo" src="" alt="">

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

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="nom_entreprise">Nom Entreprise</label>
                                            <input type="text" class="form-control" name="nom_entreprise"
                                                id="nom_entreprise" value="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="siege_social">Siège Social
                                                (domiciliation)</label>
                                            <input type="text" class="form-control" name="siege_social"
                                                id="siege_social" value="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="siege_social">Email</label>
                                            <input type="text" class="form-control" name="siege_social"
                                                id="siege_social" value="">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="text-dark" for="siege_social">Fonction</label>
                                            <input type="text" class="form-control" name="siege_social"
                                                id="siege_social" value="">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <button class="btn btn-primary" type="submit">Enregistrer</button>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box">
                        <!-- SEARCH FORM -->
                        <div class="widget-title d-flex justify-content-between">
                            <div class="chosen-outer">
                                <h3 class="text-dark">Modification du mot de passe</h3>
                            </div>
                            <a href="" class="theme-btn-one btn-one ml-4" id="toggle-2"><i class="las la-angle-down"
                                    style="font-size:24px;color:#000;"></i></a>
                        </div>
                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content" id="toggleElement-2">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-dark" for="nom_entreprise">Mot de passe actuel</label>
                                            <input type="password" class="form-control" name="nom_entreprise"
                                                id="nom_entreprise" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-dark" for="nom_entreprise">Nouveau mot de passe</label>
                                            <input type="password" class="form-control" name="nom_entreprise"
                                                id="nom_entreprise" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-dark" for="nom_entreprise">Confirmation du nouveau mot de
                                                passe</label>
                                            <input type="password" class="form-control" name="nom_entreprise"
                                                id="nom_entreprise" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box">
                        <!-- SEARCH FORM -->
                        <div class="widget-title d-flex justify-content-between">
                            <div class="chosen-outer">
                                <h3 class="text-dark">Gestion des membres</h3>

                            </div>
                            <div class="d-flex ">
                                <a href="" class="theme-btn btn-style-one bg-btn-smaller">+ Ajouter un membre</a>
                                <a href="" class="theme-btn-one btn-one ml-4" id="toggle-3"><i class="las la-angle-down"
                                        style="font-size:24px;color:#000;"></i></a>
                            </div>
                        </div>
                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content" id="toggleElement-3">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <table class="table table-sm table-bordered" id="data-table">
                                        <thead class="thead-light">
                                        </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box">
                        <!-- SEARCH FORM -->
                        <div class="widget-title d-flex justify-content-between">
                            <div class="chosen-outer">
                                <h3 class="text-dark">Supression</h3>
                            </div>
                            <a href="" class="theme-btn-one btn-one ml-4" id="toggle-4"><i class="las la-angle-down"
                                    style="font-size:24px;color:#000;"></i></a>
                        </div>
                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content" id="toggleElement-4">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-dark" for="nom_entreprise">Mot de passe actuel</label>
                                            <input type="password" class="form-control" name="nom_entreprise"
                                                id="nom_entreprise" value="">
                                        </div>
                                        <div class="text-dark my-1 py-1">Cela supprimera votre compte</div>
                                        <button class="bg-btn-four mt-3" type="submit">Supprimer mon compte</button>
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
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            $("#toggle-1").click(function(event) {
                event.preventDefault();
                $("#toggleElement-1").toggle();
            })

            $("#toggle-2").click(function(event) {
                event.preventDefault();
                $("#toggleElement-2").toggle();
            })

            $("#toggle-3").click(function(event) {
                event.preventDefault();
                $("#toggleElement-3").toggle();
            })

            $("#toggle-4").click(function(event) {
                event.preventDefault();
                $("#toggleElement-4").toggle();
            })
        })
        </script>
        @endpush