@extends('layouts.app')
@push('styles')
<style>
.card-title {
    background-color: #0000FF !important;
    position: relative;
    padding: 20px;
    top: -40px;
    color: white;
    border-top-left-radius: 50px;
    border-top-right-radius: 0px;
    border-bottom-left-radius: 25px;
    border-bottom-right-radius: 50px;
    letter-spacing: 5px;
}

.action-btn {
    background-color: #0000FF !important;
}

.subtitle {
    font-weight: 100;
    font-size: 16px;
    letter-spacing: 2px;
}
</style>
@endpush
@section('content')
<div class="page-template-content page-a-propos pb-5 mb-5">
    <section class="page-title " style="background-color: ">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Nos Plans</h1>
                <ul class="page-breadcrumb">
                    <li><a href="https://bigplace.fr">Accueil</a></li>
                    <li>Nos Plans</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section-two">
        <div class="auto-container px-5">
            <div class="row">
                <div class="col-4">
                    <div class="card h-100">
                        <div class="card-body px-0">
                            <h5 class="card-title text-center">
                                Pack Starter
                                <div class="subtitle">Durée 1 à 3 mois</div>
                            </h5>
                            <div class="details px-5">
                                <div class="price">
                                    <ul class="">
                                        <li>449 € HT / mois SANS ENGAGEMENT</li>
                                    </ul>    
                                </div>
                                <div class="text-center mt-3">
                                    <a href="#" class="btn btn-primary action-btn">En savoir plus</a>
                                </div>
                                <div class="text-center mt-3">
                                    <a href="#" class="btn btn-primary action-btn">Commander</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card h-100">
                        <div class="card-body px-0">
                            <h5 class="card-title text-center">
                                Pack Bronze
                                <div class="subtitle">Durée : 1 à 3 mois</div>
                            </h5>
                            <div class="details px-5">
                                <div class="price">
                                    <ul class="">
                                        <li>404 € HT / mois (payable en une seule fois)</li>
                                        <li>359 € votre VITRINE ENTREPRISE payable une seule fois  </li>
                                    </ul>    
                                </div>
                                <div class="text-center mt-3">
                                    <a href="#" class="btn btn-primary action-btn">En savoir plus</a>
                                </div>
                                <div class="text-center mt-3">
                                    <a href="#" class="btn btn-primary action-btn">Commander</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card h-100">
                        <div class="card-body px-0">
                            <h5 class="card-title text-center">
                                Pack Gold
                                <div class="subtitle">Durée : 6 mois</div>
                            </h5>
                            <div class="details px-5">
                                <div class="price">
                                    <ul class="">
                                        <li>359 € HT / mois (payable en une seule fois)</li>
                                        <li>459 € votre VITRINE ENTREPRISE</li>
                                        <li>DIFFUSION DE VOS FORMATIONS ET JOBDATINGS payable une seule fois</li>
                                    </ul>
                                </div>
                                <div class="text-center mt-3">
                                    <a href="#" class="btn btn-primary action-btn">En savoir plus</a>
                                </div>
                                <div class="text-center mt-3">
                                    <a href="#" class="btn btn-primary action-btn">Commander</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->


</div>
@endsection