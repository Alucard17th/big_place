@extends('layouts.dashboard')
@push('styles')
<style>
.modal a.custom-close-modal {
    position: absolute;
    top: -12.5px;
    right: -12.5px;
    display: block;
    /* display: none; */
    width: 30px;
    height: 30px;
    text-indent: -9999px;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center center;
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAAXNSR0IArs4c6QAAA3hJREFUaAXlm8+K00Acx7MiCIJH/yw+gA9g25O49SL4AO3Bp1jw5NvktC+wF88qevK4BU97EmzxUBCEolK/n5gp3W6TTJPfpNPNF37MNsl85/vN/DaTmU6PknC4K+pniqeKJ3k8UnkvDxXJzzy+q/yaxxeVHxW/FNHjgRSeKt4rFoplzaAuHHDBGR2eS9G54reirsmienDCTRt7xwsp+KAoEmt9nLaGitZxrBbPFNaGfPloGw2t4JVamSt8xYW6Dg1oCYo3Yv+rCGViV160oMkcd8SYKnYV1Nb1aEOjCe6L5ZOiLfF120EjWhuBu3YIZt1NQmujnk5F4MgOpURzLfAwOBSTmzp3fpDxuI/pabxpqOoz2r2HLAb0GMbZKlNV5/Hg9XJypguryA7lPF5KMdTZQzHjqxNPhWhzIuAruOl1eNqKEx1tSh5rfbxdw7mOxCq4qS68ZTjKS1YVvilu559vWvFHhh4rZrdyZ69Vmpgdj8fJbDZLJpNJ0uv1cnr/gjrUhQMuI+ANjyuwftQ0bbL6Erp0mM/ny8Fg4M3LtdRxgMtKl3jwmIHVxYXChFy94/Rmpa/pTbNUhstKV+4Rr8lLQ9KlUvJKLyG8yvQ2s9SBy1Jb7jV5a0yapfF6apaZLjLLcWtd4sNrmJUMHyM+1xibTjH82Zh01TNlhsrOhdKTe00uAzZQmN6+KW+sDa/JD2PSVQ873m29yf+1Q9VDzfEYlHi1G5LKBBWZbtEsHbFwb1oYDwr1ZiF/2bnCSg1OBE/pfr9/bWx26UxJL3ONPISOLKUvQza0LZUxSKyjpdTGa/vDEr25rddbMM0Q3O6Lx3rqFvU+x6UrRKQY7tyrZecmD9FODy8uLizTmilwNj0kraNcAJhOp5aGVwsAGD5VmJBrWWbJSgWT9zrzWepQF47RaGSiKfeGx6Szi3gzmX/HHbihwBser4B9UJYpFBNX4R6vTn3VQnez0SymnrHQMsRYGTr1dSk34ljRqS/EMd2pLQ8YBp3a1PLfcqCpo8gtHkZFHKkTX6fs3MY0blKnth66rKCnU0VRGu37ONrQaA4eZDFtWAu2fXj9zjFkxTBOo8F7t926gTp/83Kyzzcy2kZD6xiqxTYnHLRFm3vHiRSwNSjkz3hoIzo8lCKWUlg/YtGs7tObunDAZfpDLbfEI15zsEIY3U/x/gHHc/G1zltnAgAAAABJRU5ErkJggg==);
}

#add-event-form input,
#add-event-form select {
    width: 100%;
}

#ex1 {
    background: #f8f8f8;
    max-width: 100%;
    width: 600px;
    padding: 50px;
}

#add-event-form>h4 {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 36px;
    line-height: 41px;
    /* identical to box height, or 102% */
    color: #202124;
}

#add-event-form>div>label,
#add-event-form>div.row>div>div>label {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 41px;
    color: #202124;
}

#add-event-btn {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 20px;
}

.badge-card {
    border: 1px solid #0000004a;
    /* border-radius: 25px; */
}

.badge-card-header {
    /* border-top-left-radius: 25px;
    border-top-right-radius: 25px; */
    background-color: #22218c
}

