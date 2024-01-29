@extends('layouts.dashboard')
@push('styles')
<style>
#edit-formation-form > h4{
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 36px;
    line-height: 41px;
    /* identical to box height, or 102% */
    color: #202124;
}
#edit-formation-form > div > label, #edit-formation-form > div.row > div > div > label{
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 41px;
    color: #202124;
}
#edit-formation-btn{
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
        <div class="upper-title-box d-flex justify-content-between align-items-center p-3">
            <div class="d-flex align-items-center justify-content-center">
                <h3>Ajouter une formation</h3>
            </div>
            <div class="d-flex align-items-center">
                <a href="/mes-formations" class="bg-back-btn mr-2">
                    <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                    Retour
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-content">
                            <form action="{{ route('recruiter.formation.update') }}" method="POST"
                                enctype="multipart/form-data" id="edit-formation-form" class="py-5">
                                @csrf
                                <input type="hidden" name="id" value="{{ $formation->id }}">
                                <!-- Field: Nom du poste -->
                                <div class="form-group">
                                    <label for="job_title">Nom du poste</label>
                                    <input type="text" class="form-control" id="job_title" name="job_title" value="{{ $formation->job_title }}">
                                </div>

                                <!-- Field: Durée de formation -->
                                <div class="form-group">
                                    <label for="training_duration">Durée de formation</label>
                                    <input type="text" class="form-control" id="training_duration"
                                        name="training_duration" value="{{ $formation->training_duration }}">
                                </div>

                                <!-- Field: Date de démarrage de la formation -->
                                <div class="form-group">
                                    <label for="start_date">Date de démarrage de la formation</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $formation->start_date }}">
                                </div>

                                <!-- Field: Date de fin de la formation -->
                                <div class="form-group">
                                    <label for="end_date">Date de fin de la formation</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $formation->end_date }}">
                                </div>

                               
                                <!-- Field: Max Participant de la formation -->
                                <div class="form-group">
                                    <label class="text-dark" for="max_participants">Nombre maximum de participants</label>
                                    <input type="number" class="form-control" id="max_participants"
                                        name="max_participants" required value="{{ $formation->max_participants }}">
                                </div>

                                <!-- Mention CDI à l’embauche -->
                                <div class="form-group form-inline">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="cdi_at_hiring"
                                            name="cdi_at_hiring" {{ $formation->cdi_at_hiring == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="cdi_at_hiring">Mention CDI à
                                            l’embauche</label>
                                    </div>
                                </div>

                                <!-- Field: Compétences acquises à la fin de la formation -->
                                <div class="form-group">
                                    <label for="skills_acquired">Compétences acquises à la fin de la formation</label>
                                    <textarea class="form-control" id="skills_acquired" name="skills_acquired"
                                        rows="3">{{ $formation->skills_acquired }}</textarea>
                                </div>

                                <!-- Field: Lieu de prise de poste -->
                                <div class="form-group">
                                    <label for="work_location">Lieu de prise de poste</label>
                                    <input type="text" class="form-control" id="work_location" name="work_location" value="{{ $formation->work_location }}">
                                </div>

                                <!-- Field: Nombre de postes ouverts -->
                                <div class="form-group">
                                    <label for="open_positions">Nombre de postes ouverts</label>
                                    <input type="number" class="form-control" id="open_positions" name="open_positions" value="{{ $formation->open_positions }}">
                                </div>

                                <!-- Field: Date de fin d’inscription pour les candidats -->
                                <div class="form-group">
                                    <label for="registration_deadline">Date de fin d’inscription pour les
                                        candidats</label>
                                    <input type="date" class="form-control" id="registration_deadline"
                                        name="registration_deadline" value="{{ $formation->registration_deadline }}">
                                </div>

                                <!-- Field: Téléverser des documents -->
                                <div class="form-group">
                                    <label for="uploaded_documents">Téléverser des documents</label>
                                    <input type="file" class="form-control-file" id="uploaded_documents"
                                        name="uploaded_documents[]" multiple>
                                        @foreach (json_decode($formation->uploaded_documents, true) ?? [] as $document)
                                        <li class="my-2">
                                            <a href="{{ url(str_replace('public', 'storage', $document)) }}" target="_blank">{{ pathinfo($document, PATHINFO_BASENAME) }}</a>
                                            <a href="{{ route('recruiter.formation.document.delete', ['id' => $formation->id, 'userid' => Auth::user()->id ,'docname' => substr($document, strrpos($document, '/') + 1)]) }}" class="text-danger" type="button">X Supprimer</a>
                                        </li>
                                        @endforeach
                                </div>

                                <!-- Fermer les inscriptions si besoin. -->
                                <div class="form-group form-inline">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="status" name="status" {{ $formation->status == 'Active' ? 'checked' : ''}}>
                                        <label class="form-check-label" for="status">Formation Ouverte</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="theme-btn btn-style-one" type="submit" id="edit-formation-btn">Modifier</button>
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