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
                <div class="ls-widget">
                    <div class="upper-title-box d-flex justify-content-between align-items-center p-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <h3>Evénement</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('candidat.events') }}" class="bg-back-btn mr-2">
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
                                        <p class="text-muted">Organized by {{ $event->organizer_name }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="text-center bg-light p-3 rounded">
                                            @if ($event->registration_closed)
                                            <span class="text-white badge bg-danger">Fermé</span>
                                            @endif
                                            @if ($event->free_entry)
                                            <span class="text-white badge bg-success">Entrée gratuite</span>
                                            @else
                                            <span class="text-white badge bg-info">Entrée payante</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="text-dark mb-3">Details</h4>
                                        <ul class="list-group">
                                            <li class="list-group-item">Date: {{ $event->event_date }} at
                                                {{ $event->event_hour }}</li>
                                            <li class="list-group-item">Adresse: {{ $event->event_address }}</li>
                                            <li class="list-group-item">Participants: {{ $event->registered_participants }} /
                                                {{ $event->participants_count }}</li>
                                            @if ($event->required_documents)
                                            <li class="list-group-item">Documents requis:
                                                {{ $event->required_documents }}</li>
                                            @endif
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
document.addEventListener('DOMContentLoaded', function() {

})
</script>
@endpush