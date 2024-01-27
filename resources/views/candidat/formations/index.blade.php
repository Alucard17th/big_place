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
.bg-btn-visio.active{
    background-color: #ff8b00; /* Change to your desired active background color */
    color: white !important; /* Change to your desired active text color */
}
.bg-btn-physic.active{
    background-color: #ff8b00; /* Change to your desired active background color */
    color: white !important; /* Change to your desired active text color */
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
    height: 45px !important;
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
    width: 22vw;
}

#rdv-form input, #rdv-form select{
    width:100%;
}
#ex1{
    background: #f8f8f8;
    max-width: 100%;
    width:600px;
    padding: 20px;
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
                            <h3>Les Formations Proposées</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('candidat.dashboard') }}" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <table class="table table-sm table-bordered" id="data-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <!-- <th><input class="checkbox-all" type="checkbox" name="selecte-all" id=""></th> -->
                                            <th>Nom de la formation</th>
                                            <th>Entreprise</th>
                                            <th>Durée de la formation</th>
                                            <th>Période de la formation</th>
                                            <th>Lieu</th>
                                            <th>Statut</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($formations as $formation)
                                        @php
                                            $startDate = \Carbon\Carbon::parse($formation->start_date);
                                            $endDate = \Carbon\Carbon::parse($formation->end_date);
                                            $durationInDays = $startDate->diffInDays($endDate);
                                        @endphp
                                        <tr>
                                            <td class="text-left">{{$formation->job_title}}</td>
                                            <td class="text-left">{{getEntrepriseLogoByUserId($formation->user_id)->nom_entreprise}}</td>
                                            <td class="text-left">{{$formation->training_duration}}</td>
                                            <td class="text-left">
                                                {{ \Carbon\Carbon::parse($formation->start_date)->formatLocalized('%d-%m-%Y') }} au {{ \Carbon\Carbon::parse($formation->end_date)->formatLocalized('%d-%m-%Y') }}
                                            </td>
                                            <td class="text-left">{{$formation->work_location}}</td>
                                            <td class="text-left">{{$formation->status}}</td>
                                            <td class="text-left">
                                                @if($formation->subscribers >= $formation->max_participants)
                                                    <span class="text-danger">Inscription fermée.</span>
                                                @endif
                                                @if (!$formation->participants->pluck('id')->contains(Auth::id()) && !$formation->subscribers >= $formation->max_participants)
                                                <a href="{{ route('candidat.formation.subscribe', $formation->id) }}" type="button" class="bg-btn-seven mb-2 px-2">Je participe</a>
                                                @endif
                                                <a href="{{ route('candidat.formation.show', $formation->id) }}" type="button" class="bg-btn-three proposez-rdv px-1">Consulter la formation</a>
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

        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="upper-title-box d-flex justify-content-between align-items-center p-4">
                        <div class="d-flex align-items-center justify-content-center">
                            <h3>Les formations auxquelles je participe</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('candidat.dashboard') }}" class="bg-back-btn mr-2">
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <table class="table table-sm table-bordered" id="data-table-two">
                                    <thead class="thead-light">
                                        <tr>
                                            <!-- <th><input class="checkbox-all" type="checkbox" name="selecte-all" id=""></th> -->
                                            <th>Nom de la formation</th>
                                            <th>Entreprise</th>
                                            <th>Durée de la formation</th>
                                            <th>Période de la formation</th>
                                            <!-- <th>Statut de l'inscription</th> -->
                                            <th>Lieu</th>
                                            <th>Statut</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userFormations as $formation)
                                        <tr>
                                            <td class="text-left">{{$formation->job_title}}</td>
                                            <td class="text-left">{{getEntrepriseLogoByUserId($formation->user_id)->nom_entreprise}}</td>
                                            <td class="text-left">{{$formation->training_duration}}</td>
                                            <td class="text-left">
                                                {{ \Carbon\Carbon::parse($formation->start_date)->formatLocalized('%d-%m-%Y') }} au {{ \Carbon\Carbon::parse($formation->end_date)->formatLocalized('%d-%m-%Y') }}
                                            </td>
                                            <!-- <td class="text-left">{{getFormationUserStatus(auth()->user()->id,$formation->id)}}</td> -->
                                            <td class="text-left">{{$formation->work_location}}</td>
                                            <td class="text-left">
                                                @if($formation->status == 'Active')
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>
                                            <td class="text-left">
                                                <a href="{{ route('candidat.formation.show', $formation->id) }}" type="button" class="bg-btn-three proposez-rdv px-1">Consulter</a>
                                                <a href="{{ route('candidat.formation.unsubscribe', $formation->id) }}" type="button" class="bg-btn-four mt-2" onclick="return confirm('Etes vous sur de vouloir ne plus participer à cet formation?')">
                                                    Je me désinscris
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
            "zeroRecords": "Aucun résultat trouvé.",
        },
        // "pagingType": "full_numbers",
    });

    $('#data-table-two').DataTable({
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
        },
        // "pagingType": "full_numbers",
    });


    $('#data-table_filter input').before('<i class="las la-search" style="padding: 10px; min-width: 40px; position: absolute;"></i>');
    $('#data-table-two_filter input').before('<i class="las la-search" style="padding: 10px; min-width: 40px; position: absolute;"></i>');
});
</script>
@endpush