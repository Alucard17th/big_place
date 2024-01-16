@extends('layouts.dashboard')
@push('styles')
<style>
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
                            <h4>{{ $email->subject }}</h4>

                            @if($email->user_id == auth()->user()->id)
                                <div class="mt-3">Envoyé à {{ getUserById($email->receiver_id)->name }}</div>
                            @else
                                <div class="mt-3">Envoyé par {{ getUserById($email->user_id)->name }}</div>
                            @endif
                            
                            <div class="mt-3 text-muted">Date : {{ \Carbon\Carbon::parse($email->created_at)->formatLocalized('%d-%m-%Y à %H:%M') }}</div>
                                
                            <p>
                            <h5>Message : </h5>    
                            {{ $email->message }}</p>

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