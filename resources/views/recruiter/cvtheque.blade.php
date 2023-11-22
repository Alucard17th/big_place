@extends('layouts.dashboard')
@push('styles')
<style>
#mm-0>div.user-dashboard.bc-user-dashboard>div>div.row>div>div>div>div.widget-content>div>table>tbody>tr>td {
    padding: 5px;
}

#mm-0>div.user-dashboard.bc-user-dashboard>div>div.row>div>div>div>div.widget-content>div>table>thead>tr>th {
    padding: 5px;
}
</style>
@endpush
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
                        <!-- SEARCH FORM -->
                        <div class="widget-title">
                            <h4>Recherche Par:</h4>
                            <div class="chosen-outer">
                                <form method="get" class="default-form form-inline"
                                    action="{{ route('recruiter.cvtheque.search') }}">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group mb-0 mr-1">
                                            <select name="metier_recherche" id="metier_recherche" class="form-control">
                                                <option value="" selected>Métier / Code Rome</option>
                                                @foreach($jobs as $job)
                                                    <option value="{{$job->id}}" @if(request('metier_recherche') == $job->id) selected @endif>{{$job->id}} - {{$job->full_name}}</option>    
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group mb-0 mr-1">
                                                <input type="text" name="ville_domiciliation" placeholder="Ville / département"
                                                    value="{{ request('ville_domiciliation') }}" class="form-control mb-2">
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group mb-0 mr-1">
                                                <select class="form-control" id="annees_experience" name="annees_experience">
                                                    <option value=""  selected>Année d'exp.</option>
                                                    <option value="Débutant (0 – 2 ans)"  @if(request('annees_experience') == 'Débutant (0 – 2 ans)') selected @endif>Débutant (0 – 2 ans)</option>
                                                    <option value="Intermédiaire (2 – 5 ans)" @if(request('annees_experience') == 'Intermédiaire (2 – 5 ans)') selected @endif>Intermédiaire (2 – 5 ans)</option>
                                                    <option value="Confirmé (5 -10 ans)" @if(request('annees_experience') == 'Confirmé (5 -10 ans)') selected @endif>Confirmé (5 -10 ans)</option>
                                                    <option value="Sénior (+ 10 ans)" @if(request('annees_experience') == 'Sénior (+ 10 ans)') selected @endif>Sénior (+ 10 ans)</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group mb-0 mr-1">
                                                    <select name="niveau_etudes" id="niveau_etudes" class="form-control">
                                                        <option value=""  selected>Niveau d'études</option>
                                                        <option value="CAP / BEP" @if(request('niveau_etudes') == 'CAP / BEP') selected @endif>CAP / BEP</option>
                                                        <option value="Bac" @if(request('niveau_etudes') == 'Bac') selected @endif>Bac</option>
                                                        <option value="Bac + 2" @if(request('niveau_etudes') == 'Bac + 2') selected @endif>Bac + 2</option>
                                                        <option value="Bac + 4" @if(request('niveau_etudes') == 'Bac + 4') selected @endif>Bac + 4</option>
                                                        <option value="Bac + 5 et plus" @if(request('niveau_etudes') == 'Bac + 5 et plus') selected @endif>Bac + 5 et plus</option>
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group mb-0 mr-1">
                                                <input type="text" name="pretentions_salariales" placeholder="Niveau de salaire"
                                                    value="{{ request('pretentions_salariales') }}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group mb-0 mr-1">
                                                <select name="valeur[]" id="values_select" class="form-control" multiple>
                                                    <option value="Le respect" @if(request()->has('valeur') && in_array("Le respect", request('valeur'))) selected @endif>Le respect</option>
                                                    <option value="L’adaptabilité" @if(request()->has('valeur') && in_array("L’adaptabilité", request('valeur'))) selected @endif>L’adaptabilité</option>
                                                    <option value="la considération" @if(request()->has('valeur') && in_array("la considération", request('valeur'))) selected @endif>la considération</option>
                                                    <option value="l’altruisme" @if(request()->has('valeur') && in_array("l’altruisme", request('valeur'))) selected @endif>l’altruisme</option>
                                                    <option value="l’assertivité" @if(request()->has('valeur') && in_array("l’assertivité", request('valeur'))) selected @endif>l’assertivité</option>
                                                    <option value="l’entraide" @if(request()->has('valeur') && in_array("l’entraide", request('valeur'))) selected @endif>l’entraide</option>
                                                    <option value="la solidarité" @if(request()->has('valeur') && in_array("la solidarité", request('valeur'))) selected @endif>la solidarité</option>
                                                    <option value="l’écoute" @if(request()->has('valeur') && in_array("l’écoute", request('valeur'))) selected @endif>l’écoute</option>
                                                    <option value="la bienveillance" @if(request()->has('valeur') && in_array("la bienveillance", request('valeur'))) selected @endif>la bienveillance</option>
                                                    <option value="l’empathie" @if(request()->has('valeur') && in_array("l’empathie", request('valeur'))) selected @endif>lempathie</option>
                                                    <option value="la créativité" @if(request()->has('valeur') && in_array("la détermination", request('valeur'))) selected @endif>la créativité</option>
                                                    <option value="la justice" @if(request()->has('valeur') && in_array("la justice", request('valeur'))) selected @endif>la justice</option>
                                                    <option value="la tolérance" @if(request()->has('valeur') && in_array("la tolérance", request('valeur'))) selected @endif>la tolérance</option>
                                                    <option value="l’équité" @if(request()->has('valeur') && in_array("l’équité", request('valeur'))) selected @endif>l’équité</option>
                                                    <option value="l’honnêteté" @if(request()->has('valeur') && in_array("l’honnêteté", request('valeur'))) selected @endif>l’honnêteté</option>
                                                    <option value="la responsabilité" @if(request()->has('valeur') && in_array("la responsité", request('valeur'))) selected @endif>la responsabilité</option>
                                                    <option value="la loyauté" @if(request()->has('valeur') && in_array("la loyalsex", request('valeur'))) selected @endif>la loyauté</option>
                                                    <option value="la détermination" @if(request()->has('valeur') && in_array("la détermination", request('valeur'))) selected @endif>la détermination</option>
                                                    <option value="la persévérance" @if(request()->has('valeur') && in_array("la persévérance", request('valeur'))) selected @endif>la persévérance</option>
                                                    <option value="la rigueur" @if(request()->has('valeur') && in_array("la rigueur", request('valeur'))) selected @endif>la rigueur</option>
                                                    <option value="la générosité" @if(request()->has('valeur') && in_array("la générosité", request('valeur'))) selected @endif>la générosité</option>
                                                    <option value="la stabilité" @if(request()->has('valeur') && in_array("la stabilité", request('valeur'))) selected @endif>la stabilité</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                   
                                  <div class="form-group mt-2">
                                    <button type="submit" class="theme-btn btn-style-one">Chercher</button>
                                  </div>
                                   
                                </form>

                            </div>
                        </div>

                        <button type="button" class="btn btn-primary ml-2 mb-2 d-none add-to-favorites">Ajouter aux
                            favoris</button>

                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <table class="default-table manage-job-table table table-sm">
                                    <thead>
                                        <tr>
                                            <th><input class="checkbox-all" type="checkbox" name="selecte-all" id="">
                                            </th>
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
                                            <td><input class="checkbox-item" type="checkbox" name="selected" id=""
                                                    value="{{$curriculum->id}}"></td>
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

                        <!-- GRID VIEW -->
                        <div class="">
                            <div class="row gy-5 px-2">
                                @foreach($curriculums as $curriculum)
                                <div class="col-4 mb-3">
                                    <div class="card" style="height: 250px;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$curriculum->nom}} {{$curriculum->prenom}}</h5>
                                            <p class="card-text px-2">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <bold>Ville:</bold>{{$curriculum->ville_domiciliation}}
                                                </li>
                                                <li>
                                                    <bold>Niveau:</bold> {{$curriculum->niveau}}
                                                </li>
                                                <li>
                                                    <bold>Niveau d'études:</bold> {{$curriculum->niveau_etudes}}
                                                </li>
                                                <li>
                                                    <bold>Métier:</bold> {{$curriculum->metier_recherche}}
                                                </li>
                                                <li>
                                                    <bold>Prétentions salariales:</bold>
                                                    {{$curriculum->pretentions_salariales}}
                                                </li>
                                            </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="ls-pagination">
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
    const selectAllCheckbox = document.querySelector('.checkbox-all');
    const checkboxes = document.querySelectorAll('.checkbox-item');
    const addToFavoritesButton = document.querySelector('.add-to-favorites');
   
    $("#values_select").select2({
        placeholder: "Valeurs",
    });
    
    // Add an event listener to checkboxes to toggle the button visibility
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const checkedCheckboxes = document.querySelectorAll('.checkbox-item:checked');
            addToFavoritesButton.classList.toggle('d-none', checkedCheckboxes.length === 0);
        });
    });

    selectAllCheckbox.addEventListener('change', function() {
        const isChecked = selectAllCheckbox.checked;

        checkboxes.forEach(function(checkbox) {
            checkbox.checked = isChecked;
        });

        // Update the visibility of the "Ajouter aux favoris" button
        const addToFavoritesButton = document.querySelector('.add-to-favorites');
        addToFavoritesButton.classList.toggle('d-none', !isChecked);
    });

    // Add an event listener to the "Ajouter aux favoris" button to collect values
    addToFavoritesButton.addEventListener('click', function() {
        const checkedCheckboxes = document.querySelectorAll('.checkbox-item:checked');
        const selectedValues = Array.from(checkedCheckboxes).map(function(checkbox) {
            return checkbox.value;
        });

        if (selectedValues.length > 0) {
            // Define the data to be sent
            const data = {
                selectedValues: selectedValues
            };

            // Send the data using AJAX
            fetch('{{ route('recruiter.cvtheque.add.favorite') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include CSRF token
                        },
                        body: JSON.stringify(data),
                    })
                .then(response => response.json())
                .then(data => {
                    // Handle the response, e.g., show a success message
                    // refresh the current page
                    window.location.reload();
                })
                .catch(error => {
                    // Handle errors, e.g., show an error message
                    console.error(error);
                });
        }
        console.log('Selected values:', selectedValues);
        // You can now perform further actions with the selected values.
    });
});
</script>
@endpush