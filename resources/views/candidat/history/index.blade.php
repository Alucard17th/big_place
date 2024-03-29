@extends('layouts.dashboard')
@push('styles')
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
                            <h3>Mes dernières recherches</h3>
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
                                            <th class="text-left d-none">Crée le</th>
                                            <th><input class="checkbox-all" type="checkbox" name="selecte-all" id="">
                                            </th>
                                            <th>Nom de l'entreprise</th>
                                            <th>Titre de l'offre</th>
                                            <th>Date de publication</th>
                                            <th>Date de prise de poste</th>
                                            <th>Ville / département</th>
                                            <th>Type du contrat</th>
                                            <th>Salaire brut</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($offers as $offer)
                                        <tr>
                                            <td class="text-left d-none" data-order="{{$offer->created_at}}">{{$offer->created_at}}</td>
                                            <td><input class="checkbox-item" type="checkbox" name="selected" id=""
                                                    value="{{$offer->id}}"></td>
                                            <td class="text-left">{{$offer->company_name}}</td>
                                            <td class="text-left">{{$offer->job_title}}</td>
                                            <td class="text-left">{{ \Carbon\Carbon::parse($offer->publication_date)->formatLocalized('%d-%m-%Y') }}</td>
                                            <td class="text-left">{{ \Carbon\Carbon::parse($offer->start_date)->formatLocalized('%d-%m-%Y') }}</td>
                                            <td class="text-left">{{$offer->location_city}}</td>
                                            <td class="text-left">{{$offer->contract_type}}</td>
                                            <td class="text-left">{{$offer->brut_salary}}</td>
                                            <td class="text-left">
                                                @if($offer->user_id != null)
                                                <a href="{{route('candidat.vitrine.show', $offer->user_id)}}" 
                                                type="button" class="bg-btn-three">
                                                    Vitrine de l'entreprise 
                                                </a>
                                                @endif
                                                <a href="{{route('candidat.offers.show', $offer->id)}}" 
                                                type="button" class="bg-btn-five mt-2">
                                                    Consulter l'offre
                                                </a>
                                                <a href="" 
                                                type="button" class="bg-btn-eight mt-2 add-to-favorites" 
                                                data-offer-id="{{$offer->id}}">
                                                    Ajouter aux favoris
                                                </a>
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

    
    $('#data-table').DataTable({
        "info": false, // Hide "Showing X to Y of Z entries"
        "searching": true,
        "order": [[0, "desc"]],
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

    $('#data-table_filter input').before(
        '<i class="las la-search" style="padding: 10px; min-width: 40px; position: absolute;"></i>');

    function confirmDelete(url) {
        var result = window.confirm("Are you sure you want to delete?");
        if (result) {
            window.location.href = url;
        }
    }

    // ADD UNIQUE FAVORITE
    $('.add-to-favorites').on('click', function(event) {
        event.preventDefault();
        var offerId = $(this).data('offer-id');
        console.log(offerId);
        const data = {
            selectedValues: [offerId]
        };
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
    })
})
</script>
@endpush