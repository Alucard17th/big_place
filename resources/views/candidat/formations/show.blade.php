@extends('layouts.dashboard')
@push('styles')
<style>
.modal a.custom-close-modal {
    position: absolute;
    top: -12.5px;
    right: -12.5px;
    /* display: block; */
    display: none;
    width: 30px;
    height: 30px;
    text-indent: -9999px;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center center;
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAAXNSR0IArs4c6QAAA3hJREFUaAXlm8+K00Acx7MiCIJH/yw+gA9g25O49SL4AO3Bp1jw5NvktC+wF88qevK4BU97EmzxUBCEolK/n5gp3W6TTJPfpNPNF37MNsl85/vN/DaTmU6PknC4K+pniqeKJ3k8UnkvDxXJzzy+q/yaxxeVHxW/FNHjgRSeKt4rFoplzaAuHHDBGR2eS9G54reirsmienDCTRt7xwsp+KAoEmt9nLaGitZxrBbPFNaGfPloGw2t4JVamSt8xYW6Dg1oCYo3Yv+rCGViV160oMkcd8SYKnYV1Nb1aEOjCe6L5ZOiLfF120EjWhuBu3YIZt1NQmujnk5F4MgOpURzLfAwOBSTmzp3fpDxuI/pabxpqOoz2r2HLAb0GMbZKlNV5/Hg9XJypguryA7lPF5KMdTZQzHjqxNPhWhzIuAruOl1eNqKEx1tSh5rfbxdw7mOxCq4qS68ZTjKS1YVvilu559vWvFHhh4rZrdyZ69Vmpgdj8fJbDZLJpNJ0uv1cnr/gjrUhQMuI+ANjyuwftQ0bbL6Erp0mM/ny8Fg4M3LtdRxgMtKl3jwmIHVxYXChFy94/Rmpa/pTbNUhstKV+4Rr8lLQ9KlUvJKLyG8yvQ2s9SBy1Jb7jV5a0yapfF6apaZLjLLcWtd4sNrmJUMHyM+1xibTjH82Zh01TNlhsrOhdKTe00uAzZQmN6+KW+sDa/JD2PSVQ873m29yf+1Q9VDzfEYlHi1G5LKBBWZbtEsHbFwb1oYDwr1ZiF/2bnCSg1OBE/pfr9/bWx26UxJL3ONPISOLKUvQza0LZUxSKyjpdTGa/vDEr25rddbMM0Q3O6Lx3rqFvU+x6UrRKQY7tyrZecmD9FODy8uLizTmilwNj0kraNcAJhOp5aGVwsAGD5VmJBrWWbJSgWT9zrzWepQF47RaGSiKfeGx6Szi3gzmX/HHbihwBser4B9UJYpFBNX4R6vTn3VQnez0SymnrHQMsRYGTr1dSk34ljRqS/EMd2pLQ8YBp3a1PLfcqCpo8gtHkZFHKkTX6fs3MY0blKnth66rKCnU0VRGu37ONrQaA4eZDFtWAu2fXj9zjFkxTBOo8F7t926gTp/83Kyzzcy2kZD6xiqxTYnHLRFm3vHiRSwNSjkz3hoIzo8lCKWUlg/YtGs7tObunDAZfpDLbfEI15zsEIY3U/x/gHHc/G1zltnAgAAAABJRU5ErkJggg==);
}

.bg-btn-visio.active {
    background-color: #ff8b00;
    /* Change to your desired active background color */
    color: white !important;
    /* Change to your desired active text color */
}

.bg-btn-physic.active {
    background-color: #ff8b00;
    /* Change to your desired active background color */
    color: white !important;
    /* Change to your desired active text color */
}

input,
select {
    height: 45px !important;
    padding-top: 10px !important;
}

.select2-selection--single {
    max-height: 45px !important;
    border: 1px solid #dae1e7 !important;
    border-radius: 3px;
    box-shadow: none;
    font-size: 14px;
    background: #fff !important;
    padding: 8px 15px 0px 20px !important;
    width: 22vw;
}

.select2-selection--multiple {
    height: 45px !important;
    border: 1px solid #dae1e7 !important;
    border-radius: 3px;
    box-shadow: none;
    font-size: 14px;
    background: #fff !important;
    width: 22vw;
}

.select2-search__field {
    padding: 0px 18px 10px 20px !important;
    height: 37px !important;
}

#search-btn {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 20px;
}

.form-group input,
.form-group select {
    height: 45px;
    background: #fff !important;
    width: 22vw;
}

#rdv-form input,
#rdv-form select {
    width: 100%;
}

#ex1 {
    background: #f8f8f8;
    max-width: 100%;
    width: 600px;
    padding: 20px;
}

.offre-title{
font-family: 'Outfit';
font-style: normal;
font-weight: 500;
font-size: 41.0861px;
line-height: 51px;
color: #1C1C1E;
}
.offre-subtitle{
font-family: 'Outfit';
font-style: normal;
font-weight: 400;
font-size: 20.543px;
line-height: 31px;
color: rgba(28, 28, 30, 0.72);
}
.offre-time-subtitle{
font-family: 'Outfit';
font-style: normal;
font-weight: 400;
font-size: 20.543px;
line-height: 31px;
color: rgba(28, 28, 30, 0.72);
}
.candidature-time-subtitle{
font-family: 'Outfit';
font-style: normal;
font-weight: 400;
font-size: 16px;
line-height: 24px;
color: #1C1C1E;
}
.offre-desc, .offre-status, .offre-end-date{
font-family: 'Outfit';
font-style: normal;
font-weight: 400;
font-size: 16.543px;
line-height: 31px;
color: #000000;
}
.offre-subtitle img,
.entreprise-logo img{
width: 30.81px;
height: 30.81px;
border-radius: 30.8146px;
}

