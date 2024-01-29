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
                            <h3>Mes formations proposées</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('recruiter.dashboard') }}" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                            <a href="{{route('recruiter.formation.create')}}" class="theme-btn btn-style-one bg-header-btn">+ Ajouter une formation</a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <!-- SEARCH FORM -->
                        <div class="widget-title">
                            <!-- <div class="chosen-outer">
                                <a href="{{route('recruiter.formation.create')}}"
                                    class="theme-btn btn-style-one">Ajouter</a>
                            </div> -->
                        </div>

                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <table class="table table-sm table-bordered" id="data-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <!-- <th><input class="checkbox-all" type="checkbox" name="selecte-all" id="">
                                            </th> -->
                                            <th>Nom du poste</th>
                                            <th>Nombre de jours de formation</th>
                                            <th>Période de formation</th>
                                            <th>CDI à l'embauche</th>
                                            <th>Compétences acquises</th>
                                            <th>Postes Ouverts</th>
                                            <th>Nombre d'inscrits</th>
                                            <th>Lieu</th>
                                            <th>Statut</th>
                                            @unlessrole('restricted')
                                            <th>Actions</th>
                                            @endunlessrole
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
                                            <td>{{$formation->job_title}}</td>
                                            <td>{{$durationInDays}}</td>
                                            <td data-order="{{ \Carbon\Carbon::parse($formation->start_date)->format('Ymd') }}">
                                                {{ \Carbon\Carbon::parse($formation->start_date)->formatLocalized('%d-%m-%Y') }} au {{ \Carbon\Carbon::parse($formation->end_date)->formatLocalized('%d-%m-%Y') }}
                                            </td>
                                            <td>
                                                @if($formation->cdi_at_hiring == 1)
                                                    Oui
                                                @else
                                                    Non
                                                @endif
                                            </td>
                                            <td>{{$formation->skills_acquired}}</td>
                                            <td>{{$formation->open_positions}}</td>
                                            <td>{{$formation->participants->count()}}</td>
                                            <td>{{$formation->work_location}}</td>
                                            <td>
                                                @if($formation->status == 'Active')
                                                    <span class="badge badge-success">Active</span>
                                                @elseif($formation->status == 'Suspendue')
                                                    <span class="badge badge-warning">Suspendue</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            
                                            <td class="text-left d-flex flex-column" style="width:8vw;">
                                                <a href="{{route('recruiter.formation.show', $formation->id)}}" class="bg-btn-five">
                                                    <i class="las la-eye"></i>
                                                    Editer
                                                </a>
                                                @unlessrole('restricted')
                                                <a href="{{route('recruiter.formation.edit', $formation->id)}}" class="bg-btn-three mt-2">
                                                    <i class="las la-edit"></i>
                                                    Modifier
                                                </a>
                                                @if($formation->status != 'Suspendue' && $formation->status != 'Ferme')
                                                <a href="{{route('recruiter.formation.suspend', $formation->id)}}" type="button" class="bg-btn-nine mt-2" style="padding-left:8px !important;padding-right:8px !important;">
                                                    <i class="las la-braille"></i>
                                                    Suspendre
                                                </a>
                                                @else
                                                <a href="{{route('recruiter.formation.restart', $formation->id)}}" type="button" class="bg-btn-nine mt-2" style="padding-left:8px !important;padding-right:8px !important;">
                                                    <i class="las la-braille"></i>
                                                    Reprendre
                                                </a>
                                                @endif
                                                <!-- <a href="" type="button" class="bg-btn-seven mt-2" style="padding-left:6px !important;padding-right:6px !important;">
                                                    <i class="las la-download"></i>
                                                    Documents
                                                </a> -->
                                                @if($formation->status != 'Ferme')
                                                <a href="{{route('recruiter.formation.close', $formation->id)}}" class="bg-btn-five mt-2">
                                                    <i class="las la-trash"></i>
                                                    Annuler
                                                </a>
                                                @endif
                                                    @role('recruiter')
                                                    <a href="{{route('recruiter.formation.delete', $formation->id)}}" 
                                                    onclick="return confirm('Etes vous sur de vouloir supprimer cette formation?')" class="bg-btn-four mt-2 px-1">
                                                        <i class="las la-trash"></i>
                                                        Supprimer
                                                    </a>
                                                    @endrole
                                                @endunlessrole

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
            // Add other language customization options if needed
        },
        // "pagingType": "full_numbers",
    });

    $('#data-table_filter input').before('<i class="las la-search" style="padding: 10px; min-width: 40px; position: absolute;"></i>');

})
</script>
@endpush