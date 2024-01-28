<?php 

use App\Models\User;
use App\Models\Offre;
use App\Models\Entreprise;
use App\Models\Curriculum;
use App\Models\Job;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

if (!function_exists('getCurriculumById')) {
    function getCurriculumById(string $id = null)
    {
        if ($id != null) {
            $user = Curriculum::where('id', $id)->first();
            return $user;
        } else {
            return '';
        }
    }
}

if (!function_exists('getEntrepriseByUserId')) {
    function getEntrepriseByUserId(string $id = null)
    {
        if ($id != null) {
            $user = User::Find($id);
            if($user->parent_entreprise_id == null){
                // USER IS ADMIN
                $entreprise = Entreprise::where('user_id', $user->id)->first();
            }else{
                // OTHER TEAM MEMBERS
                $entreprise = Entreprise::where('user_id', $user->parent_entreprise_id)->first();
            }

            if($entreprise == null){
                return '';
            }

            return $entreprise->nom_entreprise;
        } else {
            return '';
        }
    }
}

if (!function_exists('getEntrepriseLogoByUserId')) {
    function getEntrepriseLogoByUserId(string $id = null)
    {
        if ($id != null) {
            $user = User::Find($id);

            if($user->parent_entreprise_id == null){
                // USER IS ADMIN
                $entreprise = Entreprise::where('user_id', $user->id)->first();

            }else{
                // OTHER TEAM MEMBERS
                $entreprise = Entreprise::where('user_id', $user->parent_entreprise_id)->first();
            }

            return $entreprise;
        } else {
            return '';
        }
    }
}

if (!function_exists('getUserEmailById')) {
    function getUserEmailById(string $id = null)
    {
        if ($id != null) {
            $user = User::where('id', $id)->first();
            return $user->email;
        } else {
            return '';
        }
    }
}

if (!function_exists('getUserById')) {
    function getUserById(string $id = null)
    {
        if ($id != null) {
            $user = User::where('id', $id)->first();
            return $user;
        } else {
            return '';
        }
    }
}

if (!function_exists('getOfferByCandidatId')) {
    function getOfferByCandidatId(string $id = null)
    {
        if ($id != null) {
            $user = Offre::where('id', $id)->first();
            return $user;
        } else {
            return '';
        }
    }
}

// if (!function_exists('getEntrepriseByUserID')) {
//     function getEntrepriseByUserID(string $id = null)
//     {
//         if ($id != null) {
//             $user = Entreprise::where('user_id', $id)->first();
//             return $user;
//         } else {
//             return '';
//         }
//     }
// }

if (!function_exists('getFormationUserStatus')) {
    function getFormationUserStatus(string $user_id = null, string $formation_id = null)
    {
        if ($user_id != null) {
            $status = DB::table('formation_user')
            ->where('user_id', $user_id)
            ->where('formation_id', $formation_id)
            ->value('status');
            return $status;
        } else {
            return '';
        }
    }
}

if (!function_exists('getJobByCode')) {
    function getJobByCode(string $codeOgr = null)
    {   
        if ($codeOgr != null && $codeOgr != '') {
            // return $codeOgr;
            // return Job::where('code_ogr', $codeOgr)->value('full_name');
            $job = Job::where('code_ogr', 10473)->first();
          
          
            return $job->full_name;
        } else {
            return '';
        }
    }
}

if (!function_exists('getMonthDates')) {
    function getMonthDates(int $yearAndWeek  = null)
    {   
        // $yearAndWeek = '202353';
        list($year, $weekNumber) = sscanf($yearAndWeek, '%4s%2s');

        $startOfWeek = Carbon::now()->year($year)->startOfYear()->addWeeks($weekNumber - 1)->startOfWeek();
        $endOfWeek = Carbon::now()->year($year)->startOfYear()->addWeeks($weekNumber - 1)->endOfWeek();
    
        return [
            'startOfWeek' => $startOfWeek->toDateString(),
            'endOfWeek' => $endOfWeek->toDateString(),
        ];
    }
}

if (!function_exists('getUserCvById')) {
    function getUserCvById(int $id  = null)
    {   
        if ($id != null && $id != '') {
           
            $user = User::find($id);
          
          
            return '/storage/' . $user->curriculum->first()->cv;
        } else {
            return '';
        }
    }
}
