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
                            <a href="/candidat-emails" class="bg-back-btn mr-2">
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
                                
                                <div class="inbox">
                                    <button class="bg-btn-four my-2 d-none" id="delete-all-btn">Supprimer</button>
                                    <table class="table table-sm table-bordered" id="data-table-inbox">
                                        <thead class="thead-light">
                                            <tr>
                                                <th></th>
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
                                                <td>{{$email->subject}} <br> {{Str::limit($email->message, 50)}}</td>
                                                <td>{{ \Carbon\Carbon::parse($email->created_at)->formatLocalized('%d-%m-%Y') }}</td>
                                                <td>
                                                    <a href="{{route('candidat.email.show', $email->id)}}" class="bg-btn-five">
                                                        Consulter
                                                    </a>
                                                    <a href="{{route('candidat.email.softDelete', $email->id)}}" class="bg-btn-four ml-2"
                                                    onclick="return confirm('Etes-vous sur de vouloir supprimer ce message ?');">
                                                        Supprimer
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="sent" style="display: none">
                                    <table class="table table-sm table-bordered" id="data-table-sent">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Nom</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($emails as $email)
                                            <tr>
                                                <td>{{getUserById($email->receiver_id)->name}}</td>
                                                <td>{{$email->subject}} <br> {{Str::limit($email->message, 50)}}</td>
                                                <td>{{ \Carbon\Carbon::parse($email->created_at)->formatLocalized('%d-%m-%Y') }}</td>
                                                <td>
                                                    <a href="{{route('candidat.email.show', $email->id)}}" class="bg-btn-five">
                                                        Consulter
                                                    </a>
                                                    <a href="{{route('candidat.email.softDelete', $email->id)}}" class="bg-btn-four ml-2"
                                                    onclick="return confirm('Etes-vous sur de vouloir supprimer ce message ?');">
                                                        Supprimer
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="deleted" style="display: none">
                                    <table class="table table-sm table-bordered" id="data-table-deleted">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Nom</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($deletedEmails as $email)
                                            <tr>
                                                <td>{{getUserById($email->receiver_id)->name}}</td>
                                                <td>{{$email->subject}} <br> {{Str::limit($email->message, 50)}}</td>
                                                <td>{{ \Carbon\Carbon::parse($email->created_at)->formatLocalized('%d-%m-%Y') }}</td>
                                                <td>
                                                    <a href="{{route('candidat.email.show', $email->id)}}" class="bg-btn-five">
                                                        Consulter
                                                    </a>
                                                    <a href="{{route('candidat.email.delete', $email->id)}}" class="bg-btn-four ml-2"
                                                        onclick="return confirm('Etes-vous sur de vouloir supprimer ce message ?');">
                                                    Supprimer
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="draft" style="display: none">
                                    <table class="table table-sm table-bordered" id="data-table-draft">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Nom</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($draftEmails as $email)
                                            <tr>
                                                <td>{{getUserById($email->receiver_id)->name}}</td>
                                                <td>{{$email->subject}} <br> {{Str::limit($email->message, 50)}}</td>
                                                <td>{{ \Carbon\Carbon::parse($email->created_at)->formatLocalized('%d-%m-%Y') }}</td>
                                                <td>
                                                    <a href="{{route('candidat.email.show', $email->id)}}" class="bg-btn-five">
                                                        Consulter
                                                    </a>
                                                    <a href="{{route('candidat.email.softDelete', $email->id)}}" class="bg-btn-four ml-2"
                                                        onclick="return confirm('Etes-vous sur de vouloir supprimer ce message ?');">
                                                    Supprimer
                                                    </a>
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
    $("#receiver").select2({
        width: '100%'
    });

    $('#close-modal, .custom-close-modal').click(function() {
        console.log('Modal Should Be Closed');
        $.modal.close();
    });

    $('.email-item').on('click', function() {
        var emailId = $(this).data('id');
        $.ajax({
            url: "{{route('recruiter.email.show')}}",
            type: "GET",
            data: {
                id: emailId
            },
            success: function(data) {
                $('#email-title').text(data.subject);
                $('#email-content').text(data.message);
            }
        })
    })

    $('.email-item-received').on('click', function() {
        var emailId = $(this).data('id');
        $.ajax({
            url: "{{route('recruiter.email.show')}}",
            type: "GET",
            data: {
                id: emailId
            },
            success: function(data) {
                $('#email-title-received').text(data.subject);
                $('#email-content-received').text(data.message);
            }
        })
    })

    $('#inbox-btn').on('click', function() {
        $('.inbox').show();
        $('.sent').hide();
        $('.deleted').hide();
        $('.draft').hide();

        $(this).addClass('active');
        $('#sent-btn').removeClass('active');
        $('#deleted-btn').removeClass('active');
        $('#draft-btn').removeClass('active');
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

    // DELETE EMAIL CHECKBOXES
    const checkboxes = document.querySelectorAll('.checkbox-item');
    const deleteAllButton = document.querySelector('#delete-all-btn');
    let selectedValues = [];
    // Add an event listener to checkboxes to toggle the button visibility
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            console.log(this);
            const checkedCheckboxes = document.querySelectorAll('.checkbox-item:checked');

            deleteAllButton.classList.toggle('d-none', checkedCheckboxes.length === 0);

            selectedValues = Array.from(checkedCheckboxes).map(function(checkbox) {
                return checkbox.value;
            });

            console.log(selectedValues);

        });

    });

    deleteAllButton.addEventListener('click', function() {
        // Send the data using AJAX
        fetch('{{ route('recruiter.emails.ajax.delete') }}', {
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