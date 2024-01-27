@extends('layouts.dashboard')
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/src/parsley.min.css" rel="stylesheet">
<style>
/* .select2-selection--single {
    padding: 10px 18px 10px 18px !important;
}  */
.select2-selection--single {
    margin: 0 !important;
    width: 100% !important;
    height: 35px !important;
    padding: .330rem .70rem !important;
    font-weight: 400 !important;
    line-height: 1.5 !important;
    color: #495057 !important;
    background-color: #fff !important;
    background-clip: padding-box !important;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out !important;
    margin-bottom: .5rem !important !important;
    border: 1px solid #dae1e7 !important;
    border-radius: 3px !important;
    box-shadow: none !important;
    font-size: 14px !important;
}

.select2-selection--multiple {
    margin: 0 !important;
    width: 100% !important;
    height: 35px !important;
    /* padding: .3rem .70rem !important; */
    padding-top: 2px;
    padding-left: 6px;
    font-weight: 400 !important;
    line-height: 1.5 !important;
    color: #8f959b !important;
    background-color: #fff !important;
    background-clip: padding-box !important;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out !important;
    margin-bottom: .5rem !important !important;
    border: 1px solid #dae1e7 !important;
    border-radius: 3px !important;
    box-shadow: none !important;
    font-size: 14px !important;
}


#add-offer-form input,
#add-offer-form select {
    width: 100%;
}

#add-offer-form>h4 {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 36px;
    line-height: 41px;
    /* identical to box height, or 102% */
    color: #202124;
}

#add-offer-form>div>label,
#add-offer-form>div.row>div>div>label {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 41px;
    color: #202124;
}

