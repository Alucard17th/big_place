@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
#{{ __('emails.hello') }}
@endif
@endif

{{-- Intro Lines --}}
{{-- @foreach ($introLines as $line) --}}
{{-- $line --}}
{{ __('emails.please_click_the_button_below_to_verify_your_email_address') }}

{{--@endforeach--}}

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@php
    $currentRole = $actionUrl;
@endphp
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ __('emails.verify_email_address') }}
@endcomponent
@endisset

{{-- Outro Lines --}}
{{ __('emails.If_you_did_not_create_an_account_no_further_action_is_required') }}

<!-- @foreach ($outroLines as $line)
{{ $line }}

@endforeach -->


{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
{{ __('emails.regards') }}
,<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
<!-- @isset($actionText)
@slot('subcopy')
@lang(
    "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    'into your web browser:',
    [
        'actionText' => $actionText,
    ]
)  -->
{{ __('emails.If_you_re_having_trouble_clicking_the_verify_email_address_button_copy_and_paste_the_URL_below_into_your_web_browser') }} <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
