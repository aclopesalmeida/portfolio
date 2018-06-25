<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    public function interesttranslations()
    {
        return $this->hasMany('App\Models\InterestTranslation');
    }
}
