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
.select2-container {
    width: 100% !important;
}

.select2-search__field {
    padding-left: 5px;
}

.select2-selection--single {
    margin: 0 !important;
    width: 100% !important;
    height: 35px !important;
    padding: .330rem .70rem !important;
    font-weight: 400 !important;
    line-height: 1.5 !important;
    color: #495057 !important;
    background-color: #fff !important;
    background-clip: padding-box !important;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out !important;
    margin-bottom: .5rem !important !important;
    border: 1px solid #dae1e7 !important;
    border-radius: 3px !important;
    box-shadow: none !important;
    font-size: 14px !important;
}

.select2-selection--multiple {
    margin: 0 !important;
    width: 100% !important;
    height: 100% !important;
    /* padding: .3rem .70rem !important; */
    padding-top: 2px;
    padding-left: 6px;
    font-weight: 400 !important;
    line-height: 1.5 !important;
    color: #8f959b !important;
    background-color: #fff !important;
    background-clip: padding-box !important;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out !important;
    margin-bottom: .5rem !important !important;
    border: 1px solid #dae1e7 !important;
    border-radius: 3px !important;
    box-shadow: none !important;
    font-size: 14px !important;
}

#select2-job_title-container {
    padding-left: 25px !important;
}

#location_city {
    padding-left: 38px !important;
    color: #000 !important;
}
#brut_salary {
    color: #000 !important;
}

.select2-search__field {
    color: #8f959b !important;
}

.select2-selection__placeholder,
#custom_job::placeholder,
#location_city::placeholder,
#brut_salary::placeholder,
#education_level::placeholder,
#experience_level::placeholder,
.select2-search__field,
#education_level, #experience_level
{
    color: #000 !important;
    font-size: 16px !important;
    font-weight: 400 !important;
}

