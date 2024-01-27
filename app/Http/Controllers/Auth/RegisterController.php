<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function redirectTo()
    {
        return '/new-recruiter-redirect-url';
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        app()->setLocale('fr');
        if($data['role'] == 'recruiter'){
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'password_confirmation' => ['required', 'string', 'min:8', 'confirmed'],
                'company' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:255'],
                'siret' => ['required', 'string', 'max:255'],
                'rgpd-consent' => ['accepted'],
            ], [
                // General validation errors
                // 'required' => 'Le champ :attribute est obligatoire.',
                'email' => 'Le champ :attribute doit être une adresse e-mail valide.',
                'max' => [
                    'string' => 'Le champ :attribute ne peut pas dépasser :max caractères.',
                ],
                'min' => [
                    'string' => 'Le champ :attribute doit contenir au moins :min caractères.',
                ],
                'confirmed' => 'Les champs mot de passe et mot de passe de confirmation ne correspondent pas.',
                'unique' => 'Le champ :attribute est déjà utilisé.',
    
                // Specific field errors
                'name.required' => 'Veuillez saisir votre nom.',
                'last_name.required' => 'Veuillez saisir votre prénom.',
                'email.required' => 'Veuillez saisir votre adresse e-mail.',

                'password.required' => 'Veuillez saisir votre mot de passe.',
                'password_confirmation.required' => 'Veuillez confirmer votre mot de passe.',
                'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
                'company.required' => 'Veuillez saisir le nom de l\'entreprise.',
                'phone.required' => 'Veuillez saisir votre numéro de téléphone.',
                'phone.min' => 'Le numéro de téléphone doit contenir au moins 10 chiffres.',
                'phone.max' => 'Le numéro de téléphone ne peut pas dépasser 10 chiffres.',
                'siret.required' => 'Veuillez saisir le numéro SIRET.',
                'siret.max' => 'Le numéro SIRET ne peut pas dépasser 14 caractères.',
                'rgpd-consent.accepted' => 'Veuillez accepter les conditions d\'utilisation.',
            ]);
        }else{
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                // 'password_confirmation' => ['required', 'string', 'min:8', 'confirmed'],
                'phone' => ['required', 'string', 'max:255'],
                'rgpd-consent' => ['accepted'],
            ], [
                // General validation errors
                // 'required' => 'Le champ :attribute est obligatoire.',
                'email' => 'Le champ :attribute doit être une adresse e-mail valide.',
                'max' => [
                    'string' => 'Le champ :attribute ne peut pas dépasser :max caractères.',
                ],
                'min' => [
                    'string' => 'Le champ :attribute doit contenir au moins :min caractères.',
                ],
                'confirmed' => 'Les champs mot de passe et mot de passe de confirmation ne correspondent pas.',
                'unique' => 'Le champ :attribute est déjà utilisé.',
    
                // Specific field errors
                'name.required' => 'Veuillez saisir votre nom.',
                'last_name.required' => 'Veuillez saisir votre prénom.',
                'email.required' => 'Veuillez saisir votre adresse e-mail.',
                
                'password.required' => 'Veuillez saisir votre mot de passe.',
                'password_confirmation.required' => 'Veuillez confirmer votre mot de passe.',
                'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
                'company.required' => 'Veuillez saisir le nom de l\'entreprise.',
                'phone.required' => 'Veuillez saisir votre numéro de téléphone.',
                'phone.min' => 'Le numéro de téléphone doit contenir au moins 10 chiffres.',
                'phone.max' => 'Le numéro de téléphone ne peut pas dépasser 10 chiffres.',
                'siret.required' => 'Veuillez saisir le numéro SIRET.',
                'siret.max' => 'Le numéro SIRET ne peut pas dépasser 14 caractères.',
                'rgpd-consent.accepted' => 'Veuillez accepter les conditions d\'utilisation.',
            ]);
        }
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'siret' => $data['siret'] ?? null,
        ]);

        $user->assignRole($data['role']);

        if($data['role'] == 'recruiter'){
            $emailDetails = [
                'title' => 'Bienvenue chez BIG PLACE !', 
                'body' => ' Votre inscription a bien été validée, nous vous invitions à vous rendre sur le lien ci-dessous pour profiter de votre solution digitale et recruter des talents.',
                'url' => route('home'),
            ];
        }else{
            $emailDetails = [
                'title' => 'Bienvenue chez BIG PLACE !', 
                'body' => ' Votre inscription a bien été validée, nous vous invitions à vous rendre sur le lien ci-dessous pour profiter de votre solution digitale.',
                'url' => route('home'),
            ];
        }
        

        Mail::to($user->email)->send(new UserRegistered($emailDetails));

        if($user){
            toast('Votre inscription est effectuée avec succès','success')->autoClose(5000);
        }

        // if($data['role'] == 'recruiter'){
        //     return redirect(route('recruiter.vitrine'));
        // }

        return $user;
    }

}
