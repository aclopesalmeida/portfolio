<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillsController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return $skills;
    }
}