.select2-selection__rendered {
    color: #000 !important;
    padding-left: 18px;
    font-size: 16px !important;
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
                                <form method="get" class="" action="{{route('candidat.offers.search')}}">
                                    <div class="row no-gutters">
                                        <div class="col-6 pr-1">
                                            <label>
                                                <input type="radio" id="use_select" checked> Utiliser Code ROME
                                            </label>
                                            <div class="form-group mb-2">
                                                <img src="{{asset('/plugins/images/dashboard/icons/search.png')}}" alt=""
                                                    style="padding: 6px; min-width: 18px; position: absolute; z-index: 10;scale: 0.7;">
                                                <select name="job_title" id="job_title" class="form-control">
                                                    <option value="" selected value="">Poste recherchés</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group mb-2">
                                                <label>
                                                    <input type="radio" id="use_input"> Utiliser Métier
                                                </label>
                                                <input name="custom_job" id="custom_job" class="form-control" 
                                                placeholder="Métier" value="{{request('custom_job')}}" disabled>
                                            </div>
                                        </div>

                                        <div class="col-6 pr-1">
                                            <div class="form-group mb-2">
                                                <img src="{{asset('/plugins/images/dashboard/icons/location.png')}}" alt=""
                                                    style="padding: 6px; min-width: 24px; position: absolute;scale: 0.7;">
                                                <input type="text" name="location_city" id="location_city" value="{{request('location_city')}}"
                                                    class="form-control mb-2" placeholder="Ville / Département">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group mb-2">
                                                <select class="form-control" id="experience_level" name="experience_level">
                                                    <option value="" selected>Année d'expérience</option>
                                                    <option value="Débutant (0 – 2 ans)"
                                                        @if(request('experience_level')=='Débutant (0 – 2 ans)' ) selected
                                                        @endif>Débutant (0 – 2 ans)</option>
                                                    <option value="Intermédiaire (2 – 5 ans)"
                                                        @if(request('experience_level')=='Intermédiaire (2 – 5 ans)' ) selected
                                                        @endif>Intermédiaire (2 – 5 ans)</option>
                                                    <option value="Confirmé (5 -10 ans)"
                                                        @if(request('experience_level')=='Confirmé (5 -10 ans)' ) selected
                                                        @endif>Confirmé (5 -10 ans)</option>
                                                    <option value="Sénior (+ 10 ans)"
                                                        @if(request('experience_level')=='Sénior (+ 10 ans)' ) selected @endif>
                                                        Sénior (+ 10 ans)</option>
                                                </select>
                                                <!-- <input type="number" name="experience_level" id="experience_level"  value="" class="form-control mb-2" placeholder="Années d'expérience"> -->
                                            </div>
                                        </div>

                                        <div class="col-6 pr-1">
                                            <div class="form-group mb-2">
                                                <select name="education_level" id="education_level" class="form-control">
                                                    <option value="">Niveau d'études</option>
                                                    <option value="CAP/BEP" @if(request('education_level')=='CAP / BEP' ) selected @endif>CAP / BEP</option>
                                                    <option value="Bac" @if(request('education_level')=='Bac' ) selected @endif>Bac</option>
                                                    <option value="Bac+2" @if(request('education_level')=='Bac+2' ) selected @endif>Bac + 2</option>
                                                    <option value="Bac+4" @if(request('education_level')=='Bac+4' ) selected @endif>Bac + 4</option>
                                                    <option value="Bac+5 et plus" @if(request('education_level')=='Bac+5' ) selected @endif>Bac + 5 et plus</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group mb-2">
                                                <input type="text" name="brut_salary" value="{{request('brut_salary')}}" id="brut_salary" class="form-control"
                                                    placeholder="Pretentions salariales">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group mb-2">
                                                <select name="valeurs[]" id="values_select" class="" multiple >
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
                                    <button type="submit" class="theme-btn btn-style-one my-2 w-100 rounded-pill py-3"
                                        id="search-btn">Chercher</button>
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
                                            @if(isset($isSearch) && $isSearch == true)
                                            <th>Matching</th>
                                            @endif
                                            <th>Nom de l'entreprise</th>
                                            <th>Titre de l'offre</th>
                                            <th>Ville / département</th>
                                            <th>Années d'expérience</th>
                                            <th>Niveau d'étude</th>
                                            <th>Niveau de salaire</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($offers as $offer)
                                        <tr>
                                            <td><input class="checkbox-item" type="checkbox" name="selected" id=""
                                                    value="{{$offer->id}}"></td>
                                            @if(isset($isSearch) && $isSearch == true)
                                            <td>
                                                <span class="matching-percentage badge badge-success">{{ number_format($offer->matching_percentage, 0) }} %</span>
                                            </td>
                                            @endif
                                            <td class="text-left">{{getEntrepriseByUserId($offer->user_id)}}</td>
                                            <td class="text-left">{{$offer->job_title}}</td>
                                            <td class="text-left">{{$offer->location_city}}</td>
                                            <td class="text-left">{{$offer->experience_level}}</td>
                                            <td class="text-left">{{$offer->education_level}}</td>
                                            <td class="text-left">{{$offer->brut_salary}}</td>
                                            <td class="text-left">
                                                <a href="{{route('candidat.vitrine.show', $offer->user_id)}}" 
                                                type="button" class="bg-btn-three">
                                                    Vitrine de l'entreprise 
                                                </a>
                                                <a href="{{route('candidat.offers.show', $offer->id)}}" 
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
        placeholder: "Vos valeurs",
        maximumSelectionLength: 5,
        language: {
            maximumSelected: function (e) {
                return "Vous ne pouvez sélectionner que jusqu'à 5 valeurs.";
                // Replace this string with your custom error message
            }
        }
    });

    $("#job_title").select2({
        placeholder: "Poste recherché",
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
            url: '/recruiter-dashboard/jobs/search',
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


    $("#use_select").on("change", function() {
        $("#select_container").toggle(this.checked);
        $("#job_title").prop("disabled", !this.checked);
        $("#mm-0 > div.user-dashboard.bc-user-dashboard > div > div:nth-child(2) > div:nth-child(1) > div > div > form > div > div:nth-child(1) > div:nth-child(2) > span > span.selection > span").toggleClass("greyed-out", !this.checked);
        $("#custom_job").prop("disabled", this.checked);
        $("#input_container").hide();  // Hide input container if select is checked
        $("#use_input").prop("checked", false);  // Uncheck input checkbox
        $("#custom_job").val("");
    });

    $("#use_input").on("change", function() {
        $("#input_container").toggle(this.checked);
        $("#custom_job").prop("disabled", !this.checked);
        $("#job_title").prop("disabled", this.checked);
        $("#mm-0 > div.user-dashboard.bc-user-dashboard > div > div:nth-child(2) > div:nth-child(1) > div > div > form > div > div:nth-child(1) > div:nth-child(2) > span > span.selection > span").toggleClass("greyed-out", this.checked);
        $("#select_container").hide();  // Hide select container if input is checked
        $("#use_select").prop("checked", false);  // Uncheck select checkbox
        $("#job_title").val([]).trigger('change');
    });

    var selectedMetier = getParameterByName('job_title');
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        console.log(results[2].replace(/\+/g, " "))
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
    if(selectedMetier){
        $("#job_title").append(new Option(selectedMetier, selectedMetier, true, true)).trigger('change');
    }
});
</script>
@endpush