#loading{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.8); /* semi-transparent white background */
    text-align: center;
    padding-top: 20%; /* Adjust as needed */
    z-index: 9999; /* Ensure it appears on top of other elements */
    color:#000;

    justify-content: center;
    align-items: center;
    flex-direction: column;
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
                            <h3>Tous les évènemements / jobdatings</h3>
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
                                            <th>Nom de l'entreprise</th>
                                            <th>Poste</th>
                                            <th>Adresse</th>
                                            <th>Date - Heure</th>
                                            <th>Statut</th>
                                            <th>Entrée gratuite</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($events as $event)

                                        <tr>
                                            <td class="text-left">{{$event->organizer_name}}</td>
                                            <td class="text-left">{{$event->job_position}}</td>
                                            <td class="text-left">{{$event->event_address}}</td>
                                            <td class="text-left">{{ \Carbon\Carbon::parse($event->event_date)->formatLocalized('%d-%m-%Y') }} - {{$event->event_hour}}</td>
                                            <td>{{$event->statut}}</td>
                                            <td class="text-left">
                                                @if($event->free_entry == 1)
                                                Oui
                                                @else
                                                Non
                                                @endif
                                            </td>
                                            <td class="text-left">
                                                @if ((int) $event->participants_count > (int) $event->participants->count() && ! $event->participants->pluck('id')->contains(Auth::id()))
                                                <a href="{{ route('candidat.event.subscribe', $event->id) }}"
                                                    type="button" class="bg-btn-nine">
                                                    Je participe
                                                </a>
                                                @endif
                                                <a href="{{route('candidat.event.show', $event->id)}}"
                                                    type="button" class="bg-btn-five">
                                                    Consulter l'événement
                                                </a>
                                                <a href="{{route('candidat.vitrine.show', $event->user_id)}}"
                                                    type="button" class="bg-btn-three mt-2">
                                                    Consulter la vitrine entreprise
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

        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="upper-title-box d-flex justify-content-between align-items-center p-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <h3>Mes évènemements / jobdatings</h3>
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
                                            <th>Nom de l'entreprise</th>
                                            <th>Poste</th>
                                            <th>Adresse</th>
                                            <th>Date - Heure</th>
                                            <th>Statut</th>
                                            <th>Entrée gratuite</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($myEvents as $event)
                                        <tr>
                                            <td class="text-left">{{$event->organizer_name}}</td>
                                            <td class="text-left">{{$event->job_position}}</td>
                                            <td class="text-left">{{$event->event_address}}</td>
                                            <td class="text-left">{{ \Carbon\Carbon::parse($event->event_date)->formatLocalized('%d-%m-%Y') }} - {{$event->event_hour}}</td>
                                            <td>{{$event->statut}}</td>
                                            <td class="text-left">
                                                @if($event->free_entry == 1)
                                                Oui
                                                @else
                                                Non
                                                @endif
                                            </td>
                                            <td class="text-left">
                                                <a href="{{ route('candidat.event.unsubscribe', $event->id) }}"
                                                    type="button" class="bg-btn-four mt-2"
                                                    onclick="return confirm('Etes vous sur de vouloir ne plus participer à cet événement?')">
                                                    Annuler ma participation
                                                </a>
                                                <a href="{{route('candidat.vitrine.show', $event->user_id)}}"
                                                    type="button" class="bg-btn-three mt-2">
                                                    Consulter la vitrine de l'entreprise
                                                </a>
                                                <a href="" data-event-id="{{$event->id}}"
                                                    data-event-organizer="{{getUserById($event->user_id)->name}}" type="button"
                                                    class="bg-btn-five mt-2" id="get-qr-code-btn">
                                                    Badge
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
        <div id="loading" style="display: none;">
        Génération du badge...
        <img src="/plugins/images/icons/loading.svg" alt="">
        </div>
        <div class="row w-100 badge-card">
            <div class="col-12 text-center badge-card-header">
                <img src="/plugins/images/logo.png" alt="" width="25%" class="py-3">
            </div>

            <div class="col-12 text-center py-3">
                <h5>Nom de l'entreprise : <span id="event-organizer"></span></h5>
                <hr>
                <h5 class="text-dark pt-0 pb-3">Nom du candidat : <span class="text-muted">{{auth()->user()->name}}</span></h5>
                <div id="qrcode-container"></div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <button class="bg-btn-five mt-2" id="download-badge">Télécharger</button>
        </div>

        <a href="#" class="custom-close-modal"></a>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
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

    let getQrCodeBtn = document.getElementById('get-qr-code-btn');
    getQrCodeBtn.addEventListener('click', function(event) {
        event.preventDefault();
        let eventId = getQrCodeBtn.getAttribute('data-event-id');
        let eventOrganizer = getQrCodeBtn.getAttribute('data-event-organizer');
        let qrcodeImg = ''
        $.ajax({
            url: "/event/candidat/qrcode/" + eventId,
            type: 'GET',
            dataType: 'text',
            success: function(data) {
                $('#qrcode-container').html(data);
                $('#event-organizer').html(eventOrganizer);
                $("#ex1").modal({
                    escapeClose: false,
                    clickClose: true,
                    showClose: false
                });
            },
            error: function() {
                console.log('Error fetching events');
            }
        })

        console.log('My qrcode', qrcodeImg);
    })

    let downloadBadgeBtn = document.getElementById('download-badge');
    const elementToSave = document.querySelector(".badge-card");
    let loadingElement = document.getElementById('loading');
    downloadBadgeBtn.addEventListener('click', function(event) {
        loadingElement.style.display = 'flex';
        html2canvas(elementToSave).then(canvas => {
            const a = document.createElement("a");
            a.href = canvas.toDataURL("image/jpeg");
            a.download = "Mon-Badge.jpeg";
            a.click();
            loadingElement.style.display = 'none';
        });
    })



})
</script>
@endpush