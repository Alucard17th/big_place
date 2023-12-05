@extends('layouts.dashboard')
@push('styles')
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
</style>
@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Créer une Offre</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget pt-5">
                    <div class="tabs-box">
                        <div class="widget-content">
                            <form action="{{route('recruiter.offer.add')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- Field: Nom du projet ou de la campagne -->
                                <div class="form-group">
                                    <label for="project_campaign_name">Nom du projet ou de la campagne
                                        (facultatif)</label>
                                    <input type="text" class="form-control" id="project_campaign_name"
                                        name="project_campaign_name">
                                </div>

                                <!-- Field: Intitulé du poste recherché -->
                                <div class="form-group">
                                    <label for="job_title">Intitulé du poste recherché</label>
                                    <input type="text" class="form-control" id="job_title" name="job_title">
                                </div>

                                  <!-- Field: Code ROME -->
                                <div class="form-group">
                                    <label for="rome_code">Code ROME</label>
                                    <select name="rome_code" id="rome_code" class="form-control">
                                        @foreach($jobs as $job)
                                        <option value="{{$job->id}}">{{$job->id}} - {{$job->full_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Field: Date de prise de poste souhaitée -->
                                <div class="form-group">
                                    <label for="desired_start_date">Date de prise de poste souhaitée</label>
                                    <input type="date" class="form-control" id="desired_start_date"
                                        name="start_date">
                                </div>

                                <!-- Field: Localisation du poste (Ville et Code postal) -->
                                <div class="form-group">
                                    <label for="location_city">Ville de la localisation du poste</label>
                                    <input type="text" class="form-control" id="location_city" name="location_city" required>
                                </div>
                                <div class="form-group">
                                    <label for="location_postal_code">Code postal de la localisation du poste</label>
                                    <input type="text" class="form-control" id="location_postal_code"
                                        name="location_postal_code" required>
                                </div>

                                <!-- Field: Adresse complète -->
                                <div class="form-group">
                                    <label for="location_address">Adresse complète</label>
                                    <input type="text" class="form-control" id="location_address"
                                        name="location_address">
                                </div>

                                <!-- Field: Type de contrat -->
                                <div class="form-group">
                                    <label for="contract_type">Type de contrat</label>
                                    <select class="form-control" id="contract_type" name="contract_type">
                                        <option value="CDD">CDD</option>
                                        <option value="CDI">CDI</option>
                                        <option value="INTERIM">INTERIM</option>
                                    </select>
                                </div>

                                <!-- Field: Horaires de travail -->
                                <div class="form-group">
                                    <label for="work_schedule">Horaires de travail</label>
                                    <select class="form-control" id="work_schedule" name="work_schedule">
                                        <option value="Temps plein">Temps plein</option>
                                        <option value="Temps partiel">Temps partiel</option>
                                        <option value="Horaires de nuit">Horaires de nuit</option>
                                        <option value="Samedi">Samedi</option>
                                        <option value="Dimanche">Dimanche</option>
                                        <option value="Nuit">Nuit</option>
                                        <option value="Télétravail">Télétravail</option>
                                    </select>
                                </div>

                                <!-- Field: Temps de travail -->
                                <div class="form-group">
                                    <label for="weekly_hours">Temps de travail</label>
                                    <select class="form-control" id="weekly_hours" name="weekly_hours">
                                        <option value="35H">35H</option>
                                        <option value="39H">39H</option>
                                        <option value="Autre">Autre</option>
                                    </select>
                                </div>

                                <!-- Field: Niveau d’expérience -->
                                <div class="form-group">
                                    <label for="experience_level">Niveau d’expérience</label>
                                    <select class="form-control" id="experience_level" name="experience_level">
                                        <option value="Débutant (0 – 2 ans)">Débutant (0 – 2 ans)</option>
                                        <option value="Intermédiaire (2 – 5 ans)">Intermédiaire (2 – 5 ans)</option>
                                        <option value="Confirmé (5 -10 ans)">Confirmé (5 -10 ans)</option>
                                        <option value="Sénior (+ 10 ans)">Sénior (+ 10 ans)</option>
                                    </select>
                                </div>

                                <!-- Field: Langues souhaitées -->
                                <div class="form-group">
                                    <label for="desired_languages">Langues souhaitées</label>
                                    <select class="form-control" id="desired_languages" name="desired_languages[]"
                                        multiple>
                                        <option value="Anglais">Anglais</option>
                                        <option value="Espagnol">Espagnol</option>
                                        <option value="Arabe">Arabe</option>
                                        <option value="Mandarin">Mandarin</option>
                                        <option value="Russe">Russe</option>
                                        <option value="Allemand">Allemand</option>
                                        <option value="Autre">Autre</option>
                                    </select>
                                </div>

                                <!-- Field: Niveau d’éducation -->
                                <div class="form-group">
                                    <label for="education_level">Niveau d’éducation</label>
                                    <select class="form-control" id="education_level" name="education_level">
                                        <option value="CAP / BEP">CAP / BEP</option>
                                        <option value="Bac">Bac</option>
                                        <option value="Bac + 2">Bac + 2</option>
                                        <option value="Bac + 4">Bac + 4</option>
                                        <option value="Bac + 5 et plus">Bac + 5 et plus</option>
                                    </select>
                                </div>

                                <!-- Field: Salaire Brut -->
                                <div class="form-group">
                                    <label for="gross_salary">Salaire Brut (ke)</label>
                                    <input type="text" class="form-control" id="gross_salary" name="brut_salary">
                                </div>

                                <!-- Field: Secteur d’activité -->
                                <div class="form-group">
                                    <label for="industry_sector">Secteur d’activité</label>
                                    <select class="form-control" id="industry_sector" name="industry_sector">
                                        <option value="Agroalimentaire">Agroalimentaire</option>
                                        <option value="Banque / Assurance">Banque / Assurance</option>
                                        <!-- Add other options based on your needs -->
                                    </select>
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
                                        name="publication_date">
                                </div>

                                <!-- Field: Dépublier l’offre le -->
                                <div class="form-group">
                                    <label for="unpublish_date">Dépublier l’offre le</label>
                                    <input type="date" class="form-control" id="unpublish_date" name="unpublish_date">
                                </div>

                                <!-- Field: Choix des canaux de diffusion -->
                                <div class="form-group">
                                    <label for="selected_jobboards">Choix des canaux de diffusion (cocher les
                                        jobboards)</label>
                                    <!-- You can add checkboxes for each jobboard -->
                                    <select class="form-control" id="selected_jobboards" name="selected_jobboards[]" multiple>
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
                                </div>

                                 <!-- Field: Couts de la diffusion -->
                                 <div class="form-group">
                                    <label for="advertising_costs">Coûts de la diffusion</label>
                                    <input type="text" class="form-control" id="advertising_costs" name="advertising_costs">
                                </div>

                                <div class="form-group">
                                    <button class="theme-btn btn-style-one" type="submit">Enregistrer</button>
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

        $("#rome_code").select2({});


    })
    
</script>
@endpush