@extends('layouts.dashboard')
@push('styles')
<style>
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

                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <table class="table table-sm table-bordered" id="data-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Titre de l'offre</th>
                                            <th>Entreprise</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($histories as $history)
                                        <tr>
                                            <td class="text-left">{{getOfferByCandidatId($history->searchable)->job_title}}</td>
                                            <td class="text-left">{{getEntrepriseByUserID(getOfferByCandidatId($history->searchable)->user_id)->nom_entreprise}}</td>
                                           
                                            <td class="text-left">
                                                <a href="{{route('candidat.candidature.apply', $history->searchable)}}" type="button" class="bg-btn-three mt-2">
                                                    Voir l'offre
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


    <!-- Modal HTML embedded directly into document -->
    <div id="ex1" class="modal">
        <form action="{{ route('recruiter.events.store') }}" method="POST" id="add-event-form">
            @csrf
            <div class="form-group d-flex align-items-center justify-content-between">
                <h4 class="text-dark">J'organise un nouvel évènement</h4>
                <a href="#" id="close-modal"><i class="las la-times" style="font-size: 30px;"></i></a>
            </div>

            <div class="row">
                <div class="col-6">
                    <!-- Field: Organizer Name -->
                    <div class="form-group">
                        <label class="text-dark" for="organizer_name">Organisateur</label>
                        <input type="text" class="form-control" id="organizer_name" name="organizer_name" required>
                    </div>
                </div>
                <div class="col-6">
                    <!-- Field: Job Position -->
                    <div class="form-group">
                        <label class="text-dark" for="job_position">Poste</label>
                        <input type="text" class="form-control" id="job_position" name="job_position" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <!-- Field: Event Date -->
                    <div class="form-group">
                        <label class="text-dark" for="event_date">Date</label>
                        <input type="date" class="form-control" id="event_date" name="event_date" required>
                    </div>
                </div>
                <div class="col-6">
                    <!-- Field: Event Hour -->
                    <div class="form-group">
                        <label class="text-dark" for="event_hour">Heure</label>
                        <input type="time" class="form-control" id="event_hour" name="event_hour" required>
                    </div>
                </div>
            </div>

            <!-- Field: Event Address -->
            <div class="form-group">
                <label class="text-dark" for="event_address">Adresse</label>
                <input type="text" class="form-control" id="event_address" name="event_address" required>
            </div>

            <div class="row">
                <div class="col-6">
                    <!-- Field: Free Entry -->
                    <div>
                        <label class="text-dark" for="participants_count">Entrée</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="free_entry" name="free_entry">
                        <label class="form-check-label" for="free_entry">Gratuit</label>
                    </div>
                </div>
                <div class="col-6">
                    <!-- Field: Participants Count -->
                    <div class="form-group">
                        <label class="text-dark" for="participants_count">Limite de participants</label>
                        <input type="number" class="form-control" id="participants_count" name="participants_count"
                            required>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- <div class="col-6"> -->
                <!-- Field: Digital Badge Download -->
                <!-- <div class="form-group">
                        <label class="text-dark" for="digital_badge_download">Badge Digital</label>
                        <input type="text" class="form-control" id="digital_badge_download" name="digital_badge_download">
                    </div> -->
                <!-- </div> -->
                <div class="col-6">
                    <!-- Field: Required Documents -->
                    <div class="form-group">
                        <label class="text-dark" for="required_documents">Documents requis</label>
                        <input type="text" class="form-control" id="required_documents" name="required_documents">
                    </div>
                </div>
            </div>

            <button type="submit" class="theme-btn btn-style-one create-rdv px-5 py-3" id="add-event-btn">Créer
                l'événement</button>
        </form>

        <a href="#" class="custom-close-modal"></a>
    </div>

</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    $('#close-modal, .custom-close-modal').click(function() {
        $.modal.close();
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
    });

    $('#data-table_filter input').before(
        '<i class="las la-search" style="padding: 10px; min-width: 40px; position: absolute;"></i>');

    function confirmDelete(url) {
        var result = window.confirm("Are you sure you want to delete?");
        if (result) {
            window.location.href = url;
        }
    }

})
</script>
@endpush