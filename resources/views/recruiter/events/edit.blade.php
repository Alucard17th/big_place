@extends('layouts.dashboard')
@push('styles')
@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Modifier mon événement</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-content">
                            <form action="{{ route('recruiter.events.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="event_id" value="{{ $event->id }}">

                                 <!-- Field: Organizer Name -->
                                <div class="form-group">
                                    <label for="organizer_name">Nom d'Organisateur</label>
                                    <input type="text" class="form-control" id="organizer_name" name="organizer_name" required value="{{ $event->organizer_name }}">
                                </div>

                                <!-- Field: Job Position -->
                                <div class="form-group">
                                    <label for="job_position">Poste souhaité</label>
                                    <input type="text" class="form-control" id="job_position" name="job_position" required value="{{ $event->job_position }}">
                                </div>

                                <!-- Field: Participants Count -->
                                <div class="form-group">
                                    <label for="participants_count">Limite de participants</label>
                                    <input type="number" class="form-control" id="participants_count" name="participants_count" required value="{{ $event->participants_count }}">
                                </div>

                                <!-- Field: Participants Count -->
                                <div class="form-group">
                                    <label for="registered_participants">Participants inscrits</label>
                                    <input type="number" class="form-control" id="registered_participants" name="registered_participants" required value="{{ $event->registered_participants }}" disabled>
                                </div>

                                <!-- Field: Event Address -->
                                <div class="form-group">
                                    <label for="event_address">Adresse</label>
                                    <input type="text" class="form-control" id="event_address" name="event_address" required value="{{ $event->event_address }}">
                                </div>

                                <!-- Field: Free Entry -->
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="free_entry" name="free_entry" {{ $event->free_entry ? 'checked' : '' }}>
                                    <label class="form-check-label" for="free_entry">Gratuit</label>
                                </div>

                                <!-- Field: Digital Badge Download -->
                                <div class="form-group">
                                    <label for="digital_badge_download">Badge Digital</label>
                                    <input type="text" class="form-control" id="digital_badge_download" name="digital_badge_download" value="{{ $event->digital_badge_download }}">
                                </div>

                                <!-- Field: Required Documents -->
                                <div class="form-group">
                                    <label for="required_documents">Documents requis</label>
                                    <input type="text" class="form-control" id="required_documents" name="required_documents" value="{{ $event->required_documents }}">
                                </div>

                                <!-- Field: Event Date -->
                                <div class="form-group">
                                    <label for="event_date">Date</label>
                                    <input type="date" class="form-control" id="event_date" name="event_date" required value="{{ $event->event_date }}">
                                </div>

                                <!-- Field: Event Hour -->
                                <div class="form-group">
                                    <label for="event_hour">Heure</label>
                                    <input type="time" class="form-control" id="event_hour" name="event_hour" required value="{{ $event->event_hour }}">
                                </div>

                                <div class="form-group">
                                    <button class="theme-btn btn-style-one" type="submit">Modifier</button>
                                </div>
                            </form>

                            <div class="d-flex align-items-center">
                                <form action="">
                                    <button class="btn btn-warning ml-2">Annuler</button>
                                </form>
                                <form action="">
                                    <button class="btn btn-info ml-2">Suspendre</button>
                                </form>
                                <form action="">
                                    <button class="btn btn-danger ml-2">Supprimer</button>
                                </form>
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

@endpush