@extends('layouts.dashboard')
@push('styles')
<style>
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
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out !important;
    margin-bottom: .5rem!important !important;
    border: 1px solid #dae1e7 !important;
    border-radius: 3px !important;
    box-shadow: none !important;
    font-size: 14px !important;
}

.select2-selection--multiple{
    margin: 0 !important;
    width: 100% !important;
    height: 35px !important;
    /* padding: .3rem .70rem !important; */
    padding-top:2px;
    padding-left:6px;
    font-weight: 400 !important;
    line-height: 1.5 !important;
    color: #8f959b !important;
    background-color: #fff !important;
    background-clip: padding-box !important;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out !important;
    margin-bottom: .5rem!important !important;
    border: 1px solid #dae1e7 !important;
    border-radius: 3px !important;
    box-shadow: none !important;
    font-size: 14px !important;
}

    #edit-offer-form > h4{
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 36px;
    line-height: 41px;
    /* identical to box height, or 102% */
    color: #202124;
}
#edit-offer-form > div > label, #edit-offer-form > div.row > div > div > label{
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 41px;
    color: #202124;
}
#edit-offer-btn{
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
                            <h3>Mon offre d'emploi</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="/mes-offres" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <div class="widget-content">
                            <form action="{{route('recruiter.offer.update')}}" method="POST" 
                            enctype="multipart/form-data" id="edit-offer-form">
                                @csrf
                                <input type="hidden" name="offer_id" value="{{$offer->id}}">
                                <!-- Field: Nom du projet ou de la campagne -->
                                <div class="form-group">
                                    <label for="project_campaign_name">Nom du projet ou de la campagne
                                        </label>
                                    <input type="text" class="form-control" id="project_campaign_name"
                                        name="project_campaign_name" value="{{$offer->project_campaign_name}}" required>
                                </div>

                                <!-- Field: Intitulé du poste recherché -->
                                <div class="form-group">
                                    <label for="job_title">Intitulé du poste recherché </label>
                                    <input type="text" class="form-control" id="job_title" name="job_title" value="{{$offer->job_title}}" required>
                                </div>

                                <!-- Field: Date de prise de poste souhaitée -->
                                <div class="form-group">
                                    <label for="desired_start_date">Date de prise de poste souhaitée</label>
                                    <input type="date" class="form-control" id="desired_start_date"
                                        name="start_date" value="{{$offer->start_date}}" required>
                                </div>

                                <!-- Field: Localisation du poste (Ville et Code postal) -->
                                <div class="form-group">
                                    <label for="location_city">Ville de la localisation du poste</label>
                                    <input type="text" class="form-control" id="location_city" name="location_city" required value="{{$offer->location_city}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="location_postal_code">Code postal de la localisation du poste
                                        </label>
                                    <input type="text" class="form-control" id="location_postal_code"
                                        name="location_postal_code" required value="{{$offer->location_postal_code}}">
                                </div>

                                <!-- Field: Adresse complète -->
                                <div class="form-group">
                                    <label for="location_address">Adresse complète</label>
                                    <input type="text" class="form-control" id="location_address"
                                        name="location_address" value="{{$offer->location_address}}" required>
                                </div>

                                <!-- Field: Code ROME -->
                                <div class="form-group">
                                    <label for="rome_code">Code ROME</label>
                                    <select name="rome_code" id="rome_code" class="form-control" required>
                                        <option value="" selected>Métier / Code Rome</option>
                                    </select>
                                </div>

                                <!-- Field: Type de contrat -->
                                <div class="form-group">
                                    <label for="contract_type">Type de contrat</label>
                                    <select class="form-control" id="contract_type" name="contract_type" required>
                                        <option value="CDD" @if($offer->contract_type == 'CDD') selected @endif>CDD</option>
                                        <option value="CDI" @if($offer->contract_type == 'CDI') selected @endif>CDI</option>
                                        <option value="INTERIM" @if($offer->contract_type == 'INTERIM') selected @endif>INTERIM</option>
                                    </select>
                                </div>

                                <!-- Field: Horaires de travail -->
                                <div class="form-group">
                                    <label for="work_schedule">Horaires de travail</label>
                                    @php 
                                        $schedules = json_decode($offer->work_schedule, true) ?? [];
                                    @endphp
                                    <select class="form-control" id="work_schedule" name="work_schedule[]" multiple required>
                                        <option value="Temps plein" @if(in_array('Temps plein', ($schedules))) selected @endif>Temps plein</option>

                                        <option value="Temps partiel"  @if(in_array('Temps partiel', ($schedules))) selected @endif>Temps partiel</option>

                                        <option value="Horaires de nuit" @if(in_array('Horaires de nuit', ($schedules))) selected @endif>Horaires de nuit</option>
                                        
                                        <option value="Samedi" @if(in_array('Samedi', ($schedules))) selected @endif>Samedi</option>
                                        
                                        <option value="Dimanche" @if(in_array('Dimanche', ($schedules))) selected @endif>Dimanche</option>
                                        
                                        <option value="Nuit" @if(in_array('Nuit', ($schedules))) selected @endif>Nuit</option>
                                        
                                        <option value="Télétravail" @if(in_array('Télétravail', ($schedules))) selected @endif>Télétravail</option>
                                   
                                    </select>
                                </div>

                                <!-- Field: Temps de travail -->
                                <div class="form-group">
                                    <label for="weekly_hours">Temps de travail</label>
                                    <select class="form-control" id="weekly_hours" name="weekly_hours" required>
                                        <option value="35H" {{ $offer->weekly_hours === '35H' ? 'selected' : '' }}>35H</option>
                                        <option value="39H" {{ $offer->weekly_hours === '39H' ? 'selected' : '' }}>39H</option>
                                        <option value="Autre" {{ $offer->weekly_hours === 'Autre' ? 'selected' : '' }}>Autre</option>
                                    </select>
                                </div>

                                <!-- Field: Niveau d’expérience -->
                                <div class="form-group">
                                    <label for="experience_level">Niveau d’expérience</label>
                                    <select class="form-control" id="experience_level" name="experience_level" required>
                                        <option value="Débutant (0 – 2 ans)" {{ $offer->experience_level === 'Débutant (0 – 2 ans)' ? 'selected' : '' }}>Débutant (0 – 2 ans)</option>
                                        <option value="Intermédiaire (2 – 5 ans)" {{ $offer->experience_level === 'Intermédiaire (2 – 5 ans)' ? 'selected' : '' }}>Intermédiaire (2 – 5 ans)</option>
                                        <option value="Confirmé (5 -10 ans)" {{ $offer->experience_level === 'Confirmé (5 -10 ans)' ? 'selected' : '' }}>Confirmé (5 -10 ans)</option>
                                        <option value="Sénior (+ 10 ans)" {{ $offer->experience_level === 'Sénior (+ 10 ans)' ? 'selected' : '' }}>Sénior (+ 10 ans)</option>
                                    </select>
                                </div>

                                <!-- Field: Langues souhaitées -->
                                <div class="form-group">
                                    <label for="desired_languages">Langues souhaitées</label>
                                    <select class="form-control" id="desired_languages" name="desired_languages[]" multiple required>
                                        <option value="Anglais" @if(in_array('Anglais', json_decode($offer->desired_languages))) selected @endif>Anglais</option>
                                        <option value="Espagnol" @if(in_array('Espagnol', json_decode($offer->desired_languages))) selected @endif>Espagnol</option>
                                        <option value="Arabe" @if(in_array('Arabe', json_decode($offer->desired_languages))) selected @endif>Arabe</option>
                                        <option value="Mandarin" @if(in_array('Mandarin', json_decode($offer->desired_languages))) selected @endif>Mandarin</option>
                                        <option value="Russe" @if(in_array('Russe', json_decode($offer->desired_languages))) selected @endif>Russe</option>
                                        <option value="Autre" @if(in_array('Autre', json_decode($offer->desired_languages))) selected @endif>Autre</option>
                                    </select>
                                </div>

                                <div class="form-group" id="other_language_field" style="display: @if(in_array('Autre', json_decode($offer->desired_languages))) none @endif">
                                    <label for="other_language">Ajouter les langues souhaitées (séparées par une virgule)</label>
                                    <input type="text" class="form-control" id="other_language" name="other_language" value='{{ implode(",", json_decode($offer->desired_languages)) }}'>
                                </div>

                                <!-- Field: Niveau d’éducation -->
                                <div class="form-group">
                                    <label for="education_level">Niveau d’éducation</label>
                                    <select class="form-control" id="education_level" name="education_level" required>
                                        <option value="CAP/BEP" @if($offer->education_level == 'CAP / BEP') selected @endif>CAP / BEP</option>
                                        <option value="Bac" @if($offer->education_level == 'Bac') selected @endif>Bac</option>
                                        <option value="Bac+2" @if($offer->education_level == 'Bac + 3') selected @endif>Bac + 2</option>
                                        <option value="Bac+4" @if($offer->education_level == 'Bac + 4') selected @endif>Bac + 4</option>
                                        <option value="Bac+5 et plus" @if($offer->education_level == 'Bac + 5 et plus') selected @endif>Bac + 5 et plus</option>
                                    </select>
                                </div>

                                <!-- Field: Salaire Brut -->
                                <div class="form-group">
                                    <label for="gross_salary">Salaire Brut </label>
                                    <input type="text" class="form-control" id="gross_salary" name="brut_salary" value="{{ $offer->brut_salary }}" required>
                                </div>

                                <!-- Field: Secteur d’activité -->
                                <div class="form-group">
                                    <label for="industry_sector">Secteur d’activité </label>
                                    <select class="form-control" id="industry_sector" name="industry_sector" required>
                                        <option value="">Secteur d’activité</option>
                                        <option value="Agroalimentaire" @if('Agroalimentaire' == $offer->industry_sector) selected @endif>Agroalimentaire</option>
                                        <option value="Automobile / Services" @if('Automobile / Services' == $offer->industry_sector) selected @endif>Automobile / Services</option>
                                        <option value="Banque / Assurance" @if('Banque / Assurance' == $offer->industry_sector) selected @endif>Banque / Assurance</option>
                                        <option value="Bois / Papier / Carton / Imprimerie" @if('Bois / Papier / Carton / Imprimerie' == $offer->industry_sector) selected @endif>Bois / Papier / Carton / Imprimerie</option>
                                        <option value="BTP / Matériaux de construction" @if('BTP / Matériaux de construction' == $offer->industry_sector) selected @endif>BTP / Matériaux de construction</option>
                                        <option value="Chimie / Parachimie" @if('Chimie / Parachimie' == $offer->industry_sector) selected @endif>Chimie / Parachimie</option>
                                        <option value="Commerce / Négoce / Distribution" @if('Commerce / Négoce / Distribution' == $offer->industry_sector) selected @endif>Commerce / Négoce / Distribution</option>
                                        <option value="Édition / Communication / Multimédia" @if('Édition / Communication / Multimédia' == $offer->industry_sector) selected @endif)>Édition / Communication / Multimédia</option>
                                        <option value="Électronique / Électricité" @if('Électronique / Électricité' == $offer->industry_sector) selected @endif>Électronique / Électricité</option>
                                        <option value="Évènementiel" @if('Évènementiel' == $offer->industry_sector) selected @endif>Évènementiel</option>
                                        <option value="Études et conseils" @if('Études et conseils' == $offer->industry_sector) selected @endif>Études et conseils</option>
                                        <option value="Hôtellerie / Restauration" @if('Hôtellerie / Restauration' == $offer->industry_sector) selected @endif>Hôtellerie / Restauration</option>
                                        <option value="Industrie" @if('Industrie' == $offer->industry_sector) selected @endif>Industrie</option>
                                        <option value="Ingénierie" @if('Ingénierie' == $offer->industry_sector) selected @endif>Ingénierie</option>
                                        <option value="Informatique / Télécoms / Réseaux" @if('Informatique / décoms / Réseaux' == $offer->industry_sector) selected @endif>Informatique / Télécoms / Réseaux</option>
                                        <option value="Machines et équipements / Automobile" @if('Machines et	RTLRquements / Automobile' == $offer->industry_sector) selected @endif>Machines et équipements / Automobile</option>
                                        <option value="Métallurgie / Travail du métal" @if('Métallurgie / Travail du-metal' == $offer->industry_sector) selected @endif>Métallurgie / Travail du métal</option>
                                        <option value="Plastique / Caoutchouc" @if('Plastique / Caoutchouc' == $offer->industry_sector) selected @endif>Plastique / Caoutchouc</option>
                                        <option value="Propreté" @if('Propreté' == $offer->industry_sector) selected @endif>Propreté</option>
                                        <option value="Production et services" @if('Production et services' == $offer->industry_sector) selected @endif>Production et services</option>
                                        <option value="Santé" @if('Santé' == $offer->industry_sector) selected @endif>Santé</option>
                                        <option value="Services aux entreprises" @if('Services aux entreprises' == $offer->industry_sector) selected @endif>Services aux entreprises</option>
                                        <option value="Technologie de l'information" @if('Technologie de l\'information' == $offer->industry_sector) selected @endif>Technologie de l'information</option>
                                        <option value="Télécommunications / Presse" @if('Télécommunications / Presse' == $offer->industry_sector) selected @endif>Télécommunications / Presse</option>
                                        <option value="Textile / Habillement / Chaussure / Maroquineries" @if('Textile / Habillement / Chaussure / Maroquineries' == $offer->industry_sector) selected @endif>Textile / Habillement / Chaussure / Maroquineries</option>
                                        <option value="Transports / Logistique" @if('Transports / Logistique' == $offer->industry_sector) selected @endif>Transports / Logistique</option>
                                        <option value="Travaux publics" @if('Travaux publics' == $offer->industry_sector) selected @endif>Travaux publics</option>
                                        <option value="Autres" @if('Autres' == $offer->industry_sector) selected @endif>Autres</option>
                                    </select>
                                </div>

                                <div class="form-group" id="other_sectors_field" style="">
                                    <label for="other_sectors">Autre secteur d'activité</label>
                                    <input type="text" class="form-control" id="other_sectors" name="other_sectors" value='{{$offer->industry_sector }}'>
                                </div>

                                <!-- Field: Avantages proposés -->
                                <div class="form-group">
                                    <label for="benefits">Avantages proposés</label>
                                    <textarea class="form-control" id="benefits" name="benefits" rows="3" required>{{ $offer->benefits }}</textarea>
                                </div>

                                <!-- Field: Date de publication de l’offre -->
                                <div class="form-group">
                                    <label for="publication_date">Date de publication de l’offre</label>
                                    <input type="date" class="form-control" id="publication_date"
                                        name="publication_date" value="{{ $offer->publication_date }}" required>
                                </div>

                                <!-- Field: Dépublier l’offre le -->
                                <div class="form-group">
                                    <label for="unpublish_date">Dépublier l’offre le</label>
                                    <input type="date" class="form-control" id="unpublish_date" name="unpublish_date" value="{{ $offer->unpublish_date }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="other_language">Tâches à effectuer (séparées par une virgule)</label>
                                    <textarea name="post_tasks" id="post_tasks" class="form-control" rows="6">@if ($offer->post_tasks && !empty(json_decode($offer->post_tasks))){{ implode(', ', json_decode($offer->post_tasks)) }}@endif</textarea>
                                </div>

                                <!-- Field: Choix des canaux de diffusion -->
                                <div class="form-group">
                                    <label for="selected_jobboards">Choix des canaux de diffusion </label>
                                    <!-- You can add checkboxes for each jobboard -->
                                    @php
                                        $jobboards = json_decode($offer->selected_jobboards, true) ?? [];
                                    @endphp
                                    <select class="form-control" id="selected_jobboards" name="selected_jobboards[]" multiple required>
                                        <!-- Add other options based on your needs -->
                                        <option value="linkedin" @if(in_array('linkedin', ($jobboards))) selected @endif>LinkedIn</option>
                                        <option value="pole_emploi" @if(in_array('pole_emploi', ($jobboards))) selected @endif>Pôle Emploi</option>
                                        <option value="indeed" @if(in_array('indeed', ($jobboards))) selected @endif>Indeed</option>
                                        <option value="apec" @if(in_array('apec', ($jobboards))) selected @endif>APEC</option>
                                        <option value="monster" @if(in_array('monster', ($jobboards))) selected @endif>Monster</option>
                                        <option value="wizbii" @if(in_array('wizbii', ($jobboards))) selected @endif>Wizbii</option>
                                        <option value="jobijoba" @if(in_array('jobijoba', ($jobboards))) selected @endif>Jobijoba</option>
                                        <option value="jooble" @if(in_array('jooble', ($jobboards))) selected @endif>Jooble</option>
                                        <option value="neuvo" @if(in_array('neuvo', ($jobboards))) selected @endif)>Neuvo</option>
                                        <option value="place_des_talents" @if(in_array('place_des_talents', ($jobboards))) selected @endif>Place des Talents</option>
                                        <option value="le_bon_coin" @if(in_array('le_bon_coin', ($jobboards))) selected @endif>Le Bon Coin</option>
                                        <option value="cadre_emploi" @if(in_array('cadre_emploi', ($jobboards))) selected @endif>Cadre Emploi</option>
                                        <option value="job_transport" @if(in_array('job_transport', ($jobboards))) selected @endif>Job Transport</option>
                                        <option value="l_hotellerie_restauration" @if(in_array('l_hotellerie_restauration', ($jobboards))) selected @endif>L'Hôtellerie Restauration</option>
                                        <option value="meteojob" @if(in_array('meteojob', ($jobboards))) selected @endif>Meteojob</option>
                                    </select>
                                </div>

                                 <!-- Field: Couts de la diffusion -->
                                 <div class="form-group">
                                    <label for="advertising_costs">Coûts de la diffusion</label>
                                    <input type="text" class="form-control" id="advertising_costs" name="advertising_costs" value="{{ $offer->advertising_costs }}" required>
                                </div>

                                <div class="form-group">
                                    <button class="theme-btn btn-style-four @if($offer->publish) d-none @endif" type="button" id="save-offer-draft">Enregistrer en brouillon</button>
                                    <button class="theme-btn btn-style-one" 
                                    id="edit-offer-btn" type="submit">Publier</button>
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
<script>
    // when document is 
    $(document).ready(function () {
        $.ajax({
            url: "{{ route('getRomeCodes') }}",
            type: "GET",
            dataType: "json",
            success: function (data) {
                const autocompleteSource = Object.entries(data).map(([fullName, codeOgr]) => {
                    return `${codeOgr} - ${fullName}`;
                });

                $( "#code_rome" ).autocomplete({
                    source: autocompleteSource
                });
            },
            error: function (data) {
                console.log('Error:', data);
            }
        })

        $("#desired_languages").select2({
        });

        $("#education_level").select2({
        });

        $("#industry_sector").select2({
        });

        $("#selected_jobboards").select2({
        });

        $("#work_schedule").select2({
        });

        $("#rome_code").select2({
            placeholder: "Sélectionnez votre code Rome",
        });

        var currentPage = 1;
    var isFetching = false; // Flag to track request status

    async function getJsonJobs() {
        await $.ajax({
            url: "/recruiter-dashboard/jobs?page=" + currentPage,
            dataType: "json",
            success: function(data) {
                // Populate the Select2 dropdown with the received data
                // var options = data.items.map(function(job) {
                //     return new Option(job.full_name, job.id, false, false);
                // });
                var options = data.items.filter(function(job) {
                    return job.full_name !== null; // Filter out jobs with null full_name
                }).map(function(job) {
                    return new Option(job.full_name, job.id, false, false);
                });

                $('#rome_code').append(options).trigger("change");
                isFetching = false;
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                isFetching = false;
            }
        });
    }

    async function refreshJsonJobs() {
        await $.ajax({
            url: "/recruiter-dashboard/jobs?page=" + currentPage,
            dataType: "json",
            success: function(data) {
                // Populate the Select2 dropdown with the received data
                // var options = data.items.map(function(job) {
                //     return new Option(job.full_name, job.id, false, false);
                // });
                var options = data.items.filter(function(job) {
                    return job.full_name !== null; // Filter out jobs with null full_name
                }).map(function(job) {
                    return new Option(job.full_name, job.id, false, false);
                });

                const scrollTop = $('.select2-results__options').scrollTop();
                $('#rome_code').append(options).trigger("change");

                $('#rome_code').select2('close');
                $('#rome_code').select2('open');
                $('.select2-results__options').scrollTop(scrollTop + 1);

                console.log(scrollTop);

                isFetching = false;
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                isFetching = false;
            }
        });
    }

    getJsonJobs();

    $('#rome_code').on('select2:open', function() {
        const resultsContainer = $('.select2-results__options');
        resultsContainer.on('scroll', function() {
            // This function will be called whenever the user scrolls the options list
            console.log("scroll");
            const scrollTop = $(this).scrollTop();
            const scrollHeight = $(this).prop('scrollHeight');
            const clientHeight = $(this).innerHeight();

            // Check if the user has scrolled near the bottom:
            if (scrollTop + clientHeight >= scrollHeight - 50 && !isFetching) {
                // Trigger infinite scrolling or other actions as needed
                console.log('Near the bottom!');
                currentPage++;
                isFetching = true;
                refreshJsonJobs();
            }
        });
    });

        $('#desired_languages').on('change', function() {
            if (this.value.includes('Autre')) {
                $('#other_language_field').show();
                $('#other_language').prop('required', true); // Make the input required
            } else {
                $('#other_language_field').hide();
                $('#other_language').val('');  // Clear the input field if "Autre" is no longer selected
                $('#other_language').prop('required', false);
            }
        });

        $('#industry_sector').on('change', function() {
            if (this.value.includes('Autre')) {
                $('#other_sectors_field').show();
                $('#other_sectors').prop('required', true); // Make the input required
            } else {
                $('#other_sectors_field').hide();
                $('#other_sectors').val('');  // Clear the input field if "Autre" is no longer selected
                $('#other_sectors').prop('required', false);
            }
        });

        document.getElementById("save-offer-draft").addEventListener("click", function() {
            document.getElementById("edit-offer-form").action = "{{ route('recruiter.offer.draft.update') }}"; // Replace with the actual route for saving drafts
            document.getElementById("edit-offer-form").submit();
        });
    })
    
</script>
@endpush