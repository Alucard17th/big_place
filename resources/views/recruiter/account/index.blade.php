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

.table-outer {
    overflow-x: hidden !important;
}
</style>
@endpush
@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box d-flex justify-content-between align-items-center">

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="upper-title-box d-flex justify-content-between align-items-center p-3">
                        <div class="d-flex align-items-center justify-content-center">
                            <h3>Mon compte administateur</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('recruiter.dashboard') }}" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <!-- SEARCH FORM -->
                        <div class="widget-title d-flex justify-content-between">
                            <div class="chosen-outer">
                                <h3 class="text-dark">Mon profil</h3>
                            </div>
                            <a href="" class="theme-btn-one btn-one ml-4" id="toggle-1"><i class="las la-angle-down"
                                    style="font-size:24px;color:#000;"></i></a>
                        </div>
                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content" id="toggleElement-1">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <form action="{{ route('recruiter.admin.account.update') }}" method="POST" id="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <div class="row align-items-center pt-4 pb-5">
                                            <div class="col-2">
                                                <img class="img-fluid rounded-circle" id="avatar-preview"
                                                    src="{{ asset(str_replace('/public', '', '/storage/' . $user->avatar)) }}"
                                                alt="">

                                            </div>
                                            <div class="col-10">
                                                <div>
                                                    <input type="file" name="avatar" id="avatar" class="d-none">
                                                    <a href="" type="button" class="bg-btn-three" id="change-avatar">
                                                        <!-- Détails -->
                                                        <i class="las la-edit"></i>
                                                        Changer
                                                    </a>
                                                    <a href="{{ route('recruiter.admin.account.avatar.delete') }}"
                                                        type="button" class="bg-btn-four"
                                                        onclick="return confirm('Etes-vous sur de vouloir supprimer votre photo ?');">
                                                        <!-- Détails -->
                                                        <i class="las la-trash"></i>
                                                        Supprimer
                                                    </a>
                                                </div>
                                                <div class="py-3">
                                                    <span class="text-dark">Taille recommandée: Largeur 300px X Hauteur
                                                        300px</span>
                                                </div>
                                                <input type="file" class="form-control d-none" name="logo" id="logo">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="text-dark" for="name">Nom Complet</label>
                                                <input type="text" class="form-control" name="name"
                                                    id="name" value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="text-dark" for="birth">Date de naissance
                                                    </label>
                                                <input type="date" class="form-control" name="birth"
                                                    id="birth" value="{{ $user->birth_date }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="text-dark" for="email">Email</label>
                                                <input type="text" class="form-control" name="email"
                                                    id="email" value="{{ $user->email }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="text-dark" for="function">Fonction</label>
                                                <input type="text" class="form-control" name="function"
                                                    id="function" value="{{ $user->function }}">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <button class="btn btn-primary" type="submit">Enregistrer</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="change-password"></div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box">
                        <!-- SEARCH FORM -->
                        <div class="widget-title d-flex justify-content-between">
                            <div class="chosen-outer">
                                <h3 class="text-dark">Modification du mot de passe</h3>
                            </div>
                            <a href="" class="theme-btn-one btn-one ml-4" id="toggle-2"><i class="las la-angle-down"
                                    style="font-size:24px;color:#000;"></i></a>
                        </div>
                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content" id="toggleElement-2">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <div class="row">
                                    <form action="{{ route('recruiter.admin.password.update') }}" method="POST">
                                        @csrf
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="text-dark" for="actual_password">Mot de passe actuel</label>
                                                <input type="password" class="form-control" name="actual_password"
                                                    id="actual_password" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="text-dark" for="password">Nouveau mot de passe</label>
                                                <input type="password" class="form-control" name="password"
                                                    id="password" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="text-dark" for="confirmed_password">Confirmation du nouveau mot de
                                                    passe</label>
                                                <input type="password" class="form-control" name="confirmed_password"
                                                    id="confirmed_password" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <button class="btn btn-primary" type="submit">Enregistrer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box">
                        <!-- SEARCH FORM -->
                        <div class="widget-title d-flex justify-content-between">
                            <div class="chosen-outer">
                                <h3 class="text-dark">Gestion des membres</h3>

                            </div>
                            <div class="d-flex ">
                                <a href="" class="theme-btn btn-style-one bg-btn-smaller" id="open-user-modal">+ Ajouter un membre</a>
                                <a href="" class="theme-btn-one btn-one ml-4" id="toggle-3"><i class="las la-angle-down"
                                        style="font-size:24px;color:#000;"></i></a>
                            </div>
                        </div>
                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content" id="toggleElement-3">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <table class="table table-sm table-bordered" id="data-table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Nom du Membre</th>
                                            <th>Type de Compte</th>
                                            <th>Fonction du Membre</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="text-left">
                                                    {{ $user->name }}
                                                </td>
                                                <td class="text-left">
                                                    @if($user->getRoleNames()->first() == 'recruiter')
                                                        Administrateur
                                                    @elseif($user->getRoleNames()->first() == 'limited')
                                                        Membre Limité
                                                    @elseif($user->getRoleNames()->first() == 'restricted')
                                                        Membre Restreint
                                                    @endif
                                                </td>
                                                <td class="text-left">
                                                    {{ $user->function }}
                                                </td>
                                                <td class="text-left">
                                                    <a href="" type="button" class="bg-btn-three mt-2">
                                                        <i class="las la-edit"></i>
                                                        Editer
                                                    </a>
                                                    <a href="{{ route('recruiter.admin.user.delete', $user->id) }}" type="button" class="bg-btn-four mt-2" onclick="return confirm('Etes vous sur de vouloir supprimer cet utilisateur?')">
                                                        <i class="las la-trash"></i>
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

        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget">
                    <div class="tabs-box">
                        <!-- SEARCH FORM -->
                        <div class="widget-title d-flex justify-content-between">
                            <div class="chosen-outer">
                                <h3 class="text-dark">Suppression</h3>
                            </div>
                            <a href="" class="theme-btn-one btn-one ml-4" id="toggle-4"><i class="las la-angle-down"
                                    style="font-size:24px;color:#000;"></i></a>
                        </div>
                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content" id="toggleElement-4">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <form action="{{ route('recruiter.admin.account.delete') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="text-dark" for="nom_entreprise">Mot de passe actuel</label>
                                                <input type="password" class="form-control" name="nom_entreprise"
                                                    id="nom_entreprise" value="" required>
                                            </div>
                                            <div class="text-dark my-1 py-1">Cela supprimera votre compte</div>
                                            <button class="bg-btn-four mt-3" type="submit" onclick="return confirm('Etes-vous sur de vouloir supprimer votre compte ?');">Supprimer mon compte</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Modal HTML embedded directly into document -->
        <div id="user-modal" class="modal">
            <form action="{{route('recruiter.user.create')}}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label class="text-dark" for="name">Nom</label>
                    <input type="text" class="form-control" name="name" id="name" value="" required>
                </div>

                <div class="form-group">
                    <label class="text-dark" for="last_name">Prénom</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" value="" required>
                </div>

                <div class="form-group">
                    <label class="text-dark" for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="" required>
                </div>

                <div class="form-group">
                    <label class="text-dark" for="password">Mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password" value="" required>
                </div>

                <div class="form-group">
                    <label class="text-dark" for="nom">Permission</label>
                    <select class="form-control" name="role" id="role" required>
                        <!-- <option value="candidate">Candidat</option> -->
                        <option value="limited">Consulter</option>
                        <option value="restricted">Modifier</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="text-dark" for="function">Fonction</label>
                    <input type="text" class="form-control" name="function" id="function" value="">
                </div>

                <div class="form-group">
                    <button class="theme-btn btn-style-one" type="submit" id="create-user">Envoyer</button>
                </div>
            </form>

            <a href="#" id="close-modal">Fermer</a>
            <a href="#" class="custom-close-modal"></a>
        </div>
        @endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    $("#toggle-1").click(function(event) {
        event.preventDefault();
        $("#toggleElement-1").toggle();
    })

    $("#toggle-2").click(function(event) {
        event.preventDefault();
        $("#toggleElement-2").toggle();
    })

    $("#toggle-3").click(function(event) {
        event.preventDefault();
        $("#toggleElement-3").toggle();
    })

    $("#toggle-4").click(function(event) {
        event.preventDefault();
        $("#toggleElement-4").toggle();
    })

    const button = document.querySelector('#open-user-modal');

    button.addEventListener('click', function(event) {
        event.preventDefault();
        $("#user-modal").modal({
            escapeClose: false,
            clickClose: true,
            showClose: false
        });
    });

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
            // Add other language customization options if needed
        },
        // "pagingType": "full_numbers",
    });

    $('#data-table_filter input').before('<i class="las la-search" style="padding: 10px; min-width: 40px; position: absolute;"></i>');

    $('#close-modal, .custom-close-modal').click(function(event) {
        event.preventDefault();
        $.modal.close();
    });

    document.getElementById('change-avatar').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('avatar').click();
    });

    document.getElementById('avatar').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(event) {
            document.getElementById('avatar-preview').src = event.target.result;
        };

        reader.readAsDataURL(file);
    });
})
</script>
@endpush