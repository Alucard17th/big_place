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
                            <a href="{{ route('recruiter.dashboard') }}" class="bg-back-btn mr-2">
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
                                            <th>Nom du candidat</th>
                                            <th>Adresse</th>
                                            <th>Métier recherché</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($histories as $history)
                                        <tr>
                                            <td class="text-left">{{getCurriculumById($history->searchable)->nom}} {{getCurriculumById($history->searchable)->prenom}}</td>
                                            <td class="text-left">{{getCurriculumById($history->searchable)->ville_domiciliation}}</td>
                                            <td class="text-left">{{getCurriculumById($history->searchable)->metier_recherche}}</td>
                                            <td class="text-left">
                                                <a href="{{ asset('storage'.getCurriculumById($history->searchable)->cv) }}" type="button" class="bg-btn-three mt-2" target="_blank">
                                                    Consulter le profil
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