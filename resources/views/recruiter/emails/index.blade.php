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

#inbox-btn.active{
    background-color: #f5f5f5;
}
#sent-btn.active{
    background-color: #f5f5f5;
}

.email-container{
    padding: 20px;
    background-color: #f5f5f5;
    border-radius: 10px;
}
</style>
@endpush
@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Mes Tâches</h3>
            <div class="text">Simplifiez votre processus de recrutement et accélérez vos embauches</div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <!-- SEARCH FORM -->
                        <div class="widget-title">
                            <div class="chosen-outer">
                                <form method="post" class="default-form form-inline"
                                    action="{{route('recruiter.task.add')}}">
                                    @csrf
                                    <div class="form-group mb-0 mr-1">
                                        <input type="text" name="task_title" placeholder="Ajouter une tâche" value=""
                                            class="form-control mb-2" required>
                                    </div>
                                    <button type="submit" class="theme-btn btn-style-one">Ajouter</button>
                                </form>
                            </div>
                        </div>

                        <!-- TABLE AND GRID VIEW -->
                        <div class="widget-content">
                            <!-- TABLE VIEW -->
                            <div class="table-outer">

                                <div class="col-12 pb-3">
                                    <button type="button" class="btn active" id="inbox-btn">Boite de réception</button>
                                    <button type="button" class="btn" id="sent-btn">Message Envoyés</button>
                                </div>

                                <div class="row inbox">

                                    <div class="col-4">
                                        <ul>
                                            @foreach($emails as $email)
                                            <li class="email-item" data-id="{{$email->id}}">
                                                <div class="d-flex justify-content-between py-2 border-bottom">
                                                    <span>{{getUserById($email->receiver_id)->name}}</span>
                                                    <span>{{$email->subject}} </span>
                                                    <span>{{$email->created_at}}</span>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="col-8">
                                        <div class="email-container">
                                            <h1 id="email-title"></h1>
                                            <p id="email-content"></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row sent" style="display: none">
                                    <div class="col-4">
                                        <ul>
                                            @foreach($receivedEmails as $email)
                                            <li class="email-item-received" data-id="{{$email->id}}">
                                                <div class="d-flex justify-content-between py-2 border-bottom">
                                                    <span>{{getUserById($email->user_id)->name}}</span>
                                                    <span>{{$email->subject}} </span>
                                                    <span>{{$email->created_at}}</span>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-8">
                                        <div class="email-container">
                                            <h1 id="email-title-received"></h1>
                                            <p id="email-content-received"></p>
                                        </div>
                                    </div>
                                </div>


                                <div class="ls-pagination">
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
        // add active class to the clicked button
        $(this).addClass('active');
        $('#sent-btn').removeClass('active');
    })

    $('#sent-btn').on('click', function() {
        $('.inbox').hide();
        $('.sent').show();
        // add active class to the clicked button
        $(this).addClass('active');
        // remove active class from inbox button
        $('#inbox-btn').removeClass('active');
    })
})
</script>
@endpush