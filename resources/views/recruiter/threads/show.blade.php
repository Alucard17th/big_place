@extends('layouts.dashboard')
@push('styles')
<style>
    .received-message{
        background-color: #f5f5f5;
    }
</style>
@endpush

@section('content')
<div class="user-dashboard bc-user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box d-flex justify-content-between align-items-center p-3">
            <div class="d-flex align-items-center justify-content-center">
                <h3>Mes emails</h3>
            </div>
            <div class="d-flex align-items-center">
                <a href="/mes-mails" class="bg-back-btn mr-2">
                    <!-- <i class="las la-arrow-left" style="font-size:38px"></i> -->
                    Retour
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget pt-5">
                    <div class="tabs-box">
                        <div class="widget-content">
                            @foreach($thread->emails as $email)
                            <div class="p-3 my-2 message-container @if($email->user->id == auth()->user()->id) sent-message @else received-message @endif">
                                <div class="d-flex align-items-center">
                                    <h5 class="mr-3">Objet : </h5>    
                                    <h4 >{{ $email->subject }}</h4>
                                    <p >{{ $email->is_read == 0 ? '(non lu)' : '(lu)' }}</p>
                                </div>

                                @if($email->user_id == auth()->user()->id)
                                    <div class="mt-1">À : {{ getUserById($email->receiver_id)->name }}</div>
                                @else
                                    <div class="mt-1">De : {{ getUserById($email->user_id)->name }}</div>
                                @endif
                                <div class="mt-1 text-muted">Date et heure : {{ \Carbon\Carbon::parse($email->created_at)->formatLocalized('%d-%m-%Y à %H:%M') }}</div>
                                <p>
                                    <h5>Corps du message : </h5>    
                                    {{ $email->message }}
                                </p>

                                @if($email->draft == 1)
                                <span class="mt-1 text-muted">Cet email est en brouillon</span>
                                @endif

                                <div>
                                    @if($email->draft == 1)
                                    <form action="{{ route('emails.ajax.remove.from.draft', $email->id) }}" method="get">
                                        @csrf
                                        <button class="theme-btn btn-style-one text-white" type="submit">Envoyer</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                            @endforeach

                            <hr>
                            @php
                                if($thread->user_id == auth()->user()->id){
                                    $receiver_id = $thread->participant_id;
                                }else{
                                    $receiver_id = $thread->user_id;
                                }
                            @endphp
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{ route('recruiter.emails.reply')}}" method="post" class="mt-3">
                                        @csrf
                                        <input type="hidden" name="thread_id" id="thread_id" value="{{ $thread->id }}">
                                        <input type="hidden" name="receiver_id" id="receiver_id" value="{{ $receiver_id }}">
                                        <div class="form-group">
                                            <label for="subject">Sujet</label>
                                            <input type="text" class="form-control" name="subject" id="subject" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="receiver">Message</label>
                                            <textarea class="form-control" name="message" id="message" cols="30" rows="5" required></textarea>
                                        </div>

                                        <button class="theme-btn btn-style-one text-white" type="submit">Répondre</button>
                                    </form>
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
})
</script>
@endpush