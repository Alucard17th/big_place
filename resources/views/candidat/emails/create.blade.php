@extends('layouts.dashboard')
@push('styles')
<style>
/* .select2-selection--single {
    padding: 10px 18px 10px 18px !important;
}  */
.select2-selection--single {
    margin: 0 !important;
    width: 100% !important;
    height: 35px !important;
    padding: .330rem .70rem !important;
    font-weight: 400 !important;
    line-height: 1.5 !important;
    color: #495057 !important;
    background-color: #fff !important;
    background-clip: padding-box !important;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out !important;
    margin-bottom: .5rem !important !important;
    border: 1px solid #dae1e7 !important;
    border-radius: 3px !important;
    box-shadow: none !important;
    font-size: 14px !important;
}

.select2-selection--multiple {
    margin: 0 !important;
    width: 100% !important;
    height: 35px !important;
    /* padding: .3rem .70rem !important; */
    padding-top: 2px;
    padding-left: 6px;
    font-weight: 400 !important;
    line-height: 1.5 !important;
    color: #8f959b !important;
    background-color: #fff !important;
    background-clip: padding-box !important;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out !important;
    margin-bottom: .5rem !important !important;
    border: 1px solid #dae1e7 !important;
    border-radius: 3px !important;
    box-shadow: none !important;
    font-size: 14px !important;
}


#message-form input,
#message-form select {
    width: 100%;
}

#message-form>h4 {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 36px;
    line-height: 41px;
    /* identical to box height, or 102% */
    color: #202124;
}

#message-form>div>label,
#message-form>div.row>div>div>label {
    font-family: 'Jost';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 41px;
    color: #202124;
}

#create-message-btn {
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
        <div class="upper-title-box">
            <h3>Envoyer un email</h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ls-widget pt-5">
                    <div class="tabs-box">
                        <div class="widget-content">
                            <form action="{{route('candidat.email.store')}}" method="POST" id="message-form">
                                @csrf
                                <div class="form-group">
                                    <label for="candidate">Email destinataire</label>
                                    <br>
                                    <select name="receiver[]" id="receiver" class="form-control" multiple required>
                                        @foreach ($receivers as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="candidate">Objet</label>
                                    <input type="text" name="subject" id="subject" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="candidate">Message</label>
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="10"
                                        required></textarea>
                                </div>

                                <div class="form-group">
                                <button class="theme-btn btn-style-four" type="button" id="save-email-draft">Enregistrer en brouillon</button>

                                    <button class="theme-btn btn-style-one" type="submit"
                                        id="create-message-btn">Envoyer</button>
                                </div>
                            </form>
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

    document.getElementById("save-email-draft").addEventListener("click", function() {
        document.getElementById("message-form").action = "{{ route('candidat.email.draft') }}"; // Replace with the actual route for saving drafts
        document.getElementById("message-form").submit();
    });
})
</script>
@endpush