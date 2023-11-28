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
</style>
@endpush
@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center justify-content-center">
                <a href="{{ route('recruiter.dashboard') }}" class="theme-btn-one btn-one mr-2">
                        <i class="las la-arrow-left" style="font-size:38px"></i>
                    </a>
                <h3>Mes offres d'emploi</h3>
            </div>
            <a href="{{route('recruiter.offers.create')}}" class="theme-btn btn-style-one bg-header-btn">+ Ajouter une offre</a>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <!-- SEARCH FORM -->
                        <div class="widget-title">
                            <div class="chosen-outer">
                            </div>
                        </div>

                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <table class="table table-sm table-bordered" id="data-table">
                                    <thead>
                                        <tr>
                                            <!-- <th><input class="checkbox-all" type="checkbox" name="selecte-all" id="">
                                            </th> -->
                                            <th>Nom projet</th>
                                            <th>Titre poste</th>
                                            <th>Date de début</th>
                                            <th>Ville</th>
                                            <th>Type du contrat</th>
                                            <th>Salaire Brut</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($offers as $offer)
                                        <tr>
                                            <!-- <td><input class="checkbox-item" type="checkbox" name="selected" id=""
                                                    value="{{$offer->id}}"></td> -->
                                            <td class="text-left">{{$offer->project_campaign_name}}</td>
                                            <td class="text-left">{{$offer->job_title}}</td>
                                            <td class="text-left">{{$offer->start_date}}</td>
                                            <td class="text-left">{{$offer->location_city}}</td>
                                            <td class="text-left">{{$offer->contract_type}}</td>
                                            <td class="text-left">{{$offer->brut_salary}}</td>
                                            
                                            <td class="text-left">
                                                <a href="{{route('recruiter.offers.edit', $offer->id)}}" type="button" class="bg-btn-three">
                                                    <!-- Détails -->
                                                    <i class="las la-edit"></i>
                                                    Modifier
                                                </a>
                                                <a href="" type="button" class="bg-btn-four mt-3">
                                                    <!-- Détails -->
                                                    <i class="las la-trash"></i>
                                                    Supprimer
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="ls-pagination">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal HTML embedded directly into document -->
    <div id="ex1" class="modal">
        <form action="{{route('recruiter.invite.candidates')}}" method="POST">
            @csrf
            <div class="form-group">
                <h4>Proposé des rendez-vous :</h4>
            </div>
            <div class="form-group">
                <label for="candidate">Crénau 1</label>
                <input class="form-control mb-2" type="date" name="crenau_1_date" id="crenau_1_date" required>
                <input class="form-control mb-2" type="time" name="crenau_1_time" id="crenau_1_time" required>
            </div>
            <div class="form-group">
                <label for="candidate">Crénau 2</label>
                <input class="form-control mb-2" type="date" name="crenau_2_date" id="crenau_2_date" required>
                <input class="form-control mb-2" type="time" name="crenau_2_time" id="crenau_2_time" required>
            </div>
            <div class="form-group">
                <label for="candidate">Crénau 3</label>
                <input class="form-control mb-2" type="date" name="crenau_4_date" id="crenau_4_date" required>
                <input class="form-control mb-2" type="time" name="crenau_4_time" id="crenau_4_time" required>
            </div>

            <div class="form-group">
                <button class="theme-btn btn-style-one" type="submit">Envoyer</button>
            </div>
        </form>
        <a href="#" id="close-modal">Fermer</a>
        <a href="#" class="custom-close-modal"></a>
    </div>

    <!-- Modal HTML embedded directly into document -->
    <div id="commentaire-modal" class="modal">
        <form action="{{route('recruiter.invite.candidates')}}" method="POST">
            @csrf
            <div class="form-group">
                <h4>Ajouter un Commentaire :</h4>
            </div>
            <input type="hidden" name="rdv_id" id="rdv_id">
            <div class="form-group">
                <label for="candidate">Commentaire </label>
                <textarea class="form-control" name="commentaire" id="commentaire" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
                <button class="theme-btn btn-style-one" type="button" id="create-comment">Envoyer</button>
            </div>
        </form>
        <a href="#" id="close-modal">Fermer</a>
        <a href="#" class="custom-close-modal"></a>
    </div>


    <!-- <div class="calendly-inline-widget" data-url="https://calendly.com/bigplace?hide_gdpr_banner=1"
        style="min-width:320px;height:630px;"></div>
    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script> -->

    <!-- <button onclick="Calendly.showPopupWidget('https://calendly.com/embed-demo-customer-success/tips-and-tricks-webinar');return false;" class="sqs-block-button-element--medium sqs-block-button-element">Register</button> -->

</div>
@endsection

@push('scripts')
<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script>
<script>
$('.open-schedule-modal').click(function() {
    // get data attribute receiver email from button
    var receiverEmail = $(this).data('receiver-email');
    console.log(receiverEmail);
    // Calendly.initInlineWidget({
    //     url: 'https://calendly.com/embed-demo-customer-success/tips-and-tricks-webinar',
    //     parentElement: document.getElementById('calendly-embed'),
    //     prefill: {
    //         name: "John Doe",
    //         email: "john@doe2.com",
    //     },
    //     utm: {}
    // });
    // $("#ex2").modal({
    //     escapeClose: false,
    //     clickClose: true,
    //     showClose: false
    // });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const openModalCommentBtns = document.querySelectorAll('.add-comment-modal');
    const createCommentBtn = document.querySelector('#create-comment');

    openModalCommentBtns.forEach(function(button) {
        button.addEventListener('click', function() {
            $("#commentaire-modal").modal({
                escapeClose: false,
                clickClose: true,
                showClose: false
            });
            $('#rdv_id').val($(this).data('rdv-id'));
            document.getElementById('commentaire').value = '';
        });
    });

    $('#create-comment').click(function() {
        // Send the data 
        const data = {
            commentaire: document.getElementById('commentaire').value,
            rdv_id: $('#rdv_id').val()
        }
        fetch('{{ route('recruiter.commentaire.add') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include CSRF token
                    },
                    body: JSON.stringify(data),
                })
            .then(response => response.json())
            .then(data => {
                // Handle the response, e.g., show a success message
                // refresh the current page
                //    window.location.reload();
            })
            .catch(error => {
                // Handle errors, e.g., show an error message
                console.error(error);
            });
    })
})
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    $('#data-table').DataTable({
        "info": false, // Hide "Showing X to Y of Z entries"
        "searching": true,
        "language": {
            "lengthMenu": "Afficher _MENU_ entrées", // Edit this line to customize the text
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "paginate": {
                "first": "Premier",
                "last": "Dernier",
                "next": "Suivant",
                "previous": "Précédent",
            },
            "search": "Rechercher :",
            // Add other language customization options if needed
        },
        // "pagingType": "full_numbers",
    });
});
</script>
@endpush