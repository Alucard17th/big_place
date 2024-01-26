<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(){
        return view('site.home');
    }

    public function about(){
        return view('site.about');
    }

    public function parrainage(){
        return view('site.parrainage');
    }

    public function faq(){
        return view('site.faq');
    }

    public function mag(){
        return view('site.mag');
    }

    public function support(){
        return view('site.support');
    }

    public function contact(){
        return view('site.contact');
    }

    public function registerAsCandidat(){
        return view('site.register-as-candidat');
    }

    public function registerAsRecruiter(){
        return view('site.register-as-recruiter');
    }

    public function candidatPlans(){
        return view('site.candidat-plans');
    }
    public function recruiterPlans(){
        return view('site.recruiter-plans');
    }

    public function rgpd(){
        return view('site.rgpd');
    }
}