#add-offer-btn {
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
                <h3>Ajouter une offre</h3>
            </div>
            <div class="d-flex align-items-center">
                <a href="/mes-offres" class="bg-back-btn mr-2">
                    <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                    Retour
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget pt-5">
                    <div class="tabs-box">
                        <div class="widget-content">
                            <form action="{{route('recruiter.offer.add')}}" method="POST" enctype="multipart/form-data"
                                id="add-offer-form">
                                @csrf
                                <!-- Field: Nom du projet ou de la campagne -->
                                <div class="form-group">
                                    <label for="project_campaign_name">Nom du projet ou de la campagne</label>
                                    <input type="text" class="form-control" id="project_campaign_name"
                                        name="project_campaign_name" required="">
                                </div>

                                <!-- Field: Intitulé du poste recherché -->
                                <div class="form-group">
                                    <label for="job_title">Intitulé du poste recherché</label>
                                    <input type="text" class="form-control" id="job_title" name="job_title" required>
                                </div>

                                <!-- Field: Code ROME -->
                                <div class="form-group" >
                                    <label for="rome_code">Code ROME</label>
                                    <select name="rome_code" id="rome_code" class="form-control" required data-parsley-errors-container="#rome_code_error_container">
                                        <option value="" selected>Métier / Code Rome</option>
                                    </select>
                                    <div id="rome_code_error_container"></div>
                                </div>

                                <!-- Field: Date de prise de poste souhaitée -->
                                <div class="form-group">
                                    <label for="desired_start_date">Date de prise de poste souhaitée</label>
                                    <input type="date" class="form-control" id="desired_start_date" name="start_date"
                                        required>
                                </div>

                                <!-- Field: Localisation du poste (Ville et Code postal) -->
                                <div class="form-group">
                                    <label for="location_city">Ville de la localisation du poste</label>
                                    <input type="text" class="form-control" id="location_city" name="location_city"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="location_postal_code">Code postal de la localisation du poste</label>
                                    <input type="number" class="form-control" id="location_postal_code"
                                        name="location_postal_code" required>
                                </div>

                                <!-- Field: Adresse complète -->
                                <div class="form-group">
                                    <label for="location_address">Adresse complète</label>
                                    <input type="text" class="form-control" id="location_address"
                                        name="location_address" required>
                                </div>

                                <!-- Field: Type de contrat -->
                                <div class="form-group">
                                    <label for="contract_type">Type de contrat</label>
                                    <select class="form-control" id="contract_type" name="contract_type" required>
                                        <option>Type de contrat</option>
                                        <option value="CDD">CDD</option>
                                        <option value="CDI">CDI</option>
                                        <option value="INTERIM">INTERIM</option>
                                    </select>
                                </div>

                                <!-- Field: Horaires de travail -->
                                <div class="form-group">
                                    <label for="work_schedule">Horaires de travail</label>
                                    <select class="form-control" id="work_schedule" name="work_schedule[]" multiple
                                        required data-parsley-errors-container="#work_schedule_error_container">
                                        <option value="Temps plein">Temps plein</option>
                                        <option value="Temps partiel">Temps partiel</option>
                                        <option value="Horaires de nuit">Horaires de nuit</option>
                                        <option value="Samedi">Samedi</option>
                                        <option value="Dimanche">Dimanche</option>
                                        <option value="Nuit">Nuit</option>
                                        <option value="Télétravail">Télétravail</option>
                                    </select>
                                    <div id="work_schedule_error_container"></div>

                                </div>

                                <!-- Field: Temps de travail -->
                                <div class="form-group">
                                    <label for="weekly_hours">Temps de travail</label>
                                    <select class="form-control" id="weekly_hours" name="weekly_hours" required>
                                        <option>Temps de travail</option>
                                        <option value="35H">35H</option>
                                        <option value="39H">39H</option>
                                        <option value="Autre">Autre</option>
                                    </select>
                                </div>

                                <!-- Field: Niveau d’expérience -->
                                <div class="form-group">
                                    <label for="experience_level">Niveau d’expérience</label>
                                    <select class="form-control" id="experience_level" name="experience_level" required>
                                        <option>Niveau d’expérience</option>
                                        <option value="Débutant (0 – 2 ans)">Débutant (0 – 2 ans)</option>
                                        <option value="Intermédiaire (2 – 5 ans)">Intermédiaire (2 – 5 ans)</option>
                                        <option value="Confirmé (5 -10 ans)">Confirmé (5 -10 ans)</option>
                                        <option value="Sénior (+ 10 ans)">Sénior (+ 10 ans)</option>
                                    </select>
                                </div>

                                <!-- Field: Langues souhaitées -->
                                <div class="form-group">
                                    <label for="desired_languages">Langues souhaitées</label>
                                    <select class="form-select" id="desired_languages" name="desired_languages[]"
                                        multiple required data-parsley-errors-container="#desired_languages_error_container">
                                        <option value="Allemand">Allemand</option>
                                        <option value="Anglais">Anglais</option>
                                        <option value="Arabe">Arabe</option>
                                        <option value="Espagnol">Espagnol</option>
                                        <option value="Français">Français</option>
                                        <option value="Mandarin">Mandarin</option>
                                        <option value="Russe">Russe</option>
                                        <option value="Autre">Autre</option>
                                    </select>
                                    <div id="desired_languages_error_container"></div>

                                </div>

                                <div class="form-group" id="other_language_field" style="display: none">
                                    <label for="other_language">Ajouter les langues souhaitées (séparées par une
                                        virgule)</label>
                                    <input type="text" class="form-control" id="other_language" name="other_language">
                                </div>

                                <!-- Field: Niveau d’éducation -->
                                <div class="form-group">
                                    <label for="education_level">Niveau d’éducation</label>
                                    <select class="form-control" id="education_level" name="education_level" required data-parsley-errors-container="#education_level_error_container">
                                        <option disabled selected>Niveau d'éducation</option>
                                        <option value="CAP/BEP">CAP / BEP</option>
                                        <option value="Bac">Bac</option>
                                        <option value="Bac+2">Bac + 2</option>
                                        <option value="Bac+4">Bac + 4</option>
                                        <option value="Bac+5 et plus">Bac + 5 et plus</option>
                                    </select>
                                    <div id="education_level_error_container"></div>
                                </div>

                                <!-- Field: Salaire Brut -->
                                <div class="form-group">
                                    <label for="gross_salary">Salaire Brut (ke)</label>
                                    <input type="text" class="form-control" id="gross_salary" name="brut_salary"
                                        required>
                                </div>

                                <!-- Field: Secteur d’activité -->
                                <div class="form-group">
                                    <label for="industry_sector">Secteur d’activité</label>
                                    <select class="form-control" id="industry_sector" name="industry_sector" required 
                                    data-parsley-errors-container="#industry_sector_error_container">
                                        <option value="">Secteur d’activité</option>
                                        <option value="Agroalimentaire">Agroalimentaire</option>
                                        <option value="Automobile / Services">Automobile / Services</option>
                                        <option value="Banque / Assurance">Banque / Assurance</option>
                                        <option value="Bois / Papier / Carton / Imprimerie">Bois / Papier / Carton /
                                            Imprimerie</option>
                                        <option value="BTP / Matériaux de construction">BTP / Matériaux de construction
                                        </option>
                                        <option value="Chimie / Parachimie">Chimie / Parachimie</option>
                                        <option value="Commerce / Négoce / Distribution">Commerce / Négoce /
                                            Distribution</option>
                                        <option value="Édition / Communication / Multimédia">Édition / Communication /
                                            Multimédia</option>
                                        <option value="Électronique / Électricité">Électronique / Électricité</option>
                                        <option value="Évènementiel">Évènementiel</option>
                                        <option value="Études et conseils">Études et conseils</option>
                                        <option value="Hôtellerie / Restauration">Hôtellerie / Restauration</option>
                                        <option value="Industrie">Industrie</option>
                                        <option value="Ingénierie">Ingénierie</option>
                                        <option value="Informatique / Télécoms / Réseaux">Informatique / Télécoms /
                                            Réseaux</option>
                                        <option value="Machines et équipements / Automobile">Machines et équipements /
                                            Automobile</option>
                                        <option value="Métallurgie / Travail du métal">Métallurgie / Travail du métal
                                        </option>
                                        <option value="Plastique / Caoutchouc">Plastique / Caoutchouc</option>
                                        <option value="Propreté">Propreté</option>
                                        <option value="Production et services">Production et services</option>
                                        <option value="Santé">Santé</option>
                                        <option value="Services aux entreprises">Services aux entreprises</option>
                                        <option value="Technologie de l'information">Technologie de l'information
                                        </option>
                                        <option value="Télécommunications / Presse">Télécommunications / Presse</option>
                                        <option value="Textile / Habillement / Chaussure / Maroquineries">Textile /
                                            Habillement / Chaussure / Maroquineries</option>
                                        <option value="Transports / Logistique">Transports / Logistique</option>
                                        <option value="Travaux publics">Travaux publics</option>
                                        <option value="Autres">Autres</option>
                                    </select>
                                    <div id="industry_sector_error_container"></div>

                                </div>

                                <div class="form-group" id="other_sectors_field" style="display: none">
                                    <label for="other_sectors">Ajouter le secteur d'activité souhaité</label>
                                    <input type="text" class="form-control" id="other_sectors" name="other_sectors">
                                </div>

                                <!-- Field: Avantages proposés -->
                                <div class="form-group">
                                    <label for="benefits">Avantages proposés</label>
                                    <textarea class="form-control" id="benefits" name="benefits" rows="3"></textarea>
                                </div>

                                <!-- Field: Date de publication de l’offre -->
                                <div class="form-group">
                                    <label for="publication_date">Date de publication de l’offre</label>
                                    <input type="date" class="form-control" id="publication_date"
                                        name="publication_date" required>
                                </div>

                                <!-- Field: Dépublier l’offre le -->
                                <div class="form-group">
                                    <label for="unpublish_date">Dépublier l’offre le</label>
                                    <input type="date" class="form-control" id="unpublish_date" name="unpublish_date"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="other_language">Tâches à effectuer (séparées par une virgule)</label>
                                    <textarea name="post_tasks" id="post_tasks" class="form-control"
                                        rows="6"></textarea>
                                </div>

                                <!-- Field: Choix des canaux de diffusion -->
                                <div class="form-group">
                                    <label for="selected_jobboards">Choix des canaux de diffusion (cocher les
                                        jobboards)</label>
                                    <!-- You can add checkboxes for each jobboard -->
                                    <select class="form-control" id="selected_jobboards" name="selected_jobboards[]"
                                        multiple required data-parsley-errors-container="#selected_jobboards_error_container">
                                        <option value="linkedin">LinkedIn</option>
                                        <option value="pole_emploi">Pôle Emploi</option>
                                        <option value="indeed">Indeed</option>
                                        <option value="apec">APEC</option>
                                        <option value="monster">Monster</option>
                                        <option value="wizbii">Wizbii</option>
                                        <option value="jobijoba">Jobijoba</option>
                                        <option value="jooble">Jooble</option>
                                        <option value="neuvo">Neuvo</option>
                                        <option value="place_des_talents">Place des Talents</option>
                                        <option value="le_bon_coin">Le Bon Coin</option>
                                        <option value="cadre_emploi">Cadre Emploi</option>
                                        <option value="job_transport">Job Transport</option>
                                        <option value="l_hotellerie_restauration">L'Hôtellerie Restauration</option>
                                        <option value="meteojob">Meteojob</option>
                                    </select>
                                    <div id="selected_jobboards_error_container"></div>
                                </div>

                                <!-- Field: Couts de la diffusion -->
                                <div class="form-group">
                                    <label for="advertising_costs">Coûts de la diffusion</label>
                                    <input type="text" class="form-control" id="advertising_costs"
                                        name="advertising_costs" disabled>
                                </div>

                                <!-- Field: Enregistrer en brouillon -->
                                <div class="form-group">
                                    <button class="theme-btn btn-style-four" type="button"
                                        id="save-offer-draft">Enregistrer en brouillon</button>
                                    <button class="theme-btn btn-style-one" type="submit"
                                        id="add-offer-btn">Valider</button>
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
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>
<script src="{{ asset('plugins/js/parsley-fr.js') }}"></script>

