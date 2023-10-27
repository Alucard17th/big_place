@extends('layouts.dashboard')

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>CVTHEQUE</h3>
            <div class="text">Simplifiez votre processus de recrutement et accélérez vos embauches</div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Recherche Par:</h4>

                            <div class="chosen-outer">
                                <form method="get" class="default-form form-inline"
                                    action="{{route('recruiter.cvtheque.search')}}">
                                    <!--Tabs Box-->
                                    <!-- <div class="form-group mb-0 mr-1">
                                        <select class="form-control" name="order_by" onchange="this.form.submit()">
                                            <option value="">Trier par</option>
                                            <option value="newest">Nouveau</option>
                                            <option value="oldest">Ancien</option>
                                        </select>
                                    </div> -->
                                    <div class="form-group mb-0 mr-1">
                                        <input type="text" name="metier_recherche" placeholder="métier/poste"
                                            value="" class="form-control mb-2">
                                    </div>
                                    <div class="form-group mb-0 mr-1">
                                        <input type="text" name="ville_domiciliation" placeholder="ville"
                                            value="" class="form-control mb-2">
                                    </div>
                                    <div class="form-group mb-0 mr-1">
                                        <input type="text" name="annees_experience" placeholder="année d'exp."
                                            value="" class="form-control mb-2">
                                    </div>
                                    <div class="form-group mb-0 mr-1">
                                        <input type="text" name="niveau_etudes" placeholder="niveau d'études" 
                                            value="" class="form-control mb-2">
                                    </div>
                                    <div class="form-group mb-0 mr-1">
                                        <input type="text" name="pretentions_salariales" placeholder="niveau de salaire"
                                            value="" class="form-control">
                                    </div>
                                    <div class="form-group mb-0 mr-1">
                                        <input type="text" name="valeur" placeholder="valeur"
                                            value="" class="form-control">
                                    </div>
                                    <button type="submit" class="theme-btn btn-style-one">Chercher</button>
                                </form>
                            </div>
                        </div>

                        <div class="widget-content">
                            <div class="table-outer">
                                <table class="default-table manage-job-table">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Ville</th>
                                            <th>Niveau</th>
                                            <!-- <th>Niveau d'études</th> -->
                                            <!-- <th>Métier recherché</th>
                                            <th>Prétentions salariales</th>
                                            <th>Années d’expérience</th> -->
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($curriculums as $curriculum)
                                        <tr>
                                            <td class="text-left">{{$curriculum->nom}} {{$curriculum->prenom}}</td>
                                            <td class="text-left">{{$curriculum->ville_domiciliation}}</td>
                                            <td class="text-left">{{$curriculum->niveau}}</td>
                                            <!-- <td class="text-left">{{$curriculum->niveau_etudes}}</td> -->
                                            <!-- <td class="text-left">{{$curriculum->metier_recherche}}</td>
                                            <td class="text-left">{{$curriculum->pretentions_salariales}}</td>
                                            <td class="text-left">{{$curriculum->annees_experience}}</td> -->
                                            <td class="text-left">
                                                <a type="button" class="theme-btn btn-style-one">Détails</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="ls-pagination">
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