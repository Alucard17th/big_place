@extends('layouts.dashboard')
@push('styles')
<style>
.modal a.custom-close-modal {
    position: absolute;
    top: -12.5px;
    right: -12.5px;
    display: block;
    width: 30px;
    height: 30px;
    text-indent: -9999px;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center center;
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAAXNSR0IArs4c6QAAA3hJREFUaAXlm8+K00Acx7MiCIJH/yw+gA9g25O49SL4AO3Bp1jw5NvktC+wF88qevK4BU97EmzxUBCEolK/n5gp3W6TTJPfpNPNF37MNsl85/vN/DaTmU6PknC4K+pniqeKJ3k8UnkvDxXJzzy+q/yaxxeVHxW/FNHjgRSeKt4rFoplzaAuHHDBGR2eS9G54reirsmienDCTRt7xwsp+KAoEmt9nLaGitZxrBbPFNaGfPloGw2t4JVamSt8xYW6Dg1oCYo3Yv+rCGViV160oMkcd8SYKnYV1Nb1aEOjCe6L5ZOiLfF120EjWhuBu3YIZt1NQmujnk5F4MgOpURzLfAwOBSTmzp3fpDxuI/pabxpqOoz2r2HLAb0GMbZKlNV5/Hg9XJypguryA7lPF5KMdTZQzHjqxNPhWhzIuAruOl1eNqKEx1tSh5rfbxdw7mOxCq4qS68ZTjKS1YVvilu559vWvFHhh4rZrdyZ69Vmpgdj8fJbDZLJpNJ0uv1cnr/gjrUhQMuI+ANjyuwftQ0bbL6Erp0mM/ny8Fg4M3LtdRxgMtKl3jwmIHVxYXChFy94/Rmpa/pTbNUhstKV+4Rr8lLQ9KlUvJKLyG8yvQ2s9SBy1Jb7jV5a0yapfF6apaZLjLLcWtd4sNrmJUMHyM+1xibTjH82Zh01TNlhsrOhdKTe00uAzZQmN6+KW+sDa/JD2PSVQ873m29yf+1Q9VDzfEYlHi1G5LKBBWZbtEsHbFwb1oYDwr1ZiF/2bnCSg1OBE/pfr9/bWx26UxJL3ONPISOLKUvQza0LZUxSKyjpdTGa/vDEr25rddbMM0Q3O6Lx3rqFvU+x6UrRKQY7tyrZecmD9FODy8uLizTmilwNj0kraNcAJhOp5aGVwsAGD5VmJBrWWbJSgWT9zrzWepQF47RaGSiKfeGx6Szi3gzmX/HHbihwBser4B9UJYpFBNX4R6vTn3VQnez0SymnrHQMsRYGTr1dSk34ljRqS/EMd2pLQ8YBp3a1PLfcqCpo8gtHkZFHKkTX6fs3MY0blKnth66rKCnU0VRGu37ONrQaA4eZDFtWAu2fXj9zjFkxTBOo8F7t926gTp/83Kyzzcy2kZD6xiqxTYnHLRFm3vHiRSwNSjkz3hoIzo8lCKWUlg/YtGs7tObunDAZfpDLbfEI15zsEIY3U/x/gHHc/G1zltnAgAAAABJRU5ErkJggg==);
}

.custom-btn {
    background-color: #ff8b00;
}

input,
select {
    height: 45px !important;
    padding-top: 10px !important;
    width: 100% !important;
}

.select2-selection--multiple {
    max-height: 45px !important;
    border: 1px solid #dae1e7 !important;
    border-radius: 3px;
    box-shadow: none;
    font-size: 14px;
    background: #f0f5f7 !important;
}

.select2-search__field {
    padding: 0px 18px 10px 20px !important;
}

#data-table_length>label>select {
    width: auto !important;
}

/* LIST */
.list-group-item.active {
    background: #f4f5ff !important;
    border-radius: 10.2715px;
}

.list-title {
    font-family: 'Outfit';
    font-style: normal;
    font-weight: 500;
    font-size: 20.543px;
    line-height: 31px;
    color: #1C1C1E;
}

