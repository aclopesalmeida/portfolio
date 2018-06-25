<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interest;

class InterestsController extends Controller
{
    public function index(Request $request)
    {
        $interestTranslations = [];

        $lang = $request->input('lang') ?? 'pt';
        $interestTranslations = Interest::with([
            'interesttranslations' => function($query) use ($lang) {
                $query->where('languageCode', $lang);
            }
        ])->get()->toArray();
        
        return ['translatedInterests' => $interestTranslations];
    }
}
