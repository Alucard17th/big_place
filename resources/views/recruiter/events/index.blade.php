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
        <div class="upper-title-box">
            <h3>Mes évènemements / jobdatings</h3>
            <div class="text">Simplifiez votre processus de recrutement et accélérez vos embauches</div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <!-- SEARCH FORM -->
                        <div class="widget-title">
                            <div class="chosen-outer">
                                <button type="button" id="add-event" class="theme-btn btn-style-one">Créer un évènement</button>
                            </div>
                        </div>

                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <table class="default-table manage-job-table table table-sm">
                                    <thead>
                                        <tr>
                                            <!-- <th><input class="checkbox-all" type="checkbox" name="selecte-all" id="">
                                            </th> -->
                                            <th>Organisateur</th>
                                            <th>Poste</th>
                                            <th>N° Participants</th>
                                            <th>Adresse</th>
                                            <th>Entrée gratuite</th>
                                            <th>Date - Heure</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($events as $event)
                                        <tr>
                                            <!-- <td><input class="checkbox-item" type="checkbox" name="selected" id=""
                                                    value="{{$event->id}}"></td> -->
                                            <td class="text-left">{{$event->organizer_name}}</td>
                                            <td class="text-left">{{$event->job_position}}</td>
                                            <td class="text-left">{{$event->participants_count}}</td>
                                            <td class="text-left">{{$event->event_address}}</td>
                                            <td class="text-left">
                                                @if($event->free_entry == 1)
                                                    Oui
                                                @else
                                                    Non
                                                @endif
                                            </td>
                                            <td class="text-left">{{$event->event_date}} - {{$event->event_hour}}</td>
                                            
                                            <td class="text-left">
                                                <a href="{{ route('recruiter.events.edit', $event->id) }}" type="button" class="theme-btn p-2 bg-dark text-white">
                                                    <!-- Détails -->
                                                    <i class="las la-edit"></i>
                                                </a>
                                                <a href="{{ route('recruiter.events.delete', $event->id) }}" type="button" class="theme-btn p-2 bg-dark text-white">
                                                    <!-- Détails -->
                                                    <i class="las la-trash"></i>
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
       <form action="{{ route('recruiter.events.store') }}" method="POST">
            @csrf
            <!-- Field: Organizer Name -->
            <div class="form-group">
                <label for="organizer_name">Nom d'Organisateur</label>
                <input type="text" class="form-control" id="organizer_name" name="organizer_name" required>
            </div>

            <!-- Field: Job Position -->
            <div class="form-group">
                <label for="job_position">Poste souhaité</label>
                <input type="text" class="form-control" id="job_position" name="job_position" required>
            </div>

            <!-- Field: Participants Count -->
            <div class="form-group">
                <label for="participants_count">Limite de participants</label>
                <input type="number" class="form-control" id="participants_count" name="participants_count" required>
            </div>

            <!-- Field: Event Address -->
            <div class="form-group">
                <label for="event_address">Adresse</label>
                <input type="text" class="form-control" id="event_address" name="event_address" required>
            </div>

            <!-- Field: Free Entry -->
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="free_entry" name="free_entry">
                <label class="form-check-label" for="free_entry">Gratuit</label>
            </div>

            <!-- Field: Digital Badge Download -->
            <div class="form-group">
                <label for="digital_badge_download">Badge Digital</label>
                <input type="text" class="form-control" id="digital_badge_download" name="digital_badge_download">
            </div>

            <!-- Field: Required Documents -->
            <div class="form-group">
                <label for="required_documents">Documents requis</label>
                <input type="text" class="form-control" id="required_documents" name="required_documents">
            </div>

            <!-- Field: Event Date -->
            <div class="form-group">
                <label for="event_date">Date</label>
                <input type="date" class="form-control" id="event_date" name="event_date" required>
            </div>

            <!-- Field: Event Hour -->
            <div class="form-group">
                <label for="event_hour">Heure</label>
                <input type="time" class="form-control" id="event_hour" name="event_hour" required>
            </div>

            <button type="submit" class="btn btn-primary">Créer</button>
        </form>

        <a href="#" class="custom-close-modal"></a>
    </div>

   


</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchBtn = document.querySelector('#add-event');

    searchBtn.addEventListener('click', function() {
        $("#ex1").modal({
            escapeClose: false,
            clickClose: true,
            showClose: false
        });
    })

    $('#close-modal, .custom-close-modal').click(function() {
        console.log('Modal Should Be Closed');
        $.modal.close();
    });
})
</script>
@endpush