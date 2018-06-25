<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;

class ApplicantsController extends Controller
{
    public function index($lang)
    {
        $applicants = Applicant::all();
        $applicantTranslations = [];

        $lang = $lang ?? 'pt';
        foreach($applicants as $applicant) {
            $translatedApplicant = $applicant->applicanttranslations()->where('languageCode', $lang)->firstOrFail();
            $applicantTranslations[] = $translatedApplicant;
        }

        return $applicantTranslations;
        
    }

}
