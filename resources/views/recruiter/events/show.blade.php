@extends('layouts.dashboard')
@push('styles')
<style>
.btn-download{
    font-size: 16px;
    border: 1px solid black;
    padding: 5px 10px;
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
                            <h3>Evénement</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="/mes-evenements" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <div class="widget-content">
                            <div class="container p-3">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h1 class="mb-3">{{ $event->job_position }}</h1>
                                        <h5 class="text-dark">Nom de l’entreprise : <span class="text-muted">{{ $event->organizer_name }}</span></h5>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-center bg-light p-3 rounded">
                                            @if ($event->registration_closed)
                                            <span class="text-white badge bg-danger">Fermé</span>
                                            @endif
                                            @if ($event->free_entry)
                                            <span class="text-white badge bg-success">Entrée gratuite</span>
                                            @else
                                            <span class="text-white badge bg-info">Entrée payante
                                                <div>
                                                    Prix de l'entrée : {{ $event->entry_price }}   Euros    
                                                </div>
                                            </span>
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="text-dark mb-3">Details</h4>
                                        <ul class="list-unstyled">
                                            <li class="">Date: {{ \Carbon\Carbon::parse($event->event_date)->formatLocalized('%d-%m-%Y') }} à
                                                {{ $event->event_hour }}</li>
                                            <li class="">Adresse: {{ $event->event_address }}</li>
                                            <li class="">Participants: {{ $event->registered_participants }} /
                                                {{ $event->participants_count }}</li>
                                            @if ($event->required_documents)
                                            <li class="">Documents requis:
                                                {{ $event->required_documents }}</li>
                                            
                                            @endif
                                            <li class="">Decriptif de l'évenement:
                                                {{ $event->description }}</li>
                                            <li>
                                                Liste des participants : 
                                                <button class="btn-download" onclick="downloadParticipantList()">Télécharger</button>
                                                <ol class="pl-5">
                                                    @foreach($event->participants as $participant)
                                                        <li>{{$participant->name}}</li>
                                                    @endforeach
                                                </ol>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- <div class="col-md-6">
                                        @if (!$event->registration_closed)
                                        <h4>Registration</h4>
                                        <a href="{{ route('register', $event->id) }}" class="btn btn-primary">Register
                                            Now</a>
                                        @endif

                                        @if ($event->digital_badge_download)
                                        <h4>Digital Badge</h4>
                                        <a href="{{ $event->digital_badge_download }}"
                                            class="btn btn-secondary">Download Badge</a>
                                        @endif
                                    </div> -->
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
function downloadParticipantList() {
    var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
            "xmlns:w='urn:schemas-microsoft-com:office:word' "+
            "xmlns='http://www.w3.org/TR/REC-html40'>"+
            "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
    var footer = "</body></html>";

     // Get the participant list HTML
    var participantListHTML = "<ol>";
    document.querySelectorAll('.pl-5 li').forEach(function(item) {
        participantListHTML += "<li>" + item.textContent + "</li>";
    });
    participantListHTML += "</ol>";

    // Concatenate participant list HTML to the sourceHTML
    var sourceHTML = header + participantListHTML + footer;
    
    var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
    var fileDownload = document.createElement("a");
    document.body.appendChild(fileDownload);
    fileDownload.href = source;
    fileDownload.download = 'Liste-des-participants-de-{{ $event->job_position }}.doc';
    fileDownload.click();
    document.body.removeChild(fileDownload);
}

document.addEventListener('DOMContentLoaded', function() {
  
})
</script>
@endpush