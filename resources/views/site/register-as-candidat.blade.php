@extends('layouts.app')

@section('content')
<div class="login-section">
    <div class="image-layer"
        style="background-image: url(https://bigplace.fr/module/superio/images/background/12.jpg);"></div>
    <div class="outer-box">
        <!-- Login Form -->
        <div class="login-form default-form bravo-login-form-page bravo-login-page">
            <h3>
                <center><strong>
                        <font color="#ff8c00">Créez un compte sur Big Place</font>
                    </strong></center>
            </h3>
            <form class="form bravo-form-register" method="post">
                @csrf
                <input type="hidden" name="_role" value="candidat">

                <style>
                .bravo-form-register input.checked:checked+.theme-btn {
                    background-color: #0367d9;
                    color: #FFF;
                }
                </style>
                <form method="post" action="#">
                    <div class="form-group">
                        <div class="btn-box row">
                            <div class="col-lg-12 col-md-12">
                                <input class="checked" type="radio" name="type" id="checkbox1" value="candidate"
                                    checked />
                                <label for="checkbox1" class="theme-btn btn-style-four"><i class="la la-user"></i>
                                    Candidat</label>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Prénom</label>
                                <input type="text" class="form-control" name="first_name" autocomplete="off"
                                    placeholder="Prénom">
                                <i class="input-icon field-icon icofont-waiter-alt"></i>
                                <span class="invalid-feedback error error-first_name error-last_name"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control" name="last_name" autocomplete="off"
                                    placeholder="Nom">
                                <i class="input-icon field-icon icofont-waiter-alt"></i>
                                <span class="invalid-feedback error error-name"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Adresse e-mail</label>
                        <input type="email" name="email" placeholder="Adresse e-mail" required>
                        <span class="invalid-feedback error error-email"></span>
                    </div>

                    <div class="form-group">
                        <label>Numéro de téléphone</label>
                        <input type="text" name="phone" minlength="10" maxlength="10" 
                        pattern="[0-9]{10}"
                            required>
                        <span class="invalid-feedback error error-phone"></span>
                    </div>

                    <div class="form-group">
                        <label>Mot de passe</label>
                        <input id="password-field" type="password" name="password" value="" placeholder="Mot de passe">
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        <span class="invalid-feedback error error-password"></span>
                    </div>
                    <div class="form-group">
                        <label>Répétez votre mot de passe</label>
                        <input id="re-password-field" type="password" name="password_confirmation" value=""
                            placeholder="Répétez votre mot de passe">
                        <span toggle="#re-password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        <span class="invalid-feedback error error-password_confirmation"></span>
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="rgpd-consent" name="rgpd-consent" required>
                        <label class="form-check-label" for="rgpd-consent" style="margin-top: -12px; margin-left: 25px;">
                            Je consens à ce que mes données soient collectées et utilisées 
                            dans le cadre de la solution BIG PLACE conformément à la politique RGPD en 
                            <a href="/rgpd" target="_blank" style="color:#ff8b00;">pièce jointe</a>.
                        </label>
                    </div>

                    <div class="from-group">
                        <div class="invalid-feedback error-rgpd-consent">
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="theme-btn btn-style-one " type="submit" name="Register">Inscription
                            <span class="spinner-grow spinner-grow-sm icon-loading" role="status"
                                aria-hidden="true"></span>
                        </button>
                    </div>
                </form>
            </form>
        </div>
    </div>
</div>
@endsection