@extends('layouts.dashboard')
@push('styles')
<style>
    .modal a.custom-close-modal {
    position: absolute;
    top: -12.5px;
    right: -12.5px;
    /* display: block; */
    display: none;
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
.select2-selection--multiple {
    max-height: 45px !important;
    border: 1px solid #dae1e7 !important;
    border-radius: 3px;
    box-shadow: none;
    font-size: 14px;
    background: #f0f5f7 !important;
}
.select2-search__field{
    padding: 0px 18px 10px 20px !important;
}

.bg-btn-visio.active{
    background-color: #ff8b00; /* Change to your desired active background color */
    color: white !important; /* Change to your desired active text color */
}
.bg-btn-physic.active{
    background-color: #ff8b00; /* Change to your desired active background color */
    color: white !important; /* Change to your desired active text color */
}
</style>
@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center justify-content-center">
                <a href="{{ route('recruiter.dashboard') }}" class="theme-btn-one btn-one mr-2">
                        <i class="las la-arrow-left" style="font-size:38px"></i>
                    </a>
                <h3>Mes Favoris</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <!-- SEARCH FORM -->
                        <div class="widget-title">
                            <div class="chosen-outer search-container">
                                <form method="get" class="default-form form-inline"
                                    action="{{ route('recruiter.cvtheque.search') }}">
                                    <div class="row">
                                            <div class="col-4">
                                                <div class="form-group mb-0 mr-1">
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nom">
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group mb-0 mr-1">
                                                    <input type="text" name="address" id="address" class="form-control" placeholder="Adresse">
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="form-group mb-0 mr-1">
                                                    <select name="status" id="status" class="form-control">
                                                        <option value=""  selected>Status Rendez-vous</option>
                                                        <option value="Envoyé">Envoyé</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-4 mt-3">
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
                                    </div>
                                   
                                  <div class="form-group mt-3">
                                    <button type="submit" class="theme-btn btn-style-one bg-btn">Chercher</button>
                                  </div>
                                   
                                </form>

                            </div>
                        </div>

                        <button type="button" class="bg-btn-three ml-2 mb-2 d-none add-to-favorites">Prendre un rendez-vous</button>

                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <table class="table table-sm table-bordered" id="data-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <!-- <th><input class="checkbox-all" type="checkbox" name="selecte-all" id=""></th> -->
                                            <th></th>
                                            <th>Nom</th>
                                            <th>Ville</th>
                                            <th>Niveau</th>
                                            <th>Etat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($favorites as $curriculum)
                                        <tr>
                                            <td><input class="checkbox-item" type="checkbox" name="selected" id=""
                                                    value="{{$curriculum->id}}"></td>
                                            <td class="text-left">{{$curriculum->nom}} {{$curriculum->prenom}}</td>
                                            <td class="text-left">{{$curriculum->ville_domiciliation}}</td>
                                            <td class="text-left">{{$curriculum->niveau}}</td>
                                            <td class="text-left">XXX</td>
                                            
                                            <td class="text-left">
                                                <a type="button" class="bg-btn-three">Proposez un rendez-vous</a>
                                                <a type="button" class="bg-btn-four">Annuler le rendez-vous</a>
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

    <!-- Modal HTML embedded directly into document -->
    <div id="ex1" class="modal">
       <form action="{{route('recruiter.invite.candidates')}}" method="POST">
            @csrf
            <div class="form-group d-flex align-items-center justify-content-between">
                <h4 class="text-dark">Détails de rendez-vous :</h4>
                <a href="#" id="close-modal"><i class="las la-times" style="font-size: 30px;"></i></a>
            </div>
           
            <label for="candidate" class="text-dark">Type du rendez-vous</label>
            <div class="form-check align-items-center d-none">
                <input class="form-check-input" type="checkbox" value="" name="is_type_presentiel" id="is_type_presentiel">
                <label class="form-check-label ml-4" for="is_type_presentiel">
                    Présentiel
                </label>
                
            </div>
            <div class="form-check form-check d-none align-items-center">
                <input class="form-check-input" type="checkbox" value="" name="is_type_distanciel" id="is_type_distanciel">
                <label class="form-check-label ml-4" for="is_type_distanciel">
                    Distanciel
                </label>
            </div>

            <div class="form-group">
                <div class="choices d-flex">
                    <button type="button" class="bg-btn-visio mr-2 d-flex align-items-center"><i class="las la-video mr-2" style="font-size: 24px;"></i>Proposer Rdv visio</button>
                    <button type="button" class="bg-btn-physic mr-2">Proposer Rdv physique</button>
                </div>
            </div>

            <hr style="padding: 0px 0;background-color: rgb(0 0 0);">

            <div class="form-group">
                <label for="candidate" class="text-dark">Crénau 1:</label>
                <div class="row">
                    <div class="col-6">
                        <input class="form-control mb-2" type="date" name="crenau_1_date" id="crenau_1_date" required>
                    </div>
                    <div class="col-6">
                        <input class="form-control mb-2" type="time" name="crenau_1_time" id="crenau_1_time" required>
                    </div>
                </div>
                <p id="creanuea_1_msg" class="text-danger"></p>
            </div>

            <div class="form-group">
                <label for="candidate" class="text-dark">Crénau 2:</label>
                <div class="row">
                    <div class="col-6">
                    <input class="form-control mb-2" type="date" name="crenau_2_date" id="crenau_2_date" required>
                    </div>
                    <div class="col-6">
                    <input class="form-control mb-2" type="time" name="crenau_2_time" id="crenau_2_time" required>
                    </div>
                </div>
                <p id="creanuea_2_msg" class="text-danger"></p>
            </div>

            <div class="form-group">
                <label for="candidate" class="text-dark">Crénau 3:</label>
                <div class="row">
                    <div class="col-6">
                        <input class="form-control mb-2" type="date" name="crenau_3_date" id="crenau_3_date" required>
                    </div>
                    <div class="col-6">
                        <input class="form-control mb-2" type="time" name="crenau_3_time" id="crenau_3_time" required>
                    </div>
                </div>
                <p id="creanuea_3_msg" class="text-danger"></p>
            </div>

            <div class="form-group">
                <button class="theme-btn btn-style-one create-rdv px-5 py-3" type="button" style="font-size: 16px">Envoyer</button>
            </div>
            <div class="form-group">
                <div class="alert alert-success alert-dismissible" style="display: none;">
                    <p id="success-msg">Les créneaux de rendez-vous pour le(s) candidat(s) retenu(s) ont été transmis avec succès.</p>
                </div>
            </div>
       </form>
        
        <a href="#"  class="custom-close-modal"></a>
    </div>

</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAllCheckbox = document.querySelector('.checkbox-all');
    const checkboxes = document.querySelectorAll('.checkbox-item');
    const addToFavoritesButton = document.querySelector('.add-to-favorites');
    const createRendezVousButton = document.querySelector('.create-rdv');
    const maxAllowedChecked = 3;

    const creanuea_1_msg = document.querySelector('#creanuea_1_msg');
    const creanuea_2_msg = document.querySelector('#creanuea_2_msg');
    const creanuea_3_msg = document.querySelector('#creanuea_3_msg');

    let selectedCandidates = [];
    // Add an event listener to checkboxes to toggle the button visibility
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const checkedCheckboxes = document.querySelectorAll('.checkbox-item:checked');

            if (checkedCheckboxes.length > maxAllowedChecked) {
                // If the limit is exceeded, uncheck the last checkbox checked
                this.checked = false;
            }

            // Update the visibility of the "Ajouter aux favoris" button
            const addToFavoritesButton = document.querySelector('.add-to-favorites');
            addToFavoritesButton.classList.toggle('d-none', checkedCheckboxes.length === 0);
        });
    });

    // selectAllCheckbox.addEventListener('change', function () {
    //     const isChecked = selectAllCheckbox.checked;

    //     checkboxes.forEach(function (checkbox) {
    //         checkbox.checked = isChecked;
    //     });

    //     // Update the visibility of the "Ajouter aux favoris" button
    //     const addToFavoritesButton = document.querySelector('.add-to-favorites');
    //     addToFavoritesButton.classList.toggle('d-none', !isChecked);
    // });

    $('#close-modal, .custom-close-modal').click(function() {
        console.log('Modal Should Be Closed');
        $.modal.close();
    });
 
    // Add an event listener to the "Ajouter aux favoris" button to collect values
    addToFavoritesButton.addEventListener('click', function() {
        const checkedCheckboxes = document.querySelectorAll('.checkbox-item:checked');
        
        const selectedValues = Array.from(checkedCheckboxes).map(function(checkbox) {
            return checkbox.value;
        });

        if (selectedValues.length > 0) {
            // Define the data to be sent
            const data = { selectedValues: selectedValues };
            $("#ex1").modal({
                escapeClose: false,
                clickClose: true,
                showClose: false
            });

            selectedCandidates = selectedValues;
            
        console.log('Selected values:', selectedValues);
        }
    });

    createRendezVousButton.addEventListener('click', function(event) {
        event.preventDefault();
        sendRdv(selectedCandidates);
    })

    function sendRdv(selectedValues) {
        if (document.getElementById('is_type_presentiel').checked || document.getElementById('is_type_distanciel').checked) {
            if (selectedValues.length > 0) {
                // Create a FormData object to store the form data
                const formData = new FormData();

                // Add the form fields to the formData
                formData.append('crenau_1_date', document.getElementById('crenau_1_date').value);
                formData.append('crenau_1_time', document.getElementById('crenau_1_time').value);
                formData.append('crenau_2_date', document.getElementById('crenau_2_date').value);
                formData.append('crenau_2_time', document.getElementById('crenau_2_time').value);
                formData.append('crenau_3_date', document.getElementById('crenau_3_date').value);
                formData.append('crenau_3_time', document.getElementById('crenau_3_time').value);

                formData.append('is_type_presentiel', document.getElementById('is_type_presentiel').checked);
                formData.append('is_type_distanciel', document.getElementById('is_type_distanciel').checked);

                formData.append('selectedValues', JSON.stringify(selectedValues));

                // Send the data using AJAX
                fetch('{{ route('recruiter.invite.candidates') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include CSRF token
                    },
                    body: formData, // Use formData as the body
                })
                    .then(response => response.json())
                    .then(data => {
                        // Handle the response, e.g., show a success message
                        // refresh the current page
                    
                        creanuea_1_msg.innerHTML = '';
                        creanuea_2_msg.innerHTML = '';
                        creanuea_3_msg.innerHTML = '';
                        for (const key in data.errors) {
                            if (data.errors.hasOwnProperty(key)) {
                                const errorMessage = data.errors[key];
                                const element = document.querySelector(`#creanuea_${parseInt(key) + 1}_msg`);
                                if (element) {
                                    // Update the inner HTML of the corresponding element
                                    element.innerHTML = 'Erreur: ' + errorMessage;
                                }
                            }
                        }

                        console.log(data.status);
                            if(data.status == 'success'){
                                $('.alert-success').show();
                            }

                    })
                    .catch(error => {
                        // Handle errors, e.g., show an error message
                        console.error(error);
                    });
            }
        }else {
            // Show an error message to inform the user to select at least one checkbox
            alert('Veuillez choisir au moins un type de RDV');
        }
        
    }

    // new DataTable('#data-table');
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
        },
        // "pagingType": "full_numbers",
    });

    $('#data-table_filter input').before('<i class="las la-search" style="padding: 10px; min-width: 40px; position: absolute;"></i>');

     // Initially hide checkboxes
     $('.form-check').hide();

     $('.bg-btn-visio').click(function() {
        $('#is_type_distanciel').prop('checked', function(i, value) {
            return !value; // Toggle the checked property
        });
        $('.bg-btn-visio').toggleClass('active');
    });

    $('.bg-btn-physic').click(function() {
        $('#is_type_presentiel').prop('checked', function(i, value) {
            return !value; // Toggle the checked property
        });
        $('.bg-btn-physic').toggleClass('active');
    });
    
});
</script>
@endpush