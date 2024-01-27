@extends('layouts.dashboard')
@push('styles')
<style>
    #add-formation-form > h4{
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 36px;
    line-height: 41px;
    /* identical to box height, or 102% */
    color: #202124;
}
#add-formation-form > div > label, #add-formation-form > div.row > div > div > label{
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 41px;
    color: #202124;
}
#add-formation-btn{
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
                            <h3>Ajouter une formation</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="/mes-formations" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <div class="widget-content">
                            <form action="{{ route('recruiter.formation.add') }}" method="POST"
                                enctype="multipart/form-data" id="add-formation-form">
                                @csrf

                                <div class="row">
                                    <div class="col-6">
                                        <!-- Field: Nom du poste -->
                                        <div class="form-group">
                                            <label class="text-dark" for="job_title">Nom du poste</label>
                                            <input type="text" class="form-control" id="job_title" name="job_title" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <!-- Field: Durée de formation -->
                                        <div class="form-group">
                                            <label class="text-dark" for="training_duration">Durée de formation</label>
                                            <input type="number" class="form-control" id="training_duration"
                                                name="training_duration">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <!-- Field: Date de démarrage de la formation -->
                                        <div class="form-group">
                                            <label class="text-dark" for="start_date">Date de démarrage de la formation</label>
                                            <input type="date" class="form-control" id="start_date" name="start_date" oninput="validateDate(this, 'start_date')" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <!-- Field: Date de fin de la formation -->
                                        <div class="form-group">
                                            <label class="text-dark" for="end_date">Date de fin de la formation</label>
                                            <input type="date" class="form-control" id="end_date" name="end_date" oninput="validateDate(this, 'end_date')">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <!-- Field: Max Participant de la formation -->
                                        <div class="form-group">
                                            <label class="text-dark" for="max_participants">Nombre maximum de participants</label>
                                            <input type="number" class="form-control" id="max_participants"
                                                name="max_participants" required>
                                        </div>
                                    </div>
                                    <div class="col-6 pt-4 mt-2">
                                        <!-- Mention CDI à l’embauche -->
                                        <div class="form-group form-inline">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="cdi_at_hiring"
                                                    name="cdi_at_hiring">
                                                <label class="form-check-label text-dark" for="cdi_at_hiring">Mention CDI à
                                                    l’embauche</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <!-- Field: Compétences acquises à la fin de la formation -->
                                        <div class="form-group">
                                            <label class="text-dark" for="skills_acquired">Compétences acquises à la fin de la
                                                formation</label>
                                            <textarea class="form-control" id="skills_acquired" name="skills_acquired"
                                                rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <!-- Field: Lieu de prise de poste -->
                                        <div class="form-group">
                                            <label class="text-dark" for="work_location">Lieu de prise de poste</label>
                                            <input type="text" class="form-control" id="work_location"
                                                name="work_location">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <!-- Field: Nombre de postes ouverts -->
                                        <div class="form-group">
                                            <label class="text-dark" for="open_positions">Nombre de postes ouverts</label>
                                            <input type="number" class="form-control" id="open_positions"
                                                name="open_positions">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <!-- Field: Date de fin d’inscription pour les candidats -->
                                        <div class="form-group">
                                            <label class="text-dark" for="registration_deadline">Date de fin d’inscription pour les
                                                candidats</label>
                                            <input type="date" class="form-control" id="registration_deadline"
                                                name="registration_deadline" oninput="validateDate(this, 'registration_deadline')">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-6">

                                        <!-- Field: Téléverser des documents -->
                                        <div class="form-group">
                                            <label class="text-dark" for="uploaded_documents">Téléverser des documents</label>
                                            <input type="file" class="form-control-file" id="uploaded_documents"
                                                name="uploaded_documents[]" multiple>
                                        </div>
                                    </div>
                                    <div class="col-6 pt-4 mt-2">
                                        <!-- Fermer les inscriptions si besoin. -->
                                        <div class="form-group form-inline">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="status"
                                                    name="status">
                                                <label class="form-check-label text-dark" for="status">Formation Ouverte</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <button class="theme-btn btn-style-one py-3 px-5" type="submit" id="add-formation-btn">Ajouter la formation</button>
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
<script>
    $(document).ready(function() {
        document.getElementById("start_date").min = new Date().toISOString().slice(0, 10);
        document.getElementById("end_date").min = new Date().toISOString().slice(0, 10);
        document.getElementById("registration_deadline").min = new Date().toISOString().slice(0, 10);

        function validateDate(input, type) {
            // Get the entered date value
            const enteredDate = new Date(input.value);

            // Get the current date
            const currentDate = new Date();

            // Set the minimum date based on the current date
            const minDate = currentDate.toISOString().slice(0, 10);

            // Check if the entered date is earlier than the minimum date
            if (enteredDate < currentDate) {
                // If so, update the input value to the minimum date
                input.value = minDate;
            }

            // Set the min attribute to restrict the calendar selection
            input.min = minDate;
        }
    })
</script>
@endpush