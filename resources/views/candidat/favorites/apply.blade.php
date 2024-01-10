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

.offre-title {
    font-family: 'Outfit';
    font-style: normal;
    font-weight: 500;
    font-size: 41.0861px;
    line-height: 51px;
    color: #1C1C1E;
}

.offre-subtitle {
    font-family: 'Outfit';
    font-style: normal;
    font-weight: 400;
    font-size: 20.543px;
    line-height: 31px;
    color: rgba(28, 28, 30, 0.72);
}

.offre-time-subtitle {
    font-family: 'Outfit';
    font-style: normal;
    font-weight: 400;
    font-size: 20.543px;
    line-height: 31px;
    color: rgba(28, 28, 30, 0.72);
}

.candidature-time-subtitle {
    font-family: 'Outfit';
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 24px;
    color: #1C1C1E;
}

.offre-desc,
.offre-status,
.offre-end-date {
    font-family: 'Outfit';
    font-style: normal;
    font-weight: 400;
    font-size: 16.543px;
    line-height: 31px;
    color: #000000;
}

.offre-subtitle img,
.entreprise-logo img {
    width: 30.81px;
    height: 30.81px;
    border-radius: 30.8146px;
}

.entreprise-name {
    font-family: 'Outfit';
    font-style: normal;
    font-weight: 500;
    font-size: 20.543px;
    line-height: 31px;
    color: #1C1C1E;
}

.entreprise-info {
    font-family: 'Outfit';
    font-style: normal;
    font-weight: 400;
    font-size: 15.4073px;
    line-height: 23px;
    color: rgba(28, 28, 30, 0.72);
}

.see-more-btn {
    font-family: 'Outfit';
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
    line-height: 28px;
    letter-spacing: 0.02em;
    text-transform: capitalize;
    color: #6836DD;
}

.entreprise-desc {
    font-family: 'Outfit';
    font-style: normal;
    font-weight: 400;
    font-size: 15.4073px;
    line-height: 23px;
    color: rgba(28, 28, 30, 0.72);
}

.check-icon {
    width: 30.81px;
    height: 30.81px;
    background: #13D527;

}

.offre-btn {
    color: #302ea7;
    font-size: 30px;
}

#apply-form>h4 {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 36px;
    line-height: 41px;
    /* identical to box height, or 102% */
    color: #202124;
}

#apply-form>div>label,
#apply-form>div.row>div>div>label {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 41px;
    color: #202124;
}

#apply-btn {
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
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-content">
                            <div class="row">
                                <div class="col-12 pl-5">
                                    <div class="">
                                        <div
                                            class="upper-title-box d-flex justify-content-between align-items-center pt-5">
                                            <h4 class="offre-title">
                                                {{$offer->job_title}}</h4>
                                            <div class="d-flex">
                                                <a href="/candidat-offers"
                                                    class="bg-back-btn mr-2 pb-0">
                                                    Retour
                                                </a>
                                            </div>
                                        </div>
                                        <div class="offre-subtitle my-1">
                                            <img src="{{asset('storage'.getEntrepriseLogoByUserId($offer->user_id)->logo)}}"
                                                alt="" class="mr-2">
                                            {{getEntrepriseLogoByUserId($offer->user_id)->nom_entreprise}} ,
                                            {{$offer->location_city}}
                                        </div>
                                        <h5 class="offre-time-subtitle">Publiée le
                                            {{$offer->created_at}}</h5>

                                        <div class="row my-4">
                                            <a class="theme-btn btn-style-one bg-btn text-white"
                                                id="open-apply-modal">Je Postule</a>
                                            <a href="{{route('candidat.vitrine.show', $offer->user_id)}}"
                                                class="bg-btn-three bg-btn ml-3"
                                                style="padding-left:25px !important;padding-right:25px !important;">Consulter
                                                la vitrine de l'entreprise</a>
                                        </div>
                                        <div class="offre-desc my-4">
                                            Responsabilités : Développer et maintenir des applications Java
                                            complexes Travailler en collaboration avec une équipe d'ingénieurs pour
                                            concevoir et mettre en œuvre de nouvelles fonctionnalités Participer à
                                            la conception et à la mise en œuvre de l'architecture logicielle des
                                            applications
                                        </div>
                                        <div class="offre-status">Status de l'offre :
                                            {{$offer->status}}</div>
                                        <div class="offre-end-date">Date de limitation de candidature :
                                            {{$offer->unpublish_date}}</div>

                                        <div class="card mt-5" style="height:100%;">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-2 pr-0">
                                                        <div class="entreprise-logo"><img
                                                                src="{{asset('storage'.getEntrepriseLogoByUserId($offer->user_id)->logo)}}"
                                                                alt=""></div>
                                                    </div>
                                                    <div class="col-7 pl-0">
                                                        <div class="entreprise-name">
                                                            {{getEntrepriseLogoByUserId($offer->user_id)->nom_entreprise}}
                                                        </div>
                                                        <div class="entreprise-info">
                                                            {{getEntrepriseLogoByUserId($offer->user_id)->effectif}}
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

    <div id="ex1" class="modal">
        <form action="{{ route('candidat.candidature.store') }}" method="POST" id="apply-form">
            @csrf
            <div class="form-tags d-none">
                <input type="hidden" name="entreprise_owner_id" value="{{$offer->user_id}}">
                <input type="hidden" name="title" value="{{$offer->job_title}}">
                <input type="hidden" name="offer_id" value="{{$offer->id}}">
            </div>
            <h4 class="text-dark mb-3">Postuler </h4>

            <div class="row">
                <h4 class="offre-title col-12">
                    {{$offer->job_title}}</h4>
                <div class="offre-desc my-4 col-12">
                    Responsabilités : Développer et maintenir des applications Java
                    complexes Travailler en collaboration avec une équipe d'ingénieurs pour
                    concevoir et mettre en œuvre de nouvelles fonctionnalités Participer à
                    la conception et à la mise en œuvre de l'architecture logicielle des
                    applications
                </div>
                <div class="offre-status col-12">Status de l'offre :
                    {{$offer->status}}</div>
                <div class="offre-end-date col-12">Date de limitation de candidature :
                    {{$offer->unpublish_date}}</div>
            </div>

            <div class="row my-4">
                <h4 class="offre-title col-12">Mes informations </h4>
                <div class="col-12 offre-desc">
                    Nom : {{auth()->user()->name}}
                </div>
                <div class="col-12 offre-desc">
                    Email : {{auth()->user()->email}}
                </div>
                <div class="col-12 offre-desc">
                    Date de naissance : {{auth()->user()->birth_date}}
                </div>
                <div class="col-12 offre-desc">
                    Mon CV : 
                    <a href="{{asset('storage'.auth()->user()->curriculum[0]->cv)}}" class="" target="_blank">
                    <i class="las la-eye"></i>
                        Voir
                    </a>
                </div>
            </div>

            <div class="form-group">
                <button class="theme-btn btn-style-one" type="submit" id="apply-btn">Postuler</button>
            </div>
        </form>

        <a href="#" class="custom-close-modal"></a>
    </div>

</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {

    $('#open-apply-modal').click(function() {
        // Send the data 
        $("#ex1").modal({
            escapeClose: false,
            clickClose: true,
            showClose: false
        });
    })

    $('#close-modal, .custom-close-modal').click(function() {
        console.log('Modal Should Be Closed');
        $.modal.close();
    });
});
</script>
@endpush