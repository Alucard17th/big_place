@extends('layouts.dashboard')
@push('styles')
@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Ma Tâche</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-content">
                            <form action="{{ route('recruiter.formation.add') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Field: Nom du poste -->
                                <div class="form-group">
                                    <label for="job_title">Nom du poste</label>
                                    <input type="text" class="form-control" id="job_title" name="job_title">
                                </div>

                                <!-- Field: Durée de formation -->
                                <div class="form-group">
                                    <label for="training_duration">Durée de formation</label>
                                    <input type="text" class="form-control" id="training_duration"
                                        name="training_duration">
                                </div>

                                <!-- Field: Date de démarrage de la formation -->
                                <div class="form-group">
                                    <label for="start_date">Date de démarrage de la formation</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date">
                                </div>

                                <!-- Field: Date de fin de la formation -->
                                <div class="form-group">
                                    <label for="end_date">Date de fin de la formation</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date">
                                </div>

                                <!-- Mention CDI à l’embauche -->
                                <div class="form-group form-inline">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="cdi_at_hiring"
                                            name="cdi_at_hiring">
                                        <label class="form-check-label" for="cdi_at_hiring">Mention CDI à
                                            l’embauche</label>
                                    </div>
                                </div>

                                <!-- Field: Compétences acquises à la fin de la formation -->
                                <div class="form-group">
                                    <label for="skills_acquired">Compétences acquises à la fin de la formation</label>
                                    <textarea class="form-control" id="skills_acquired" name="skills_acquired"
                                        rows="3"></textarea>
                                </div>

                                <!-- Field: Lieu de prise de poste -->
                                <div class="form-group">
                                    <label for="work_location">Lieu de prise de poste</label>
                                    <input type="text" class="form-control" id="work_location" name="work_location">
                                </div>

                                <!-- Field: Nombre de postes ouverts -->
                                <div class="form-group">
                                    <label for="open_positions">Nombre de postes ouverts</label>
                                    <input type="number" class="form-control" id="open_positions" name="open_positions">
                                </div>

                                <!-- Field: Date de fin d’inscription pour les candidats -->
                                <div class="form-group">
                                    <label for="registration_deadline">Date de fin d’inscription pour les
                                        candidats</label>
                                    <input type="date" class="form-control" id="registration_deadline"
                                        name="registration_deadline">
                                </div>

                                <!-- Field: Téléverser des documents -->
                                <div class="form-group">
                                    <label for="uploaded_documents">Téléverser des documents</label>
                                    <input type="file" class="form-control-file" id="uploaded_documents"
                                        name="uploaded_documents[]" multiple>
                                </div>

                                <!-- Fermer les inscriptions si besoin. -->
                                <div class="form-group form-inline">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="status"
                                            name="status">
                                        <label class="form-check-label" for="status">Formation Ouverte</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="theme-btn btn-style-one" type="submit">Créer</button>
                                </div>
                            </form>
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