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

.badge-card{
    border: 1px solid #0000004a;
    border-radius: 25px;
}

.badge-card-header{
    border-top-left-radius: 25px;
    border-top-right-radius: 25px;
    background-color: #22218c
}

#edit-event-form > h4{
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 36px;
    line-height: 41px;
    /* identical to box height, or 102% */
    color: #202124;
}
#edit-event-form > div > label, #edit-event-form > div.row > div > div > label{
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 41px;
    color: #202124;
}
#edit-event-btn{
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
                <div class="ls-widget">
                    <div class="upper-title-box d-flex justify-content-between align-items-center p-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <h3>Modifier mon événement</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('recruiter.dashboard') }}" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <div class="widget-content">
                            <form action="{{ route('recruiter.events.update') }}" method="POST"
                                enctype="multipart/form-data" id="edit-event-form">
                                @csrf

                                <input type="hidden" name="event_id" value="{{ $event->id }}">

                                <!-- Field: Organizer Name -->
                                <div class="form-group">
                                    <label for="organizer_name">Nom d'Organisateur</label>
                                    <input type="text" class="form-control" id="organizer_name" name="organizer_name"
                                        required value="{{ $event->organizer_name }}">
                                </div>

                                <!-- Field: Job Position -->
                                <div class="form-group">
                                    <label for="job_position">Poste souhaité</label>
                                    <input type="text" class="form-control" id="job_position" name="job_position"
                                        required value="{{ $event->job_position }}">
                                </div>

                                <!-- Field: Participants Count -->
                                <div class="form-group">
                                    <label for="participants_count">Limite de participants</label>
                                    <input type="number" class="form-control" id="participants_count"
                                        name="participants_count" required value="{{ $event->participants_count }}">
                                </div>

                                <!-- Field: Participants Count -->
                                <div class="form-group">
                                    <label for="registered_participants">Participants inscrits</label>
                                    <input type="number" class="form-control" id="registered_participants"
                                        name="registered_participants" required
                                        value="{{ $event->registered_participants }}" disabled>
                                </div>

                                <!-- Field: Event Address -->
                                <div class="form-group">
                                    <label for="event_address">Adresse</label>
                                    <input type="text" class="form-control" id="event_address" name="event_address"
                                        required value="{{ $event->event_address }}">
                                </div>

                                <!-- Field: Free Entry -->
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="free_entry" name="free_entry"
                                        {{ $event->free_entry ? 'checked' : '' }}>
                                    <label class="form-check-label" for="free_entry">Gratuit</label>
                                </div>

                                <!-- Field: Digital Badge Download -->
                                <div class="form-group">
                                    <label for="digital_badge_download">Badge Digital</label>
                                    <button class="bg-back-btn" type="button" id="badge-modal">Voir le badge</button>
                                    <!-- <input type="text" class="form-control" id="digital_badge_download" name="digital_badge_download" value="{{ $event->digital_badge_download }}"> -->
                                </div>

                                <!-- Field: Required Documents -->
                                <div class="form-group">
                                    <label for="required_documents">Documents requis pour la participation</label>
                                    <input type="text" class="form-control" id="required_documents"
                                        name="required_documents" value="{{ $event->required_documents }}">
                                </div>

                                <!-- Field: Event Date -->
                                <div class="form-group">
                                    <label for="event_date">Date</label>
                                    <input type="date" class="form-control" id="event_date" name="event_date" required
                                        value="{{ $event->event_date }}">
                                </div>

                                <!-- Field: Event Hour -->
                                <div class="form-group">
                                    <label for="event_hour">Heure</label>
                                    <input type="time" class="form-control" id="event_hour" name="event_hour" required
                                        value="{{ $event->event_hour }}">
                                </div>

                                <div class="form-group">
                                    <button class="theme-btn btn-style-one" type="submit"
                                    id="edit-event-btn">Modifier</button>
                                </div>
                            </form>

                            <!-- <div class="d-flex align-items-center">
                                <form action="">
                                    <button class="btn btn-warning ml-2">Annuler</button>
                                </form>
                                <form action="">
                                    <button class="btn btn-info ml-2">Suspendre</button>
                                </form>
                                <form action="">
                                    <button class="btn btn-danger ml-2">Supprimer</button>
                                </form>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="ex1" class="modal py-5" style="padding-left:60px;">
    
    <div class="row w-100 badge-card">
        <div class="col-12 text-center badge-card-header">
            <img src="/plugins/images/logo.png" alt="" width="25%" class="py-3">
        </div>

        <div class="col-12 text-center py-3">
            <h5>Evénement  : {{ $event->job_position }}</h5>
            <h4 class="text-dark py-4">Nom d'invité</h4>
            <div>{{$qrcode}}</div>
        </div>
    </div>
    <a href="#" class="custom-close-modal"></a>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const badgeModalBtn = document.querySelector('#badge-modal');

    badgeModalBtn.addEventListener('click', function() {
        $("#ex1").modal({
            escapeClose: false,
            clickClose: true,
            showClose: false
        });
    })

    $('#close-modal, .custom-close-modal').click(function(event) {
        event.preventDefault();
        $.modal.close();
    });
})
</script>
@endpush