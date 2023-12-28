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
                    <div class="upper-title-box d-flex justify-content-between align-items-center p-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <h3>Offres d'emploi</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('candidat.dashboard') }}" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <!-- SEARCH FORM -->
                        <div class="widget-title">
                            <div class="chosen-outer search-container">
                                <form method="get" class="default-form form-inline"
                                    action="{{ route('candidat.offers.search') }}">
                                    <div class="row">
                                        <div class="col-4 px-1">
                                            <div class="form-group mb-0 mr-1">
                                                <input type="text" name="job_title" id="job_title" placeholder="Poste recherché"
                                                    value="{{ request('job_title') }}" class="form-control mb-2">
                                            </div>
                                        </div>

                                        <div class="col-4 px-1">
                                            <div class="form-group mb-0 mr-1">
                                                <input type="text" name="location_city" id="location_city" placeholder="Ville / Département"
                                                    value="{{ request('location_city') }}" class="form-control mb-2">
                                            </div>
                                        </div>

                                        <div class="col-4 px-1">
                                            <div class="form-group mb-0 mr-1">
                                                <input type="text" name="brut_salary" placeholder="Niveau de salaire"
                                                    value="{{ request('brut_salary') }}" class="form-control">
                                            </div>
                                        </div>
                                       
                                        <div class="col-4 px-1">
                                            <div class="form-group mb-0 mr-1">
                                                    <select name="education_level" id="education_level" class="form-control">
                                                        <option value=""  selected>Niveau d'études</option>
                                                        <option value="CAP / BEP" @if(request('education_level') == 'CAP / BEP') selected @endif>CAP / BEP</option>
                                                        <option value="Bac" @if(request('education_level') == 'Bac') selected @endif>Bac</option>
                                                        <option value="Bac + 2" @if(request('education_level') == 'Bac + 2') selected @endif>Bac + 2</option>
                                                        <option value="Bac + 4" @if(request('education_level') == 'Bac + 4') selected @endif>Bac + 4</option>
                                                        <option value="Bac + 5 et plus" @if(request('education_level') == 'Bac + 5 et plus') selected @endif>Bac + 5 et plus</option>
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="col-4 px-1">
                                            <div class="form-group mb-0 mr-1">
                                                <select class="form-control" id="experience_level" name="experience_level">
                                                    <option value=""  selected>Année d'expérience</option>
                                                    <option value="Débutant (0 – 2 ans)"  @if(request('experience_level') == 'Débutant (0 – 2 ans)') selected @endif>Débutant (0 – 2 ans)</option>
                                                    <option value="Intermédiaire (2 – 5 ans)" @if(request('experience_level') == 'Intermédiaire (2 – 5 ans)') selected @endif>Intermédiaire (2 – 5 ans)</option>
                                                    <option value="Confirmé (5 -10 ans)" @if(request('experience_level') == 'Confirmé (5 -10 ans)') selected @endif>Confirmé (5 -10 ans)</option>
                                                    <option value="Sénior (+ 10 ans)" @if(request('experience_level') == 'Sénior (+ 10 ans)') selected @endif>Sénior (+ 10 ans)</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 pl-1">
                                            <div class="form-group mb-2">
                                                <select class="form-control" id="values_select" name="valeurs[]" multiple>
                                                    <option value="" selected>Valeurs attendues</option>
                                                    <option value="respect">Le respect</option>
                                                    <option value="adaptabilite">L’adaptabilité</option>
                                                    <option value="consideration">La considération</option>
                                                    <option value="altruisme">L’altruisme</option>
                                                    <option value="assertivite">L’assertivité</option>
                                                    <option value="entraide">L'entraide</option>
                                                    <option value="solidarite">La solidarité</option>
                                                    <option value="ecoute">L'écoute</option>
                                                    <option value="bienveillance">La bienveillance</option>
                                                    <option value="empathie">L'empathie</option>
                                                    <option value="creativite">La créativité</option>
                                                    <option value="justice">La justice</option>
                                                    <option value="tolerance">La tolérance</option>
                                                    <option value="equite">L’équité</option>
                                                    <option value="honnetete">L’honnêteté</option>
                                                    <option value="responsabilite">La responsabilité</option>
                                                    <option value="loyaute">La loyauté</option>
                                                    <option value="determination">La détermination</option>
                                                    <option value="perseverance">La persévérance</option>
                                                    <option value="rigueur">La rigueur</option>
                                                    <option value="generosite">La générosité</option>
                                                    <option value="stabilite">La stabilité</option>
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
                                            <th>Titre de l'offre</th>
                                            <th>Ville / département</th>
                                            <th>Années d'expérience</th>
                                            <th>Niveau d'étude</th>
                                            <th>Niveau de salaire</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($offres as $offer)
                                        <tr>
                                            <td><input class="checkbox-item" type="checkbox" name="selected" id=""
                                                    value="{{$offer->id}}"></td>
                                            <td class="text-left">{{$offer->job_title}}</td>
                                            <td class="text-left">{{$offer->location_city}}</td>
                                            <td class="text-left">{{$offer->experience_level}}</td>
                                            <td class="text-left">{{$offer->education_level}}</td>
                                            <td class="text-left">{{$offer->brut_salary}}</td>
                                            <td class="text-left">
                                                <a href="{{route('candidat.vitrine.show', $offer->user_id)}}" 
                                                type="button" class="bg-btn-three">
                                                    Consulter la vitrine entreprise
                                                </a>
                                                <a href="{{route('candidat.candidature.apply', $offer->id)}}" 
                                                type="button" class="bg-btn-five mt-2">
                                                    Consulter l'offre
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
            fetch('{{ route('candidat.favorite.add') }}', {
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

    $('#data-table').DataTable({
        "info": false, // Hide "Showing X to Y of Z entries"
        "searching": true,
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
    })

    $('#data-table_filter input').before('<i class="las la-search" style="padding: 10px; min-width: 40px; position: absolute;"></i>');
});
</script>
@endpush