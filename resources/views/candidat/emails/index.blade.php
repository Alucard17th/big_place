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

.email-item:hover {
    background-color: #f5f5f5;
    cursor: pointer;
}

.email-item-received:hover {
    background-color: #f5f5f5;
    cursor: pointer;
}

#inbox-btn.active {
    background-color: #f5f5f5;
}

#sent-btn.active {
    background-color: #f5f5f5;
}

#draft-btn.active {
    background-color: #f5f5f5;
}

#deleted-btn.active {
    background-color: #f5f5f5;
}

.email-container {
    padding: 20px;
    background-color: #f5f5f5;
    border-radius: 10px;
}

#data-table-inbox_paginate{
    text-align: left !important;
}
#data-table-sent_paginate{
    text-align: left !important;
}

#data-table-inbox_paginate span{
    margin-right: 10px;
    margin-left: 10px;
}
#data-table-inbox_previous{
    margin-right: 10px;
}
#data-table-inbox_next{
    margin-left: 10px;
}

#data-table-sent_paginate span{
    margin-right: 10px;
    margin-left: 10px;
}
#data-table-sent_previous{
    margin-right: 10px;
}
#data-table-sent_next{
    margin-left: 10px;
}
.paginate_button {
    margin-left: 10px;
}

.#message-form > div:nth-child(2) > span{
    width: 28rem;
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
                            <h3>Mes emails</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('candidat.dashboard') }}" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                            <a href="{{route('candidat.email.create')}}" class="btn-style-one bg-btn px-2" id="add-message-btn">+ Nouveau message</a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">

                                <div class="col-12 py-4">
                                    <button type="button" class="btn active" id="inbox-btn">Boite de réception</button>
                                    <button type="button" class="btn" id="sent-btn">Messages Envoyés</button>
                                    <button type="button" class="btn" id="deleted-btn">Messages Supprimés</button>
                                    <button type="button" class="btn" id="draft-btn">Brouillons</button>
                                </div>

                                <div class="col-12">
                                    <button class="bg-btn-four my-2 d-none" id="delete-all-btn">Supprimer</button>
                                </div>

                                <div class="col-12">
                                    <button class="bg-btn-four my-2 d-none" id="destroy-all-btn">Supprimer Définitivement</button>
                                </div>

                                <div class="inbox table-container" id="inbox-container">
                                    <table class="table table-sm table-bordered" id="data-table-inbox">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>
                                                    <input type="checkbox" class="select-all-checkbox" data-table="inbox">
                                                </th>
                                                <th>Nom</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($receivedEmails as $email)
                                            <tr>
                                                <td><input class="checkbox-item" type="checkbox" name="selected" id=""
                                                    value="{{$email->id}}"></td>
                                                <td>{{getUserById($email->user_id)->name}}</td>
                                                <td>Sujet: <span class="text-muted">{{$email->subject}}</span> <br> Message: <span class="text-muted">{{Str::limit($email->message, 50)}}</span></td>
                                                <td data-order="{{ $email->created_at}}">
                                                    {{ \Carbon\Carbon::parse($email->created_at)->formatLocalized('%d-%m-%Y à %H:%M') }}
                                                </td>
                                                <td>
                                                    <a href="{{route('candidat.email.show', $email->id)}}" class="bg-btn-five">
                                                        Consulter
                                                    </a>
                                                    @if($deletedEmails->count() < 20)
                                                    <a href="{{route('candidat.email.softDelete', $email->id)}}" class="bg-btn-four ml-2"
                                                    onclick="return confirm('Etes-vous sur de vouloir supprimer ce message ?');">
                                                        Supprimer
                                                    </a>
                                                    @else 
                                                    <a href="" class="bg-btn-four ml-2"
                                                    onclick="event.preventDefault();return alert('Trop de messages supprimés, veuillez vider votre corbeille.');" disabled>
                                                        Supprimer
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="sent table-container" style="display: none" id="sent-container">
                                    <table class="table table-sm table-bordered" id="data-table-sent">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>
                                                    <input type="checkbox" class="select-all-checkbox" data-table="sent">
                                                </th>
                                                <th>Nom</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($emails as $email)
                                            <tr>
                                                <td><input class="checkbox-item" type="checkbox" name="selected" id=""
                                                    value="{{$email->id}}"></td>
                                                <td>{{getUserById($email->receiver_id)->name}}</td>
                                                <td>Sujet: <span class="text-muted">{{$email->subject}}</span> <br> Message: <span class="text-muted">{{Str::limit($email->message, 50)}}</span></td>
                                                <td data-order="{{ $email->created_at}}">
                                                    {{ \Carbon\Carbon::parse($email->created_at)->formatLocalized('%d-%m-%Y à %H:%M') }}
                                                </td>
                                                <td>
                                                    <a href="{{route('candidat.email.show', $email->id)}}" class="bg-btn-five">
                                                        Consulter
                                                    </a>
                                                    @if($deletedEmails->count() < 20)
                                                    <a href="{{route('candidat.email.softDelete', $email->id)}}" class="bg-btn-four ml-2"
                                                    onclick="return confirm('Etes-vous sur de vouloir supprimer ce message ?');">
                                                        Supprimer
                                                    </a>
                                                    @else 
                                                    <a href="" class="bg-btn-four ml-2"
                                                    onclick="event.preventDefault();return alert('Trop de messages supprimés, veuillez vider votre corbeille.');" disabled>
                                                        Supprimer
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="deleted table-container" style="display: none" id="deleted-container">
                                    <table class="table table-sm table-bordered" id="data-table-deleted">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>
                                                    <input type="checkbox" class="select-all-checkbox" data-table="deleted">
                                                </th>
                                                <th>Nom</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($deletedEmails as $email)
                                            <tr>
                                                <td><input class="checkbox-item" type="checkbox" name="selected" id=""
                                                    value="{{$email->id}}"></td>
                                                <td>{{getUserById($email->receiver_id)->name}}</td>
                                                <td>Sujet: <span class="text-muted">{{$email->subject}}</span> <br> Message: <span class="text-muted">{{Str::limit($email->message, 50)}}</span></td>
                                                <td data-order="{{ $email->created_at}}">
                                                    {{ \Carbon\Carbon::parse($email->created_at)->formatLocalized('%d-%m-%Y à %H:%M') }}
                                                </td>
                                                <td>
                                                    <a href="{{route('candidat.email.show', $email->id)}}" class="bg-btn-five">
                                                        Consulter
                                                    </a>
                                                    <a href="{{route('candidat.email.delete', $email->id)}}" class="bg-btn-four ml-2"
                                                        onclick="return confirm('Etes-vous sur de vouloir supprimer définitivement ce message ?');">
                                                    Supprimer
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="draft table-container" style="display: none" id="draft-container">
                                    <table class="table table-sm table-bordered" id="data-table-draft">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>
                                                    <input type="checkbox" class="select-all-checkbox" data-table="draft">
                                                </th>
                                                <th>Nom</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($draftEmails as $email)
                                            <tr>
                                                <td><input class="checkbox-item" type="checkbox" name="selected" id=""
                                                    value="{{$email->id}}"></td>
                                                <td>{{getUserById($email->receiver_id)->name}}</td>
                                                <td>Sujet: <span class="text-muted">{{$email->subject}}</span> <br> Message: <span class="text-muted">{{Str::limit($email->message, 50)}}</span></td>
                                                <td data-order="{{ $email->created_at}}">
                                                    {{ \Carbon\Carbon::parse($email->created_at)->formatLocalized('%d-%m-%Y à %H:%M') }}
                                                </td>
                                                <td>
                                                    <a href="{{route('candidat.email.show', $email->id)}}" class="bg-btn-five">
                                                        Consulter
                                                    </a>
                                                    @if($deletedEmails->count() < 20)
                                                    <a href="{{route('candidat.email.softDelete', $email->id)}}" class="bg-btn-four ml-2"
                                                    onclick="return confirm('Etes-vous sur de vouloir supprimer ce message ?');">
                                                        Supprimer
                                                    </a>
                                                    @else 
                                                    <a href="" class="bg-btn-four ml-2"
                                                    onclick="event.preventDefault();return alert('Trop de messages supprimés, veuillez vider votre corbeille.');" disabled>
                                                        Supprimer
                                                    </a>
                                                    @endif
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
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    const checkboxes = document.querySelectorAll('.checkbox-item');
    const deleteAllButton = document.querySelector('#delete-all-btn');
    const destroyAllButton = document.querySelector('#destroy-all-btn');
    let selectedValues = [];

    $("#receiver").select2({
        width: '100%'
    });

    $('#close-modal, .custom-close-modal').click(function() {
        console.log('Modal Should Be Closed');
        $.modal.close();
    });

    function hasCheckedCheckboxes(tableId) {
        const checkedCheckboxes = document.querySelectorAll(`#${tableId} .checkbox-item:checked`);
        return checkedCheckboxes.length > 0;
    }
    // Function to toggle the visibility of delete buttons based on checked checkboxes
    function toggleDeleteButtons(tableId) {
        deleteAllButton.classList.toggle('d-none', !hasCheckedCheckboxes(tableId));
        destroyAllButton.classList.toggle('d-none', !hasCheckedCheckboxes(tableId));

        if(tableId == 'data-table-deleted'){
            deleteAllButton.classList.add('d-none');
        }

        if(tableId != 'data-table-deleted'){
            destroyAllButton.classList.add('d-none');
        }
    }

    $('#inbox-btn').on('click', function() {
        $('.inbox').show();
        $('.sent').hide();
        $('.deleted').hide();
        $('.draft').hide();

        $(this).addClass('active');
        $('#sent-btn').removeClass('active');
        $('#deleted-btn').removeClass('active');
        $('#draft-btn').removeClass('active');

        toggleDeleteButtons('data-table-inbox');
    })

    $('#sent-btn').on('click', function() {
        $('.inbox').hide();
        $('.sent').show();
        $('.deleted').hide();
        $('.draft').hide();

        $(this).addClass('active');
        $('#inbox-btn').removeClass('active');
        $('#deleted-btn').removeClass('active');
        $('#draft-btn').removeClass('active');

        toggleDeleteButtons('data-table-sent');
    })

    $('#deleted-btn').on('click', function() {
        $('.inbox').hide();
        $('.sent').hide();
        $('.deleted').show();
        $('.draft').hide();

        $(this).addClass('active');
        $('#inbox-btn').removeClass('active');
        $('#sent-btn').removeClass('active');
        $('#draft-btn').removeClass('active');

        toggleDeleteButtons('data-table-deleted');
    })

    $('#draft-btn').on('click', function() {
        $('.inbox').hide();
        $('.sent').hide();
        $('.deleted').hide();
        $('.draft').show();

        $(this).addClass('active');
        $('#inbox-btn').removeClass('active');
        $('#sent-btn').removeClass('active');
        $('#deleted-btn').removeClass('active');

        toggleDeleteButtons('data-table-draft');
    })


    $('#data-table-inbox').DataTable({
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
            "zeroRecords": "Aucun email envoyé",

            // Add other language customization options if needed
        },
        // "pagingType": "full_numbers",
    });

    $('#data-table-inbox_filter input').before('<i class="las la-search" style="padding: 10px; min-width: 40px; position: absolute;"></i>');

    $('#data-table-sent').DataTable({
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
            "zeroRecords": "Aucun email envoyé",

            // Add other language customization options if needed
        },
        // "pagingType": "full_numbers",
    });

    $('#data-table-sent_filter input').before('<i class="las la-search" style="padding: 10px; min-width: 40px; position: absolute;"></i>');

    $('#data-table-deleted').DataTable({
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
            "zeroRecords": "Aucun email envoyé",

            // Add other language customization options if needed
        },
        // "pagingType": "full_numbers",
    });

    $('#data-table-deleted_filter input').before('<i class="las la-search" style="padding: 10px; min-width: 40px; position: absolute;"></i>');

    $('#data-table-draft').DataTable({
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
            "zeroRecords": "Aucun email envoyé",

            // Add other language customization options if needed
        },
        // "pagingType": "full_numbers",
    });

    $('#data-table-draft_filter input').before('<i class="las la-search" style="padding: 10px; min-width: 40px; position: absolute;"></i>');

    var selectedCheckboxes = {};
    var allTablesIDS = ['inbox', 'sent', 'deleted', 'draft'];
    // Handle "Select All" checkbox click
    $('.select-all-checkbox').on('change', function () {
        var tableId = $(this).data('table');
        var checkboxes = $('#' + tableId + '-container').find('.checkbox-item');

        checkboxes.prop('checked', this.checked);

        // Update the selectedCheckboxes object
        selectedCheckboxes[tableId] = this.checked ? checkboxes.map(function () {
            return $(this).val();
        }).get() : [];

        //Unselect all other checkboxes
        for (var i = 0; i < allTablesIDS.length; i++) {
            if(tableId != allTablesIDS[i]){
                $('#' + allTablesIDS[i] + '-container').find('.checkbox-item').prop('checked', 0);
                $('#' + allTablesIDS[i] + '-container').find('.select-all-checkbox').prop('checked', 0);
            }
        }
        // loop through checkboxes and populate selectedValues with checked values
        const checkedCheckboxes = document.querySelectorAll('.checkbox-item:checked');
        selectedValues = Array.from(checkedCheckboxes).map(function(checkbox) {
            return checkbox.value;
        })

        if(tableId == 'deleted'){
            if(selectedValues.length > 0){
                destroyAllButton.classList.remove('d-none');
            }
            else{
                destroyAllButton.classList.add('d-none');
            }
        }
        else{
            if(selectedValues.length > 0){
                deleteAllButton.classList.remove('d-none');
            }else{
                deleteAllButton.classList.add('d-none');
            }
        }
    });

    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            const checkedCheckboxes = document.querySelectorAll('.checkbox-item:checked');
            deleteAllButton.classList.toggle('d-none', checkedCheckboxes.length === 0);
            selectedValues = Array.from(checkedCheckboxes).map(function(checkbox) {
                return checkbox.value;
            });

            // Uncheck checkboxes in other tables
            const currentTableContainer = this.closest('.table-container');
            const tableContainers = document.querySelectorAll('.table-container');
            tableContainers.forEach(function(container) {
                if (container !== currentTableContainer) {
                    container.querySelectorAll('.checkbox-item:checked').forEach(function(checkbox) {
                        checkbox.checked = false;
                        selectedValues = selectedValues.filter(function(value) {
                            return value !== checkbox.value;
                        })
                    });
                }
            });

            // if the current table container contain deleted class then show the delete button
            if (currentTableContainer.classList.contains('deleted')) {
                destroyAllButton.classList.toggle('d-none', checkedCheckboxes.length === 0);
                deleteAllButton.classList.add('d-none');
            }
        });
    });

    deleteAllButton.addEventListener('click', function() {
        // Send the data using AJAX
        fetch('{{ route('candidat.emails.ajax.delete') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include CSRF token
            },
            body: JSON.stringify(selectedValues),
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

    destroyAllButton.addEventListener('click', function() {
        // Send the data using AJAX
        fetch('{{ route('candidat.emails.ajax.destroy') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include CSRF token
            },
            body: JSON.stringify(selectedValues),
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

})
</script>
@endpush