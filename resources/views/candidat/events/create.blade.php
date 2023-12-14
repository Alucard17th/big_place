@extends('layouts.dashboard')
@push('styles')
@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Créer une Offre</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
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
                                    <label for="job_title">Intitulé du poste recherché (laisser le champ libre)</label>
                                    <input type="text" class="form-control" id="job_title" name="job_title">
                                </div>

                                <!-- Field: Date de prise de poste souhaitée -->
                                <div class="form-group">
                                    <label for="desired_start_date">Date de prise de poste souhaitée</label>
                                    <input type="date" class="form-control" id="desired_start_date"
                                        name="start_date">
                                </div>

                                <!-- Field: Localisation du poste (Ville et Code postal) -->
                                <div class="form-group">
                                    <label for="location_city">Ville de la localisation du poste (obligatoire)</label>
                                    <input type="text" class="form-control" id="location_city" name="location_city" required>
                                </div>
                                <div class="form-group">
                                    <label for="location_postal_code">Code postal de la localisation du poste
                                        (obligatoire)</label>
                                    <input type="text" class="form-control" id="location_postal_code"
                                        name="location_postal_code" required>
                                </div>

                                <!-- Field: Adresse complète -->
                                <div class="form-group">
                                    <label for="location_address">Adresse complète</label>
                                    <input type="text" class="form-control" id="location_address"
                                        name="location_address">
                                </div>

                                <!-- Field: Code ROME -->
                                <div class="form-group">
                                    <label for="rome_code">Code ROME (permettant des suggestions)</label>
                                    <input type="text" class="form-control" name="rome_code" id="rome_code">
                                </div>

                                <!-- Field: Type de contrat -->
                                <div class="form-group">
                                    <label for="contract_type">Type de contrat (CDD, CDI, INTERIM)</label>
                                    <select class="form-control" id="contract_type" name="contract_type">
                                        <option value="CDD">CDD</option>
                                        <option value="CDI">CDI</option>
                                        <option value="INTERIM">INTERIM</option>
                                    </select>
                                </div>

                                <!-- Field: Horaires de travail -->
                                <div class="form-group">
                                    <label for="work_schedule">Horaires de travail (choix multiple)</label>
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
                                    <label for="weekly_hours">Temps de travail (choix multiple)</label>
                                    <select class="form-control" id="weekly_hours" name="weekly_hours[]" multiple>
                                        <option value="35H">35H</option>
                                        <option value="39H">39H</option>
                                        <option value="Autre">Autre</option>
                                    </select>
                                </div>

                                <!-- Field: Niveau d’expérience -->
                                <div class="form-group">
                                    <label for="experience_level">Niveau d’expérience (choix multiple)</label>
                                    <select class="form-control" id="experience_level" name="experience_level[]"
                                        multiple>
                                        <option value="Débutant (0 – 2 ans)">Débutant (0 – 2 ans)</option>
                                        <option value="Intermédiaire (2 – 5 ans)">Intermédiaire (2 – 5 ans)</option>
                                        <option value="Confirmé (5 -10 ans)">Confirmé (5 -10 ans)</option>
                                        <option value="Sénior (+ 10 ans)">Sénior (+ 10 ans)</option>
                                    </select>
                                </div>

                                <!-- Field: Langues souhaitées -->
                                <div class="form-group">
                                    <label for="desired_languages">Langues souhaitées (choix multiple)</label>
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
                                    <label for="education_level">Niveau d’éducation (choix multiple)</label>
                                    <select class="form-control" id="education_level" name="education_level[]" multiple>
                                        <option value="CAP / BEP">CAP / BEP</option>
                                        <option value="Bac">Bac</option>
                                        <option value="Bac + 2">Bac + 2</option>
                                        <option value="Bac + 4">Bac + 4</option>
                                        <option value="Bac + 5 et plus">Bac + 5 et plus</option>
                                    </select>
                                </div>

                                <!-- Field: Salaire Brut -->
                                <div class="form-group">
                                    <label for="gross_salary">Salaire Brut (laisser un champ vide pour permettre à
                                        l’entreprise d’indiquer le salaire)</label>
                                    <input type="text" class="form-control" id="gross_salary" name="brut_salary">
                                </div>

                                <!-- Field: Secteur d’activité -->
                                <div class="form-group">
                                    <label for="industry_sector">Secteur d’activité (choix multiple)</label>
                                    <select class="form-control" id="industry_sector" name="industry_sector[]" multiple>
                                        <option value="Agroalimentaire">Agroalimentaire</option>
                                        <option value="Banque / Assurance">Banque / Assurance</option>
                                        <!-- Add other options based on your needs -->
                                    </select>
                                </div>

                                <!-- Field: Avantages proposés -->
                                <div class="form-group">
                                    <label for="benefits">Avantages proposés (laisser un grand champ libre pour
                                        permettre de rédiger plusieurs lignes)</label>
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
                                        <option value="linkedin">Linkedin</option>
                                        <option value="facebook">Facebook</option>
                                        <!-- Add other options based on your needs -->
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

@endpush