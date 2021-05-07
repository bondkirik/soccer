<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Classes\Play;


class DivisionController extends Controller
{
    public function index()
    {
         $divisions = Division::with('teams')->get();

        return view('index', compact('divisions'));
    }

    public function divisionGeneration($id)
    {

        Play::playGames($id);

        return redirect()->action([DivisionController::class, 'index']);
    }

    public function playoffGen()
    {

        return redirect()->action([DivisionController::class, 'index']);
    }
}