.list-subtitle {
    font-family: 'Outfit';
    font-style: normal;
    font-weight: 400;
    font-size: 15.4073px;
    line-height: 23px;
    color: rgba(28, 28, 30, 0.72);
}

.list-time-subtitle {
    font-family: 'Outfit';
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 24px;
    color: #1C1C1E;
}

.list-item-img {
    min-width: 92.44px;
    width: 92.44px;
    height: 92.44px;
    border: 0.320985px solid rgba(28, 28, 30, 0.08);
    border-radius: 10.2715px;
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
</style>
@endpush
@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget py-5">
                    <div class="upper-title-box d-flex justify-content-between align-items-center p-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <h3>Mes Candidatures</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('candidat.dashboard') }}" class="bg-back-btn mr-2">
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content">
                            <!-- TABLE VIEW -->
                            <div class="row">
                                <div class="col-5" style="border-right: 1px solid #0000005c;">
                                    <ul class="list-group">
                                        @foreach ($candidatures as $key => $candidature)
                                        <a class="candidature-link" data-candidature-id="{{ $candidature->id }}">
                                            <li class="list-group-item d-flex border-0 {{ $key == 0 ? 'active' : '' }}">
                                                <div class="list-img">
                                                    <img class="list-item-img"
                                                        src="{{asset('storage'.getEntrepriseLogoByUserId($candidature->user_id)->logo)}}"
                                                        alt="">
                                                </div>
                                                <div class="list-content ml-2">
                                                    <h4 class="list-title">
                                                        {{getOfferByCandidatId($candidature->offer_id)->job_title}}</h4>
                                                    <span
                                                        class="list-subtitle">{{getEntrepriseLogoByUserId($candidature->user_id)->nom_entreprise}}
                                                        ,
                                                        {{getOfferByCandidatId($candidature->offer_id)->location_city}}</span>
                                                    <h5 class="list-time-subtitle">Déposé le
                                                        {{ \Carbon\Carbon::parse($candidature->created_at)->isoFormat('LL') }}
                                                    </h5>
                                                </div>
                                            </li>
                                        </a>
                                        @endforeach
                                    </ul>
                                    <div class="pagination mt-3">{{ $candidatures->links() }}</div>
                                </div>
                                <div class="vr"></div>
                                @if(count($candidatures) > 0)
                                <div class="col-7">
                                    <div class="row">
                                        <div class="col-12 pl-5">
                                            <div class="">
                                                <div class="d-flex justify-content-between">
                                                    <h4 class="offre-title">
                                                        {{ getOfferByCandidatId($candidatures[0]->offer_id)->job_title }}
                                                    </h4>
                                                </div>
                                                <div class="offre-subtitle my-1">
                                                    <img src="{{ asset('storage' . getEntrepriseLogoByUserId($candidature->user_id)->logo) }}"
                                                        alt="" class="mr-2 offre-subtitle-img">
                                                    <span
                                                        class="entreprise-title">{{ getEntrepriseLogoByUserId($candidature->user_id)->nom_entreprise }}</span>
                                                    ,
                                                    <span
                                                        class="entreprise-location">{{ getOfferByCandidatId($candidature->offer_id)->location_city }}</span>
                                                </div>
                                                @php
                                                $created_at = getOfferByCandidatId($candidature->offer_id)->created_at;
                                                $formattedDate = \Carbon\Carbon::parse($created_at)->format('d-m-Y');
                                                @endphp
                                                <h5 class="offre-time-subtitle">Publiée le {{ $formattedDate }}</h5>

                                                <h4 class="candidature-time-subtitle mt-4">
                                                    <img src="{{ asset('/plugins/images/icons/tick-circle.png') }}"
                                                        alt="">
                                                    Déposée le
                                                    {{ \Carbon\Carbon::parse($candidature->created_at)->formatLocalized('%d-%m-%Y') }}
                                                </h4>
                                                <div class="offre-desc my-4">
                                                    Responsabilités : Développer et maintenir des applications Java
                                                    complexes Travailler en collaboration avec une équipe d'ingénieurs
                                                    pour concevoir et mettre en œuvre de nouvelles fonctionnalités
                                                    Participer à la conception et à la mise en œuvre de l'architecture
                                                    logicielle des applications
                                                </div>
                                                <div class="offre-status">Status de l'offre :
                                                    {{ getOfferByCandidatId($candidature->offer_id)->status }}</div>
                                                <div class="offre-end-date">Date de limitation de candidature :
                                                    {{ \Carbon\Carbon::parse(getOfferByCandidatId($candidature->offer_id)->unpublish_date)->formatLocalized('%d-%m-%Y') }}
                                                </div>

                                                <!-- <div class="card mt-5" style="height:100%;">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-2 pr-0">
                                                                <div class="entreprise-logo"><img
                                                                        class="entreprise-logo-img"
                                                                        src="{{ asset('storage' . getEntrepriseLogoByUserId($candidature->user_id)->logo) }}"
                                                                        alt=""></div>
                                                            </div>
                                                            <div class="col-7 pl-0">
                                                                <div class="entreprise-name">
                                                                    {{ getEntrepriseLogoByUserId($candidature->user_id)->nom_entreprise }}
                                                                </div>
                                                                <div class="entreprise-info">
                                                                    {{ getEntrepriseLogoByUserId($candidature->user_id)->effectif }}
                                                                    Employés</div>
                                                            </div>
                                                            <div class="col-3">
                                                                <a class="see-more-btn" type="button"
                                                                    href="{{ route('candidat.vitrine.show', $candidature->user_id) }}">Voir
                                                                    Plus</a>
                                                            </div>
                                                            <div class="col-12 mt-3">
                                                                <span class="entreprise-desc">
                                                                    Google est l'une des entreprises les plus influentes
                                                                    au monde.
                                                                    Elle est connue pour son moteur de recherche,
                                                                    mais elle propose également une gamme d'autres
                                                                    produits et services,
                                                                    notamment Gmail, Google Maps, YouTube, Google Cloud
                                                                    Platform et Google AI.... see more
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="col-7">
                                    <div class="row">
                                        <div class="col-12 pl-5 text-dark">
                                            Aucune candidature.
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal HTML embedded directly into document -->
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('.candidature-link').on('click', function(e) {
        e.preventDefault();
        $('.candidature-link').closest('ul').find('li').removeClass('active');
        $(this).find('li').addClass('active');
        var candidatureId = $(this).data('candidature-id');

        // Make an AJAX request
        $.ajax({
            url: '/candidature/' + candidatureId,
            type: 'GET',
            success: function(data) {
                // Handle the received data, e.g., update a modal with the candidature details
                console.log(data);
                $('.offre-title').text(data.offre.job_title);
                $('.offre-subtitle-img').attr('src', 'storage' + data.entreprise.logo);
                $('.entreprise-title').text(data.entreprise.nom_entreprise);
                $('.entreprise-location').text(data.entreprise.location_city);
                $('.offre-time-subtitle').text('Publiée le ' + moment(data.offre.created_at)
                    .format('DD-MM-YYYY'));
                $('.offre-desc').text(
                    "Responsabilités : Développer et maintenir des applications Java complexes Travailler en collaboration avec une équipe d'ingénieurs pour concevoir et mettre en œuvre de nouvelles fonctionnalités Participer à la conception et à la mise en œuvre de l'architecture logicielle des applications"
                    )
                $('.offre-status').text('Status de l\'offre : ' + data.offre.status);
                $('.offre-end-date').text('Date de limitation de candidature : ' + data
                    .offre.unpublish_date);

                $('.entreprise-name').text(data.entreprise.nom_entreprise);
                $('.entreprise-info').text(data.entreprise.effectif + ' Employés');
                $('.entreprise-desc').text('Description manquante...');
                $('.entreprise-logo-img').attr('src', 'storage' + data.entreprise.logo);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
</script>

@endpush