.entreprise-name{
font-family: 'Outfit';
font-style: normal;
font-weight: 500;
font-size: 20.543px;
line-height: 31px;
color: #1C1C1E;
}
.entreprise-info{
font-family: 'Outfit';
font-style: normal;
font-weight: 400;
font-size: 15.4073px;
line-height: 23px;
color: rgba(28, 28, 30, 0.72);
}
.see-more-btn{
font-family: 'Outfit';
font-style: normal;
font-weight: 600;
font-size: 18px;
line-height: 28px;
letter-spacing: 0.02em;
text-transform: capitalize;
color: #6836DD;
}
.entreprise-desc{
font-family: 'Outfit';
font-style: normal;
font-weight: 400;
font-size: 15.4073px;
line-height: 23px;
color: rgba(28, 28, 30, 0.72);
}

.check-icon{
width: 30.81px;
height: 30.81px;
background: #13D527;

}
.offre-btn{
    color:#302ea7;
    font-size: 30px;
}
</style>
@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">

        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="upper-title-box d-flex justify-content-between align-items-center p-4">
                        <div class="d-flex align-items-center justify-content-center">
                            <h3>Détails de la formation</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="/candidat-formation" class="bg-back-btn mr-2">
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <!-- SEARCH FORM -->

                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content">
                            <!-- TABLE VIEW -->
                            <div class="row">
                                <div class="col-12 pl-5">
                                    <div class="">
                                        <div class="upper-title-box d-flex justify-content-between align-items-center pt-5">
                                            <h4 class="offre-title">
                                                {{$formation->job_title}}</h4>
                                        </div>

                                        <div class="offre-subtitle my-1">
                                            <img src="{{asset('storage'.getEntrepriseLogoByUserId($formation->user_id)->logo)}}"
                                                alt="" class="mr-2">
                                            {{getEntrepriseLogoByUserId($formation->user_id)->nom_entreprise}} ,
                                            {{$formation->work_location}}
                                        </div>

                                        <h5 class="offre-time-subtitle">Publiée le
                                            {{ \Carbon\Carbon::parse($formation->created_at)->formatLocalized('%d-%m-%Y') }}</h5>

                                        <!-- <div class="row my-4">
                                            <a href="{{ route('candidat.formation.subscribe', $formation->id) }}" class="theme-btn btn-style-one bg-btn text-white">Participer à la formation</a>
                                            <a href="{{route('candidat.vitrine.show', $formation->user_id)}}" class="bg-btn-three bg-btn ml-3" style="padding-left:25px !important;padding-right:25px !important;">Consulter la vitrine de l'entreprise</a>
                                        </div> -->

                                        <!-- <div class="offre-desc my-4">
                                            Responsabilités : Développer et maintenir des applications Java
                                            complexes Travailler en collaboration avec une équipe d'ingénieurs pour
                                            concevoir et mettre en œuvre de nouvelles fonctionnalités Participer à
                                            la conception et à la mise en œuvre de l'architecture logicielle des
                                            applications
                                        </div> -->

                                        <div class="offre-desc my-4">
                                            Créateur de la Formation : {{getUserById($formation->user_id)->name}} 
                                        </div>

                                        <div class="offre-desc my-4">
                                            Durée de la Formation : {{ \Carbon\Carbon::parse($formation->start_date)->formatLocalized('%d-%m-%Y') }} à  {{ \Carbon\Carbon::parse($formation->end_date)->formatLocalized('%d-%m-%Y') }} 
                                        </div>

                                        <div class="offre-desc my-4">
                                            Lieu et Adresse:  {{$formation->work_location}}
                                        </div>

                                        <div class="offre-desc my-4">
                                            Compétences acquises à la fin de la formation : {{$formation->skills_acquired}} 
                                        </div>

                                        <div class="offre-desc my-4">
                                            CDI à l'embauche:  {{$formation->cdi_at_hiring == 1 ? 'Oui' : 'Non'}}
                                        </div>

                                        <div class="offre-desc my-4">
                                            Nombre maximum de participants : {{$formation->max_participants}} 
                                        </div>

                                        <div class="offre-desc my-4">
                                            Nombre de postes ouverts : {{$formation->open_positions}}
                                        </div>

                                        <div class="offre-end-date">Date de fin d'inscription :
                                            {{$formation->end_date}}</div>

                                        <!-- <div class="card mt-5" style="height:100%;">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-2 pr-0">
                                                        <div class="entreprise-logo"><img
                                                                src="{{asset('storage'.getEntrepriseLogoByUserId($formation->user_id)->logo)}}"
                                                                alt=""></div>
                                                    </div>
                                                    <div class="col-7 pl-0">
                                                        <div class="entreprise-name">
                                                            {{getEntrepriseLogoByUserId($formation->user_id)->nom_entreprise}}
                                                        </div>
                                                        <div class="entreprise-info">
                                                            {{getEntrepriseLogoByUserId($formation->user_id)->effectif}}
                                                            Employés</div>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <span class="entreprise-desc">
                                                            Google est l'une des entreprises les plus influentes au
                                                            monde.
                                                            Elle est connue pour son moteur de recherche,
                                                            mais elle propose également une gamme d'autres produits
                                                            et services,
                                                            notamment Gmail, Google Maps, YouTube, Google Cloud
                                                            Platform et Google AI.
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
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

</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {


});
</script>
@endpush