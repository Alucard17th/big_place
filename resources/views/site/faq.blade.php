@extends('layouts.app')

@section('content')
<div class="page-template-content page-faq">
    <section class="page-title bg_color" style="background-color: transparent">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Foire aux questions Employeurs &amp; candidats</h1>
                <ul class="page-breadcrumb">
                    <li><a href="https://bigplace.fr">Accueil</a></li>
                    <li>Questions fréquentes</li>
                </ul>
            </div>
        </div>
    </section>
    <div class="bravo-faq-lists faqs-section p-0">
        <div class="auto-container">

            <style>
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
                    <h2 class="faq_header-title" color="#FF8C00">
                        <font color="#004f5d">Questions & Réponses pour les candidats</font>
                    </h2>
                </header><br><br>
                <div class="faq__body">
                    <details aria-expanded="true" class="faq__panel" open>
                        <summary class="faq__label">A qui s’adresse BIG PLACE ?</summary>
                        <div class="faq__panel-body">
                            <p class="faq__panel-answer">BIG PLACE s’adresse aux personnes recherchant un emploi
                                en CDI, CDD, un stage ou un contrat d’alternance.</p>
                        </div>
                    </details>
                    <details aria-expanded="false" class="faq__panel">
                        <summary class="faq__label">Est-ce-que BIG PLACE est gratuit ?</summary>
                        <div class="faq__panel-body">
                            <p class="faq__panel-answer">Oui, BIG PLACE est totalement gratuit et à vie ! Vous
                                pourrez bénéficiez de tous les avantages de la solution digitale sans limite !
                            </p>
                        </div>
                    </details>
                    <details aria-expanded="false" class="faq__panel">
                        <summary class="faq__label">Comment m’inscrire ?</summary>
                        <div class="faq__panel-body">
                            <p class="faq__panel-answer">C’est simple ! Il vous suffit de renseigner votre nom,
                                prénom et numéro de téléphone pour être joignable par les employeurs et valider
                                votre inscription ;
                                une fois effectuée vous recevrez un email de confirmation pour vous indiquer que
                                votre inscription est validée.
                                Vous pourrez ensuite vous rendre sur votre espace candidats ; afin de pouvoir
                                utiliser toutes les fonctionnalités vous devrez télécharger votre CV.</p>
                        </div>
                    </details>
                    <details aria-expanded="false" class="faq__panel">
                        <summary class="faq__label">Quels sont les avantages de BIG PLACE ?</summary>
                        <div class="faq__panel-body">
                            <p class="faq__panel-answer">BIG PLACE vous permet d’être visible par toutes les
                                entreprises qui recrutent, de vous constituer une fiche candidat vous valorisant
                                auprès des entreprises,
                                de postuler aux offres d’emplois les plus récentes, de bénéficier d'un moteur de
                                recherche intelligent faisant matcher votre profil aux postes proposés par les
                                entreprises,
                                d'être informé(e) de tous les évènements à venir et de profiter de nombreuses
                                fonctionnalités supplémentaires !</p>
                        </div>
                    </details>
                    <details aria-expanded="false" class="faq__panel">
                        <summary class="faq__label">Puis je modifier ou supprimer mes données ?</summary>
                        <div class="faq__panel-body">
                            <p class="faq__panel-answer">Vous pourrez tout à fait modifier ou supprimer vos
                                données selon les dispositions de la loi informatique et libertés ; vous êtes
                                donc libre de retirer ou modifier vos données à tout moment.</p>
                        </div>
                    </details>
                </div>

            </section>

            <br><br>
            <section class="faq container" aria-level="Frequently Asked Questions">
                <header class="faq_header">
                    <h2 class="faq_header-title">
                        <font color="#004f5d">Questions & Réponses pour les employeurs</font>
                    </h2>
                </header><br><br>
                <div class="faq__body">
                    <details aria-expanded="true" class="faq__panel" open>
                        <summary class="faq__label">A qui s’adresse BIG PLACE ?</summary>
                        <div class="faq__panel-body">
                            <p class="faq__panel-answer">BIG PLACE s’adresse aussi bien aux TPE, PME qu’aux
                                grands comptes cherchant à recruter des candidats pour répondre à des besoins
                                ponctuels ou récurrents et souhaitant diffuser des offres d’emplois sur les
                                différents jobboards.</p>
                        </div>
                    </details>
                    <details aria-expanded="false" class="faq__panel">
                        <summary class="faq__label">Comment fonctionne BIG PLACE ?</summary>
                        <div class="faq__panel-body">
                            <p class="faq__panel-answer">BIG PLACE est une solution digitale tout en un SANS
                                ENGAGEMENT comprenant de nombreuses fonctionnalités intelligentes vous
                                permettant de multidiffuser vos offres et de suivre vos candidatures facilement
                                grâce à un outil de gestion des candidatures simple et intuitif.

                                Les prix sont dégressifs en fonction de la durée de souscription de manière à
                                vous proposer une solution adaptable en fonction de vos besoins du moment !</p>
                        </div>
                    </details>
                    <details aria-expanded="false" class="faq__panel">
                        <summary class="faq__label">Comment m’inscrire ?</summary>
                        <div class="faq__panel-body">
                            <p class="faq__panel-answer">C’est simple ! Il vous suffit de renseigner le nom de
                                votre entreprise, l’adresse postale de la société, votre adresse email
                                et votre numéro de téléphone pour vous identifier et valider votre inscription ;
                                une fois effectuée vous recevrez un email de confirmation pour vous indiquer que
                                votre inscription est validée.
                                Vous pourrez ensuite vous rendre sur votre espace recruteur et afin de pouvoir
                                utiliser toutes les fonctionnalités vous devrez choisir le plan qui vous
                                convient le mieux.</p>
                        </div>
                    </details>
                    <details aria-expanded="false" class="faq__panel">
                        <summary class="faq__label">Quels sont les avantages de BIG PLACE ?</summary>
                        <div class="faq__panel-body">
                            <p class="faq__panel-answer">BIG PLACE vous permet de diffuser vos offres d’emploi
                                sur plusieurs jobboards gratuits et payants (au choix) et collecter un maximum
                                de CV pour votre recrutement,
                                de bénéficier d’un moteur de recherche intelligent qui fera matcher vos offres
                                d’emplois avec les profils des candidats qui correspondent à vos besoins,
                                de valoriser votre marque entreprise, de rentrer en contact direct avec les
                                candidats, de bénéfiier d'un suivi de candidature simplifiée et de nombreuses
                                autres fonctionnalités avancées !</p>
                        </div>
                    </details>
                    <details aria-expanded="false" class="faq__panel">
                        <summary class="faq__label">Puis je travailler en mode collaboratif avec BIG PLACE
                        </summary>
                        <div class="faq__panel-body">
                            <p class="faq__panel-answer">Oui tout à fait ! BIG PLACE a été étudié pour vous
                                permettre d’administrer le ou les comptes de vos collaborateurs ou collègues ;
                                ainsi au sein d’une même structure, vous pourrez suivre en commun un process de
                                recrutement pour plus d’effcacité !</p>
                        </div>
                    </details>
                </div>
                <details aria-expanded="false" class="faq__panel">
                    <summary class="faq__label">Puis je modifier ou supprimer mes données ?</summary>
                    <div class="faq__panel-body">
                        <p class="faq__panel-answer">Vous pourrez tout à fait modifier ou supprimer votre compte
                            selon les dispositions de la loi informatique et libertés ; vous êtes donc libre de
                            supprimer ou modifier votre compte à tout moment.</p>
                    </div>
                </details>
        </div>
        </section>

    </div>
</div><br><br><br>
@endsection