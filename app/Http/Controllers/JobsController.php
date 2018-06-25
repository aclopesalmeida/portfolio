<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Response;
use App\Models\Job;
use App\Models\Applicant;

class JobsController extends Controller
{

    public function index(Request $request) {
        $jobs = Job::all();
        $translatedJobs = [];
        $lang = $request->input('lang');

        $applicant = Applicant::all()->first();
        $translatedApplicant = $applicant->applicanttranslations()->where('languageCode', $lang)->firstOrFail();

        if(!is_null($lang)) {
            foreach($jobs as $job) {
                // $translation = $job->jobtranslations()->where('languageCode', '=', 'pt')->get();
                $translation = $job->jobtranslations()->where('languageCode', $lang)->firstOrFail();
                $translatedJobs[] = $translation;
            }
            return ['applicant' => $applicant, 'translatedApplicant' => $translatedApplicant, 'jobs' => $translatedJobs];
        }
    }
}
