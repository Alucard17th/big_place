@extends('layouts.dashboard')
@push('styles')
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
<style>
.logo-container{
    position: absolute;
    top: -54px;
    left: 25px;
    outline: 5px solid #fbfbfb;
    outline-offset: -10px;
    border-radius: 51%;
}
.vitrine-logo {
    width: 100px;
    height: 100px;
    border-radius: 50%;
}


.vitrine-photos {
    width: 100px;
    height: 100px;
}

.bg-custom-btn {
    position: absolute;
    bottom: 18%;
    left: 81%;
    background-color: #b1acac7a;
    /* Change to your desired background color */
    color: #fff;
    /* Change to your desired text color */
    padding: 6px 12px;
    border-radius: 5px;
    text-decoration: none;
    display: flex;
    align-items: center;
}

/* Make it responsive */
@media (max-width: 768px) {
    .bg-custom-btn {
        bottom: 4%;
        /* Adjust the bottom position for smaller screens */
        left: 50%;
        /* Adjust the left position for smaller screens */
        transform: translateX(-50%);
        /* Center the button horizontally */
        font-size: 14px;
        /* Adjust the font size for smaller screens */
        padding: 6px 10px;
        /* Adjust padding for smaller screens */
    }
}

.bg-custom-btn i {
    margin-right: 5px;
}

#vitrine-form>h4 {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 36px;
    line-height: 41px;
    /* identical to box height, or 102% */
    color: #202124;
}

#vitrine-form>div>label,
#vitrine-form>div.row>div>div>label,
#vitrine-form>div>div>label {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 41px;
    color: #202124;
}

#vitrine-btn {
    background: #0369A1 !important;
    border-radius: 50px !important;
    font-family: 'Jost' !important;
    font-style: normal !important;
    font-weight: 700 !important;
    font-size: 20px !important;
    line-height: 20px !important;
    color: #FFFFFF !important;
    padding: 20px 75px !important;
}

.info-text {
    font-family: 'Poppins';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    color: #2D3748;
}

.filepond--drop-label {
    /* Button/btn-basic */
    box-sizing: border-box;
    background: rgba(3, 105, 161, 0.05);
    border: 2.05px dashed #0369A1;
    border-radius: 13.7593px;
}

.filepond--drop-label label {
    font-family: 'Outfit';
    font-style: normal;
    font-weight: 500;
    font-size: 20px;
    line-height: 25px;
    color: #0369A1;
}

.filepond--drop-label i {
    color: #0369A1;
}

.entreprise-logo img {
    width: 92.44px;
    height: 92.44px;
    background: #FFFFFF;
    border: 0.320985px solid rgba(28, 28, 30, 0.08);
    border-radius: 10.2715px;
}

#inbox-btn.active {
    background-color: #f5f5f5;
    border-bottom: 7px solid #0369A1 !important;
}

#sent-btn.active {
    background-color: #f5f5f5;
    border-bottom: 7px solid #0369A1 !important;
}
</style>
@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center justify-content-center">
                <h3>Vitrine d'entreprise</h3>
            </div>
            <div class="d-flex align-items-center">
                <a href="/candidat-offers" class="bg-back-btn mr-2">
                    <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                    Retour
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box p-4">
                        <div class="widget-content">
                            <div class="row">

                                <div class="col-12">
                                    @if(!isset($entreprise->cover))
                                    <img src="https://placehold.co/900X229" alt="" style="border-radius: 15px">
                                    @else
                                    <img src="{{ asset('storage'.$entreprise->cover) }}" alt=""
                                        style="border-radius: 15px; width: 900px; height: 200px">
                                    @endif
                                </div>

                                <div class="col-12 mb-4">
                                    <div class="logo-container">
                                        <img class="img-fluid vitrine-logo"
                                        src="{{isset($entreprise->logo) ? asset('storage'.$entreprise->logo) : '' }}"
                                        alt="logo">
                                    </div>
                                </div>

                                <div class="col-12 mt-2 mb-1">

                                    <p class="">{{ $entreprise->domiciliation }}, {{ $entreprise->siege_social }}</p>
                                    <ul class="list-unstyled text-dark">
                                        <li>Date de création : {{ $entreprise->date_creation }}</li>
                                        <!-- <li>{{ $entreprise->domiciliation }}</li> -->
                                        <li>Valeurs fortes : {{ $entreprise->valeurs_fortes }}</li>
                                        <li>Nombre d'implantations : {{ $entreprise->nombre_implementations }}</li>
                                        <li>Fondateurs : {{ $entreprise->fondateurs }}</li>
                                        <li>Chiffre d'affaires : {{ $entreprise->chiffre_affaire }}</li>
                                    </ul>
                                </div>

                                <div class="col-12 mt-5">
                                    <h4 class="text-dark">Offres d'emploi</h4>
                                    <div class="row">
                                        @php
                                        use Carbon\Carbon;
                                        @endphp
                                        @foreach($offres as $key => $offre)
                                        <div class="col-6 my-2">
                                            <div class="card" style="height:100%;">
                                                <div class="card-body d-flex ">
                                                    <div class="entreprise-logo">
                                                        <img src="{{asset('storage'.getEntrepriseByUserID($offre->user_id)->logo)}}"
                                                            alt="" class="mr-2">
                                                    </div>
                                                    <div class="content">
                                                        <div class="text-dark">
                                                            <h4 class="text-dark">{{ $offre->job_title }}</h4>
                                                        </div>
                                                        <div class="text-dark">
                                                            {{ getEntrepriseByUserID($offre->user_id)->domiciliation }}
                                                        </div>
                                                        <div class="text-dark">
                                                            {{ getEntrepriseByUserID($offre->user_id)->siege_social }}
                                                        </div>
                                                        <div class="text-dark">
                                                            Il y a
                                                            {{  now()->diffInDays(Carbon::parse($offre->created_at)) }}
                                                            jours
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-12 py-4 mt-5">
                                    <button type="button" class="btn active" id="inbox-btn">Images</button>
                                    <button type="button" class="btn" id="sent-btn">Vidéos</button>
                                </div>

                                <div class="images-container">
                                    <div class="row">
                                        @foreach(json_decode($entreprise->photos_locaux) as $key => $photo)
                                        <div class="col-3">
                                            <img src="{{ asset('storage/'.$photo) }}" alt="">
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                                <div class="video-container" style="display: none">
                                    <video width="320" height="240" controls
                                        src="{{ isset($entreprise) ? asset('storage/'. $entreprise->video) : '' }}">
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

    $('#inbox-btn').on('click', function() {
        $('.images-container').show();
        $('.video-container').hide();
        // add active class to the clicked button
        $(this).addClass('active');
        $('#sent-btn').removeClass('active');
    })

    $('#sent-btn').on('click', function() {
        $('.images-container').hide();
        $('.video-container').show();
        // add active class to the clicked button
        $(this).addClass('active');
        // remove active class from inbox button
        $('#inbox-btn').removeClass('active');
    })
})
</script>
@endpush