<script>
$(document).ready(function() {
    // Initialize Parsley with custom error messages
    $('#add-offer-form').parsley({
        errorsContainer: function (field) {
            // Use the data-parsley-errors-container attribute if available, else use the default behavior
            return field.$element.attr('data-parsley-errors-container') || field;
        },
    });
});
</script>

<script>
// when document is 
$(document).ready(function() {
    $.ajax({
        url: "{{ route('getRomeCodes') }}",
        type: "GET",
        dataType: "json",
        success: function(data) {
            const autocompleteSource = Object.entries(data).map(([fullName, codeOgr]) => {
                return `${codeOgr} - ${fullName}`;
            });

            $("#code_rome").autocomplete({
                source: autocompleteSource
            });
        },
        error: function(data) {
            console.log('Error:', data);
        }
    })

    $("#desired_languages").select2({});

    $("#education_level").select2({
        placeholder: "Horaire de travail",
    });

    $("#industry_sector").select2({});

    $("#selected_jobboards").select2({});

    $("#work_schedule").select2({
        placeholder: "Horaire de travail",
    });



    $("#rome_code").select2({
        placeholder: "Code ROME",
        minimumInputLength: 2,
        language: {
            inputTooShort: function() {
                return 'Veuillez entrer au moins 2 caractères.';
            },
            noResults: function() {
                return 'Aucun metier correspondant.';
            },
            searching: function() {
                return 'Chargement...';
            }
        },
        ajax: {
            url: '/recruiter-dashboard/jobs/search',
            dataType: 'json',
            data: function(params) {
                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        },
    })



    $('#desired_languages').on('change', function() {
        if (this.value.includes('Autre')) {
            $('#other_language_field').show();
            $('#other_language').prop('required', true); // Make the input required
        } else {
            $('#other_language_field').hide();
            $('#other_language').val(''); // Clear the input field if "Autre" is no longer selected
            $('#other_language').prop('required', false);
        }
    });

    $('#industry_sector').on('change', function() {
        if (this.value.includes('Autre')) {
            $('#other_sectors_field').show();
            $('#other_sectors').prop('required', true); // Make the input required
        } else {
            $('#other_sectors_field').hide();
            $('#other_sectors').val(''); // Clear the input field if "Autre" is no longer selected
            $('#other_sectors').prop('required', false);
        }
    });

    document.getElementById("save-offer-draft").addEventListener("click", function() {
        document.getElementById("add-offer-form").action =
        "{{ route('recruiter.offer.draft') }}"; // Replace with the actual route for saving drafts
        document.getElementById("add-offer-form").submit();
    });

    document.getElementById("desired_start_date").min = new Date().toISOString().slice(0, 10);
    document.getElementById("publication_date").min = new Date().toISOString().slice(0, 10);
    document.getElementById("unpublish_date").min = new Date().toISOString().slice(0, 10);

})
</script>
@endpush