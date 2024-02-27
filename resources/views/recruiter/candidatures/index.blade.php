@extends('layouts.dashboard')
@push('styles')
<link href="{{ asset('plugins/kanban/dist/jkanban.min.css') }}" rel="stylesheet">
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

    #ex1{
        max-width: 75vw !important;
        width: 75vw;
    }

    

    .kanban-board-header.coming{
        background-color: #fff;
    }
    .kanban-board-header.refused{
        background-color: #fff;
    }
    .kanban-board-header.done{
        background-color: #fff;
    }
    .kanban-board-header.waiting{
        background-color: #fff;
    }
    .kanban-board-header.reflection{
        background-color: #fff;
    }

    .kanban-title-board{
        color:#000;
    }

    .kanban-board .kanban-drag {
        padding:5px !important;
        background: #fbfbfb !important;
    }

    .kanban-item{
        border: 1px solid #dee2e6 !important;
        border-radius: 5px !important;
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
                            <h3>Gestion des candidatures</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('recruiter.dashboard') }}" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                        </div>
                    </div>
                    
                    <div class="tabs-box">
                        <h5 class="pl-5">{{$offre->job_title}}</h5>
                        <!-- SEARCH FORM -->
                        <div id="demo1" class="py-5" style="overflow-x: auto;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="ex1" class="modal">
        <div class="row">
            <div class="col-6">
                <div class="ex-content"></div>
            </div>
            
            <div class="col-6">
                <div class="ex-content2">
                    <div class="row">
                        <div class="col-12 d-flex">
                            <!-- <a type="button" class="bg-btn-three proposez-rdv mr-2">Proposez un rendez-vous</a> -->
                            <!-- <button class="bg-btn-nine see-profile text-left mr-2" data-url="" data-cvid="">Consulter le CV</button> -->
                            <!-- <a href=""  type="button" class="bg-btn-seven px-4">Tchatter</a> -->
                        </div>
                    </div>
                    
                    <div class="container mt-5">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Rendez-vous</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Echanges RH</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <h2>Rendez-vous</h2>
                                        <hr>
                                        <div class="ex-rdv-content pt-5"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <h2>Echanges RH</h2>
                                        <hr>
                                        <div class="ex-avis-candidature-content pt-5">
                                            <textarea class="form-control" name="commentaire" id="commentaire" cols="30" rows="2" placeholder="Ajouter un commentaire..."></textarea>
                                            <button type="button" class="bg-btn-five mt-3 px-4">Ajouter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <a href="#" class="custom-close-modal"></a>
    </div>

    <div id="ex-rdv" class="modal">
        <form action="{{route('recruiter.invite.candidates')}}" method="POST" id="rdv-form">
            @csrf
            <div class="form-group d-flex align-items-center justify-content-between">
                <h4 class="text-dark">Détails de rendez-vous :</h4>
                <a href="#" id="close-modal"><i class="las la-times" style="font-size: 30px;"></i></a>
            </div>
           
            <label for="candidate" class="text-dark">Type du rendez-vous</label>
            <div class="form-check align-items-center d-none">
                <input class="form-check-input" type="checkbox" value="" name="is_type_presentiel" id="is_type_presentiel">
                <label class="form-check-label ml-4" for="is_type_presentiel">
                    Présentiel
                </label>
                
            </div>
            <div class="form-check form-check d-none align-items-center">
                <input class="form-check-input" type="checkbox" value="" name="is_type_distanciel" id="is_type_distanciel">
                <label class="form-check-label ml-4" for="is_type_distanciel">
                    Distanciel
                </label>
            </div>


            <div class="form-group">
                <div class="choices d-flex">
                    <button type="button" class="bg-btn-visio mr-2 d-flex align-items-center"><i class="las la-video mr-2" style="font-size: 24px;"></i>Proposer Rdv visio</button>
                    <button type="button" class="bg-btn-physic mr-2">Proposer Rdv physique</button>
                </div>
            </div>

            <div class="form-group" id="address-div" style="display: none">
                <label class="text-dark" for="address">Adresse du rendez-vous</label>
                <input class="form-control mb-1" type="text" name="rdv_address" id="rdv_address">
            </div>

            <hr style="padding: 0px 0;background-color: rgb(0 0 0);">

            <div class="form-group">
                <label for="candidate" class="text-dark">Crénau 1:</label>
                <div class="row">
                    <div class="col-6">
                        <input class="form-control mb-1" type="date" name="crenau_1_date" id="crenau_1_date" required>
                    </div>
                    <div class="col-6">
                        <input class="form-control mb-1" type="time" name="crenau_1_time" id="crenau_1_time" required>
                    </div>
                </div>
                <p id="creanuea_1_msg" class="text-danger" style="font-size:18px;"></p>
            </div>

            <div class="form-group">
                <label for="candidate" class="text-dark">Crénau 2:</label>
                <div class="row">
                    <div class="col-6">
                    <input class="form-control mb-1" type="date" name="crenau_2_date" id="crenau_2_date" required>
                    </div>
                    <div class="col-6">
                    <input class="form-control mb-1" type="time" name="crenau_2_time" id="crenau_2_time" required>
                    </div>
                </div>
                <p id="creanuea_2_msg" class="text-danger" style="font-size:18px;"></p>
            </div>

            <div class="form-group">
                <label for="candidate" class="text-dark">Crénau 3:</label>
                <div class="row">
                    <div class="col-6">
                        <input class="form-control mb-1" type="date" name="crenau_3_date" id="crenau_3_date" required>
                    </div>
                    <div class="col-6">
                        <input class="form-control mb-1" type="time" name="crenau_3_time" id="crenau_3_time" required>
                    </div>
                </div>
                <p id="creanuea_3_msg" class="text-danger" style="font-size:18px;"></p>
            </div>

            <div class="form-group">
                <div class="alert alert-success alert-dismissible" style="display: none;">
                    <p id="success-msg">Les créneaux de rendez-vous pour le(s) candidat(s) ont été transmis avec succès.</p>
                </div>
            </div>

            <div class="form-group">
                <button class="theme-btn btn-style-one create-rdv px-5 py-3" type="button" style="font-size: 16px">Envoyer</button>
            </div>
            
       </form>
        <a href="#" class="custom-close-modal"></a>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>


