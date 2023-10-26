@extends('layouts.app')

@section('content')
<div class="page-template-content page-parrainage">
    <section class="banner-section-four"
        style="background-image: url(https://bigplace.fr/uploads/0000/1/2023/06/12/homepage-4-banner3.png);">
        <div class="auto-container">
            <div class="content-box">
                <div class="title-box wow fadeInUp" data-wow-delay="500ms">
                    <h3>Parrainez un filleul et bénéficiez <br>d'une offre exceptionnelle !</h3>
                    <br>
                    <p class="right" style="font-size:36px;"><strong>Bénéficiez d'une vitrine gratuite ou d'une
                            remise<br><br> en parrainant une entreprise<strong></p>
                    <br>
                </div>

            </div>
        </div>
        <div id="formulaire"></div>
    </section>

    <div class="auto-container">
        <div class="content-box">
            <div class="job-search-form wow fadeInUp" data-wow-delay="1000ms">

                <div class="contact-form default-form">
                    <center>
                        <p style="font-size: 36px" color="#fff">
                            <font color="#fff">Devenir Parrain</font>
                        </p></span>
                        <form method="post" action="" class="bravo-contact-block-form">


                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <div class="response"></div>
                                </div>
                                <br>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label>Nom de l'entreprise filleul</label>
                                    <input type="text" name="nomentreprisefilleul" id="nomentreprisefilleul"
                                        class="username" placeholder="Nom de l entreprise filleul*" required>
                                </div>

                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <label>Téléphone</label>
                                    <input type="text" name="telephonefilleul" id="telephonefilleul" class="username"
                                        minlength="10" maxlength="10" placeholder="Téléphone* 06... " required>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <label>Votre E-mail</label>
                                    <input type="email" name="emailfilleul" id="emailfilleul" class="email"
                                        placeholder="Email*" required>
                                </div>

                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <label>Nom</label>
                                    <input type="text" name="nomfilleul" id="nomfilleul" class="username"
                                        placeholder="nom*" required>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <label>Prénom</label>
                                    <input type="text" name="prenomfilleul" id="prenomfilleul" class="username"
                                        placeholder="prénom" required>
                                    <br><br>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <label>Nom de l'entreprise Parraine</label>
                                    <input type="text" name="nomentrepriseparrain" id="nomentrepriseparrain"
                                        class="username" placeholder="Nom de l entreprise parraine*" required>
                                </div>

                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <label>Téléphone</label>
                                    <input type="text" name="telephoneparrain" id="telephoneparrain" class="username"
                                        minlength="10" maxlength="10" placeholder="Téléphone* 06... "
                                        placeholder="Téléphone*" required>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <label>Votre E-mail</label>
                                    <input type="email" name="emailparrain" id="emailparrain" class="email"
                                        placeholder="Email*" required>
                                </div>

                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <label>Nom</label>
                                    <input type="text" name="nomparrain" id="nomparrain" class="username"
                                        placeholder="nom*" required>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <label>Prénom</label>
                                    <input type="text" name="prenomparrain" id="prenomparrain" class="username"
                                        placeholder="prénom" required>
                                </div>




                                <div class="col-lg-12 col-md-12 col-sm-12 form-group m-0"> <br>
                                    <button type="submit" class="theme-btn btn-style-one">
                                        Parrainer
                                        <!-- <i class="fa fa-spinner fa-pulse fa-fw"></i>--><i class="fa fa-rocket"></i>
                                    </button>
                                </div>
                                <div class="col-sm-12 mt-3">
                                    <div class="form-mess"></div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <div class=" p-0">
        <div class="auto-container">
            <div class="bravo-text text-box">
                <div class="section2">
                    <div class="text-center laptop:container">
                        <div class="sec-title text-center">
                            <h2><span style="color:#004f5c;">Bienvenue chez </span><span class="circle-primary">BIG
                                    PLACE</span></h2>
                        </div>
                        <p>Vous cherchez à recruter mais vous avez la sensation de perdre beaucoup de temps dans
                            des tâches chronophages ? Vous ne trouvez pas les talents qu'il vous faut ? Gagnez
                            du temps en optant pour notre solution digitale tout-en-un ! BIG PLACE est la
                            solution qui va faciliter votre processus de recrutement et vous permettra de
                            trouver les talents qu'il vous faut grâce à son moteur de recherche intelligent !
                            Toutes les fonctionnalités les plus abouties sont à votre disposition pour une
                            gestion de candidatures simplifiée ! </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="testimonial-section-three">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title text-center">
                <h2>Qu&#039;est ce que le parrainage m&#039;offre</h2>
                <div class="text">chez BIG PLACE ?</div>
            </div>

            <div class="">
                <div class="">
                    <div class="slide-item">
                        <div class="image-column">
                            <figure class="image">
                                <img src="https://bigplace.fr/uploads/0000/1/2023/06/28/bigplace-parrain.jpg" alt="">
                            </figure>
                        </div>
                        <div class="content-column">
                            <!--Testimonial Block -->
                            <div class="testimonial-block-three">
                                <div class="inner-box">
                                    <h3 class="title">Bénéficiez d&#039;une offre avantageuse !</h3>
                                    <div class="text">
                                        Vous avez la possibilité de parrainer une entreprise de votre choix afin
                                        de bénéficier :
                                        <br><br>
                                        - soit d'une remise de 359 € HT sur le prix de votre abonnement annuel
                                        (cumulable 5 fois), si vous êtes déjà client
                                        <br><br>
                                        - soit de votre vitrine entreprise entièrement gratuite, à la
                                        souscription, afin de valoriser votre marque employeur auprès des
                                        candidats !
                                        <br><br>
                                        La vitrine entreprise vous permet d'expliquer quelles sont les valeurs
                                        et la culture de votre entreprise, vos attentes, d'intégrer des vidéos
                                        et photos afin de séduire les meilleurs talents ! Il s'agit d'un
                                        véritable atout qui permettra de mettre en avant votre marque employeur
                                        et d'être visible auprès de tous les candidats.

                                    </div>
                                    <div class="info-box">
                                        <h4 class="name"></h4>
                                        <span class="designation"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class=" p-0">
        <div class="auto-container">
            <div class="bravo-text text-box">
                <h2 class="title is-2 spaced text-center" style="text-align:center;font-size:40px;">Comment
                    parrainer <span style="color:#ff8c00;">votre filleul ?</span></h2>
            </div>
        </div>
    </div>
    <!-- About Section -->
    <section class="about-section-two">
        <div class="auto-container">
            <div class="row">
                <!-- Content Column -->

                <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                    <div class="inner-column wow fadeInRight">
                        <h2 class="about-title" style="font-size:34px; color:#ff8c00">Une simple recommandation
                            suffit.</h2>
                        <div class="sec-content">
                            <p class="mb-4"
                                style="margin:0px 0px 1rem;color:#838384;font-family:Circular, 'ui-sans-serif', 'system-ui', '-apple-system', BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';font-size:20px;background-color:#ffffff;text-align:justify;">
                            </p>
                            <p class="mb-4"
                                style="margin:0px 0px 1rem;color:#838384;font-family:Circular, 'ui-sans-serif', 'system-ui', '-apple-system', BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';font-size:20px;background-color:#ffffff;text-align:justify;">
                                <span
                                    style="color:#004f5c;font-family:Jost, Helvetica, Arial, sans-serif;text-align:center;">Deux
                                    choix possibles : </span>
                            </p>
                            <p class="mb-4"
                                style="margin:0px 0px 1rem;color:#838384;font-family:Circular, 'ui-sans-serif', 'system-ui', '-apple-system', BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';font-size:20px;background-color:#ffffff;text-align:justify;">
                                <span
                                    style="color:#004f5c;font-family:Jost, Helvetica, Arial, sans-serif;text-align:center;">Vous
                                    remplissez le formulaire ci-dessus en renseignant tous les champs afin que
                                    nous contactions votre filleul pour lui présenter notre solution de
                                    recrutement</span>
                            </p>
                            <p class="mb-4"
                                style="margin:0px 0px 1rem;color:#838384;font-family:Circular, 'ui-sans-serif', 'system-ui', '-apple-system', BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';font-size:20px;background-color:#ffffff;text-align:justify;">
                                <span
                                    style="color:#004f5c;font-family:Jost, Helvetica, Arial, sans-serif;text-align:center;">Ou</span>
                            </p>
                            <p class="mb-4"
                                style="margin:0px 0px 1rem;color:#838384;font-family:Circular, 'ui-sans-serif', 'system-ui', '-apple-system', BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';font-size:20px;background-color:#ffffff;text-align:justify;">
                                <span
                                    style="color:#004f5c;font-family:Jost, Helvetica, Arial, sans-serif;text-align:center;">Vous
                                    demandez à votre filleul de nous contacter et de nous communiquer le nom de
                                    votre entreprise et votre nom lors de la souscription à notre solution afin
                                    que vous puissiez bénéficier de votre offre.</span>
                            </p>
                        </div>
                        <a href="#formulaire" class="theme-btn btn-style-two "><span class="btn-title">Je
                                parraine</span></a>
                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <figure class="image-box wow fadeInLeft">
                        <img src="https://bigplace.fr/uploads/0000/1/2023/06/28/parrainage11.jpg" alt="about">
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->
    <div class=" p-0">
        <div class="auto-container">
            <div class="bravo-text text-box">
                <h2 class="title is-2 spaced mx-auto max-w-screen-laptop text-center"><span
                        style="text-align:center;font-size:40px;color:#ff8c00;">Les conditions à respecter
                        pour</span> <span style="text-align:center;font-size:40px;color:#004f5c;"> bénéficier de
                        votre offre de parrainage chez </span><span
                        style="text-align:center;font-size:40px;color:#ff8c00;">BigPlace</span></h2>
            </div>
        </div>
    </div>
    <section class="process-section pt-0">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2></h2>
                <div class="text"></div>
            </div>

            <div class="row wow fadeInUp">
                <div class="process-block col-lg-4 col-md-6 col-sm-12">
                    <div class="icon-box"><img src="https://bigplace.fr/uploads/0000/1/2023/06/23/1.png"
                            alt="Le filleul doit disposer d’une société immatriculée et active (non radiée).">
                    </div>
                    <h4>Le filleul doit disposer d’une société immatriculée et active (non radiée).</h4>
                </div>
                <div class="process-block col-lg-4 col-md-6 col-sm-12">
                    <div class="icon-box"><img src="https://bigplace.fr/uploads/0000/1/2023/06/23/2.png"
                            alt="Le filleul doit souscrire un pack de 6 mois minimum."></div>
                    <h4>Le filleul doit souscrire un pack de 6 mois minimum.</h4>
                </div>
                <div class="process-block col-lg-4 col-md-6 col-sm-12">
                    <div class="icon-box"><img src="https://bigplace.fr/uploads/0000/1/2023/06/23/3.png"
                            alt="Le parrain doit souscrire un pack de 12 mois minimum."></div>
                    <h4>Le parrain doit souscrire un pack de 12 mois minimum.</h4>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Action Three -->
    <section class="call-to-action-three">
        <div class="auto-container">
            <div class="outer-box">
                <div class="sec-title">
                    <center>
                        <h2 style="color:#ff8c00;">Remarques :</h2>
                    </center>
                    <div class="text" style="font-size:20px; color:#004f5c; line height:400;">
                        <center>Bénéficiez d'une remise totale de 1795 € HT sur votre abonnement annuel en
                            parrainant jusqu'à 5 filleuls (limité à 5 maximum par an).</center>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Call To Action -->
    <div class=" p-0">
        <div class="auto-container">
            <div class="bravo-text text-box">

            </div>
        </div>
    </div>
    <div class=" p-0">
        <div class="auto-container">
            <div class="bravo-text text-box">
                <h2 class="title is-2 spaced mx-auto max-w-screen-laptop text-center"><span
                        style="text-align:center;font-size:40px;color:#004f5c;"><span style="color:#ff8c00;">Proposer
                            mes</span></span><span style="text-align:center;font-size:40px;color:#004f5c;"> premiers
                        filleuls</span></h2>
            </div>
        </div>
    </div>
    <section class="steps-section pt-0">
        <div class="auto-container">
            <div class="row">
                <div class="image-column col-lg-6 col-md-12 col-sm-12 order-2">
                    <div class="inner-column">
                        <figure class="image"><img src="https://bigplace.fr/uploads/0000/1/2023/06/28/parrainage2.jpg"
                                alt="">
                        </figure>
                        <!-- Count Employers -->
                        <div class="count-employers wow fadeInUp">
                        </div>
                    </div>
                </div>

                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column2 wow fadeInUp">
                        <div class="sec-title">
                            <h2 style="color: #ff8c00;"></h2>
                            <center>
                                <div class="text">Comment trouver vos premiers filleuls</div>
                            </center>
                            <ul class="steps-list">
                                <ul class="list-style-one">
                                    <li><span class="count">1</span> Echangez parmi votre r&eacute;seau, vos
                                        filiales, vos partenaires et fournisseurs</li>
                                    <li><span class="count">2</span> Relayez votre exp&eacute;rience sur vos
                                        r&eacute;seaux sociaux</li>
                                    <li><span class="count">3&nbsp;</span>Parlez de BIG PLACE lors de vos
                                        s&eacute;minaires, conf&eacute;rences ou r&eacute;unions d'affaires</li>
                                </ul>
                            </ul>

                            <p>
                                <center>
                                    <div class="btn-box">
                                        <a href="#formulaire" class="theme-btn btn-style-two bg-blue"><span
                                                class="btn-title">Je parraine</span></a>
                                    </div>
                                </center>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class=" p-0">
        <div class="auto-container">
            <div class="bravo-text text-box">
                <h2 class="title is-2 spaced mx-auto max-w-screen-laptop text-center"><span
                        style="text-align:center;font-size:40px;color:#ff8c00;">Une question ? <span
                            style="color:#34495e;">Un conseiller vous répond !</span></span></h2>
                <p style="text-align:center;"><span style="font-size:18pt;"><strong><span style="color:#34495e;">Vous
                                pouvez nous contacter</span> </strong>: <span style="color:#f29d12;"><strong>06 12 37 87
                                77</strong></span></span></p>
                <p> </p>
            </div>
        </div>
    </div>

    <div class="bravo-faq-lists faqs-section p-0">
        <div class="auto-container">
            <!-- <h3 class="title"></h3>-->

            <style>
            }

            .faq_header-title {
                font-size: 24px;
                color: #FF8C00;
                margin-bottom: 30px;
            }

            .faq__panel {
                padding: 7px 21px;
                margin-bottom: 24px;
                background: #CCD6E0;
                border: 1px solid #CCD6E0;
                ;
                border-radius: 7px;
            }

            .faq__label {
                padding-block: 7px;
                color: #FF8C00;
                FONT-WEIGHT: 600;
                font-size: 24px;

                cursor: pointer;
            }

            .faq__panel-answer {
                color: #202124;
                text-align: justify;
                padding-top: 5px;
                padding-bottom: 7px;
            }

            .page-title h1 {
                position: relative;
                display: block;
                font-weight: 500;
                font-size: 45px;
                line-height: 41px;
                text-align: center;
                color: #004f5d;
                margin-bottom: 10px;
            }
            </style>


            <section class="faq container" aria-level="Frequently Asked Questions">
                <header class="faq_header">
                    <center>
                        <h2 class="faq_header-title">
                            <font color="#FF8C00"><strong>F.A.Q parrainage</strong></font>
                        </h2>
                    </center>
                </header><br><br>


                <details aria-expanded="true" class="faq__panel" open>
                    <summary class="faq__label">Comment faire pour parrainer un filleul ?</summary>
                    <div class="faq__panel-body">
                        <p class="faq__panel-answer">Il vous suffit de renseigner le formulaire ci-dessus en
                            inscrivant vos coordonnées ainsi que celui de votre filleul ; nous le recontacterons
                            de votre part afin de lui proposer notre solution tout-en-un !
                    </div>
                </details>

                <details aria-expanded="false" class="faq__panel">
                    <summary class="faq__label">Quelle est l'offre à laquelle j'ai le droit ?</summary>
                    <div class="faq__panel-body">
                        <p class="faq__panel-answer">En parrainant un filleul vous aurez le choix entre deux
                            options soit bénéficier de votre vitrine Entreprise gratuite vous permettant de
                            valoriser votre entreprise auprès de tous les candidats soit de bénéficier d'une
                            remise de 359 € HT sur votre abonnement annuel.
                    </div>
                </details>

                <details aria-expanded="false" class="faq__panel">
                    <summary class="faq__label">Quelles sont les conditions pour bénéficier de l'offre de
                        parrainage ?</summary>
                    <div class="faq__panel-body">
                        <p class="faq__panel-answer">
                            - Le filleul doit disposer d'une soci&eacute;t&eacute; en activit&eacute; et
                            immatricul&eacute;e en France&nbsp;<br>
                            - Le filleul doit souscrire un pack de 6 mois minimum<br>
                            - Le parrain doit souscrire un pack de 12 mois minimum
                            </ul>
                    </div>
                </details>

                <details aria-expanded="false" class="faq__panel">
                    <summary class="faq__label">Combien de filleul puis-je parrainer ?</summary>
                    <div class="faq__panel-body">
                        <p class="faq__panel-answer">Vous pouvez parrainer jusqu'à 5 filleuls par an maximum sur
                            la base de votre abonnement annuel, ce qui vous permettra de bénéficier de 1795 € HT
                            de remise au total !
                    </div>
                </details>

                <details aria-expanded="false" class="faq__panel">
                    <summary class="faq__label">Quand vais-je bénéficier de l'offre de parrainage ?</summary>
                    <div class="faq__panel-body">
                        <p class="faq__panel-answer">Si vous parrainez votre filleul dès de la souscription de
                            notre offre, vous bénéficierez de l'offre immédiatement, en revanche, si vous
                            parrainez votre filleul après la souscription, vous bénéficierez de votre remise de
                            359 € HT le mois suivant le parrainage.
                    </div>
                </details>

        </div>
        </section>

        <!--  -->
    </div>
</div><br><br><br>
@endsection