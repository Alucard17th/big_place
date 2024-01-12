@extends('layouts.app')
@php
app()->setLocale('fr');

@endphp
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card h-100">
                <div class="card-header">{{ __('emails.verify_email_subject') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('emails.verification_sent') }}
                        </div>
                    @endif

                    {{ __('emails.check_email') }}
                    {{ __('emails.not_receive_email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('emails.request_another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