<script src="{{ asset('plugins/kanban/dist/jkanban.min.js') }}"></script>

<script>
    $(document).ready(function() {
        // get the php array as json data
        const candidature = @json($candidatures);
        const offer = @json($offre);
        console.log(candidature);
        // from this array get objects where status is 'refused'
        // const coming = candidature.filter((candidature) => candidature.status === 'coming');
        const coming = candidature.filter((candidature) => candidature.status === 'coming').map((candidature) => ({
            id: candidature.id,
            title:'<img src="https://i.pravatar.cc/300" width="50" height="50" class="rounded-circle mr-2" />' 
            + candidature.user.name + '<br/>' 
            + candidature.title + '<br/>' 
            + 'Postulé le ' + new Date(candidature.created_at).toLocaleDateString('en-GB'),
            userid : candidature.user.id,
        }));

        const refused = candidature.filter((candidature) => candidature.status === 'refused').map((candidature) => ({
            id: candidature.id,
            title:'<img src="https://i.pravatar.cc/300" width="50" height="50" class="rounded-circle mr-2" />' 
            + candidature.user.name + '<br/>' 
            + candidature.title + '<br/>' 
            + 'Postulé le ' + new Date(candidature.created_at).toLocaleDateString('en-GB'),
            userid : candidature.user.id,
        }));

        const waiting = candidature.filter((candidature) => candidature.status === 'waiting').map((candidature) => ({
            id: candidature.id,
            title:'<img src="https://i.pravatar.cc/300" width="50" height="50" class="rounded-circle mr-2" />' 
            + candidature.user.name + '<br/>' 
            + candidature.title + '<br/>' 
            + 'Postulé le ' + new Date(candidature.created_at).toLocaleDateString('en-GB'),
            userid : candidature.user.id,
        }));

        const reflection = candidature.filter((candidature) => candidature.status === 'reflection').map((candidature) => ({
            id: candidature.id,
            title:'<img src="https://i.pravatar.cc/300" width="50" height="50" class="rounded-circle mr-2" />' 
            + candidature.user.name + '<br/>' 
            + candidature.title + '<br/>' 
            + 'Postulé le ' + new Date(candidature.created_at).toLocaleDateString('en-GB'),
            userid : candidature.user.id,
        }));

        const done = candidature.filter((candidature) => candidature.status === 'done').map((candidature) => ({
            id: candidature.id,
            title:'<img src="https://i.pravatar.cc/300" width="50" height="50" class="rounded-circle mr-2" />' 
            + candidature.user.name + '<br/>' 
            + candidature.title + '<br/>' 
            + 'Postulé le ' + new Date(candidature.created_at).toLocaleDateString('en-GB'),
            userid : candidature.user.id,
        }));

    var kanban1 = new jKanban({
        element:'#demo1',
        boards  :[
            {
                'id' : 'coming',
                'title'  : 'Entretiens programmés',
                'class' : 'coming',
                'item'  : coming
            },
            {
                'id' : 'done',
                'title'  : 'Entretiens effectués',
                'class' : 'done',
                'item'  : done
            },
            {
                'id' : 'refused',
                'title'  : 'Candidats refusés',
                'class' : 'refused',
                'item'  : refused
            },
            {
                'id' : 'waiting',
                'title'  : 'En attente de validation',
                'class' : 'waiting',
                'item'  : waiting
            },
            {
                'id' : 'reflection',
                'title'  : 'En réflection',
                'class' : 'reflection',
                'item'  : reflection
            }
        ],
        dropEl: function(el, target, source, sibling) {
            var sourceId = $(source).closest("div.kanban-board").attr("data-id"),
                targetId = $(target).closest("div.kanban-board").attr("data-id");
                candidatureId = $(el).attr("data-eid");
            if(source === target) {
                // same column
                console.log('Candidature : ', candidatureId)
                console.log('Target Status : ', targetId)
            } else {
                // different column
                console.log('Candidature : ', candidatureId)
                console.log('Target Status : ', targetId)
            }

            $.ajax({
                url: "{{route('recruiter.candidature.updateStatus')}}",
                type: "POST",
                data: {
                    candidatureId: candidatureId,
                    status: targetId,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    $('#email-title').text(data.subject);
                    $('#email-content').text(data.message);
                }
            })
        },
        click : function (el) {
            var candidatureId = $(el).attr("data-eid");
            var candidatureUserId = $(el).attr("data-userid");
            console.log("Candidature ID:", candidatureId);
            console.log("User ID:", candidatureUserId);
            $('.ex-content').empty();
            // $('.ex-content2').empty();
            $('.ex-rdv-content').empty();

            $.ajax({
                url: "/getUserCandidatures/" + candidatureUserId + "/" + candidatureId,
                type: "GET",
                success: function(data) {
                    console.log('data');
                    console.log(data);
                    let rdv = data.rdv[0];
                    data = data.curriculum[0];
                   
                    console.log(rdv);
                    let valeursArray = Array.isArray(data.valeurs) ? data.valeurs : JSON.parse(data.valeurs);

                    let htmlContent = `
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-12 text-center mb-5 pb-5 pt-2"><h2>Fiche Candidat</h2></div>
                                <div class="col-4 text-center">
                                    <img src="${data.avatar}" alt="" style="width: 200px; height: 200px;border-radius: 50%;">
                                </div>
                                <div class="col-8">
                                    <h4 class="mb-3">${data.nom} ${data.prenom}</h4>
                                    <ul class="list-unstyled">
                                        <li class="text-dark">${data.address != null ? data.address : ''} ${data.ville_domiciliation}</li>
                                        <li class="text-dark">Email : </li>
                                        <li class="text-dark">Télephone : ${data.phone}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="text-center">
                                        <h4 class="mb-3">${data.metier_recherche}</h4>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li>Niveau: ${data.niveau}</li>
                                        <li>Nombre d'années d'expérience: ${data.annees_experience} années</li>
                                        <li>Niveau d'études: ${data.niveau_etudes}</li>
                                        <li>Prétentions salariales (Ke): ${data.pretentions_salariales}</li>
                                        <li>Valeurs: ${valeursArray.join(', ')}</li>
                                    </ul>
                                </div>
                            </div>
                        
                        </div>`;

                    $('.ex-content').replaceWith(htmlContent);
                    // $('.ex-content2').replaceWith(htmlContent);

                    let rdvContent = `<div>
                        <div>Date : ${rdv.date} <div>
                        <div>Heure : ${rdv.heure}<div>
                        <div>Type : ${rdv.is_type_distanciel ? 'Distanciel' : 'Présentiel'}<div>
                        ${rdv.is_type_distanciel ? '' : '<div>Addresse : ' + rdv.address + '<div>'}
                    </div>`;
                    $('.ex-rdv-content').replaceWith(rdvContent);

                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }

            })

            $("#ex1").modal({
                escapeClose: false,
                clickClose: true,
                showClose: false
            });
        },  
    });

    $('#close-modal, .custom-close-modal').click(function(e) {
        e.preventDefault();
        console.log('Modal Should Be Closed');
        $.modal.close();
    });

    $('.proposez-rdv').on('click', function(event) {
        console.log('SQUAD')
        event.preventDefault();
        const cvidValue = $(this).data('cvid');
        $("#ex-rdv").modal({
            escapeClose: false,
            clickClose: true,
            showClose: false
        });

        selectedCandidates.push(cvidValue);
    })

})
</script>
@endpush