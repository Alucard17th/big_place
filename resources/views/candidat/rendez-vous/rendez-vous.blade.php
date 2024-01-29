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
.custom-btn{
    background-color : #ff8b00;
}
input, select{
    height:45px !important;
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
.select2-search__field{
    padding: 0px 18px 10px 20px !important;
}
#data-table_length > label > select{
    width: auto !important;
}

input, select{
    height:45px !important;
    padding-top: 10px !important;
}
.select2-selection--single{
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
.select2-search__field{
    padding: 0px 18px 10px 20px !important;
    height: 37px !important;
}

#search-btn{
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 20px;
}

.form-group input, .form-group select{
    height: 45px ;
    background: #fff !important;
    width: 22vw;
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
                        <div class="upper-title-box d-flex justify-content-between align-items-center p-3">
                            <div class="d-flex align-items-center justify-content-center">
                                <h3>Mes Rendez-vous</h3>
                            </div>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('candidat.dashboard') }}" class="bg-back-btn mr-2">
                                    <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                    Retour
                                </a>
                            </div>
                        </div>
                        <!-- SEARCH FORM -->
                        <div class="widget-title">
                            <div class="chosen-outer search-container w-100">
                                
                                    <div class="row w-100">
                                            <div class="col-4 px-1">
                                                <div class="form-group mb-0 mr-1">
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nom de l'entreprise">
                                                </div>
                                            </div>

                                            <div class="col-4 px-1">
                                                <div class="form-group mb-0 mr-1">
                                                    <select name="type" id="type" class="form-control">
                                                        <option value="" selected>Type de rendez-vous</option>
                                                        <option value="Visio">Visio</option>
                                                        <option value="Physique">Physique</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-4 px-1">
                                                <div class="form-group mb-0 mr-1">
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="" selected>Statut</option>
                                                        <option value="En attente">En attente</option>
                                                        <option value="A venir">A venir</option>
                                                        <option value="Terminé">Terminé</option>
                                                        <option value="Annulé">Annulé</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-4 px-1 mt-3">
                                                <div class="form-group mb-0 mr-1">
                                                    <input type="date" name="date" id="date" class="form-control w-100">
                                                </div>
                                            </div>
                                    </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary ml-2 mb-2 d-none add-to-favorites">Ajouter aux
                            favoris</button>

                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                            <table class="table table-sm table-bordered" id="data-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Nom de l'entreprise</th>
                                            <th>Type</th>
                                            <th>Date de rendez-vous</th>
                                            <th>Statut</th>
                                            <th>Commentaire</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rdvs as $rdv)
                                        <tr>
                                            <td class="text-left">{{getEntrepriseByUserId($rdv->user_id)}}</td>
                                            <td class="text-left">
                                                @if($rdv->is_type_distanciel)
                                                    Visio
                                                @else
                                                    Physique
                                                @endif
                                            </td>
                                            <td class="text-left">{{ \Carbon\Carbon::parse($rdv->date)->formatLocalized('%d-%m-%Y') }} à {{$rdv->heure}}</td>
                                            <td class="text-left">{{$rdv->status}}</td>
                                            <td class="text-left">{{$rdv->commentaire}}</td>
                                            <td class="text-left">
                                                @if($rdv->status != 'Annulé')
                                                <a href="{{route('recruiter.rendez-vous.see', $rdv->id)}}" type="button" class="bg-btn-five">
                                                    <!-- Détails -->
                                                    <i class="las la-video"></i>
                                                    Rejoindre
                                                </a>
                                                
                                                <a href="{{route('candidat.rdv.cancel', $rdv->id)}}" type="button" class="bg-btn-four mt-2"
                                                onclick="return confirm('Etes-vous sur de vouloir annuler ce rendez-vous ?');">
                                                    <!-- Détails -->
                                                    Annuler
                                                </a>
                                                @endif
                                                <button class="bg-btn-five add-comment-modal mt-2"
                                                    data-rdv-id="{{$rdv->id}}" data-rdv-commentaire="{{$rdv->commentaire}}">
                                                    <i class="las la-comment"></i>
                                                    Commentaire
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

</div>
@endsection

@push('scripts')
<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script>

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
            
            $('#commentaire').val($(this).data('rdv-commentaire'));
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
                   window.location.reload();
            })
            .catch(error => {
                // Handle errors, e.g., show an error message
                console.error(error);
            });
    })

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
            "search": "",
            "searchPlaceholder": "Rechercher...",
            "zeroRecords": "Aucun résultat trouvé.",
            // Add other language customization options if needed
        },
        // "pagingType": "full_numbers",
    });
    $('#data-table_filter input').before('<i class="las la-search" style="padding: 10px; min-width: 40px; position: absolute;"></i>');

    $('#name').on('input', function () {
        // Trigger DataTable search on the "Nom du candidat" column
        $('#data-table').DataTable().columns(0).search(this.value).draw();
    });
    $('#type').on('change', function () {
        // Get the DataTable instance
        var dataTable = $('#data-table').DataTable();

        // Define a custom search function for exact match
        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
            var selectedValue = $('#type').val().trim().toLowerCase();
            var columnValue = data[1].toLowerCase(); // Assuming "Type" is the second column

            // Perform an exact match
            return selectedValue === '' || columnValue === selectedValue;
        });

        // Trigger DataTable search and draw
        dataTable.draw();

        // Remove the custom search function after the search
        $.fn.dataTable.ext.search.pop();
    });
    $('#status').on('change', function () {
        // Get the DataTable instance
        var dataTable = $('#data-table').DataTable();

        // Define a custom search function for exact match
        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
            var selectedValue = $('#status').val().trim().toLowerCase();
            var columnValue = data[3].toLowerCase(); // Assuming "Statut" is the fourth column

            // Perform an exact match
            return selectedValue === '' || columnValue === selectedValue;
        });

        // Trigger DataTable search and draw
        dataTable.draw();

        // Remove the custom search function after the search
        $.fn.dataTable.ext.search.pop();
    });
    $('#date').on('input', function () {
        // Trigger DataTable search on the "Nom du candidat" column
        $('#data-table').DataTable().columns(2).search(this.value).draw();
    });
})
</script>

<script>
$('#close-modal, .custom-close-modal').click(function() {
    console.log('Modal Should Be Closed');
    $.modal.close();
});
</script>
@endpush