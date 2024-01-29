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
/* input, select{
    height:45px !important;
    padding-top: 10px !important;
} */

#add-task-form  input, #add-task-form select{
    width:100%;
}
#ex1{
    background: #f8f8f8;
    max-width: 100%;
    width:600px;
    padding: 50px;
}
#add-task-form > h4{
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 36px;
    line-height: 41px;
    /* identical to box height, or 102% */
    color: #202124;
}
#add-task-form > div > label, #add-task-form > div.row > div > div > label{
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 41px;
    color: #202124;
}
#add-task-btn{
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
                    <div class="upper-title-box d-flex justify-content-between align-items-center p-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <h3>Mes Tâches</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('candidat.dashboard') }}" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                            <button class="theme-btn btn-style-one bg-header-btn" id="add-task">+ Ajouter une tâche</button>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <!-- SEARCH FORM -->
                        <div class="widget-title">
                            <div class="chosen-outer search-container w-100">
                               
                                    <div class="row w-100">
                                        <div class="col-4 px-1">
                                            <div class="form-group mb-0 mr-1">
                                                <label for="name">Tâche</label>
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Tâche">
                                            </div>
                                        </div>

                                        <div class="col-4 px-1">
                                            <div class="form-group mb-0 mr-1">
                                                <label for="name">Date de début</label>
                                                <input type="date" name="start" id="start" class="form-control w-100">
                                            </div>
                                        </div>

                                        <div class="col-4 px-1">
                                            <div class="form-group mb-0 mr-1">
                                                <label for="name">Date de fin</label>
                                                <input type="date" name="end" id="end" class="form-control w-100">
                                            </div>
                                        </div>

                                        <div class="col-4 px-1 mt-3">
                                            <div class="form-group mb-0 mr-1">
                                                <label for="name">Statut</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value=""  selected>Tous</option>
                                                    <option value="Terminée">Terminée</option>
                                                    <option value="En cours">En cours</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                   
                            </div>
                        </div>

                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <table class="table table-sm table-bordered" id="data-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Nom de la tâche</th>
                                            <th>Date de début</th>
                                            <th>Date de fin</th>
                                            <th>Heure</th>
                                            <th>Statut</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tasks as $task)
                                        <tr>
                                            <td class="text-left">{{$task->title}}</td>
                                            <td class="text-left">{{ \Carbon\Carbon::parse($task->start_date)->formatLocalized('%d-%m-%Y') }}</td>
                                            <td class="text-left">{{ \Carbon\Carbon::parse($task->due_date)->formatLocalized('%d-%m-%Y') }}</td>
                                            <td class="text-left">{{$task->hour}}</td>
                                            <td class="text-left">
                                                @if($task->completed == '0')
                                                <span class="badge badge-danger">En cours</span>
                                                @else
                                                <span class="badge badge-success">Terminée</span>
                                                @endif
                                            </td>
                                            <td class="text-left">{{Str::limit($task->description, $limit = 30, $end = '...')}}</td>
                                            <td class="text-left">
                                                <a href="{{route('candidat.task.see', $task->id)}}" type="button" class="bg-btn-three">
                                                    <!-- Détails -->
                                                    <i class="las la-edit"></i>
                                                    Modifier
                                                </a>
                                                @if($task->completed == '0')
                                                <a href="{{route('candidat.task.complete', $task->id)}}" type="button" class="bg-btn-five mt-2">
                                                    <!-- Détails -->
                                                    <i class="las la-edit"></i>
                                                    Terminer
                                                </a>
                                                @endif
                                                <a href="{{route('candidat.task.delete', $task->id)}}" type="button" class="bg-btn-four mt-2"
                                                onclick="return confirm('Etes-vous sur de vouloir supprimer cette tâche ?');">
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
        <form action="{{route('candidat.task.add')}}" method="POST" id="add-task-form">
            @csrf
            <h4 class="text-dark mb-5 pb-3">Ajouter une tâche</h4>

            <div class="form-group">
                <label class="text-dark" for="candidate">Nom de tâche</label>
                <input class="form-control mb-2" type="text" name="name" id="name" required>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="text-dark" for="candidate">Date début</label>
                        <input class="form-control mb-2" type="date" name="start_date" id="start_date" required>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="text-dark" for="candidate">Date fin</label>
                        <input class="form-control mb-2" type="date" name="end_date" id="end_date" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="text-dark" for="candidate">Heure</label>
                <input class="form-control mb-2" type="time" name="hour" id="hour" required>
            </div>

            <div class="form-group">
                <label class="text-dark" for="candidate">Statut</label>
                <select class="form-control" name="status" id="status" required>
                    <option value="0" selected="">En cours</option>
                    <option value="1">Terminée</option>
                </select>
            </div>

            <div class="form-group">
                <label class="text-dark" for="candidate">Description</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control mb-2" required></textarea>
            </div>

            <div class="form-group">
                <button class="theme-btn btn-style-one" type="submit" id="add-task-btn">Créer la tâche</button>
            </div>
        </form>
       
        <a href="#" class="custom-close-modal"></a>
    </div>
   
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById("start_date").min = new Date().toISOString().slice(0, 10);
    document.getElementById("end_date").min = new Date().toISOString().slice(0, 10);

    $('#add-task').click(function() {
        // Send the data 
        $("#ex1").modal({
                escapeClose: false,
                clickClose: true,
                showClose: false
            });
        // fetch('{{ route('recruiter.commentaire.add') }}', {
        //             method: 'POST',
        //             headers: {
        //                 'Content-Type': 'application/json',
        //                 'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include CSRF token
        //             },
        //             body: JSON.stringify(data),
        //         })
        //     .then(response => response.json())
        //     .then(data => {
        //         // Handle the response, e.g., show a success message
        //         // refresh the current page
        //         //    window.location.reload();
        //     })
        //     .catch(error => {
        //         // Handle errors, e.g., show an error message
        //         console.error(error);
        //     });
    })

    $('#close-modal, .custom-close-modal').click(function() {
        console.log('Modal Should Be Closed');
        $.modal.close();
    });
})
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
   // new DataTable('#data-table');
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
    $('#start').on('input', function () {
        // Trigger DataTable search on the "Nom du candidat" column
        $('#data-table').DataTable().columns(1).search(this.value).draw();
    });
    $('#end').on('input', function () {
        // Trigger DataTable search on the "Nom du candidat" column
        $('#data-table').DataTable().columns(2).search(this.value).draw();
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
    

});
</script>
@endpush