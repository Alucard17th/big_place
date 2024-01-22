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

#add-event-form  input, #add-event-form select{
    width:100%;
}
#ex1{
    background: #f8f8f8;
    max-width: 100%;
    width:700px;
    padding: 50px;
}
#add-event-form > h4{
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 36px;
    line-height: 41px;
    /* identical to box height, or 102% */
    color: #202124;
}
#add-event-form > div > label, #add-event-form > div.row > div > div > label{
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 41px;
    color: #202124;
}
#add-event-btn{
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 20px;
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
                            <h3>Mes évènemements / jobdatings</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('recruiter.dashboard') }}" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                            <button class="theme-btn btn-style-one bg-header-btn" id="add-event">+ J'organise un nouvel évènemement</button>
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
                                            <th>Entreprise</th>
                                            <th>Poste</th>
                                            <th>N° Max de Participants</th>
                                            <th>Participants Inscrits</th>
                                            <th>Adresse</th>
                                            <th>Entrée gratuite</th>
                                            <th>Date - Heure</th>
                                            <th>Statut</th>
                                            @unlessrole('restricted')
                                            <th>Actions</th>
                                            @endunlessrole
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($events as $event)
                                        <tr>
                                            <td class="text-left">{{$event->organizer_name}}</td>
                                            <td class="text-left">{{$event->job_position}}</td>
                                            <td class="text-left">{{$event->participants_count}}</td>
                                            <td class="text-left">{{$event->participants->count()}}</td>
                                            <td class="text-left">{{$event->event_address}}</td>
                                            <td class="text-left">
                                                @if($event->free_entry == 1)
                                                    Oui
                                                @else
                                                    Non
                                                @endif
                                            </td>
                                            <td class="text-left" data-order="{{ \Carbon\Carbon::parse($event->event_date)->format('Ymd') }}">
                                                {{ \Carbon\Carbon::parse($event->event_date . ' ' . $event->event_hour)->formatLocalized('%d-%m-%Y à %H:%M') }}
                                            </td>
                                            <td class="text-left">
                                                @if($event->statut == 'Actif')
                                                <span class="badge badge-success">Actif</span>
                                                @elseif($event->statut == 'Suspendu')
                                                <span class="badge badge-warning">Suspendu</span>
                                                @elseif($event->statut == 'Annulé')
                                                <span class="badge badge-danger">Annulé</span>
                                                @endif
                                            </td>
                                            
                                            @unlessrole('restricted')
                                            <td class="text-left">
                                                <a href="{{route('recruiter.events.show', $event->id)}}"
                                                    type="button" class="bg-btn-five">
                                                    <i class="las la-eye"></i>
                                                    Editer
                                                </a>
                                                <a href="{{ route('recruiter.events.edit', $event->id) }}" type="button" class="bg-btn-three mt-2">
                                                    <i class="las la-edit"></i>
                                                    Modifier
                                                </a>
                                                
                                                @if($event->statut == 'Suspendu')
                                                <a href="{{ route('recruiter.events.resume', $event->id) }}" type="button" class="bg-btn-nine mt-2">
                                                    <i class="las la-braille"></i>
                                                    Reprendre
                                                </a>
                                                @else
                                                <a href="{{ route('recruiter.events.suspend', $event->id) }}" type="button" class="bg-btn-nine mt-2">
                                                    <i class="las la-braille"></i>
                                                    Suspendre
                                                </a>
                                                @endif

                                                @if($event->statut == 'Annulé')
                                                <a href="{{ route('recruiter.events.resume', $event->id) }}" type="button" class="bg-btn-nine mt-2">
                                                    <i class="las la-braille"></i>
                                                    Reprendre
                                                </a>
                                                @else
                                                <a href="{{ route('recruiter.events.cancel', $event->id) }}" type="button" class="bg-btn-eight mt-2">
                                                    <i class="las la-times"></i>
                                                    Annuler
                                                </a>
                                                @endif

                                                <a type="button" class="bg-btn-seven mt-2 docs-modal-btn" data-required-docs="{{$event->required_documents}}">
                                                    <i class="las la-download"></i>
                                                    Documents
                                                </a>
                                                @role('recruiter')
                                                <a href="{{ route('recruiter.events.delete', $event->id) }}" type="button" class="bg-btn-four mt-2" onclick="return confirm('Etes vous sur de vouloir supprimer cet événement?')">
                                                    <i class="las la-trash"></i>
                                                    Supprimer
                                                </a>
                                                @endrole
                                            </td>
                                            @endunlessrole

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
                        <label class="text-dark" for="organizer_name">Nom de l'Entreprise</label>
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
                        <label class="form-check-label" for="free_entry">Gratuite</label>
                    </div>
                </div>
                <div class="col-6">
                    <!-- Field: Participants Count -->
                    <div class="form-group">
                        <label class="text-dark" for="participants_count">Limite de participants</label>
                        <input type="number" class="form-control" id="participants_count" name="participants_count" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Field: Required Documents -->
                    <div class="form-group">
                        <label class="text-dark" for="required_documents">Documents requis pour la participation</label>
                        <input type="text" class="form-control" id="required_documents" name="required_documents">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Field: Description -->
                    <div class="form-group">
                        <label class="text-dark" for="description">Decriptif de l'évenement</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="4"></textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="theme-btn btn-style-one create-rdv px-5 py-3" id="add-event-btn">Créer l'événement</button>
        </form>

        <a href="#" class="custom-close-modal"></a>
    </div>
   

    <div id="docs-modal" class="modal">
        <h4 class="text-dark">Documents requis pour la participation:</h4>

        <ul id="modal-docs-list" class="my-4 text-dark p-3">
        </ul>
        <a href="#" id="close-modal">Fermer</a>
        <a href="#" class="custom-close-modal"></a>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchBtn = document.querySelector('#add-event');
    const docModalBtn = document.querySelectorAll('.docs-modal-btn');

    searchBtn.addEventListener('click', function() {
        $("#ex1").modal({
            escapeClose: false,
            clickClose: true,
            showClose: false
        });
    })
    docModalBtn.forEach(function(button) {
        button.addEventListener('click', function() {
            const requiredDocs = $(this).data('requiredDocs')
            const docsList = document.getElementById("modal-docs-list");
            const docsArray = requiredDocs.split(",");
            docsList.innerHTML = '';
            docsArray.forEach(doc => {
                const listItem = document.createElement("li");
                listItem.textContent = doc.trim(); // Trim whitespace
                docsList.appendChild(listItem);
            });
            // Use the retrieved value
            console.log("Required documents:", requiredDocs);
            $("#docs-modal").modal({
                escapeClose: false,
                clickClose: true,
                showClose: false
            });
        })
    })

    $('#close-modal, .custom-close-modal').click(function(event) {
        event.preventDefault();
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
            // Add other language customization options if needed
        },
        // "pagingType": "full_numbers",
    });

    $('#data-table_filter input').before('<i class="las la-search" style="padding: 10px; min-width: 40px; position: absolute;"></i>');

    function confirmDelete(url) {
        var result = window.confirm("Are you sure you want to delete?");
        if (result) {
            window.location.href = url;
        }
    }

})
</script>
<script>
    // when document is ready 
    $(document).ready(function() {
        document.getElementById("event_date").min = new Date().toISOString().slice(0, 10);
    })
</script>
@endpush