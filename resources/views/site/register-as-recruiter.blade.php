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
                <input type="hidden" name="_role" value="recruiter">
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
                                <input class="checked" type="radio" name="type" id="checkbox2" value="employer"
                                    checked />
                                <label for="checkbox2" class="theme-btn btn-style-two"><i class="la la-briefcase"></i>
                                    Employeur</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="company-name">
                        <label>Nom de l&#039;entreprise</label>
                        <input type="text" name="company" placeholder="Nom de l&#039;entreprise" required>
                        <span class="invalid-feedback error error-company"></span>
                    </div>

                    <div class="row form-group">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Prénom</label>
                                <input type="text" class="form-control" name="first_name" autocomplete="off"
                                    placeholder="Prénom">
                                <i class="input-icon field-icon icofont-waiter-alt"></i>
                                <span class="invalid-feedback error error-name"></span>
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
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>N° Siret</label>
                                <input type="text" class="form-control" name="siret" autocomplete="off"
                                    placeholder="N° Siret">
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
                        <input type="text" name="phone" minlength="10" maxlength="10" placeholder="Numéro de téléphone"
                            required>
                        <span class="invalid-feedback error error-phone"></span>
                    </div>

                    <div class="form-group">
                        <label>Mot de passe</label>
                        <input id="password-field" type="password" name="password" value="" placeholder="Mot de passe">
                        <span class="invalid-feedback error error-password"></span>
                    </div>
                    <div class="form-group">
                        <label>Répétez votre mot de passe</label>
                        <input id="re-password-field" type="password" name="password_confirmation" value=""
                            placeholder="Répétez votre mot de passe">
                        <span class="invalid-feedback error error-password_confirmation"></span>
                    </div>

                    <div class="message-error"></div>


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