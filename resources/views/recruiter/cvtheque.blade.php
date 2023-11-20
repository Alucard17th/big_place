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
                                    <div class="form-group mb-0 mr-1">
                                        <input type="text" name="metier_recherche" placeholder="métier/poste"
                                            value="{{ request('metier_recherche') }}" class="form-control mb-2">
                                    </div>
                                    <div class="form-group mb-0 mr-1">
                                        <input type="text" name="ville_domiciliation" placeholder="ville"
                                            value="{{ request('ville_domiciliation') }}" class="form-control mb-2">
                                    </div>
                                    <div class="form-group mb-0 mr-1">
                                        <input type="text" name="annees_experience" placeholder="année d'exp."
                                            value="{{ request('annees_experience') }}" class="form-control mb-2">
                                    </div>
                                    <div class="form-group mb-0 mr-1">
                                        <input type="text" name="niveau_etudes" placeholder="niveau d'études"
                                            value="{{ request('niveau_etudes') }}" class="form-control mb-2">
                                    </div>
                                    <div class="form-group mb-0 mr-1">
                                        <input type="text" name="pretentions_salariales" placeholder="niveau de salaire"
                                            value="{{ request('pretentions_salariales') }}" class="form-control">
                                    </div>
                                    <div class="form-group mb-0 mr-1">
                                        <select name="valeur" id="values_select" class="form-control" multiple>
                                            <option value="Le respect">Le respect</option>
                                            <option value="L’adaptabilité">L’adaptabilité</option>
                                            <option value="la considération">la considération</option>
                                            <option value="l’altruisme">l’altruisme</option>
                                            <option value="l’assertivité">l’assertivité</option>
                                            <option value="l'entraide">l'entraide</option>
                                            <option value="la solidarité">la solidarité</option>
                                            <option value="l'écoute">l'écoute</option>
                                            <option value="la bienveillance">la bienveillance</option>
                                            <option value="l'empathie">l'empathie</option>
                                            <option value="la créativité">la créativité</option>
                                            <option value="la justice">la justice</option>
                                            <option value="la tolérance">la tolérance</option>
                                            <option value="l’équité">l’équité</option>
                                            <option value="l’honnêteté">l’honnêteté</option>
                                            <option value="la responsabilité">la responsabilité</option>
                                            <option value="la loyauté">la loyauté</option>
                                            <option value="la détermination">la détermination</option>
                                            <option value="la persévérance">la persévérance</option>
                                            <option value="la rigueur">la rigueur</option>
                                            <option value="la générosité">la générosité</option>
                                            <option value="la stabilité">la stabilité</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="theme-btn btn-style-one">Chercher</button>
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