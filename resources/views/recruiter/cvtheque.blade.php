@extends('layouts.dashboard')
@push('styles')
<style>
#mm-0>div.user-dashboard.bc-user-dashboard>div>div.row>div>div>div>div.widget-content>div>table>tbody>tr>td {
    padding: 5px;
}

#mm-0>div.user-dashboard.bc-user-dashboard>div>div.row>div>div>div>div.widget-content>div>table>thead>tr>th {
    padding: 5px;
}

input, select{
    height:45px !important;
    padding-top: 10px !important;
}
.select2-selection--single{
    max-height: 45px !important;
    border: 1px solid #dae1e7 !important;
    border-radius: 3px;
    box-shadow: none;
    font-size: 14px;
    background: #fff !important;
    padding: 8px 15px 0px 20px !important;
    width: 22vw;
}
.select2-selection--multiple {
    height: 100% !important;
    border: 1px solid #dae1e7 !important;
    border-radius: 3px;
    box-shadow: none;
    font-size: 14px;
    background: #fff !important;
    width: 22vw;
}
.select2-search__field{
    padding: 0px 18px 10px 20px !important;
    height: 37px !important;
}

#search-btn{
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 20px;
}

.form-group input, .form-group select{
    height: 45px ;
    background: #fff !important;
}

</style>
@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
       
        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">

                    <div class="upper-title-box d-flex justify-content-between align-items-center p-4">
                        <div class="d-flex align-items-center justify-content-center">  
                            <h3>CVTHEQUE</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('recruiter.dashboard') }}" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                            <!-- <button class="theme-btn btn-style-one bg-header-btn">+ Ajouter des candidats</button> -->
                        </div>
                    </div>

                    <div class="tabs-box">
                        <!-- SEARCH FORM -->
                        <div class="widget-title">
                            <div class="chosen-outer search-container">
                                <form method="get" class="default-form form-inline"
                                    action="{{ route('recruiter.cvtheque.search') }}">
                                    <div class="row">
                                        <div class="col-4 px-1">
                                            <div class="form-group mb-0 mr-1">
                                            <select name="metier_recherche" id="metier_recherche" class="form-control" required>
                                                <option value="" selected>Métier / Code Rome</option>
                                                @foreach($jobs as $job)
                                                    <option value="{{$job->id}}" @if(request('metier_recherche') == $job->id) selected @endif>{{$job->id}} - {{$job->full_name}}</option>    
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>

                                        <div class="col-4 px-1">
                                            <div class="form-group mb-0 mr-1">
                                                <input type="text" name="ville_domiciliation" id="ville_domiciliation" placeholder="Ville / département"
                                                    value="{{ request('ville_domiciliation') }}" class="form-control mb-2" required>
                                            </div>
                                        </div>

                                        <div class="col-4 px-1">
                                            <div class="form-group mb-0 mr-1">
                                                <select class="form-control" id="annees_experience" name="annees_experience" required>
                                                    <option value=""  selected>Année d'expérience</option>
                                                    <option value="Débutant (0 – 2 ans)"  @if(request('annees_experience') == 'Débutant (0 – 2 ans)') selected @endif>Débutant (0 – 2 ans)</option>
                                                    <option value="Intermédiaire (2 – 5 ans)" @if(request('annees_experience') == 'Intermédiaire (2 – 5 ans)') selected @endif>Intermédiaire (2 – 5 ans)</option>
                                                    <option value="Confirmé (5 -10 ans)" @if(request('annees_experience') == 'Confirmé (5 -10 ans)') selected @endif>Confirmé (5 -10 ans)</option>
                                                    <option value="Sénior (+ 10 ans)" @if(request('annees_experience') == 'Sénior (+ 10 ans)') selected @endif>Sénior (+ 10 ans)</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-4 px-1">
                                            <div class="form-group mb-0 mr-1">
                                                    <select name="niveau_etudes" id="niveau_etudes" class="form-control" required>
                                                        <option value=""  selected>Niveau d'études</option>
                                                        <option value="CAP / BEP" @if(request('niveau_etudes') == 'CAP / BEP') selected @endif>CAP / BEP</option>
                                                        <option value="Bac" @if(request('niveau_etudes') == 'Bac') selected @endif>Bac</option>
                                                        <option value="Bac + 2" @if(request('niveau_etudes') == 'Bac + 2') selected @endif>Bac + 2</option>
                                                        <option value="Bac + 4" @if(request('niveau_etudes') == 'Bac + 4') selected @endif>Bac + 4</option>
                                                        <option value="Bac + 5 et plus" @if(request('niveau_etudes') == 'Bac + 5 et plus') selected @endif>Bac + 5 et plus</option>
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="col-4 px-1">
                                            <div class="form-group mb-0 mr-1">
                                                <input type="text" name="pretentions_salariales" placeholder="Niveau de salaire"
                                                    value="{{ request('pretentions_salariales') }}" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-4 px-1">
                                            <div class="form-group mb-0">
                                                <select name="valeurs[]" id="values_select" class="" multiple required>
                                                    <option value="respect" @if(request()->has('valeurs') && in_array("respect", request('valeurs'))) selected @endif>Le respect</option>
                                                    <option value="adaptabilite" @if(request()->has('valeurs') && in_array("adaptabilite", request('valeurs'))) selected @endif>L’adaptabilité</option>
                                                    <option value="consideration" @if(request()->has('valeurs') && in_array("consideration", request('valeurs'))) selected @endif>la considération</option>
                                                    <option value="altruisme" @if(request()->has('valeurs') && in_array("altruisme", request('valeurs'))) selected @endif>l’altruisme</option>
                                                    <option value="assertivite" @if(request()->has('valeurs') && in_array("assertivite", request('valeurs'))) selected @endif>l’assertivité</option>
                                                    <option value="entraide" @if(request()->has('valeurs') && in_array("entraide", request('valeurs'))) selected @endif>l’entraide</option>
                                                    <option value="solidarite" @if(request()->has('valeurs') && in_array("solidarite", request('valeurs'))) selected @endif>la solidarité</option>
                                                    <option value="ecoute" @if(request()->has('valeurs') && in_array("ecoute", request('valeurs'))) selected @endif>l’écoute</option>
                                                    <option value="bienveillance" @if(request()->has('valeurs') && in_array("bienveillance", request('valeurs'))) selected @endif>la bienveillance</option>
                                                    <option value="empathie" @if(request()->has('valeurs') && in_array("empathie", request('valeurs'))) selected @endif>lempathie</option>
                                                    <option value="creativite" @if(request()->has('valeurs') && in_array("creativite", request('valeurs'))) selected @endif>la créativité</option>
                                                    <option value="justice" @if(request()->has('valeurs') && in_array("justice", request('valeurs'))) selected @endif>la justice</option>
                                                    <option value="tolerance" @if(request()->has('valeurs') && in_array("tolerance", request('valeurs'))) selected @endif>la tolérance</option>
                                                    <option value="equite" @if(request()->has('valeurs') && in_array("equite", request('valeurs'))) selected @endif>l’équité</option>
                                                    <option value="honnetete" @if(request()->has('valeurs') && in_array("honnetete", request('valeurs'))) selected @endif>l’honnêteté</option>
                                                    <option value="responsabilite" @if(request()->has('valeurs') && in_array("responsabilite", request('valeurs'))) selected @endif>la responsabilité</option>
                                                    <option value="loyaute" @if(request()->has('valeurs') && in_array("loyaute", request('valeurs'))) selected @endif>la loyauté</option>
                                                    <option value="determination" @if(request()->has('valeurs') && in_array("determination", request('valeurs'))) selected @endif>la détermination</option>
                                                    <option value="perseverance" @if(request()->has('valeurs') && in_array("perseverance", request('valeurs'))) selected @endif>la persévérance</option>
                                                    <option value="rigueur" @if(request()->has('valeurs') && in_array("rigueur", request('valeurs'))) selected @endif>la rigueur</option>
                                                    <option value="generosite" @if(request()->has('valeurs') && in_array("generosite", request('valeurs'))) selected @endif>la générosité</option>
                                                    <option value="stabilite" @if(request()->has('valeurs') && in_array("stabilite", request('valeurs'))) selected @endif>la stabilité</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                   
                                  <div class="form-group mt-3">
                                    <button type="submit" class="theme-btn btn-style-one bg-btn" id="search-btn">Chercher</button>
                                  </div>
                                   
                                </form>

                            </div>
                        </div>

                        <button type="button" class="btn-style-one bg-btn px-0 mb-2 ml-2 d-none add-to-favorites">Ajouter aux
                            favoris</button>

                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <table class="table table-sm table-bordered" id="data-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th><input class="checkbox-all" type="checkbox" name="selecte-all" id="">
                                            </th>
                                            <th>Nom</th>
                                            <th>Ville</th>
                                            <th>Années d’expérience</th>
                                            <th>Niveau</th>
                                            <th>Niveau de salaire</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($curriculums as $curriculum)
                                        <tr>
                                            <td><input class="checkbox-item" type="checkbox" name="selected" id=""
                                                    value="{{$curriculum->id}}"></td>
                                            <td class="text-left">{{$curriculum->nom}} {{$curriculum->prenom}}</td>
                                            <td class="text-left">{{$curriculum->ville_domiciliation}}</td>
                                            <td class="text-left">{{$curriculum->annees_experience}}</td>
                                            <td class="text-left">{{$curriculum->niveau}}</td>
                                            <td class="text-left">{{$curriculum->pretentions_salariales}}</td>
                                            <td class="text-left">
                                                @if($curriculum->cv != null && $curriculum->cv != '')
                                                <button class="bg-btn-three see-profile" data-url="{{ asset('storage'.$curriculum->cv) }}"
                                                data-cvid="{{$curriculum->id}}">
                                                    Consulter le profil
                                                </button>
                                                @else
                                                    Ce candidat n'a pas encore de CV
                                                @endif
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAllCheckbox = document.querySelector('.checkbox-all');
    const checkboxes = document.querySelectorAll('.checkbox-item');
    const addToFavoritesButton = document.querySelector('.add-to-favorites');
   
    $("#values_select").select2({
        placeholder: "Valeurs Attendues",
        maximumSelectionLength: 5,
        language: {
            maximumSelected: function (e) {
                return "Vous ne pouvez sélectionner que jusqu'à 5 valeurs.";
                // Replace this string with your custom error message
            }
        }
    });

    $("#niveau_etudes").select2({});
    $("#metier_recherche").select2({});

    $("#values_select").on("select2:select", (event) => {
        if ($("#values_select").val().length > 4) {
            alert("Vous ne pouvez sélectionner que 5 valeurs maximum.");
            $("#values_select").val($("#values_select").val().slice(0, 5)); // Keep only the first 5 selected values
            event.preventDefault(); // Prevent further selection
        }
    });

    // new DataTable('#data-table');
    $('#data-table').DataTable({
        "info": false, // Hide "Showing X to Y of Z entries"
        "language": {
            "lengthMenu": "Afficher _MENU_ entrées", // Edit this line to customize the text
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "paginate": {
                "first": "Premier",
                "last": "Dernier",
                "next": "Suivant",
                "previous": "Précédent",
            },
            "search": "",
            "searchPlaceholder": "Rechercher...",
            "zeroRecords": "Aucun résultat trouvé.",
            // Add other language customization options if needed
        },
        // "pagingType": "full_numbers",
    });

    $('#data-table_filter input').before('<i class="las la-search" style="padding: 10px; min-width: 40px; position: absolute;"></i>');

    
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

    $(document).on('click', '.see-profile', function(event) {
        // ... rest of your code
        const dataUrl = $(this).data('url');
        const cvId = $(this).data('cvid');

        console.log("Data URL:", dataUrl); // Log the value to the console
        $.ajax({
            url: "{{ route('recruiter.historique.store') }}", // Replace with your actual route
            type: 'POST',
            data: { 
                url: dataUrl,
                _token: '{{ csrf_token() }}',
                cv_id: cvId
             },
            success: function(response) {
                // Handle successful request (optional)
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle any errors (optional)
            },
            complete: function() {
                window.open(dataUrl, '_blank'); // Open file in new tab after AJAX
            }
        });
    });
    
});
</script>
@endpush