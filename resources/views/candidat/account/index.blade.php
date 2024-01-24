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

#avatar-preview {
    width: 100px;
    height: 100px;
    border-radius: 50%;
}

.save-btn {
    background: #0369A1;
    border-radius: 50px;
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 20px;
    align-items: center;
    text-align: center;
    color: #FFFFFF;
    padding: 15px 60px;
}

.delete-btn {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    overflow: visible;
    text-transform: none;
    outline: none !important;
    min-width: auto;
    -webkit-appearance: button;
    margin-top: 1rem !important;
    border: 1px solid #FF0000;
    padding: 10px 45px;
    font-weight: 500;
    border-radius: 50px;
    background-color: #fff;
    color: #FF0000 !important;
    cursor: pointer;
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
                            <h3>Mon compte</h3>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('candidat.dashboard') }}" class="bg-back-btn mr-2">
                                <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                                Retour
                            </a>
                        </div>
                    </div>
                    <div class="tabs-box">
                        <!-- SEARCH FORM -->
                        <div class="widget-title d-flex justify-content-between">
                            <div class="chosen-outer">
                                <h3 class="text-dark">Informations</h3>
                            </div>
                            <a href="" class="theme-btn-one btn-one ml-4" id="toggle-1"><i class="las la-angle-down"
                                    style="font-size:24px;color:#000;"></i></a>
                        </div>
                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content" id="toggleElement-1">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <form action="{{ route('candidat.account.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <input type="file" name="avatar" id="avatar" class="d-none">
                                        <div class="col-12">
                                            <div class="row align-items-center pt-4 pb-5">
                                                <div class="col-2">
                                                    @if(!empty($user->avatar))
                                                    <img class="img-fluid rounded-circle" id="avatar-preview"
                                                        src="{{ asset(str_replace('/public', '', '/storage/' . $user->avatar)) }}"
                                                        alt="">
                                                    @else
                                                    <img src="https://ui-avatars.com/api/?name={{ $user->name }}"
                                                        class="img-fluid rounded-circle" id="avatar-preview">
                                                    @endif

                                                </div>
                                                <div class="col-10">
                                                    <div>
                                                        <a href="" type="button" class="bg-btn-three"
                                                            id="change-avatar">
                                                            <!-- Détails -->
                                                            <i class="las la-edit"></i>
                                                            Changer
                                                        </a>
                                                        <a href="{{ route('candidat.account.avatar.delete') }}"
                                                            type="button" class="bg-btn-four"
                                                            onclick="return confirm('Etes-vous sur de vouloir supprimer votre photo ?');">
                                                            <!-- Détails -->
                                                            <i class="las la-trash"></i>
                                                            Supprimer
                                                        </a>
                                                    </div>
                                                    <div class="py-3">
                                                        <span class="text-dark">Taille recommandée: Largeur 300px X
                                                            Hauteur
                                                            300px</span>
                                                    </div>
                                                    <input type="file" class="form-control d-none" name="logo"
                                                        id="logo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="text-dark" for="nom">Nom Complet</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <!-- <div class="col-6">
                                            <div class="form-group">
                                                <label class="text-dark" for="prenom">Prénom</label>
                                                <input type="text" class="form-control" name="prenom" id="prenom"
                                                    value="{{ $user->name }}">
                                            </div>
                                        </div> -->
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="text-dark" for="birth">Date de naissance</label>
                                                <input type="date" class="form-control" name="birth" id="birth"
                                                    value="{{ $user->birth_date }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="text-dark" for="email">Email</label>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    value="{{ $user->email  }}" readonly>
                                            </div>
                                        </div>


                                        <div class="col-6">
                                            <button class="save-btn" type="submit">Enregistrer</button>
                                        </div>

                                    </div>
                                </form>
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

                        <div class="widget-title d-flex justify-content-between">
                            <div class="chosen-outer">
                                <h3 class="text-dark">Modification du mot de passe</h3>
                            </div>
                            <a href="" class="theme-btn-one btn-one ml-4" id="toggle-2"><i class="las la-angle-down"
                                    style="font-size:24px;color:#000;"></i></a>
                        </div>

                        <div class="widget-content" id="toggleElement-2">
                            <div class="table-outer">
                                <form action="{{ route('candidat.account.update.password') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="text-dark" for="actual_password">Mot de passe
                                                    actuel</label>
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
                                                <label class="text-dark" for="confirmed_password">Confirmation du
                                                    nouveau mot de
                                                    passe</label>
                                                <input type="password" class="form-control" name="confirmed_password"
                                                    id="confirmed_password" value="" required>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <button class="save-btn" type="submit">Enregistrer</button>
                                        </div>
                                    </div>
                                </form>
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
                                <h3 class="text-dark">Supression</h3>
                            </div>
                            <a href="" class="theme-btn-one btn-one ml-4" id="toggle-4"><i class="las la-angle-down"
                                    style="font-size:24px;color:#000;"></i></a>
                        </div>
                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content" id="toggleElement-4">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">
                                <form action="{{ route('candidat.account.delete') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="text-dark" for="password">Mot de passe actuel</label>
                                                <input type="password" class="form-control" name="password"
                                                    id="password" value="" required>
                                            </div>
                                            <div class="text-dark my-1 py-1">Cela supprimera votre compte</div>
                                            <button class="mt-3 delete-btn" type="submit"
                                                onclick="return confirm('Etes-vous sur de vouloir supprimer votre compte ?');">Supprimer
                                                mon compte</button>
                                        </div>
                                    </div>
                                </form>

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

    document.getElementById('change-avatar').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('avatar').click();
    });

    document.getElementById('avatar').addEventListener('change', function(event) {
        var preview = document.getElementById('avatar-preview');
        var input = event.target; // Use event.target to get the input element
        var file = input.files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    })

})
</script>
@endpush