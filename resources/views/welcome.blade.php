@extends('layouts.app')

@push('styles')
@endpush

@section('content')
<div class="page-template-content page-deja-inscrit">
    <section class="page-title " style="background-color: ">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Déjà connecté ou inscrit sur BIG PLACE</h1>
                <ul class="page-breadcrumb">
                    <li><a href="https://bigplace.fr">Accueil</a></li>
                    <li>Vous êtes déjà connecté !</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- About Section -->
    <section class="about-section-two">
        <div class="auto-container">
            <div class="row">
                <!-- Content Column -->

                <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                    <div class="inner-column wow fadeInRight">
                        <h2 class="about-title" style="font-size:34px; color:#ff8c00">Vous êtes déjà connecté !
                        </h2>
                        <div class="sec-content">
                            <p><strong>Vous faîtes déjà parti de nos membres BIG PLACE ! </strong></p>
                        </div>
                        <a href="https://bigplace.fr/user/dashboard" class="theme-btn btn-style-two "><span
                                class="btn-title">Visiter mon tableau de bord</span></a>
                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <figure class="image-box wow fadeInLeft">
                        <img src="https://bigplace.fr/uploads/0000/1/2023/06/23/istockphoto-1281150061-612x612.jpg"
                            alt="about">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->

</div>
@endsection