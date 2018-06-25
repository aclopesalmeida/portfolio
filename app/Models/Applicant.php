<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    public function applicanttranslations() 
    {
        return $this->hasMany('App\Models\ApplicantTranslation');
    }
}
