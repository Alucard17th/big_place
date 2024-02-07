@extends('layouts.dashboard')
@push('styles')
<style>
#add-formation-form>h4 {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 36px;
    line-height: 41px;
    /* identical to box height, or 102% */
    color: #202124;
}

#add-formation-form>div>label,
#add-formation-form>div.row>div>div>label {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 41px;
    color: #202124;
}

#add-formation-btn {
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
                                enctype="multipart/form-data" id="add-formation-form" onsubmit="return validateForm()">
                                @csrf

                                <div class="row">
                                    <div class="col-12">
                                        <!-- Field: Nom du poste -->
                                        <div class="form-group">
                                            <label class="text-dark" for="job_title">Nom du poste</label>
                                            <input type="text" class="form-control" id="job_title" name="job_title"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <!-- Field: Date de démarrage de la formation -->
                                        <div class="form-group">
                                            <label class="text-dark" for="start_date">Date de démarrage de la
                                                formation</label>
                                            <input type="date" class="form-control" id="start_date" name="start_date"
                                                oninput="validateDate(this, 'start_date')" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <!-- Field: Date de fin de la formation -->
                                        <div class="form-group">
                                            <label class="text-dark" for="end_date">Date de fin de la formation</label>
                                            <input type="date" class="form-control" id="end_date" name="end_date"
                                                oninput="validateDate(this, 'end_date')">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <!-- Field: Max Participant de la formation -->
                                        <div class="form-group">
                                            <label class="text-dark" for="max_participants">Nombre maximum de
                                                participants</label>
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
                                                <label class="form-check-label text-dark" for="cdi_at_hiring">Mention
                                                    CDI à
                                                    l’embauche</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <!-- Field: Compétences acquises à la fin de la formation -->
                                        <div class="form-group">
                                            <label class="text-dark" for="skills_acquired">Compétences acquises à la fin
                                                de la
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
                                            <label class="text-dark" for="open_positions">Nombre de postes
                                                ouverts</label>
                                            <input type="number" class="form-control" id="open_positions"
                                                name="open_positions">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <!-- Field: Date de fin d’inscription pour les candidats -->
                                        <div class="form-group">
                                            <label class="text-dark" for="registration_deadline">Date de fin
                                                d’inscription pour les
                                                candidats</label>
                                            <input type="date" class="form-control" id="registration_deadline"
                                                name="registration_deadline"
                                                oninput="validateDate(this, 'registration_deadline')">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-6">
                                        <!-- Field: Téléverser des documents -->
                                        <div class="form-group">
                                            <label class="text-dark" for="uploaded_documents">Téléverser des
                                                documents</label>
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
                                                <label class="form-check-label text-dark" for="status">Formation
                                                    Ouverte</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <button class="theme-btn btn-style-one py-3 px-5" type="submit"
                                        id="add-formation-btn">Ajouter la formation</button>
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
function validateDate(input) {
    // Regular expression to match the date format "dd/mm/yyyy"
    const dateFormat = /^\d{4}-\d{2}-\d{2}$/;

    // Check if the entered date matches the desired format
    if (!dateFormat.test(input.value)) {
        // If not, display an error message
        input.setCustomValidity("Veuillez entrer une date au format jj/mm/aaaa.");
        console.log(input.value)
        return false; // Return false to indicate invalid date format
    }

    // Split the entered date into day, month, and year
    const parts = input.value.split('/');
    const day = parseInt(parts[0], 10);
    const month = parseInt(parts[1], 10); // Months are one-based
    const year = parseInt(parts[2], 10);

    // Check if the entered date is a valid date
    const enteredDate = new Date(year, month - 1, day); // Months are zero-based

    // Get the current date
    const currentDate = new Date();

    // Check if the entered date is earlier than the current date
    if (enteredDate < currentDate) {
        // If so, display an error message
        input.setCustomValidity("La date ne peut pas être antérieure à la date actuelle.");
        return false; // Return false to indicate invalid date
    }

    // Clear any previous validation message
    input.setCustomValidity("");

    return true; // Return true to indicate valid date
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById("start_date").min = new Date().toISOString().slice(0, 10);
    document.getElementById("end_date").min = new Date().toISOString().slice(0, 10);
    document.getElementById("registration_deadline").min = new Date().toISOString().slice(0, 10);
    
    document.getElementById("start_date").addEventListener("change", function() {
        const startDateValue = this.value;
        document.getElementById("end_date").min = startDateValue; // Set min attribute of end_date to start_date value
    });
    // Validate the form on submit
    document.getElementById('add-formation-form').addEventListener('submit', function(event) {
        // Check all date inputs in the form
        const dateInputs = document.querySelectorAll('input[type="date"]');
        let isValid = true;

        dateInputs.forEach(function(input) {
            if (!validateDate(input)) {
                isValid = false;
            }
        });

        // Prevent form submission if any date is invalid
        if (!isValid) {
            event.preventDefault();
        }
    });
});
</script>
@endpush